<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/newAddress/'><span>Endereço</span></a></li>      
      <li><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li class='active'><a href='<?php echo base_url();?>index.php/company/management/'><span>Gerenciamento</span></a></li>
   </ul>
</div>


<section id="team" class="gray-bg padding-top-bottom">
	
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1 class="section-title">Gerencie seus candidatos</h1>
				
				<p align="center">
		          <section>
		            <div class="form-group" >
		              <div class="input-group">
		                <input list="vagas"
		                	placeholder="Filtre somente os candidatos de vagas desejadas..." name="vagas" class="form-control"
		                  	style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">
		                <datalist id="vagas">
		                  {vacancy}
		                  <option value="{cargo}">
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

				{candidate}
				<div class="col-md-4 col-sm-6 team-member">
					<div class="member-details">
						<h2 align="center">{candidateName} {candidateLastName}</h2>
						<p align="left">
							<i class="fa fa-suitcase"></i> {candidatePosition}<br>
							<i class="fa fa-phone"></i>   {candidatePhone}<br>
							<i class="fa fa-envelope"></i>   {candidateEmail}<br>
							<i class="fa fa-calendar"></i>  {candidateInterviewDate} - 18:00 - 
							<a href="#">Alterar</a>
						</p>
						<br>
						<p align="center">
							<a class="btn btn-u" href="">Contratar</a>
							<a class="btn btn-u" href="">Recusar</a>
						</p>
					</div>
				</div>
				{/candidate}
			</div>
		</div>
	</div>
</div>
</section>