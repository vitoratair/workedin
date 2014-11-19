		<div id="site-nav" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#" data-toggle="modal" data-target="#modal_login" class="">
						<i class="fa fa-sign-out" style="font-size: 25px"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

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



