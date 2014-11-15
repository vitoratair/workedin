<div id='cssmenu'>
   <ul>
      <li class="active"><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/newAddress/'><span>Endereço</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Gerenciamento</span></a></li>
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


<div class="modal fade" id="modal_cadastrar_empresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="margin-top: 100px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h2 class="modal-title" id="myModalLabel">Novo endereço</h2>
         </div>
         <div class="modal-body">
            <form action="home_submit" class="sky-form" method="POST">
               <div class="row">
                  <div class="col-md-12" align="center">
                     <fieldset>
                        <section class="col-md-12">
                           <label class="label">Nome</label>
                              <label class="input">
                                 <input type="text" placeholder="Nome para identificá-lo" name="name" id="name">
                             </label>
                        </section>

                        <section class="col-md-6">
                           <label class="select">
                              <select name="estado">
                                 <option value="0">Estado</option>
                                 {states}
                                    <option value="1">{stateName}</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>
                                 {/states} 
                              </select>
                           </label>
                        </section>

                        <section class="col-md-6">
                           <label class="select">
                              <select>
                                 <option value="0">Cidade</option>
                                 <option value="1">Alexandra</option>
                                 <option value="2">Alice</option>
                                 <option value="3">Anastasia</option>
                                 <option value="4">Avelina</option>
                              </select>
                           </label>
                        </section>

                        <section class="col-md-6">
                              <label class="input">
                                 <input type="text" placeholder="Rua / Avenida" name="name" id="name">
                             </label>
                        </section>

                        <section class="col-md-6">
                              <label class="input">
                                 <input type="text" placeholder="Número" name="name" id="name">
                             </label>
                        </section>
                     </fieldset>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-u">Salvar</button>
         </div>
      </div>
   </div>
</div>


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