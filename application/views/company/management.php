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
                  if (empty($candidates))
                     echo '<h1 class="section-title">Não há entrevistas</h1>';
                  else
                     echo '<h1 class="section-title">Administre suas entrevistas</h1>';
               ?>				
				<form action="." class="sky-form" id="formPosition" method="POST">
					<p align="center">
			          <section>
			            <div class="form-group" >
			              <div class="input-group">

				              <label class="select">
				                  <select id="position" name="position"
				                  style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 46px; background: #f3f3f3; border-radius: 0px">
					                  <option value="">Selecione um cargo</option>
					                  {vacancy}
					                  <option value="{vacancyPositionId}">{vacancyPosition}</option>
					                  {/vacancy}
				                  </select>                  
				              </label>

				                <div class="input-group-addon" style="padding: 0px 0px ;border: 0px; background-color: transparent">
				                  <a href="#" onclick='$("#formPosition").submit();' class="btn btn-u"style="height: 42px; padding: 12px 39px; font-size: 15px; box-shadow: 0 3px 1px #72c02c" >
				                    <i class="fa fa-search"></i>
				                  </a>
				                </div>
			              </div>
			            </div>
			          </section>
					</p>

				</form>

				
				<br><br><br>
				<!-- header da vaga selecionada -->

                <?php foreach ($candidates as $candidate): ?>
                	<div class="col-md-4 col-sm-6 team-member">
						<div class="member-details">
							<h2 align="center">
								<?php echo $candidate->candidateName . ' ' . $candidate->candidateLastName;?>
							</h2>
							<table >
								<tbody>
									<tr>
										<th width="30px"><i class="fa fa-suitcase"></i></th>										
										<td><?php echo $candidate->candidatePosition;?></td>
									</tr>
									<tr>
										<th width="30px"><i class="fa fa-phone"></i></th>
										<td id="phone">
											<?php
												echo '(' . substr($candidate->candidatePhone, 0,2) . ') ' . substr($candidate->candidatePhone, 2,4) . ' ' . substr($candidate->candidatePhone, 6);
											?>
										</td>
									</tr>
									<tr>
										<th width="15px"><i class="fa fa-envelope"></i></th>
										<td><?php echo $candidate->candidateEmail;?></td>
									</tr>
									<tr>
										<th width="15px"><i class="fa fa-calendar"></i></th>
										<td>
											<?php if (empty($candidate->candidateInterviewDate)):?>
												<a href="#" onclick="func('<?php echo $candidate->candidateId;?>', '<?php echo $candidate->candidateIdVacancy;?>', '<?php echo $candidate->candidateDate;?>' );" data-toggle="modal" data-target="#modal_changeInterviewDate">
													Quando você agendou?
												</a>
											<?php else:?>														
												<?php echo substr($candidate->candidateInterviewDate, 0, -3) . ' - ';?>														
												<a href="#" onclick="func('<?php echo $candidate->candidateId;?>', '<?php echo $candidate->candidateIdVacancy;?>', '<?php echo $candidate->candidateDate;?>' );" data-toggle="modal" data-target="#modal_changeInterviewDate">
													Alterar
												</a>
											<?php endif;?>	
										</td>
									</tr>
								</tbody>
							</table>

							<br>
							<p align="center">
								<a class="btn btn-u" href="#" onclick='candidate_change("<?php echo $candidate->candidateId;?>", "<?php echo $candidate->candidateIdVacancy;?>", 5, "<?php echo $candidate->candidateDate;?>")' data-toggle="modal" data-target="#modal_accept"s>Contratado</a>
								<a class="btn btn-u" href="#" onclick='candidate_change("<?php echo $candidate->candidateId;?>", "<?php echo $candidate->candidateIdVacancy;?>", 6, "<?php echo $candidate->candidateDate;?>")' data-toggle="modal" data-target="#modal_not_accept"s>Recusado</a>
							</p>
						</div>
					</div>
                <?php endforeach; ?>

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
		               <input type="submit" class="btn btn-u" id="Confirm" value="Salvar">
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
            <h2 class="modal-title" id="myModalLabel">Candidato recusado</h2>
         </div>
         <div class="modal-body" align="">

            <p>
               Você tem certeza que deseja recusar este candidato?
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
            <h2 class="modal-title" id="myModalLabel">Contratado</h2>
         </div>
         <div class="modal-body" align="">

            <p>
				Consideramos fundamental o seu feedback,
				e para demonstrar nossa gratidão você acabou de ganhar <b>0,2</b> créditos
				para juntar e usar ainda mais o Workedin.
            </p>
            <p class="text-center">
               <a href="" class="btn btn-u" id="Accept" >Contratado</a>
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
		console.log(userId);
		console.log(vacancyId);
		console.log(dateSavedId);
	}

   function candidate_change(candidate, vacancy, value, dateSaved)
   {
		var url = '<?php echo base_url();?>index.php/company/setCombine/'+value+'/'+vacancy+'/'+candidate + '/management';
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

   // $( document ).ready(function() { 
   //    var phone = $("#phone").text();
   //    var newPhone = '(' + phone.slice(0,2) + ') ' + phone.slice(2,6) + ' ' + phone.slice(6);
   //    $("#phone").text(newPhone);
   //    console.log($("#phone").text());
   // });

</script>