<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/employee/home/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/employee/perfil/'><span>Perfil</span></a></li>
      <li class="active">
         <a href='<?php echo base_url();?>index.php/employee/notify/'>
         Histórico <span class="badge">{notificationNotRead}</span>
         </a>
      </li>
   </ul>
</div>


<section id="experience" class="white-bg padding-top-bottom">
   <div class="container features">
      <h1 class="section-title">Sua história no workedin</h1>
      <div class="row">
         <div class="col-md-10 col-md-offset-1">

            <ul class="timeline">   

               <?php 
                  foreach ($notifications as $key => $notification)
                  {
                     if ($notification->count&1)
                        echo '<li class="timeline-inverted scrollimation fade-right">';
                     else
                        echo '<li class=" scrollimation fade-right">';
               ?>                                   
                     <?php
                        if ($notification->notificationTypeId == START_WORKEDIN){
                           echo '<div class="timeline-badge success">';
                           echo '<i class="fa fa-birthday-cake"></i>';
                           $message = 'Mensagem sobre cadastro no site';
                        }
                        else if ($notification->notificationTypeId == APPLY_VANCAY){
                           echo '<div class="timeline-badge warning">';
                           echo '<i class="fa fa-sun-o "></i>';
                           $message = 'Mensagem sobre aplicar a vaga';
                        }  
                        else if ($notification->notificationTypeId == COMPANY_LIKE){
                           echo '<div class="timeline-badge success">';
                           echo '<i class="fa fa-thumbs-o-up"></i>';
                           $message = 'Mensagem sobre empressa gostou do currículo';
                        }
                        else if ($notification->notificationTypeId == CANDIDATE_SELECTED){
                           echo '<div class="timeline-badge success">';
                           echo '<i class="fa fa-trophy"></i>';
                           $message = 'Mensagem sobre candidato selecionado';
                        }
                        else if ($notification->notificationTypeId == CANDIDATE_NOT_SELECTED){
                           echo '<div class="timeline-badge danger">';
                           echo '<i class="fa fa-birthday-cake"></i>';
                           $message = 'Mensagem sobre candidato não selecionado';
                        }                                                                           
                     ?>
                     </div>               
                     <div class="timeline-panel">
                        <div class="timeline-heading">
                           <h4 class="timeline-title">
                              <b>
                                 <?php echo $notification->notificationDescription;?>
                              </b>

                           </h4>
                           <p>
                           <small class="text-muted">
                           <i class="fa fa-calendar"></i>
                              <?php echo $notification->notifyDate;?>
                           </small>
                           </p>
                        </div>
                        <div class="timeline-body">
                           <p>
                              <?php echo $message;?>
                           </p>
                        </div>
                     </div>
                  </li> 
               <?php
                  }
               ?>   
            </ul>
         </div>
      </div>
   </div>
</section>
