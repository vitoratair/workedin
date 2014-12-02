<section id="login"></section>


<section id="services" class="white-bg padding-top-bottom" style="margin-top: 15px">
	<div class="container">
		<h1 class="section-title" style="font-size: 45px">
			Você paga mensalidade para encontrar candidatos?
		</h1>
		<p class="section-description">
			No <b>Workedin</b> você só usa créditos para ter os contatos dos candidatos selecionados. Você pode ficar meses sem gastar nada.
		</p>
		<p align="right">
			<a class="btn btn-danger scrollto" href="#" data-toggle="modal" data-target="#modal_quero_cadastrar"><i class="fa fa-save"></i>
			Quero cadastrar minha empresa</a>
		</p>		
	</div>
</section>

<section class="color-bg light-typo cta" style="margin-top: -75px">
	<div class="container">
		<div class="row scrollimation fade-right in">
			<div class="col-md-12 cta-message" align="center">
				<h1 class="section-title" style="font-size: 44px">
					Você tem limite para receber e visualizar currículos?
				</h1>
				<p style="font-weight: 100">
					No <b>Workedin</b> você consegue ver todos os candidatos que se aplicaram as suas vagas, SEM LIMITES.
				</p>
			</div>
		</div>		
	</div>	
</section>

<section id="services" class="white-bg padding-top-bottom">
	<div class="container">
		<h1 class="section-title">Você tem limites para anunciar vagas?</h1>
		<p class="section-description">
			No <b>Workedin</b> você pode anunciar quantas vagas quiser de graça
		</p>
	</div>
</section>



<!-- <section id="about" class="white-bg padding-top-bottom">
	<div class="container">
		<h1 class="section-title">Seja uma empresa amiga</h1>
		<img class="img-responsive img-center scrollimation fade-up in" src="<?php echo base_url();?>assets/images/amiga.png" alt="">
	</div>
</section>
 -->

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
		                    <div class="inline-group">
		                      <label class="checkbox">
		                          <input type="checkbox" name="contract" value="1" ><i></i>
		                            <a href="<?php echo base_url();?>index.php/company/contract">
		                              Li e aceito o contrato
		                            </a>
		                      </label>
		                    </div>
		                </section>		              

						<p align="center">
							<label id="error"></label>
						</p>		              
		            </div>
		          </div>
			          <div class="modal-footer">
			              <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
			              <button class="btn-u" type="submit"><i class="fa fa-paper-plane"></i> Cadastrar</button>
			          </div>
		        </div>

				</div>
			</form>
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
		
		if (msg == 'email_equal')
		{
			$("#error").append('E-mail já cadastrado');
			$('#modal_quero_cadastrar').modal('toggle');
		}
	});

</script>




