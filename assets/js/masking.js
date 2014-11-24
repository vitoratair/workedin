var Masking = function () {

    return {
        
        //Masking
        initMasking: function () {
	        $("#phone").mask('(99) 9999-9999', {placeholder:'0'});
	        $("#birth").mask('99/99/9999', {placeholder:'0'});	        
        }

    };
    
}();