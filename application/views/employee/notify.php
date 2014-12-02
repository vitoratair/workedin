<section id="experience" class="white-bg padding-top-bottom" style="margin-top: 40px">
   <div class="container features">
      <h1 class="section-title">Sua história no Workedin</h1>
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

                     
                     if ($notification->notificationTypeId == START_WORKEDIN){
                        echo '<div class="timeline-badge success">';
                        echo '<i class="fa fa-birthday-cake"></i>';
                        $message = '';
                     }
                     else if ($notification->notificationTypeId == APPLY_VANCAY){
                        echo '<div class="timeline-badge warning">';
                        echo '<i class="fa fa-sun-o "></i>';
                        $message = 'Você se candidatou para a vaga <b>' . $notification->vacancy . '</b> na empresa <b>' . $notification->company . '</b>';
                     }  
                     else if ($notification->notificationTypeId == COMPANY_LIKE){
                        echo '<div class="timeline-badge success">';
                        echo '<i class="fa fa-thumbs-o-up"></i>';
                        $message = 'A empresa <b>' . $notification->company . '</b> gostou do seu currículo';

                        if ($notification->notificationInterviews){
                           $message = $message . ', sua entrevista foi agendada para o dia ';
                           $date = substr($notification->notificationInterviews, 0, 10);                           
                           $day = substr($date, -2);
                           $month = substr($date, 5, 2);
                           $year = substr($date, 0, 4);
                           $message .= '<b>' . $day . '/' . $month . '/' . $year . '</b>';
                        }
                     }
                     else if ($notification->notificationTypeId == CANDIDATE_SELECTED){
                        echo '<div class="timeline-badge success">';
                        echo '<i class="fa fa-trophy"></i>';
                        $message = 'Parabéns, a empresa <b>' . $notification->company . '</b> selecionou você';
                     }
                     else if ($notification->notificationTypeId == CANDIDATE_NOT_SELECTED){
                        echo '<div class="timeline-badge danger">';
                        echo '<i class="fa fa-bomb"></i>';
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
