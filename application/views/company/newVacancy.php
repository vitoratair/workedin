<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li class='active'><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Gerenciamento</span></a></li>
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

         <div class="row">
            <section class="col-md-12">
               <div class="form-group">
                  <p>Noma para vaga</p>
                  <div class="controls">
                     <input id="contact-name" name="contactName" placeholder="Entre com o nome da vaga" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Horário inicial</p>
                  <div class="controls">
                     <input class="form-control requiredField" type="time" name="usr_time1">
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Horário final</p>
                  <div class="controls">
                     <input class="form-control requiredField" type="time" name="usr_time1">
                  </div>
               </div>
            </section>

            <section class="col-md-12">
               <div class="form-group">
                  <p>Benefícios</p>
                     <div class="inline-group">
                       <input type="checkbox" name="checkbox-inline" checked> Nenhum
                       <input type="checkbox" name="checkbox-inline"> Vale transporte
                       <input type="checkbox" name="checkbox-inline"> Vale refeição
                     </div>
               </div>
            </section>

            <section class="col-md-12">
               <div class="form-group">
                  <div class="controls">
                     <p>Descrição da vaga</p>
                     <textarea id="contact-message" name="comments"  placeholder="Atividades que serão desempenhadas" class="form-control requiredField" rows="8" data-error-empty="Please enter your message"></textarea>
                  </div>
               </div>
            </section>

            <p class="text-center">
               <button name="submit" type="submit" class="btn btn-quattro" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent">
                  <i class="fa fa-paper-plane"></i>Salvar Vaga
               </button>
            </p>
            <input type="hidden" name="submitted" id="submitted" value="true" />
         </div>
      </form>

   </div>
</div>
</section>