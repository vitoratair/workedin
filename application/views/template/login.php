		<div id="site-nav" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#" data-toggle="modal" data-target="#modal_login" class="btn btn-u" >
						Login <i class="fa fa-sign-in"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top: 100px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h2 class="modal-title" id="myModalLabel">
					Login
				</h2>
			</div>
			
			<div class="modal-body">
				<?php
				$atributos = array('id'=>'form-login', 'class'=>'sky-form', 'method'=>'POST');
				echo form_open('login/loginValidate', $atributos);
				?>
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<br><br>
							<section class="col-md-12">
								<label class="input">
									<input name="email" placeholder="Entre com seu E-mail" id="email" type="email" autocomplete="off">
									<i class="icon-append fa fa-envelope"></i>
								</label>
							</section>
							
							<section class="col-md-12">
								<label class="input">
									<i class="icon-append fa fa-lock"></i>
									<input name="password" placeholder="Entre com sua senha" id="password" type="password" autocomplete="off">
								</label>
							</section>
							
							<p align="center">
								<label id="error"></label>
							</p>
							
							<p class="text-center">
								<button type="submit" class="btn btn-quattro">
								<i class="fa fa-sign-in"></i> Entrar
								</button>
							</p>														
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
	$msg = $this->session->userdata('msg');
	$this->session->unset_userdata('msg');
?> 

<script type="text/javascript">

	$( document ).ready(function() {

		var msg = '<?php echo $msg;?>'
		
		if (msg != '')
		{

			$("#error").append(msg);
			$('#modal_login').modal('toggle');
		}

	});

</script>

