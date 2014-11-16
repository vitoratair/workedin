<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/newAddress/'><span>Endereço</span></a></li>      
      <li class='active'><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Entrevistas</span></a></li>
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
                              <a href="<?php echo base_url();?>index.php/company/perfilCandidate/{candidateId}/{vacancyId}">
                                 <b>
                                    {candidateName} - {candidateAge} anos
                                 </b>
                              </a>
                              &nbsp;&nbsp;
                              <a href="#" onclick='candidate_change("{candidateId}", 2)' data-toggle="modal" data-target="#modal_accept">
                                 <i class="fa fa-thumbs-up"></i>
                              </a>
                              &nbsp;&nbsp;
                              <a href="#" onclick='candidate_change("{candidateId}", 3)' data-toggle="modal" data-target="#modal_not_accept" style="color: red">
                                 <i class="fa fa-thumbs-down"></i>
                              </a>
                           </h4>
                           <p>
                              {candidateProfession}
                                 {professionPosition}<br>
                              {/candidateProfession}
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

<div class="modal fade" id="modal_accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="margin-top: 150px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h2 class="modal-title" id="myModalLabel">Aceitar</h2>
         </div>
         <div class="modal-body" align="center">

            <p>
               Texto sobre contratação Texto sobre contratação 
               VocÊ poderá visualizar o candidato na página gerenciamento
               Texto sobre contratação Texto sobre contratação 
               Texto sobre contratação Texto sobre contratação 
            </p>

            <p class="text-center">
               <a href="" class="btn btn-u" id="Confirm" >Aceitar</a>
            </p>

         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modal_not_accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="margin-top: 150px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h2 class="modal-title" id="myModalLabel">Excluir</h2>
         </div>
         <div class="modal-body" align="center">

            <p>
               Texto sobre contratação Texto sobre contratação 
               Texto sobre contratação Texto sobre contratação
               Texto sobre contratação Texto sobre contratação 
            </p>
            <p class="text-center">
               <a href="" class="btn btn-u" id="Confirm" >Excluir</a>
            </p>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   
   function candidate_change(candidate, value)
   {
      var vacancy = '{vacancyId}';

      console.log('VAGA =  ' + vacancy );
      console.log('CANDIDATO =  ' + candidate );

      document.getElementById("Confirm");
      document.getElementById('Confirm').href="../setCombine/"+value+"/"+vacancy+"/"+candidate;
   }

</script>



