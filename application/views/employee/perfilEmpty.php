<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/employee/home/'><span>Vagas</span></a></li>
      <li class="active"><a href='<?php echo base_url();?>index.php/employee/perfil/'><span>Perfil</span></a></li>
      <li>
         <a href='<?php echo base_url();?>index.php/employee/notify/'>
         Histórico <span class="badge">{notificationNotRead}</span>
         </a>
      </li>
   </ul>
</div>


<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <h1 class="section-title">Atualize seu perfil</h1>

      <?php 
         $atributos = array('id'=>'contact-form', 'class'=>'col-sm-10 col-sm-offset-1', 'method'=>'POST');
         echo form_open('employee/saveNewEmployee', $atributos);
      ?>      

         <div class="row">
            <h2>Dados pessoais</h2>
            <section class="col-md-4">
               <div class="form-group">
                  <p>Nome</p>
                  <div class="controls">
                     <input name="name" placeholder="Digite seu nome" class="form-control " autocomplete="off" type="text">
                  </div>
               </div>
            </section>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Sobrenome</p>
                  <div class="controls">
                     <input name="lastName" placeholder="Digite seu sobrenome" class="form-control" type="text">
                  </div>
               </div>
            </section>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Nascimento</p>
                  <div class="controls">
                     <input id="birth" name="birth" placeholder="Data de nascimento" class="form-control requiredField" type="text">
                  </div>
               </div>
            </section>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Estado civil</p>
                  <div class="controls">
                     <select class="form-control" name="civilStatus">
                        {civilStatus}
                           <option value="{civilStateId}">{civilStateDescription}</option>
                        {/civilStatus}
                     </select>
                  </div>
               </div>
            </section>


            <section class="col-md-4">
               <div class="form-group">
                  <p>Sexo</p>
                  <div class="controls">
                     <select class="form-control" name="sex">
                        {sex}
                           <option value="{sexId}">{sexDescription}</option>
                        {/sex}
                     </select>
                  </div>
               </div>
            </section>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Telefone</p>
                  <div class="controls">
                     <input id="phone" name="phone" placeholder="Telefone" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
                  </div>
               </div>
            </section> 


            <h2>Endereço</h2>
            <section class="col-md-4 ">
               <div class="form-group">
                  <p>Estado</p>
                  <div class="controls">
                     <select id="state" name="state" onchange="getCity();" class="form-control">
                     {states}
                        <option value="{stateId}">{stateName}</option>
                     {/states}
                     </select>
                  </div>
               </div>
            </section>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Cidade</p>
                  <div class="controls">
                     <select id="city" name="city" class="form-control">
                     <option value="">Escolha sua cidade</option>
                     </select>
                  </div>
               </div>
            </section>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Bairro</p>
                  <div class="controls">
                     <input name="neighborhood" placeholder="Digite seu bairro" class="form-control" type="text">
                  </div>
               </div>
            </section>  

            <h2>Outros</h2>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Habilitação</p>
                  <div class="controls">
                     <select class="form-control" name="license">
                        {license}
                           <option value="{licenseId}">{licenseDescription}</option>
                        {/license}
                     </select>
                  </div>
               </div>
            </section> 

            <section class="col-md-4">
               <div class="form-group">
                  <p>Esta trabalhando</p>
                  <div class="controls">
                     <select class="form-control" name="isWorking">
                        <option value="<?php echo YES;?>">Sim</option>
                        <option value="<?php echo NO;?>">Não</option>
                     </select>
                  </div>
               </div>
            </section>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Necessidades especiais</p>
                  <div class="controls">
                     <select class="form-control" name="hasNeeds">
                        <option value="<?php echo YES;?>">Sim</option>
                        <option value="<?php echo NO;?>">Não</option>
                     </select>
                  </div>
               </div>
            </section>

            


        

            <p class="text-center">
               <button name="submit" type="submit" class="btn btn-quattro" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent">
                  <i class="fa fa-paper-plane"></i>Salvar Perfil
               </button>
            </p>
            <input type="hidden" name="submitted" id="submitted" value="true" />
         </div>
      </form>

   </div>
</div>
</section>


<script type="text/javascript">

   function getCity()
   {
      var state = $("#state").val();

      $.getJSON('<?php echo base_url();?>index.php/json/getCity/' + state, function(city) {
          $("#city").empty();
          $.each(city, function(key,val)
          {
            $("#city").append("<option value=" + val.cityId + ">" + val.cityName + "</option>"); 
          });
      });
   }

   
   $( document ).ready(function() { 
      $('#birth').mask('00/00/0000');
      $('#phone').mask('(00) - 0000 0000');
   });
  

   
</script>


