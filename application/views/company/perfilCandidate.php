<section class="gray-bg padding-top-bottom" style="margin-top: 70px">
   <div class="container features">
      <div class="row">
         <div class="class-md-12">
            <div class="col-sm-3">

               <img class="img-responsive img-center" width="200px" src="<?php echo base_url();?>/assets/images/profile_icon_{employeeSex}.png" alt="">
               <div class="col-sm-12 col-md-offset-1">
                  <br>
                  <div class="col-sm-6" align="center">
                     <h2 class="heading-sm">
                        <?php if ($credit >= $priceContact):?>
                           <a href="#" onclick='candidate_change("{candidate}", 2)' data-toggle="modal" data-target="#modal_accept" >
                              <i class="fa fa-thumbs-up"></i>
                           </a>
                        <?php else:?>
                           <a href="#" data-toggle="modal" data-target="#modal_not_money">
                              <i class="fa fa-thumbs-up"></i>
                           </a>
                        <?php endif?>
                     </h2>
                  </div>
                  <div class="col-sm-6" align="left">
                     <h2 class="heading-sm">
                        <a href="#" onclick='candidate_change("{candidate}", 3)' data-toggle="modal" data-target="#modal_not_accept" >
                           <i class="fa fa-thumbs-down" style="color: red"></i>
                        </a>
                     </h2>
                  </div>
               </div>
               <div class="col-sm-12 col-md-offset-1">                  
                  {employeeData}                  
                  <p> 
                     <h4>Idade: <small>{employeeAge} anos</small></h4>
                     <h4>Estado civil: <small>{employeeCivilStatus}</small></h4>                     
                     <h4>Bairro: <small>{neighborhood}</small></h4>
                     <h4>Cidade: <small>{employeeCity}</small></h4>
                     <h4>Habilitação: <small>{employeeLicense}</small></h4>
                  </p>
               </div>
            </div>
            <div class="col-sm-9">
               <div class="col-md-12">
                     <h1 class="big-title">{employeeName}</h1>
                  <p class="section-description"></p>

               {/employeeData}

               </div>

               <div class="col-md-12" style="margin-top: -40px">

                  <h2>Escolaridade</h2>
                  {employeeEducation}
                  <div class="col-sm-6 scrollimation fade-left">
                     <div class="media scrollimation fade-left">
                        <div class="icon pull-left">
                           <i class="media-object icon-1 fa fa-pencil"></i>
                           <i class="media-object icon-2 fa fa-pencil"></i>
                        </div>
                        <div class="media-body">
                           <h3><b>{educationLevel}</b></h3>
                           <p>{educationCourse}</p>
                        </div>
                     </div>
                  </div>
                  {/employeeEducation}
               </div>

               <div class="col-md-12">
                  <h2>Experiência profissional</h2>
                  {employeeProfession}
                  <div class="col-sm-6 scrollimation fade-left">
                     <div class="media scrollimation fade-left">
                        <div class="icon pull-left">
                           <i class="media-object icon-1 fa fa-suitcase"></i>
                           <i class="media-object icon-2 fa fa-suitcase"></i>
                        </div>
                        <div class="media-body">
                           <h3><b>{professionCompany}</b></h3>
                           <h4>
                           Cargo: <small> {professionPosition}</small><br>
                           Duracão: <small> {professionTime}</small>
                           </h4>
                        </div>
                     </div>
                  </div>
                  {/employeeProfession}
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
            <h2 class="modal-title" id="myModalLabel">Visualizar contato</h2>
         </div>
         <div class="modal-body">

            <p>
               Parece que você encontrou o candidato certo!<br>
               Confirme a utilização de <b>1</b> crédito para visulizar esse contato.
            </p>

            <p class="text-center">
               <a href="" class="btn btn-u" id="Confirm" >Aceitar</a>
            </p>

         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modal_not_money" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="margin-top: 150px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h2 class="modal-title" id="myModalLabel">
               Créditos
            </h2>
         </div>
         <div class="modal-body" align="">
            <p>
               Para visualizar contato compre créditos Workedin
            </p>
            <p class="text-center">
               <a href="<?php echo base_url();?>index.php/company/credits" class="btn btn-u" >Comprar créditos</a>
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
            <h2 class="modal-title" id="myModalLabel">Candidato recusado</h2>
         </div>
         <div class="modal-body">

            <p>
               Você tem certeza que deseja recusar este candidato?
            </p>

            <p class="text-center">
               <a href="" class="btn btn-u" id="Confirm" >Sim</a>
            </p>
         </div>
      </div>
   </div>
</div>


<script type="text/javascript">
   
   function candidate_change(candidate, value)
   {
      var vacancy = '{vacancy}';

      console.log('VAGA =  ' + vacancy );
      console.log('CANDIDATO =  ' + candidate );
      console.log('VALOR =  ' + value );

      document.getElementById('Confirm');
      document.getElementById('Confirm').href="<?php echo base_url();?>index.php/company/setCombine/"+value+"/"+vacancy+"/"+candidate;
   }

</script>

