<section id="login"></section>

<section class="gray-bg padding-top-bottom">
	<div class="container">
		<div class="row pricing">
			<div class="col-lg-12 col-lg-offset-2">
				<div class="col-sm-4 text-center scrollimation fade-right in">
					<div class="item">
						<p class="icon"><i class="fa fa-user fa-fw"></i></p>
						<h2>Sou candidato</h2>
						<br><br>
						<p>Quero emprego</p>
						<a class="btn btn-quattro" href="<?php echo base_url();?>index.php/employee/home/">Entrar</a>
						</div>
					</div>
					<div class="col-sm-4 text-center scrollimation fade-right in">
						<div class="item">
							<p class="icon"><i class="fa fa-home fa-fw"></i></p>
							<h2>Sou empresa</h2>
							<br><br>
							<p>Quero contratar</p>
							<a class="btn btn-quattro" href="<?php echo base_url();?>index.php/home/company/">Entrar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>

<section class="white-bg padding-top-bottom">

			<div class="container">

				<div class="row">

					<div class="col-sm-6 scrollimation fade-right in">
						<div class="embed-responsive embed-responsive-16by9">
						  <iframe class="embed-responsive-item" src="//www.youtube.com/embed/3Iy_Pd4PQfU"></iframe>
						</div>
					</div>

					<div class="col-sm-6 scrollimation fade-left d1 in">

						<h1 class="big-title">Assista o vídeo</h1>
						<p>Texto sobre o vídeo Texto sobre o vídeo Texto sobre o vídeo Texto sobre o vídeo 
						Texto sobre o vídeo Texto sobre o vídeo Texto sobre o vídeo Texto sobre o vídeo 
						Texto sobre o vídeo Texto sobre o vídeo Texto sobre o vídeo </p>

					</div>

				</div>

			</div>

</section>

<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<?php
    $atributos = array('form class'=>'lockscreen animated flipInY', 'method'=>'POST');
    echo form_open('login/loginValidate', $atributos);
?>
	<div class="logo">
		<br><br>
	</div>
	<div>
		<h1 align="center">
		Entre com seu login
		</h1>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-2">
					<img src="<?php echo base_url();?>assets/images/cad1.ico" width="80" height="80">
				</div>
				<div class="col-md-10">
					<div class="col-md-12">
						<div class="col-md-12">
							<input class="form-control" name="email" type="email" placeholder="Email">
						</div>
						<br><br>
						<div class="col-md-12">
							<input class="form-control" name="senha" type="password" placeholder="Senha">
						</div>
					</div>
				</div>
			</div>

			<br><br><br><br><br>
			<div class="col-md-12" align="right">
				<button type="submit" class="btn btn-block btn-xs btn-success">Entrar</button>
			</div>
			<div class="col-md-12" align="right">
				<p class="no-margin margin-top-5">
				Não tenho usuário ainda <a href="#"> Clique aqui</a>
				</p>
			</div>
		</div>

	</div>
</form>
</div>

