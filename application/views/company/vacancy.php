<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li class='active'><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Gerenciamento</span></a></li>
   </ul>
</div>
<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <div class="row">
         <div class="col-md-10 col-md-offset-1">
            <h1 class="section-title">Vagas</h1>
            <p class="section-description">
               Pequeno texto sobre vagas Pequeno texto sobre vagas Pequeno texto sobre vagas
               Pequeno texto sobre vagas Pequeno texto sobre vagas
            </p>
            <p align="right" style="margin-top: -50px">
               <a class="btn btn-sx btn-danger" href="<?php echo base_url();?>index.php/company/newVacancy/">
                  <i class="fa fa-plus"></i>
                  Nova vaga
               </a>
            </p>

            <hr>
            <br>
            <div class="row">
               {vacancy}
                  <div class="col-sm-6 scrollimation fade-left">
                     <div class="media scrollimation fade-left">
                        <div class="icon pull-left">
                           <i class="media-object icon-1 fa fa-user"></i>
                           <i class="media-object icon-2 fa fa-user"></i>
                        </div>
                        <div class="media-body">
                           <h4><b>{vacancyPosition} </b><a href="<?php echo base_url();?>index.php/company/candidates/">
                           <span class="badge">{vacancyTotalEmployee} candidatos</span></a></h4>
                           <p>{vacancyDescription}</p>
                        </div>
                     </div>
                  </div>
               {/vacancy}
            </div>
         </div>
      </div>
   </div>
</div>
</section>


<!-- <section class="white-bg padding-top-bottom">
   <div class="container features">


   </div>
</section> -->