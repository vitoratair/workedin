<?php
    $actual_link = $_SERVER['PHP_SELF'];
    $actual_link = explode("index.php", $actual_link)[1];
    $actual_link = explode("/", $actual_link);
    $actual_link = $actual_link[2];

?>

<body id="body" data-spy="scroll" data-target=".navbar-fixed-top" class="demo-lightbox-gallery">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <a class="navbar-brand" href="<?php echo base_url();?>">
                    <img width="35px" src="<?php echo base_url();?>assets/images/marcador_verde.png" alt="Logo">
                    <span>W</span><font color="#777">orked</font><span>IN</span>                    
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                <?php if ($actual_link == 'home' or $actual_link == 'newAddress' or $actual_link == 'editAddress' or $actual_link == 'editCompany'):?>
				      <li class="page-scroll active"><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
                <?php else:?>
                    <li class="page-scroll"><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
                <?php endif?>

                <?php if ($actual_link == 'vacancy' or $actual_link == 'newVacancy' or $actual_link == 'displayVacancy' or $actual_link == 'candidates'):?>
                      <li class="page-scroll active"><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
                <?php else:?>
                    <li class="page-scroll"><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
                <?php endif?>

                <?php if ($actual_link == 'management'):?>
                      <li class="page-scroll active"><a href='<?php echo base_url();?>index.php/company/management/'><span>Entrevistas</span></a></li>
                <?php else:?>
                    <li class="page-scroll"><a href='<?php echo base_url();?>index.php/company/management/'><span>Entrevistas</span></a></li>
                <?php endif?>

                <?php if ($actual_link == 'credits'):?>
                      <li class="page-scroll active"><a href='<?php echo base_url();?>index.php/company/credits'><span>Créditos</span></a></li>
                <?php else:?>
                    <li class="page-scroll"><a href='<?php echo base_url();?>index.php/company/credits'><span>Créditos</span></a></li>
                <?php endif?>                				      				      				      
                      <li class="page-scroll"><a href="<?php echo base_url();?>index.php/login/logout/">Sair</a>
                     </li>
                </ul>
            </div>

        </div>
    </nav>


