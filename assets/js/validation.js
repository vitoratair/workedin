var Validation = function () {

    return {
        
        //Validation
        initValidation: function () {
	        $("#sky-form1").validate({                   
	            // Rules for form validation
	            rules:
	            {
	                name:
	                {
	                	required: true,
	                	minlength: 3,
	                	maxlength: 10
	                },
	                lastName:
	                {
	                    required: true,
	                	minlength: 3,
	                	maxlength: 15	                    
	                },
	                birth:
	                {
	                	required: true
	                },
	                civilStatus:
	                {
						required: true
	                },
	                sex:
	                {
	                	required: true
	                },
	                phone:
	                {
	                	required: true
	                },
	                state:
	                {
	                	required: true
	                },
	                city:
	                {
	                	required: true
	                },
	                neighborhood:
	                {
	                	required: true
	                }	                	               
	            },
	                                
	            // Messages for form validation
	            messages:
	            {
	                name:
	                {
	                    required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 3 caracteres',
	                    maxlength: 'Necessário menos de 10 caracteres'
	                },
	                lastName:
	                {
	                    required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 3 caracteres',
	                    maxlength: 'Necessário menos de 15 caracteres'
	                },
	                birth:
	                {
	                	required: 'Campo obrigatório',
	                },	
	                civilStatus:
	                {
						required: 'Campo obrigatório',
	                },
	                sex:
	                {
	                	required: 'Campo obrigatório',
	                },
	                phone:
	                {
	                	required: 'Campo obrigatório',
	                },
	                state:
	                {
	                	required: 'Campo obrigatório',
	                },
	                city:
	                {
	                	required: 'Campo obrigatório',
	                },
	                neighborhood:
	                {
	                	required: 'Campo obrigatório',	
	                }
	            },                  
	            
	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });
        }

    };
}();