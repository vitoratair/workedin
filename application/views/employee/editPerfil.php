<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/employee/home/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/employee/perfil/'><span>Perfil</span></a></li>
      <li class="active"><a href='<?php echo base_url();?>index.php/employee/editPerfil/'><span>Editar perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/employee/notify/'><span>Notificações</span></a></li>
   </ul>
</div>


<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <h1 class="section-title">Edição de perfil</h1>

      <form id="contact-form" class="col-sm-8 col-sm-offset-2" action="#" method="post" novalidate>

         <div class="row">
            <section class="col-md-6">
               <div class="form-group">
                  <p>Nome</p>
                  <div class="controls">
                     <input id="contact-name" name="contactName" value="Fulano" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Sobrenome</p>
                  <div class="controls">
                     <input id="contact-name" name="contactName" value="de tal" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Estado civil</p>
                  <div class="controls">
					<select class="form-control">
						<option value="0">Solteiro</option>
						<option value="1">No sex = Casado</option>
					</select>
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Habilitação</p>
                  <div class="controls">
					<select class="form-control">
						<option value="0">A - Moto</option>
						<option value="1">B - Carro</option>
					</select>
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Estado</p>
                  <div class="controls">
					<select class="form-control">
						<option value="0">Santa Catarina</option>
						<option value="1">São Paulo</option>
					</select>
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Cidade</p>
                  <div class="controls">
					<select class="form-control">
						<option value="0">Palhoça</option>
						<option value="1">Floripa</option>
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