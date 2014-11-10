<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/employee/home/'><span>Vagas</span></a></li>
      <li class="active"><a href='<?php echo base_url();?>index.php/employee/perfil/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/employee/editPerfil/'><span>Editar perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/employee/notify/'><span>Notificações</span></a></li>
   </ul>
</div>

<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <div class="row">
         <div class="class-md-12">
            <div class="col-sm-3">

               <img class="img-responsive img-center" width="200px" src="<?php echo base_url();?>/assets/images/profile_icon.png" alt="">

               <div class="col-sm-12 col-md-offset-1">
	               <p>
						<h3>Idade: <small>23 anos</small></h3>
	                    <h3>Sexo: <small>Masculino</small></h3>
	                    <h3>Estado civil: <small>Solteiro</small></h3>
	                    <h3>Habilitação: <small>B - carro</small></h3>
	                    <h3>Cidade: <small>Palhoça</small></h3>
	                    <h3>Estado: <small>Santa Catarina</small></h3>
	                </p>
               </div>
            </div>
            <div class="col-sm-9">
               <div class="col-md-12">
                  <h1 class="big-title">Fulano de tal</h1>
                  <p class="section-description">
                        <strong>Telefone:</strong> <small>48-1234 4555</small> <strong> / </strong>
                        <strong>Email: </strong><small>teste@teste.com.br</small>
                  </p>

               </div>

               <div class="col-md-12" style="margin-top: -40px">

                  <h2>Escolaridade</h2>
                  <div class="col-sm-6 scrollimation fade-left">
                     <div class="media scrollimation fade-left">
                        <div class="icon pull-left">
                           <i class="media-object icon-1 fa fa-pencil"></i>
                           <i class="media-object icon-2 fa fa-pencil"></i>
                        </div>
                        <div class="media-body">
                           <h3><b>Técnico </b></h3>
                           <p>
                           IFSC
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 scrollimation fade-left">
                     <div class="media scrollimation fade-left">
                        <div class="icon pull-left">
                           <i class="media-object icon-1 fa fa-pencil"></i>
                           <i class="media-object icon-2 fa fa-pencil"></i>
                        </div>
                        <div class="media-body">
                           <h3><b>Técnico </b></h3>
                           <p>
                           IFSC
                           </p>
                        </div>
                     </div>
                  </div>
                  <p align="right"><a class="btn btn-u" href="#" data-toggle="modal" data-target="#modal_escolaridade">Adicionar nova</a></p>
               </div>

               <div class="col-md-12">
                  <h2>Experiência profissional</h2>
                  <div class="col-sm-6 scrollimation fade-left">
                     <div class="media scrollimation fade-left">
                        <div class="icon pull-left">
                           <i class="media-object icon-1 fa fa-suitcase"></i>
                           <i class="media-object icon-2 fa fa-suitcase"></i>
                        </div>
                        <div class="media-body">
                           <h3><b>Empresa Teste</b></h3>
                           <h4>
                           Cargo: <small> Técnico de enfermagem</small><br>
                           Duracão: <small> 6 messes</small>
                           </h4>
                        </div>
                     </div>
                  </div>

                  <div class="col-sm-6 scrollimation fade-left">
                     <div class="media scrollimation fade-left">
                        <div class="icon pull-left">
                           <i class="media-object icon-1 fa fa-suitcase"></i>
                           <i class="media-object icon-2 fa fa-suitcase"></i>
                        </div>
                        <div class="media-body">
                           <h3><b>Outro Teste</b></h3>
                           <h4>
                           Cargo: <small> Técnico de validação</small><br>
                           Duracão: <small> 12 messes</small>
                           </h4>
                        </div>
                     </div>
                  </div>
                  <p align="right"><a class="btn btn-u" href="#" data-toggle="modal" data-target="#modal_profissional">Adicionar nova</a></p>
               </div>
         </div>
      </div>
   </div>
</div>
</section>



<div class="modal fade" id="modal_escolaridade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top: 100px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h2 class="modal-title" id="myModalLabel">Novo curso</h2>
			</div>
			<div class="modal-body">
				<form id="contact-form" class="col-sm-12" action="#" method="post" novalidate>
					<div class="row">
						<section class="col-md-12">
							<div class="form-group">
								<p>Nível</p>
								<div class="controls">
									<select class="form-control">
										<option value="0">Técnico</option>
										<option value="1">Superior</option>
									</select>
								</div>
							</div>
						</section>
						<section class="col-md-6">
							<div class="form-group">
								<p>Curso</p>
								<div class="controls">
									<input id="contact-name" name="contactName" placeholder="Nome do curso" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
								</div>
							</div>
						</section>
						<section class="col-md-6">
							<div class="form-group">
								<p>Instituição</p>
								<div class="controls">
									<input id="contact-name" name="contactName" placeholder="Nome da instituição" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
								</div>
							</div>
						</section>
					</div>
				</form>
	            <p class="text-center">
	               <button name="submit" type="submit" class="btn btn-quattro" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent">
	                  <i class="fa fa-paper-plane"></i>Salvar
	               </button>
	            </p>
	            <input type="hidden" name="submitted" id="submitted" value="true" />
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal_profissional" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top: 100px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h2 class="modal-title" id="myModalLabel">Nova experiência profissional</h2>
			</div>
			<div class="modal-body">
				<form id="contact-form" class="col-sm-12" action="#" method="post" novalidate>
					<div class="row">
						<section class="col-md-12">
							<div class="form-group">
								<p>Empresa</p>
								<div class="controls">
									<input id="contact-name" name="contactName" placeholder="Nome da empresa" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
								</div>
							</div>
						</section>
						<section class="col-md-6">
							<div class="form-group">
								<p>Cargo</p>
								<div class="controls">
									<input id="contact-name" name="contactName" placeholder="Nome do cargo" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
								</div>
							</div>
						</section>
						<section class="col-md-6">
							<div class="form-group">
								<p>Período</p>
								<div class="controls">
									<select class="form-control">
										<option value="0">Menos de 6 meses</option>
										<option value="0">Até 1 ano</option>
									</select>
								</div>
							</div>
						</section>
					</div>
				</form>
	            <p class="text-center">
	               <button name="submit" type="submit" class="btn btn-quattro" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent">
	                  <i class="fa fa-paper-plane"></i>Salvar
	               </button>
	            </p>
	            <input type="hidden" name="submitted" id="submitted" value="true" />
			</div>
		</div>
	</div>
</div>

