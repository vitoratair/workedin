<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/newAddress/'><span>Endereço</span></a></li>      
      <li class='active'><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Gerenciamento</span></a></li>
   </ul>
</div>
<section class="gray-bg padding-top-bottom">
      <div class="row">
         <div class="col-md-11 col-md-offset-1">
            <div class="container features">
               <h1 class="section-title">Candidatos à vaga</h1>

               <br><br><br>
               <div class="row">

                  {candidate}
                  <div class="col-sm-4 scrollimation fade-left">
                     <div class="media scrollimation fade-left">
                        <div class="icon pull-left">
                           <i class="media-object icon-1 fa fa-user"></i>
                           <i class="media-object icon-2 fa fa-user"></i>
                        </div>
                        <div class="media-body">
                           <h4>
                           <a href="<?php echo base_url();?>index.php/company/perfilCandidate/{candidateId}">
                              <b>{candidateName}, 24 anos</b>
                           </a>
                           &nbsp;&nbsp;&nbsp;
                           <a href="#">
                              <i class="fa fa-check"></i>
                           </a>
                           <a href="#" style="color: red">
                              <i class="fa fa-remove"></i>
                           </a>
                           </h4>
                           <p>
                              {candidatePosition}<br>
                              {candidatePosition}<br>
                              {candidatePosition}
                           </p>
                        </div>
                     </div>
                  </div>
                  {/candidate}

               </div>
            </div>
         </div>
      </div>
</div>
</section>
