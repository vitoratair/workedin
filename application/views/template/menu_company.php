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
                    <span>W</span><font color="#777">orked</font><span>in</span>                    
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <div class="nav navbar-nav ">
                    <a href='<?php echo base_url();?>index.php/company/vacancy/' class="btn-u">Vagas</a>    
                    <a href='<?php echo base_url();?>index.php/company/management/' class="btn-u">Entrevistas</a>    
                    <a href='<?php echo base_url();?>index.php/company/home/' class="btn-u">Cadastro</a>    
                    <a href='<?php echo base_url();?>index.php/company/credits' class="btn-u">Créditos <span class="badge">{credits}</span></a>    
                    <a href="<?php echo base_url();?>index.php/login/logout/">Sair</a>
                </div>            
            </div>
        </div>
    </nav>


