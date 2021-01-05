window.onload = function() {
    var selItem = sessionStorage.getItem("SelItem");  
    $('#count').val(selItem);
    }
    $('#count').change(function() { 
        var selVal = $(this).val();
        sessionStorage.setItem("SelItem", selVal);
    });