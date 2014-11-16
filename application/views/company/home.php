<div id='cssmenu'>
   <ul>
      <li class="active"><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/newAddress/'><span>Endereço</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Entrevistas</span></a></li>
   </ul>
</div>

<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <div class="row">
         <div class="col-md-12">
            <div class="col-sm-6">
               <img class="img-responsive img-center" width="400px" src="<?php echo base_url();?>/assets/images/placeholder.png" alt="">
            </div>
            <div class="col-sm-6 scrollimation fade-left">
               <div class="col-sm-12">
                  
                  {companyData}
                     <h1 class="big-title">
                        {companyName}
                     </h1>
                     
                     <p>
                        {companyDescription}
                     </p>

                     <h4>
                        Ramo de atividade: <small>{companyActivity}</small></h4>
                     <h4>

                     <div id="cnpj">
                        <h4>
                           CNPJ: <small>{companyCnpj}</small>
                        </h4>
                     </div>

                     <div id="cpf">
                        <h4>
                           CPF: <small>{companyCpf}</small>
                        </h4>
                     </div>

                     <h4>
                        Nome: <small>{companyContact}</small> <strong>/</strong>
                        Telefone: <small>{companyPhone}</small>
                     </h4>
                     <h4>
                        Email: <small>{companyEmail}</small>
                     </h4>
                     
                     <p align="right"><a class="btn btn-u" href="<?php echo base_url();?>index.php/company/editCompany/">
                        Editar perfil</a>
                     </p>
                  
                  {/companyData}

               </div>
            </div>
         </div>

         <div class="col-md-12 col-md-offset-1">
         <hr>
            <div class="col-md-12">
               <div class="col-sm-6 col-sm-6">
                  <h2>Endereços</h2>
               </div>
            </div>

            {companyAddress}
               <div class="col-sm-6 col-sm-6 scrollimation fade-left">
                  <div class="media scrollimation fade-left">
                     <div class="icon pull-left">
                        <i class="media-object icon-1 fa fa-road"></i>
                        <i class="media-object icon-2 fa fa-road"></i>
                     </div>
                     <div class="media-body">
                        <h3>{addressDescription}</h3>
                        <p>
                        <h4>
                           Cidade: <small>{addressCity} </small> <strong> / </strong>
                           Estado: <small>{addressState}</small>
                        </h4>
                        </p>
                     </div>
                  </div>
               </div>
            {/companyAddress}

         </div>
      </div>
   </div>
</section>

<script type="text/javascript">
   
   function hasCpf()
   {
      if ( $("#cpf").text().length == 105 )
         $("#cpf").hide();
   }

   function hasCnpj()
   {
      if ( $("#cnpj").text().length == 106 )
         $("#cnpj").hide();
   }

   $( document ).ready(function() { 
      
      hasCpf();
      hasCnpj();
   });
  
</script>