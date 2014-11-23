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
         $atributos = array('id'=>'contact-form', 'class'=>'col-sm-8 col-sm-offset-2 contact-form', 'method'=>'POST');
         echo form_open('company/updateCompany', $atributos);
      ?>
      {companyData}
         
         <input name="companyId" value="{companyId}" type="hidden">

         <div class="row">
            <section class="col-md-12">
               <div class="form-group">
                  <p>Nome da empresa</p>
                  <div class="controls">
                     <input name="company" value="{companyName}" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
                  </div>
               </div>
            </section>

            <section class="col-md-12">
               <div class="form-group">
                  <div class="controls">
                     <p>Descrição da empresa</p>
                     <textarea name="description"  class="form-control" rows="5">
{companyDescription}
                     </textarea>
                  </div>
               </div>
            </section>           

            <section class="col-md-12">
               <div class="form-group">
                  <p>Ramo de atividade</p>
                  <div class="controls">
                     <select name="activity" class="form-control">
                     <option value="{companyActivityId}">{companyActivityName}</option>
                     {activity}
                       <option value="{activityId}">{activityDescription}</option>
                     {/activity}
                     </select>
                  </div>
               </div>
            </section>

            <section class="col-md-5">
               <div class="form-group">
                  <p>CNPJ</p>
                  <div class="controls">
                     <input name="cnpj" id="cnpj" value="{companyCnpj}" class="form-control" type="text">
                  </div>
               </div>
            </section>
            <div class="col-md-2" align="center">
               <p>ou</p>
            </div>
            <section class="col-md-5">
               <div class="form-group">
                  <p>CPF</p>
                  <div class="controls">
                     <input name="cpf" id="cpf" value="{companyCpf}" class="form-control" type="text">
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Nome do contato</p>
                  <div class="controls">
                     <input name="contactName" value="{companyContact}" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Telefone do contato</p>
                  <div class="controls">
                     <input name="contactPhone" id="contactPhone" value="{companyPhone}" class="form-control" type="text">
                  </div>
               </div>
            </section>

            <section class="col-md-12">
               <div class="form-group">
                  <p>E-mail do contato</p>
                  <div class="controls">
                     <input name="contactEmail" value="{companyEmail}" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
                  </div>
               </div>
            </section>            
            <p class="text-center">
               <button type="submit" class="btn btn-quattro">
                  <i class="fa fa-paper-plane"></i>Salvar
               </button>
               <button type="reset" onclick="location.reload();" class="btn btn-quattro">
                  <i class="fa fa-paper-plane"></i>Cancelar
               </button>               
            </p>
         </div>
      {/companyData}
      </form>

   </div>
</div>
</section>


<script type="text/javascript">
   
   function formatData()
   {
      $('#cpf').mask('000.000.000-00', {reverse: true});
      $('#cnpj').mask('000.000.000-00', {reverse: true});
      $('#contactPhone').mask('(00) - 0000 0000');
   }

   $( document ).ready(function() { 
      formatData();
   });

  
</script>

