<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Entrevistas</span></a></li>
      <li class='active'><a href='<?php echo base_url();?>index.php/company/credits'><span>Créditos</span></a></li>
   </ul>
</div>

<section id="pricing" class="gray-bg padding-top-bottom">
	
	<div class="container">		
		<h1 class="section-title">Créditos</h1>				
		<div class="row pricing">			
			<div class="col-lg-10 col-lg-offset-1">				
				<p class="section-description">
					No momento você possui <strong>{credits}</strong> créditos, continuação do texto, 
					No momento você possui <strong>{credits}</strong> créditos, continuação do texto, 			
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
						
						echo		'</p>';
						echo		'<h2>' . $value->description . '</h2>';
						echo		'<p class="price">R$ ' . $value->price . ' </p>';
						echo		'<p>' . $value->credits . ' créditos</p>';			
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
