<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li class='active'><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='#'><span>Notificações</span></a></li>
   </ul>
</div>
<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <h1 class="section-title">Nova Vaga</h1>
      <p class="section-description">
         Pequeno texto sobre nova vagas Pequeno texto sobre nova vagas
         Pequeno texto sobre nova vagas Pequeno texto sobre nova vagas
      </p>

      <form id="contact-form" class="col-sm-8 col-sm-offset-2" action="#" method="post" novalidate>
         <div class="form-group">
            <div class="controls">
               <input id="contact-name" name="contactName" placeholder="Nome da vaga" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
            </div>
         </div>

         <div class="form-group">
            <div class="controls">
               <input id="contact-name" name="contactName" placeholder="Salário" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
            </div>
         </div>

         <div class="form-group">
            <div class="controls">
               <input id="contact-name" name="contactName" placeholder="Horário" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
            </div>
         </div>

         <p>Benefícios</p>
         <div class="form" style="">
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1">
              Vale transporte
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox2" value="option2">
              Vale refeição
            </label>
         </div>
         <br>

         <div class="form-group">
            <div class="controls">
               <textarea id="contact-message" name="comments"  placeholder="Atividades que serão desempenhadas" class="form-control requiredField" rows="8" data-error-empty="Please enter your message"></textarea>
            </div>
         </div>

         <p class="text-center">
         <button name="submit" type="submit" class="btn btn-quattro" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent">
         <i class="fa fa-paper-plane"></i>Salvar Vaga
         </button>
         </p>
         <input type="hidden" name="submitted" id="submitted" value="true" />
      </form>

   </div>
</div>
</section>