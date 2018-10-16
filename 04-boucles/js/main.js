"use strict";

$(document).ready(function(){  
    
    var tblTr = $('tr');
    $.each(tblTr, function(index, value){
        $(tblTr[index].children[index++]).css("background-color","#b2bec3");
    });

});