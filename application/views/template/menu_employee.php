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
                <a class="navbar-brand" href="<?php echo base_url();?>index.php/employee/home/">
                    <img width="35px" src="<?php echo base_url();?>assets/images/marcador_verde.png" alt="Logo">
                    <span>W</span><font color="#777">orked</font><span>IN</span>                    
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <div class="nav navbar-nav ">
                    <a href='<?php echo base_url();?>index.php/employee/home/' class="btn-u btn-u-red">Buscar vagas</a>    
                    <a href='<?php echo base_url();?>index.php/employee/perfil/' class="btn-u">Meu cadastro</a>    
                    <a href='<?php echo base_url();?>index.php/employee/notify/' class="btn-u">Histórico <span class="badge">{notificationNotRead}</span></a>    
                    <a href="<?php echo base_url();?>index.php/login/logout/">Sair</a>    
                </div>            
            </div>

        </div>
    </nav>


               <!--  <ul class="nav navbar-nav">
                
                <?php if ($actual_link == 'home'):?>
                      <a href='<?php echo base_url();?>index.php/employee/home/'><span>Vagas</span></a>
                <?php else:?>
                      <a href='<?php echo base_url();?>index.php/employee/home/'><span>Vagas</span></a></li>
                <?php endif?>

                <?php if ($actual_link == 'perfil' or $actual_link == 'editPerfil'):?>
                      <li class="page-scroll active"><a href='<?php echo base_url();?>index.php/employee/perfil/'><span>Perfil</span></a></li>
                <?php else:?>
                    <li class="page-scroll"><a href='<?php echo base_url();?>index.php/employee/perfil/'><span>Perfil</span></a></li>
                <?php endif?>

                <?php if ($actual_link == 'notify'):?>
                      <li class="page-scroll active"><a href='<?php echo base_url();?>index.php/employee/notify/'><span>Histórico <span class="badge">{notificationNotRead}</span></span></a></li>
                <?php else:?>
                      <li class="page-scroll"><a href='<?php echo base_url();?>index.php/employee/notify/'><span>Histórico <span class="badge">{notificationNotRead}</span></span></a></li>
                <?php endif?>                
                      
                      <li class="page-scroll"><a href="<?php echo base_url();?>index.php/login/logout/">Sair</a>
                     </li>
                </ul> -->