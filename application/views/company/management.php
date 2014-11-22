<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li class='active'><a href='<?php echo base_url();?>index.php/company/management/'><span>Entrevistas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/credits'><span>Créditos</span></a></li>
   </ul>
</div>

<section id="team" class="gray-bg padding-top-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
               <?php
                  if (empty($candidate))
                     echo '<h1 class="section-title">Não há entrevistas</h1>';
                  else
                     echo '<h1 class="section-title">Administre suas entrevistas</h1>';
               ?>				

				<p align="center">
		          <section>
		            <div class="form-group" >
		              <div class="input-group">
		                <input list="vagas"
		                	placeholder="Filtrar vagas" name="vagas" class="form-control"
		                  	style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">
		                <datalist id="vagas">
		                  {vacancy}
		                  <option value="{vacancyPosition}">
		                  {/vacancy}
		                </datalist>
		                <div class="input-group-addon" style="padding: 0px 0px ;border: 0px; background-color: transparent">
		                  <a href="#" class="btn btn-u"style="padding: 12px 39px; font-size: 15px; box-shadow: 0 3px 1px #72c02c" >
		                    <i class="fa fa-search"></i>
		                  </a>
		                </div>
		              </div>
		            </div>
		          </section>
				</p>
				
				<br><br><br>
				<!-- header da vaga selecionada -->

				{candidate}
					<div class="col-md-4 col-sm-6 team-member">
						<div class="member-details">
							<h2 align="center">{candidateName} {candidateLastName}</h2>
							<table >
								<tbody>
									<tr>
										<th width="30px"><i class="fa fa-suitcase"></i></th>
										<td>{candidatePosition}</td>
									</tr>
									<tr>
										<th width="30px"><i class="fa fa-phone"></i></th>
										<td id="phone">{candidatePhone}</td>
									</tr>
									<tr>
										<th width="15px"><i class="fa fa-envelope"></i></th>
										<td>{candidateEmail}</td>
									</tr>
									<tr>
										<th width="15px"><i class="fa fa-calendar"></i></th>
										<td>
											{candidateInterviewDate}
											<a href="#" onclick="func('{candidateId}', '{candidateIdVacancy}', '{candidateDate}' );" data-toggle="modal" data-target="#modal_changeInterviewDate">Alterar</a>
										</td>
									</tr>
								</tbody>
							</table>

							<br>
							<p align="center">
								<a class="btn btn-u" href="#" onclick='candidate_change("{candidateId}", "{candidateIdVacancy}", 5, "{candidateDate}")' data-toggle="modal" data-target="#modal_accept"s>Contratar</a>
								<a class="btn btn-u" href="#" onclick='candidate_change("{candidateId}", "{candidateIdVacancy}", 6, "{candidateDate}")' data-toggle="modal" data-target="#modal_not_accept"s>Recusar</a>
							</p>
						</div>
					</div>
				{/candidate}
			</div>
		</div>
	</div>
</div>
</section>

<div class="modal fade" id="modal_changeInterviewDate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top: 100px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h2 class="modal-title" id="myModalLabel">Horário para entrevista</h2>
			</div>
			<div class="modal-body">
				<?php
				    $atributos = array('id'=>'contact-form', 'class'=>'contact-form', 'method'=>'POST');
				    echo form_open('company/updateInterviewDate', $atributos);
				?>
					<input id="user" name="user" value="" type="hidden">
					<input id="vacancy" name="vacancy" value="" type="hidden">
					<input id="dateSaved" name="dateSaved" value="" type="hidden">					

					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<section class="col-md-6">
								<div class="form-group">
									<p>Data</p>
									<div class="controls">
										<input id="date" name="date" placeholder="Data da entrevista" class="form-control" type="date">
									</div>
								</div>
							</section>

							<section class="col-md-6">
								<div class="form-group">
									<p>Hora</p>
									<div class="controls">
										<input id="time" name="time" placeholder="Hora da entrevista" class="form-control" type="time">
									</div>
								</div>
							</section>						
						</div>				
					</div>
		            <p class="text-center">
		               <input type="submit" class="btn btn-quattro" id="Confirm" value="Salvar">
		            </p>
		        </form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_not_accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="margin-top: 150px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h2 class="modal-title" id="myModalLabel">Não contratar</h2>
         </div>
         <div class="modal-body" align="">

            <p>
               Texto sobre não contratação Texto sobre não contratação 
               Texto sobre não contratação
               Texto sobre não contratação
            </p>
            <p class="text-center">
               <a href="" class="btn btn-u" id="NotAccept" >Recusar</a>
            </p>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modal_accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="margin-top: 150px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h2 class="modal-title" id="myModalLabel">Contratar</h2>
         </div>
         <div class="modal-body" align="">

            <p>
               Texto sobre contratação Texto sobre contratação
               Texto sobre contratação Texto sobre contratação
               Texto sobre contratação 
            </p>
            <p class="text-center">
               <a href="" class="btn btn-u" id="Accept" >Contratar</a>
            </p>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   
	var userId;
	var vacancyId;
	var dateSavedId;

	function func(user, vacancy, dateSaved)
	{
		userId = user;
		vacancyId = vacancy;
		dateSavedId = dateSaved;
	}

   function candidate_change(candidate, vacancy, value, dateSaved)
   {
		var url = '<?php echo base_url();?>index.php/company/setCombine/'+value+'/'+vacancy+'/'+candidate;
		document.getElementById('Accept');
		document.getElementById('Accept').href=url;

		document.getElementById('NotAccept');
		document.getElementById('NotAccept').href=url;		
   }

	$( "#contact-form" ).submit(function( event ) {
	
		$("#user").prop('value', userId);
		$("#vacancy").prop('value', vacancyId);
		$("#dateSaved").prop('value', dateSavedId);
	});   

   $( document ).ready(function() { 
      $('#phone').mask('(000) - 0000 0000');
   });

</script>