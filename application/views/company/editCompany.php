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

               <section class="col-md-12" id="link-cnpj">
                  <h4 align="">CNPJ <small> <a href="#" onclick="use_cpf();" id="btn-cpf">usar cpf</a></small></h4>
               </section>     

               <section class="col-md-12" id="link-cpf" style="display: none">
                  <h4 align="">CPF <small> <a href="#" onclick="use_cnpj();" id="btn-cpf">usar cnpj</a></small></h4>
               </section>  
               
               <section class="col-md-6" id="section-cnpj">          
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input id="cnpj" name="cnpj" value="{companyCnpj}" type="text">
                  </label>
               </section>

               <section class="col-md-6" id="section-cpf">
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
                  <h4>Nome completo do contato</h4>
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

   function use_cnpj()
   {
         $("#cpf").val('');
         $( "#link-cpf" ).hide();
         $( "#link-cnpj" ).show();
         $( "#section-cpf" ).hide();
         $( "#section-cnpj" ).show();
   }

   function use_cpf()
   {
         $("#cnpj").val('');
         $( "#link-cnpj" ).hide();
         $( "#link-cpf" ).show();
         $( "#section-cnpj" ).hide();
         $( "#section-cpf" ).show();
   } 


$( document ).ready(function() {
   
   if ($("#cnpj").val() == '')
      use_cpf();
   else
      use_cnpj();


});     

</script>