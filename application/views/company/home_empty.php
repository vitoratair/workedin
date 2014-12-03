<section class="gray-bg padding-top-bottom" style="margin-top: 60px">
   <div class="container features">
      <h1 class="section-title">
         Perfil da empresa
      </h1>

      <?php 
         $atributos = array('id'=>'formCompany', 'class'=>'sky-form', 'method'=>'POST');
         echo form_open('company/newCompany', $atributos);
      ?>         
         <div class="row">
            <div class="col-md-10 col-md-offset-1">
                           
               <section class="col-md-12">
                  <h2>Dados</h2>
               </section>                              

               <section class="col-md-6">
                  <h4>Nome</h4>
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input id="company" name="company" type="text">
                  </label>
               </section> 

               <section class="col-md-6">
                  <h4>Ramo de atividade</h4>
                  <label class="select">
                        <select name="activity">
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
               
               <section class="col-md-6" id="section-cnpj" style="display: block">                                    
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input id="cnpj" name="cnpj" placeholder="cnpj" type="text">
                  </label>
               </section>

               <section class="col-md-6" id="section-cpf" style="display: none">                   
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input name="cpf" id="cpf" placeholder="cpf" type="text">
                  </label>
               </section>

               <section class="col-md-12">
                  <label class="textarea">
                     <i class="icon-append fa fa-comment"></i>
                     <textarea name="description" placeholder="Descricao da empresa" rows="4"></textarea>
                  </label>
               </section>           

               <section class="col-md-12">
                  <h2>Contato</h2>
               </section>
               
               
               <section class="col-md-4">
                  <h4>Nome do contato</h4>
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input name="contactName" placeholder="Nome para contato" type="text">
                  </label>
               </section>               

               <section class="col-md-4">
                  <h4>Telefone do contato</h4>
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input name="contactPhone" id="contactPhone" placeholder="Telefone para contato" type="text">
                  </label>
               </section>

               <section class="col-md-4">
                  <h4>E-mail do contato</h4>
                  <label class="input">
                     <i class="icon-append fa fa-asterisk"></i>
                     <input name="contactEmail" placeholder="E-mail para contato" type="text">
                  </label>
               </section>               

            </div>

            <p class="text-center">
               <button type="submit" class="btn btn-quattro">
                  <i class="fa fa-paper-plane"></i> Próximo
               </button>
            </p>
         </div>
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

</script>

