<section id="pricing" class="gray-bg padding-top-bottom" style="margin-top: 70px">
	
	<div class="container">		
		<h1 class="section-title">Créditos</h1>				
		<div class="row pricing">			
			<div class="col-lg-10 col-lg-offset-1">				
				<p class="section-description">
					A moeda do Workedin é o <strong>crédito</strong>. Você poderá visualizar o <strong>contato dos currículos</strong> selecionados
					por <strong>1 crédito</strong>. Créditos são válidos por tempo indeterminado.
				</p>				
				<?php
					foreach ($creditsPrice as $key => $value)
					{

						echo '<div class="col-sm-4 text-center scrollimation fade-right in">';
						echo 	'<div class="item">';
						echo		'<p class="icon" style="font-size: 35px">';
						echo		'<i class="fa fa-star"></i>';
						echo		'<i class="fa fa-star"></i>';											
						
						if ($value->description == 'Ouro'){
							echo		'<i class="fa fa-star-half-o"></i>';
							echo		'<i class="fa fa-star-half-o"></i>';
							echo		'<i class="fa fa-star-half-o"></i>';
						}

						if ($value->description == 'Diamante') {
							echo		'<i class="fa fa-star"></i>';											
							echo		'<i class="fa fa-star-half-o"></i>';
							echo		'<i class="fa fa-star-half-o"></i>';						
						}
						
						if ($value->description == 'Adamantium') {
							echo		'<i class="fa fa-star"></i>';										
							echo		'<i class="fa fa-star"></i>';										
							echo		'<i class="fa fa-star"></i>';
						}
						
						echo		'<p class="price">' . $value->credits . ' créditos</p>';
						echo		'<p>R$ ' . $value->price . '</p>';
						echo		'<a class="btn btn-quattro" href="#" onclick=\'$("#formPagSeguroPLAN_1").submit();\' >Comprar Agora</a>';
						echo	'</div>';
						echo '</div>';
					}			
				?>				

			</div>
			
		</div>
		
	</div>
	
</section>

<form id="formPagSeguroPLAN_1" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
	<input type="hidden" name="code" value="1510354114147EA224C67FBD7A1A8F4F" />
	<input type="hidden" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
