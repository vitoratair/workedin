<section class="gray-bg padding-top-bottom" style="margin-top: 70px">
   <div class="container features">
      <div class="row">
         <div class="col-md-12">
            <div class="col-sm-6">
               <img class="img-responsive img-center" width="350px"
                  src="<?php echo base_url();?>/assets/images/atividades/<?php echo $activity;?>.gif" alt="">
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

                     <div id="cnpj">{companyCnpj}</div>

                     <div id="cpf">{companyCpf}</div>

                     <div id="contact">{companyContact}@@--@@{companyPhone}</div>

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
               <div class="col-md-6 col-md-offset-5">
                  <p align="right"><a class="btn btn-u" href="<?php echo base_url();?>index.php/company/newAddress/">
                     Novo endereço</a>
                  </p>                  
               </div>
            </div>

            <div class="col-md-12">
               <div class="col-sm-6 col-sm-6">
                  <?php
                     if (empty($messageAddressEmpty))
                        echo '<h2>Endereços de vagas</h2>';
                     else
                        echo '<h2>' . $messageAddressEmpty. '</h2>';      
                  ?>                   
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
                        <h3>
                           <a href="<?php echo base_url();?>index.php/company/editAddress/{addressId}">
                              {addressDescription}   
                           </a>                           
                        </h3>
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
   
   function showCnpj(cnpj)
   {
      var newCnpj;

      newCnpj = cnpj.slice(0, 2);
      newCnpj += "." + cnpj.slice(2, 5);
      newCnpj += "." + cnpj.slice(5, 8);
      newCnpj += "/" + cnpj.slice(8, 12);
      newCnpj += "-" + cnpj.slice(12, 14);

      $( "#cnpj" ).empty();
      $( "#cnpj" ).append( "<h4>CNPJ: <small>" + newCnpj + "</small></h4>" );
   }

   function showContact(contact)
   {
      var name = contact.slice(0, contact.search("@@--@@"));
      var phone = contact.slice(contact.search("@@--@@") + 6);
      
      var newPhone = "(" + phone.slice(0,2) + ") ";
      newPhone += phone.slice(2,6) + " ";
      newPhone += phone.slice(6) + " ";

      $( "#contact" ).empty();
      $( "#contact" ).append( "<h5>");      
      $( "#contact" ).append( "Nome: <small>" + name + "</small> ");
      $( "#contact" ).append( "<strong>/</strong>");      
      $( "#contact" ).append( "Telefone: <small>" + newPhone + "</small>");
      $( "#contact" ).append( "</h5>");      
   }

   function showCpf(cpf)
   {
      var newCpf;

      newCpf = cpf.slice(0, 3);
      newCpf += "." + cpf.slice(3, 6);
      newCpf += "." + cpf.slice(6, 9);
      newCpf += "-" + cpf.slice(9, 11);

      $( "#cpf" ).empty();
      $( "#cpf" ).append( "<h4>CPF: <small>" + newCpf + "</small></h4>" );
   }   

   $( document ).ready(function() { 
      
      var addressEmpty = '<?php echo $addressEmpty;?>';
      var cnpj = $("#cnpj").text();
      var cpf = $("#cpf").text();
      var contact = $("#contact").text();

      showContact(contact);

      if (cnpj != ''){
         showCnpj(cnpj);
      }
      
      if (cpf != ''){
         showCpf(cpf);  
      }


   });
  
</script>