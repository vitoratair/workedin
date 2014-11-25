var Masking = function () {

    return {
        
        //Masking
        initMasking: function () {
	        $("#phone").mask('(99) 9999-9999', {placeholder:'0'});
	        $("#contactPhone").mask('(99) 9999-9999', {placeholder:'0'});
	        $("#birth").mask('99/99/9999', {placeholder:'0'});
	        $("#cpf").mask('999.999.999-99', {placeholder:'0'});
	        $("#cnpj").mask('99.999.999/9999-99', {placeholder:'0'});
	        $("#salary").maskMoney({prefix:'R$ ' ,allowNegative: false, thousands:'.', precision:'0', decimal:',', affixesStay: false});

        }

    };
    
}();