<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/employee/home/'><span>Vagas</span></a></li>
      <li class="active"><a href='<?php echo base_url();?>index.php/employee/perfil/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/employee/notify/'><span>Notificações</span></a></li>
   </ul>
</div>

<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <div class="row">
         <div class="class-md-12">
            <div class="col-sm-3">

               {employeeData}
               
               <img class="img-responsive img-center" width="200px" src="<?php echo base_url();?>/assets/images/profile_icon.png" alt="">
               
               <div class="col-sm-12 col-md-offset-1">
	               <p>
						<h4>Idade: <small>{employeeAge} anos</small></h4>
	                    <h4>Estado civil: <small>{employeeCivilStatus}</small></h4>	                    
	                    <h4>Bairro: <small>{neighborhood}</small></h4>
	                    <h4>Cidade: <small>{employeeCity}</small></h4>
	                    <h4>Habilitação: <small>{employeeLicense}</small></h4>
	                </p>
	                <p align="left">
	                	<a href='<?php echo base_url();?>index.php/employee/editPerfil/'>Ediar Perfil</a>
	                </p>
               </div>
            </div>

            <div class="col-sm-9">
               
               <div class="col-md-12">
                  <h1 class="big-title">{employeeName} {employeeLastName}</h1>
                  <p class="section-description">
	                  <div id="contact" style="margin-top: -30px"></div>
                  </p>

               </div>
               {/employeeData}
               
               <div class="col-md-12">
               	<h2>Escolaridade</h2>
               		{employeeEducation}
                  	
                  	<div class="col-sm-6 scrollimation fade-left">
                    	<div class="media scrollimation fade-left">
	                        <div class="icon pull-left">
	                           <i class="media-object icon-1 fa fa-pencil"></i>
	                           <i class="media-object icon-2 fa fa-pencil"></i>
	                        </div>
	                        <div class="media-body">
	                           <h3><b>{educationLevel}</b></h3>
	                           <p>{educationSchool} {educationCourse}</p>
	                        </div>
                     	</div>
                	</div>
                {/employeeEducation}

                  <p align="right">
                  	<a class="btn btn-u" href="#" data-toggle="modal" data-target="#modal_escolaridade">
                  		<i class="fa fa-plus"></i> Novo curso
                  	</a>
                  </p>
               </div>

               <div class="col-md-12">
                  <h2>Experiência profissional</h2>
                  
                  {employeeProfession}
                  <div class="col-sm-6 scrollimation fade-left">
                     <div class="media scrollimation fade-left">
                        <div class="icon pull-left">
                           <i class="media-object icon-1 fa fa-suitcase"></i>
                           <i class="media-object icon-2 fa fa-suitcase"></i>
                        </div>
                        <div class="media-body">
                           <h3><b>{professionCompany}</b></h3>
                           <h4>
                           Cargo: <small> {professionPosition}</small><br>
                           Duracão: <small> {professionTime}</small>
                           </h4>
                        </div>
                     </div>
                  </div>
                  {/employeeProfession}

                  <p align="right">
                  	<a class="btn btn-u" href="#" data-toggle="modal" data-target="#modal_profissional">
                  		<i class="fa fa-plus"></i> Nova experiência
                  	</a>
                 </p>
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
				<h2 class="modal-title" id="myModalLabel">Adicionar nova escolaridade</h2>
			</div>
			<div class="modal-body">

				<?php
				    $atributos = array('id'=>'contact-form', 'class'=>'contact-form', 'method'=>'POST');
				    echo form_open('employee/addSchool', $atributos);
				?>
					<div class="row">
						<div class="col-md-12">
							<section class="col-md-12">
								<div class="form-group">
									<p>Nível</p>
									<div class="controls">
										<select class="form-control" id="schoolLevel" name="schoolLevel">
											{schoolLevel}
											<option value="{schoolLevelId}">{schoolLevelDescription}</option>
											{/schoolLevel}
										</select>
									</div>
								</div>
							</section>

							<section class="col-md-6">
								<div class="form-group">
									<p>Curso</p>
									<div class="controls">
										<input id="course" disabled="true" name="course" value="Não é necessário comentários" class="form-control" type="text">
									</div>
								</div>
							</section>

							<section class="col-md-6">
								<div class="form-group">
									<p>Instituição</p>
									<div class="controls">
										<input id="schoolName" name="schoolName" placeholder="Instituição" class="form-control" type="text">
									</div>
								</div>
							</section>
				            <p class="text-center">
				               <button type="submit" class="btn btn-quattro">
				                  <i class="fa fa-paper-plane"></i>Salvar
				               </button>
				            </p>							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal_profissional" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top: 100px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h2 class="modal-title" id="myModalLabel">Adicionar nova experiência</h2>
			</div>
			<div class="modal-body">
				<?php
				    $atributos = array('id'=>'contact-form', 'class'=>'contact-form', 'method'=>'POST');
				    echo form_open('employee/addExperience', $atributos);
				?>
					<div class="row">
						<section class="col-md-12">
							<div class="form-group">
								<p>Empresa</p>
								<div class="controls">
									<input id="company" name="company" placeholder="Nome da empresa" class="form-control" type="text">
								</div>
							</div>
						</section>

						<section class="col-md-6">
							<div class="form-group">
								<p>Cargo</p>
								<div class="controls">
									<input id="position" name="position" placeholder="Nome da empresa" class="form-control" type="text">
								</div>
							</div>
						</section>

				          <section class="col-md-6">
				            <div class="form-group" >
				            	<p>Período</p>
								<div class="controls">
									<select class="form-control" name="duration">
										{durations}
										<option value="{durationId}">{durationDescription}</option>
										{/durations}
									</select>
								</div>
				            </div>
				          </section>
					</div>				
		            <p class="text-center">
		               <button name="submit" type="submit" class="btn btn-quattro">
		                  <i class="fa fa-paper-plane"></i>Salvar
		               </button>
		            </p>
		        </form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

$( document ).ready(function() {

	var ddd = '{phone}'.slice(0, 2);
	var firstPart = '{phone}'.slice(2, 6)
	var secondPart = '{phone}'.slice(6, 10)
	
	phone = '(' + ddd + ') ' + firstPart + ' ' + secondPart; 

	$('#contact').html(
		"<p align='center'>" + 
			"<strong>Telefone:</strong> <small>" + phone + "</small> <strong> / </strong>" +
			"<strong>Email: </strong><small>{employeeEmail}</small>" +
		"</p>");
});



$('#schoolLevel').on('change', function() {
	var schoolLevel = this.value;  

	if (schoolLevel <= 4 )
	{
		$("#course").prop('placeholder', 'Não é necessário comentários');
		$("#course").prop('value', null);
		$("#course").prop('disabled', true);
	}
	else
	{
		$("#course").prop('value', '');
		$("#course").prop('placeholder', 'Nome do curso');
		$("#course").prop('disabled', false);	
	}
});

	
</script>


