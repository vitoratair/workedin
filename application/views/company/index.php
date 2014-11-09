<section id="login"></section>

<section class="gray-bg padding-top-bottom">
<div class="container">
	<div class="row">
		<div class="col-sm-6 scrollimation fade-right in">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="//www.youtube.com/embed/3Iy_Pd4PQfU"></iframe>
			</div>
		</div>
		<div class="col-sm-6 scrollimation fade-left d1 in">
			<h1 class="big-title">Para empresas</h1>
			<p>Tesxto sobre Tesxto sobre Tesxto sobre Tesxto sobre Tesxto sobre Tesxto sobre Tesxto sobre Tesxto sobre Tesxto sobre </p>
			<a class="btn btn-danger scrollto" href="#" data-toggle="modal" data-target="#modal_quero_cadastrar"><i class="fa fa-save"></i>
			Quero cadastrar minha empresa</a>
		</div>
	</div>
</div>
</section>


<section id="services" class="white-bg padding-top-bottom">
	<div class="container">
		<h1 class="section-title">Anuncie gratuitamente</h1>
		<p class="section-description">
		Texto sobre Texto sobre Texto sobre Texto sobre Texto sobre Texto sobre Texto sobre Texto sobre Texto sobre Texto sobre
		</p>
	</div>
</section>

<section class="color-bg light-typo cta">
	<div class="container">
		<div class="row scrollimation fade-right in">
			<div class="col-md-12 cta-message" align="center">
				<p class="section-description"><strong>Estatísticas</strong> exclusivas texto para complementar texto para complementar texto para complementar </p>
			</div>
		</div>
	</div>
</section>

<section id="about" class="white-bg padding-top-bottom">
	<div class="container">
		<h1 class="section-title">Seja uma empresa amiga</h1>
		<img class="img-responsive img-center scrollimation fade-up in" src="<?php echo base_url();?>assets/images/amiga.png" alt="">
	</div>
</section>



<div class="modal fade" id="modal_quero_cadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top: 150px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h2 class="modal-title" id="myModalLabel">Cadastre-se sua empresa</h2>
			</div>
			<form id="contact-form" action="#" method="post" novalidate>
				<br><br>
				<div class="modal-body" align="center">
					<div class="form-group">
						<div class="controls">
							<input id="contact-name" style="width: 70%" name="contactName" placeholder="E-mail" class="form-control requiredField" type="email" data-error-empty="Please enter your name">
						</div>
					</div>
					<div class="form-group">
						<div class="controls">
							<input id="contact-name" style="width: 70%" name="contactName" placeholder="Senha" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
						</div>
					</div>

					<p class="text-center">
						<button name="submit" type="submit" class="btn btn-danger" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent">
							<i class="fa fa-paper-plane"></i>Cadastrar
						</button>
					</p>
					<input type="hidden" name="submitted" id="submitted" value="true" />

				</div>
			</form>
		</div>
	</div>
</div>

