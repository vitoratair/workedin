<section class="gray-bg padding-top-bottom" style="margin-top: 40px">
	<div class="container features">	
		<div class="row">
			<div class="class-md-12">
				<div class="col-md-3">
					{employeeData}
					
					<img class="img-responsive img-center" width="200px" src='<?php echo base_url();?>/assets/images/profile_icon_{employeeSex}.png'>
					
					<div class="col-md-12 col-md-offset-1">
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
				<div class="col-md-9">
					
					<div class="col-md-12">
						<h1 class="big-title">{employeeName} {employeeLastName}</h1>
						<p class="section-description">
						<div id="contact" style="margin-top: -30px"></div>
						</p>
					</div>
					{/employeeData}
					
					<div class="col-md-12">
						<h2>Escolaridade</h2>
						<?php
						if (empty($employeeEducation))
						echo "<h3 align='center'>Você ainda não cadastrou uma escolaridade</h3>";
						?>
						{employeeEducation}
						
						<div class="col-md-6 scrollimation fade-left">
							<div class="media scrollimation fade-left">
								<div class="icon pull-left">
									<i class="media-object icon-1 fa fa-pencil"></i>
									<i class="media-object icon-2 fa fa-pencil"></i>
								</div>
								<div class="media-body">
									<h3>
										<a href="#" data-toggle="modal" data-target="#modal_edit_escolaridade"
										onclick="editEducation('{educationId}', '{educationLevel}', '{educationSchool}', '{educationCourse}')">{educationLevel}</a>
									</h3>
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
						<?php
						if (empty($employeeProfession))
						echo "<h3 align='center'>Você ainda não cadastrou uma experiênca profissional</h3>";
						?>
						{employeeProfession}
						<div class="col-sm-6 scrollimation fade-left">
							<div class="media scrollimation fade-left">
								<div class="icon pull-left">
									<i class="media-object icon-1 fa fa-suitcase"></i>
									<i class="media-object icon-2 fa fa-suitcase"></i>
								</div>
								<div class="media-body">
									<h3>
										<a href="#" onclick="editProfession('{professionId}', '{professionCompany}', '{professionPosition}', '{professionTime}', '{professionTimeId}');" data-toggle="modal" data-target="#modal_edit_profissional">
											<b>{professionCompany}</b>
										</a>										
									</h3>
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

<div class="modal fade" id="modal_profissional" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top: 100px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h2 class="modal-title" id="myModalLabel">Adicionar nova experiência</h2>
			</div>
			<div class="modal-body">
				<?php
				    $atributos = array('id'=>'sky-form1', 'class'=>'sky-form', 'method'=>'POST');
				    echo form_open('employee/addExperience', $atributos);
				?>
					<div class="row">
						<div class="col-md-12">
													
							<section class="col-md-12">
								<p>Empresa</p>
			                     <label class="input">
			                     	<i class="icon-append fa fa-asterisk"></i>
			                        <input id="company" name="company" type="text">
			                     </label>
							</section>	

							<section class="col-md-6">
								<p>Cargo</p>
			                     <label class="input">
			                     	<i class="icon-append fa fa-asterisk"></i>
			                        <input id="position" name="position" type="text">
			                     </label>
							</section>	

					          
							<section class="col-md-6">
								<p>Período</p>
								<label class="select">
									<select name="duration">
										{durations}
										<option value="{durationId}">{durationDescription}</option>
										{/durations}
									</select>
									<i></i>
								</label>
							</section>
				        </div>
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

<div class="modal fade" id="modal_escolaridade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top: 100px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h2 class="modal-title" id="myModalLabel">Adicionar nova escolaridade</h2>
			</div>
			<div class="modal-body">

				<?php
				    $atributos = array('id'=>'sky-form1', 'class'=>'sky-form', 'method'=>'POST');
				    echo form_open('employee/addSchool', $atributos);
				?>
					<div class="row">
						<div class="col-md-12">
							
							<section class="col-md-12">
								<p>Nível</p>
								<label class="select">
									<select id="schoolLevel" name="schoolLevel">
										{schoolLevel}
										<option value="{schoolLevelId}">{schoolLevelDescription}</option>
										{/schoolLevel}
									</select>
									<i></i>
								</label>
							</section>


							<section class="col-md-6">
								<p>Curso</p>
			                     <label class="input">
			                        <input id="course" disabled="true" name="course" value="Não se aplica" type="text">
			                     </label>
							</section>

							<section class="col-md-6">
								<p>Instituição</p>
			                     <label class="input">
			                        <input id="schoolName" name="schoolName" placeholder="Instituição" type="text">
			                     </label>
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

<div class="modal fade" id="modal_edit_escolaridade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top: 100px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h2 class="modal-title" id="myModalLabel">Editar escolaridade</h2>
			</div>
			<div class="modal-body">

				<?php
				    $atributos = array('id'=>'form-edit-school', 'class'=>'sky-form', 'method'=>'POST');
				    echo form_open('employee/editSchool', $atributos);
				?>
					<input  id="idFormacaoAcademica" name="idFormacaoAcademica" type="hidden">
					<div class="row">
						<div class="col-md-12">							
							<section class="col-md-12">
								<p>Nível</p>
								<label class="select">
									<select id="editSchoolLevel" name="editSchoolLevel">
										{schoolLevel}
										<option value="{schoolLevelId}">{schoolLevelDescription}</option>
										{/schoolLevel}
									</select>
									<i></i>
								</label>
							</section>


							<section class="col-md-6">
								<p>Curso</p>
			                     <label class="input">
			                        <input id="editCourse" disabled="true" name="editCourse" value="Não se aplica" type="text">
			                     </label>
							</section>

							<section class="col-md-6">
								<p>Instituição</p>
			                     <label class="input">
			                        <input id="editSchoolName" name="editSchoolName" placeholder="Instituição" type="text">
			                     </label>
							</section>														

				            <p class="text-center">
				               <button type="submit" class="btn btn-quattro">
				                  <i class="fa fa-paper-plane"></i>Atualizar
				               </button>
				            </p>							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_edit_profissional" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top: 100px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h2 class="modal-title" id="myModalLabel">Editar experiência</h2>
			</div>
			<div class="modal-body">
				<?php
				    $atributos = array('id'=>'form-edit-position', 'class'=>'sky-form', 'method'=>'POST');
				    echo form_open('employee/updateExperience', $atributos);
				?>
					<input id="idExperienciaProfissional" name="idExperienciaProfissional" type="hidden">					
					<div class="row">
						<div class="col-md-12">												
							<section class="col-md-12">
								<p>Empresa</p>
			                     <label class="input">
			                     	<i class="icon-append fa fa-asterisk"></i>
			                        <input id="editCompany" name="editCompany" type="text">
			                     </label>
							</section>	

							<section class="col-md-6">
								<p>Cargo</p>
			                     <label class="input">
			                     	<i class="icon-append fa fa-asterisk"></i>
			                        <input id="editPosition" name="editPosition" type="text">
			                     </label>
							</section>	
					          
							<section class="col-md-6">
								<p>Período</p>
								<label class="select">
									<select name="editDuration">
										{durations}
										<option value="{durationId}">{durationDescription}</option>
										{/durations}
									</select>
									<i></i>
								</label>
							</section>
				        </div>
					</div>				
		            <p class="text-center">
		               <button name="submit" type="submit" class="btn btn-quattro">
		                  <i class="fa fa-paper-plane"></i>Atualizar
		               </button>
		            </p>
		        </form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">


function editProfession(id, company, position, duration, durationId)
{
	$("#editCompany").prop('value', company);
	$("#editPosition").prop('value', position);
	$("#idExperienciaProfissional").prop('value', id);
	$("#editDuration").prepend('<option value=' + durationId + '  selected="selected">' + duration + '</option>');
}

function editEducation(idEducation, levelEducation, schoolEducation, couseEducation)
{
	
	$("#idFormacaoAcademica").prop('value', idEducation);

	$("#editSchoolLevel").prepend('<option value=' + idEducation + '  selected="selected">' + levelEducation + '</option>');

	if (couseEducation != ''){
		$("#editCourse").prop('disabled', false);
		$("#editCourse").prop('value', couseEducation);
	}

	if (schoolEducation != '')
		$("#editSchoolName").prop('value', schoolEducation);
}

$( document ).ready(function() {

	var newPerfil = '{new}';
	var ddd = '{phone}'.slice(0, 2);
	var firstPart = '{phone}'.slice(2, 6)
	var secondPart = '{phone}'.slice(6, 10)	

	phone = '(' + ddd + ') ' + firstPart + ' ' + secondPart; 

	$('#contact').html(
		"<p align='center'>" + 
			"<strong>Telefone:</strong> <small>" + phone + "</small> <strong> / </strong>" +
			"<strong>Email: </strong><small>{employeeEmail}</small>" +
		"</p>");


	if (newPerfil)
	{
		$('#modal_escolaridade').modal('toggle');
	}

});



$('#editSchoolLevel').on('change', function() {
	var schoolLevel = this.value;  
	console.log(schoolLevel);
	console.log('asda s');
	if (schoolLevel <= 4 )
	{
		$("#editCourse").prop('value', 'Não se aplica');
		$("#editCourse").prop('disabled', true);
	}
	else
	{
		$("#editCourse").prop('value', '');
		$("#editCourse").prop('placeholder', 'Nome do curso');
		$("#editCourse").prop('disabled', false);	
	}
});

$('#schoolLevel').on('change', function() {
	var schoolLevel = this.value;  
	console.log(schoolLevel);
	console.log('asda s');
	if (schoolLevel <= 4 )
	{
		$("#course").prop('value', 'Não se aplica');
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


