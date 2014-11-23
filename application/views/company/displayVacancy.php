<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li class='active'><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Entrevistas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/credits'><span>Créditos</span></a></li>
   </ul>
</div>

<section class="gray-bg padding-top-bottom">
    <div class="container features">
        <div class="row">
            <div class="col-md-12">
                <div class="col-sm-5">
                    <img class="img-responsive img-center" width="250px" src="<?php echo base_url();?>/assets/images/placeholder.png" alt="">
                </div>
                <div class="col-sm-7 scrollimation fade-left">
                    <div class="col-sm-12">
                        {vacancy}
                        <h1 class="big-title">
                        {vacancyPosition}
                        </h1>
                        
                        <p>
                        {vacancyDescription}
                        </p>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <br>
                    <table class="table table-striped table-responsive">
                        <tr>
                            <td width="15%">
                                <h4>Salário:</h4>
                            </td>
                            <td id="salary">
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Horário Inicial:</h4>
                            </td>
                            <td id="timeStart"></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Horário Final:</h4>
                            </td>
                            <td id="timeEnd">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Benefícios:</h4>
                            </td>
                            <td>
                                <h4><small>{benefits} {benefitDescription} {/benefits}</small></h4>
                            </td>
                        </tr>
                    </table>
                    
                    {/vacancy}
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

  function timeFormat(time)
  {
    return time.slice(0, -3);
  }

  function formatReal( number )
  {

    var tmp = number+'';
    tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
    if( tmp.length > 6 )
            tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    return tmp;
  }

  function displayData(salary, timeStart, timeEnd)
  {
    $('#salary').append("<h4><small>R$ " +formatReal(salary)+ "</small></h4>");
    $('#timeStart').append("<h4><small> " +timeFormat(timeStart)+ "</small></h4>");
    $('#timeEnd').append("<h4><small> " +timeFormat(timeEnd)+ "</small></h4>");
  }

  $( document ).ready(function() {

    displayData('{salary}', '{timeStart}', '{timeEnd}');

  });  
  
</script>

