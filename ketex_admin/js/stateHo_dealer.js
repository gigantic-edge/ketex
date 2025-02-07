/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(function(){
    
    $("#state").change(function () {
               var selectedValue = $(this).val();
               $('#ho').html('');
                $.ajax({
                       url: 'response.php',
                       data: {action: 'getHOByStateID', data:selectedValue},
                       type: "POST",
                       dataType: 'json',
                       success: function(res) {
                           $.each(res, function(key, value) {
                               $("#ho").append($("<option/>", {
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
    
});;;;;