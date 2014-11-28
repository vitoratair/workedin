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
			<?php
				$atributos = array('id'=>'form-add-email', 'class'=>'sky-form', 'method'=>'POST');
				echo form_open('company/addCompany', $atributos);
			?>	
				<br><br>

		        <div class="modal-body">
		          <div class="row">
		            <div class="col-md-10 col-md-offset-1">
		              
		              <section class="col-md-12">
		                <label class="input">
		                  <i class="icon-append fa fa-envelope"></i>
		                  <input type="email" id="email" name="email" placeholder="Endereço de e-mail">
		                </label>
		              </section>
		              
		              <section class="col-md-12">
		                <label class="input">
		                  <i class="icon-append fa fa-lock"></i>
		                  <input type="password" name="password" id="password" placeholder="Senha">
		                </label>
		              </section>
		              
		              <section class="col-md-12">
		                <label class="input">
		                  <i class="icon-append fa fa-lock"></i>
		                  <input type="password"  id="passwordConfirm" name="passwordConfirm" placeholder="Confirmação de senha">
		                </label>
		              </section>
		            </div>
		          </div>
		          <p class="text-center">
		          <button type="submit" class="btn btn-u">Cadastrar</button>
		          </p>
		        </div>


<!-- 					<div class="form-group">
						<div class="controls">
							<input id="contact-name" style="width: 70%" name="email" placeholder="E-mail" class="form-control requiredField" type="email" data-error-empty="Please enter your name">
						</div>
					</div>
					<div class="form-group">
						<div class="controls">
							<input id="contact-name" style="width: 70%" name="senha" placeholder="Senha" class="form-control requiredField" type="password" data-error-empty="Please enter your name">
						</div>
					</div> -->


				</div>
			</form>
		</div>
	</div>
</div>

