<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/employee/home/'><span>Vagas</span></a></li>
      <li class="active"><a href='<?php echo base_url();?>index.php/employee/perfil/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/employee/notify/'><span>Histórico</span></a></li>
   </ul>
</div>


<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <h1 class="section-title">Atualize seu perfil</h1>

      <?php 
         $atributos = array('id'=>'contact-form', 'class'=>'col-sm-10 col-sm-offset-1', 'method'=>'POST');
         echo form_open('employee/updateEmployee', $atributos);
      ?>      

         <div class="row">
            {employeeData}

            <h2>Dados pessoais</h2>
            <input name="candidate" value="{employeeId}" class="form-control " autocomplete="off" type="hidden">
            <section class="col-md-4">
               <div class="form-group">
                  <p>Nome</p>
                  <div class="controls">
                     <input name="name" value="{employeeName}" class="form-control " autocomplete="off" type="text">
                  </div>
               </div>
            </section>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Sobrenome</p>
                  <div class="controls">
                     <input name="lastName" value="{employeeLastName}" class="form-control" type="text">
                  </div>
               </div>
            </section>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Nascimento</p>
                  <div class="controls">
                     <input id="birth" name="birth" value="{employeeBirth}" class="form-control requiredField" type="text">
                  </div>
               </div>
            </section>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Estado civil</p>
                  <div class="controls">
                     <select class="form-control" name="civilStatus">
                        <option value="{employeeCivilStatusId}">{employeeCivilStatus}</option>
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
                        <option value="{employeeSexId}">{employeeSex}</option>
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
                     <input id="phone" name="phone" value="{employeePhone}" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
                  </div>
               </div>
            </section> 


            <h2>Endereço</h2>
            <section class="col-md-4 ">
               <div class="form-group">
                  <p>Estado</p>
                  <div class="controls">
                     <select id="state" name="state" onchange="getCity();" class="form-control">                     
                     <option value="{employeeStateId}">{employeeState}</option>
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
                     <option value="{employeeCityId}">{employeeCity}</option>
                     </select>
                  </div>
               </div>
            </section>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Bairro</p>
                  <div class="controls">
                     <input name="neighborhood" value="{neighborhood}" class="form-control" type="text">
                  </div>
               </div>
            </section>  

            <h2>Outros</h2>

            <section class="col-md-4">
               <div class="form-group">
                  <p>Habilitação</p>
                  <div class="controls">
                     <select class="form-control" name="license">
                        <option value="{employeeLicenseId}">{employeeLicense}</option>
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
                        <option value="{employeeIsWorking}">{employeeIsWorkingDescription}</option>
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
                        <option value="{employeeNeeds}">{employeeNeedsDescriptions}</option>
                        <option value="<?php echo YES;?>">Sim</option>
                        <option value="<?php echo NO;?>">Não</option>
                     </select>
                  </div>
               </div>
            </section>
            {/employeeData}

            <p class="text-center">
               <button name="submit" type="submit" class="btn btn-quattro">
                  <i class="fa fa-paper-plane"></i>Salvar Perfil
               </button>
               <button type="reset" onclick="location.reload();" class="btn btn-quattro">
                  <i class="fa fa-chevron-left"></i>Cancelar
               </button>               
            </p>
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


