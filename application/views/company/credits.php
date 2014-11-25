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
				
				<div class="col-sm-4 text-center scrollimation fade-right in">
					
					<div class="item">
						
						<p class="icon"><i class="fa fa-tablet fa-fw"></i></p>
						<h2>Bronze</h2>
						<p class="price">R$ 50,00</p>
						
						<p>10 créditos</p>
						
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="code" value="1510354114147EA224C67FBD7A1A8F4F" />
<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
						
					</div>
					
				</div>
				
				<div class="col-sm-4 text-center scrollimation fade-in in">
					
					<div class="item featured">
						
						<p class="icon"><i class="fa fa-laptop fa-fw"></i></p>
						<h2>Ouro</h2>
						<p class="price">R$ 220,00</p>
						
						<p>50 créditos</p>

						<a class="btn btn-quattro" href="#">Comprar Agora</a>
						
					</div>
					
				</div>
				
				<div class="col-sm-4 text-center scrollimation fade-left in">
					
					<div class="item">
						
						<p class="icon"><i class="fa fa-desktop fa-fw"></i></p>
						<h2>Prata</h2>
						<p class="price">R$ 90,00</p>
						
						<p>20 créditos</p>

						<a class="btn btn-quattro" href="#">Comprar Agora</a>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</section>
