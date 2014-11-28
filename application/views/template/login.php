		<div id="site-nav" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#" data-toggle="modal" data-target="#modal_login" class="btn">
						Login <i class="fa fa-sign-out"></i>
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
									<input name="password" id="password" type="password" autocomplete="off">
								</label>
							</section>
							<p class="text-center">
								<button type="submit" class="btn btn-u">
								<i class="fa fa-paper-plane"></i> Salvar
								</button>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


