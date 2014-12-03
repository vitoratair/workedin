var Masking = function () {

    return {
        
        //Masking
        initMasking: function () {
	        $("#phone").mask('(99) 9999-9999');
	        $("#contactPhone").mask('(99) 9999-9999');
	        $("#birth").mask('99/99/9999');
	        $("#cpf").mask('999.999.999-99');
	        $("#cnpj").mask('99.999.999/9999-99');
	        $("#salary").maskMoney({prefix:'R$ ' ,allowNegative: false, thousands:'.', precision:'0', decimal:',', affixesStay: false});

        }

    };
    
}();