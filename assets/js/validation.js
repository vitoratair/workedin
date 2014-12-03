var Validation = function () {

    return {
        
        //Validation
        initValidation: function () {
	        	        
	        $("#form-newAddress").validate({
	        	rules:
	        	{
					addressName:
					{
	                	required: true,
	                    minlength: 2,
	                    maxlength: 20						
					},
	        	},
	        	messages:
	        	{
	        		addressName:
	        		{
	        			required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 2 caracteres',
	                    maxlength: 'Necessário menos de 20 caracteres'	        			
	        		},
	        	},
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }	        	
	        });

	        $("#form-edit-position").validate({
	        	rules:
	        	{
	                editCompany:
	                {
	                	required: true,
	                    minlength: 2,
	                    maxlength: 20
	                },
	                editPosition:
	                {
	                	required: true,
	                    minlength: 2,
	                    maxlength: 20
	                },
	        	},
	        	messages:
	        	{
	        		editCompany:
	        		{
	        			required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 2 caracteres',
	                    maxlength: 'Necessário menos de 20 caracteres'	        			
	        		},
	        		editPosition:
	        		{
	        			required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 2 caracteres',
	                    maxlength: 'Necessário menos de 20 caracteres'	        			
	        		},	        		
	        	},
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }	        	
	        });

	        $("#form-edit-school").validate({
	        	rules:
	        	{
	                editSchoolName:
	                {
	                	required: true,
	                    minlength: 2,
	                    maxlength: 20
	                },
	        	},
	        	messages:
	        	{
	        		editSchoolName:
	        		{
	        			required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 2 caracteres',
	                    maxlength: 'Necessário menos de 20 caracteres'	        			
	        		},
	        	},
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }	        	
	        });

	        $("#form-login").validate({
	        	rules:
	        	{
	                email:
	                {
	                	required: true,
	                	email: true                	               	
	                },
	                password:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20	                    
	                },
	        	},
	        	messages:
	        	{
	        		email:
	        		{
	                    required: 'Campo obrigatório',
	                    email: 'Entre com um e-mail válido'

	        		},
	        		password:
	        		{
	        			required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 3 caracteres',
	                    maxlength: 'Necessário menos de 10 caracteres'	        			
	        		},
	        	},
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }	        	
	        });

	        $("#form-add-email").validate({
	        	rules:
	        	{
	                email:
	                {
	                	required: true,
	                	email: true
	                },
	                password:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20
	                },
	                passwordConfirm:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20,
	                    equalTo: '#password'
	                },	
	                contract:
	                {
						required: true,
	                },             
	        	},
	        	messages:
	        	{
	        		email:
	        		{
	                    required: 'Campo obrigatório',
	                    email: 'Entre com um e-mail válido'	        			
	        		},
	        		password:
	        		{
	        			required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 3 caracteres',
	                    maxlength: 'Necessário menos de 10 caracteres'	        			
	        		},
	        		passwordConfirm:
	        		{
	        			required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 3 caracteres',
	                    maxlength: 'Necessário menos de 10 caracteres',
	                    equalTo: 'A confirmação de senha deverá ser igual a senha'
	        		},
	        		contract:
	        		{
						required: 'Para realizar o cadastro leia o contrato',
	        		},
	        	},
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }	        	
	        });

	        $("#vacancy").validate({                   
	            rules:
	            {
	                salary:
	                {
	                	required: true,	                	
	                },
	                position:
	                {
						required: true,
						number: true
	                },
	                address:
	                {
						required: true,
						number: true
	                },	
	                timeStart:
	                {
						required: true,
						number: true
	                },		                
	                timeEnd:
	                {
						required: true,
						number: true
	                },		                           
	                descriptions:
	                {
	                	required: true,
	                	minlength: 10,
	                	maxlength: 45	                		                	
	                }
	            },
	            messages:
	            {
	                salary:
	                {
	                    required: 'Campo obrigatório',
	                },  
	                position:
	                {
						required: 'Campo obrigatório',
						number: 'Selecione um cargo válido'
	                },
	                address:
	                {
						required: 'Campo obrigatório',
						number: 'Selecione um endereço válido'
	                },	
	                timeStart:
	                {
						required: 'Campo obrigatório',
						number: 'Selecione uma hora inicial válida'
	                },		                
	                timeEnd:
	                {
						required: 'Campo obrigatório',
						number: 'Selecione um hora final válida'
	                },	                	                
	                descriptions:
	                {
	                    required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 10 caracteres',
	                    maxlength: 'Necessário menos de 45 caracteres'
	                }		                                                             
	            },                	           
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });

	        $("#formCompany").validate({                   
	            rules:
	            {
	                company:
	                {
	                	required: true,
	                	minlength: 3,
	                	maxlength: 25	                	
	                },
	                description:
	                {
	                	required: true,
	                	minlength: 10,
	                	maxlength: 45	                		                	
	                },
	                contactName:
	                {
	                	required: true,
	                	minlength: 3,
	                	maxlength: 45
	                },
	                contactPhone:
	                {
	                	required: true
	                },
	                contactEmail:
	                {
	                	required: true,
	                	email: true
	                }
	            },
	            messages:
	            {
	                company:
	                {
	                    required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 3 caracteres',
	                    maxlength: 'Necessário menos de 25 caracteres'
	                },  
	                description:
	                {
	                    required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 10 caracteres',
	                    maxlength: 'Necessário menos de 45 caracteres'
	                },
	                contactName:
	                {
	                    required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 3 caracteres',
	                    maxlength: 'Necessário menos de 25 caracteres'
	                },
	                contactPhone:
	                {
	                    required: 'Campo obrigatório',
	                },
	                contactEmail:
	                {
	                    required: 'Campo obrigatório',
	                    email: 'Entre com e-mail válido'
	                }	                                              
	            },                	           
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });

	        $("#modal_escolaridade form").validate({                   
	            rules:
	            {
	                schoolName:
	                {
	                	required: true,
	                	minlength: 3,
	                	maxlength: 25	                	
	                }                	                	               
	            },
	            messages:
	            {
	                schoolName:
	                {
	                    required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 3 caracteres',
	                    maxlength: 'Necessário menos de 25 caracteres'
	                }                
	            },                	           
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });

	        $("#modal_profissional form").validate({                   
	            rules:
	            {
	                company:
	                {
	                	required: true,
	                	minlength: 3,
	                	maxlength: 25	                	
	                },
	                position:
	                {
	                	required: true,
	                	minlength: 3,
	                	maxlength: 25	                	
	                }                	                	               
	            },
	            messages:
	            {
	                company:
	                {
	                    required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 3 caracteres',
	                    maxlength: 'Necessário menos de 25 caracteres'
	                },
	                position:
	                {
	                    required: 'Campo obrigatório',
	                    minlength: 'Necessário mais de 3 caracteres',
	                    maxlength: 'Necessário menos de 25 caracteres'
	                }	                
	            },                	           
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });

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