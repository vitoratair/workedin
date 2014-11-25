<div id='cssmenu'>
   <ul>
      <li class='active'><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Entrevistas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/credits'><span>Créditos</span></a></li>
   </ul>
</div>
<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <h1 class="section-title">
         Perfil da empresa
      </h1>

      <?php 
         $atributos = array('id'=>'formCompany', 'class'=>'sky-form', 'method'=>'POST');
         echo form_open('company/updateCompany', $atributos);
      ?>
      {companyData}
         
      <input name="companyId" value="{companyId}" type="hidden">

         <div class="row">
            <div class="col-md-10 col-md-offset-1">
                           
               <h2>Dados</h2>

               <section class="col-md-6">
                  <h4>Nome</h4>
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input id="company" value="{companyName}" name="company" type="text">
                  </label>
               </section> 

               <section class="col-md-6">
                  <h4>Ramo de atividade</h4>
                  <label class="select">
                        <select name="activity">
                        <option value="{companyActivityId}">{companyActivityName}</option>
                        {activity}
                          <option value="{activityId}">{activityDescription}</option>
                        {/activity}
                        </select>
                     <i></i>
                  </label>
               </section>                                         

               <section class="col-md-12">
                  <h4 align="center">CNPJ ou CPF</h4>
               </section>     
               
               <section class="col-md-6">                                    
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input id="cnpj" name="cnpj" value="{companyCnpj}" type="text">
                  </label>
               </section>

               <section class="col-md-6">                   
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input name="cpf" id="cpf" value="{companyCpf}" type="text">
                  </label>
               </section>

               <section class="col-md-12">
                  <label class="textarea">
                     <i class="icon-append fa fa-comment"></i>
                     <textarea name="description" placeholder="Descricao da empresa" rows="4">{companyDescription}</textarea>
                  </label>
               </section>           

               <section class="col-md-12">
                  <h2>Contato</h2>
               </section>
               
               
               <section class="col-md-4">
                  <h4>Nome do contato</h4>
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input name="contactName" value="{companyContact}" type="text">
                  </label>
               </section>               

               <section class="col-md-4">
                  <h4>Telefone do contato</h4>
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input name="contactPhone" id="contactPhone" value="{companyPhone}" type="text">
                  </label>
               </section>

               <section class="col-md-4">
                  <h4>E-mail do contato</h4>
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input name="contactEmail" value="{companyEmail}" type="text">
                  </label>
               </section>               

            </div>

            <p class="text-center">
               <button type="submit" class="btn btn-quattro">
                  <i class="fa fa-paper-plane"></i>Salvar
               </button>
            </p>
         </div>
      

      {/companyData}
      </form>

   </div>
</div>
</section>


<script type="text/javascript">
   


  
</script>

