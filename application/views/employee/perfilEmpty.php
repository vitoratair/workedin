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
         $atributos = array('id'=>'sky-form1', 'class'=>'sky-form', 'method'=>'POST');
         echo form_open('employee/saveNewEmployee', $atributos);
      ?>

<div class="col-md-10 col-md-offset-1">
   
   <fieldset>
      <div class="row">
         
         <section class="col col-4">
            <h4>Nome</h4>
            <label class="input">
               <i class="icon-append fa fa-asterisk"></i>
               <input name="name" autocomplete="off" type="text">
            </label>
         </section>
         <section class="col col-4">
            <h4>Sobrenome</h4>
            <label class="input">
               <i class="icon-append fa fa-asterisk"></i>
               <input name="lastName" type="text">
            </label>
         </section>
         
         <section class="col col-4">
            <h4>Nascimento</h4>
            <label class="input">
               <i class="icon-append fa fa-calendar"></i>
               <input id="birth" name="birth" type="text">
            </label>
         </section>
      </div>
      <div class="row">
         <section class="col col-4">
            <h4>Estado civil</h4>
            <label class="select">
               <select id="civilStatus" name="civilStatus">
                  {civilStatus}
                  <option value="{civilStateId}">{civilStateDescription}</option>
                  {/civilStatus}
               </select>
               <i></i>
            </label>
         </section>
         <section class="col col-4">
            <h4>Sexo</h4>
            <label class="select">
               <select name="sex" id="sex">
                  {sex}
                  <option value="{sexId}">{sexDescription}</option>
                  {/sex}
               </select>
               <i></i>
            </label>
         </label>
      </section>
      <section class="col col-4">
         <h4>Telefone</h4>
         <label class="input">
            <i class="icon-append fa fa-phone"></i>
            <input type="tel" name="phone" id="phone">
         </label>
      </section>
   </div>
   <hr>
   <div class="row">
      <section class="col col-4">
         <h4>Estado</h4>
         <label class="select">
            <select id="state" name="state" onchange="getCity();">
               {states}
               <option value="{stateId}">{stateName}</option>
               {/states}
            </select>
            <i></i>
         </label>
      </section>
      <section class="col col-4">
         <h4>Cidade</h4>
         <label class="select">
            <select id="city" name="city" class="form-control">
               <option value="">Escolha sua cidade</option>
            </select>
            <i></i>
         </label>
      </label>
   </section>
   <section class="col col-4">
      <h4>Bairro</h4>
      <label class="input">
         <i class="icon-append fa fa-asterisk"></i>
         <input id="neighborhood" name="neighborhood" type="text">
      </label>
   </section>
</div>
<div class="row">
   <section class="col col-4">
      <h4>Habilitação</h4>
      <label class="select">
         <select name="license">
            {license}
            <option value="{licenseId}">{licenseDescription}</option>
            {/license}
         </select>
         <i></i>
      </label>
   </section>
   <section class="col col-4">
      <h4>Trabalhando</h4>
      <label class="select">
         <select name="isWorking">
            <option value="<?php echo YES;?>">Sim</option>
            <option value="<?php echo NO;?>">Não</option>
         </select>
         <i></i>
      </label>
   </label>
</section>
<section class="col col-4">
   <h4>Necessidades especiais</h4>
   <label class="select">
      <select name="hasNeeds">
         <option value="<?php echo NO;?>">Não</option>
         <option value="<?php echo YES;?>">Sim</option>
      </select>
   </label>
</section>
</div>
</fieldset>
<p class="text-center">
<button name="submit" type="submit" class="btn btn-quattro" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent">
<i class="fa fa-paper-plane"></i>Passo 2
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
</script>


