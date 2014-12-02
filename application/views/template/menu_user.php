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
                <a class="navbar-brand" href="<?php echo base_url();?>index.php/company/home/">
                    <img width="35px" src="<?php echo base_url();?>assets/images/marcador_verde.png" alt="Logo">
                    <span>W</span><font color="#777">orked</font><span>IN</span>                    
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">        
                    <li class="page-scroll">
                        <a href='#' data-toggle="modal" data-target="#modal_quero_cadastrar_candidate">
                            Cadastre-se
                        </a>
                    </li>

                    <li class="page-scroll">
                        <a href="#" data-toggle="modal" data-target="#modal_login">
                            Login
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


<div class="modal fade" id="modal_quero_cadastrar_candidate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top: 150px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h2 class="modal-title" id="myModalLabel">Cadastre-se</h2>
      </div>
      <?php
      $atributos = array('id'=>'form-add-email', 'class'=>'sky-form', 'method'=>'POST');
      echo form_open('employee/addEmployee', $atributos);
      ?>
        <br><br>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              
              <section class="col-md-12">
                <label class="input">
                  <i class="icon-append fa fa-envelope"></i>
                  <input type="email" id="email" name="email" placeholder="Endereço com seu e-mail">
                </label>
              </section>
              
              <section class="col-md-12">
                <label class="input">
                  <i class="icon-append fa fa-lock"></i>
                  <input type="password" placeholder="Entre com sua senha" name="password" id="password" placeholder="Senha">
                </label>
              </section>
              
                <section class="col-md-12">
                    <div class="inline-group">
                      <label class="checkbox">
                          <input type="checkbox" name="contract" value="1" ><i></i>
                            <a href="<?php echo base_url();?>index.php/employee/contract">
                              Li e aceito o contrato
                            </a>
                      </label>
                    </div>
                </section>                                        
            </div>
              <p align="center">
                <label id="error"></label>
              </p>              
          </div>
          <div class="modal-footer">
              <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
              <button class="btn-u" type="submit"><i class="fa fa-paper-plane"></i> Cadastrar</button>
          </div>
        </div>
    </form>
  </div>
</div>
</div>


<div class="modal fade" id="modal_quero_cadastrar_candidate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top: 150px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h2 class="modal-title" id="myModalLabel">Cadastre-se</h2>
      </div>
      <?php
      $atributos = array('id'=>'form-add-email', 'class'=>'sky-form', 'method'=>'POST');
      echo form_open('employee/addEmployee', $atributos);
      ?>
        <br><br>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
              
                    <section class="col-md-12">
                        <label class="input">
                            <input name="email" placeholder="Entre com seu E-mail" id="email" type="email" autocomplete="off">
                            <i class="icon-append fa fa-envelope"></i>
                        </label>
                    </section>
                    
                    <section class="col-md-12">
                        <label class="input">
                            <i class="icon-append fa fa-lock"></i>
                            <input name="password" placeholder="Entre com sua senha" id="password" type="password" autocomplete="off">
                        </label>
                    </section>                                                           
                </div>
                <p align="center">
                    <label id="error"></label>
                </p>                
            </div>
            <div class="modal-footer">
                  <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
                  <button class="btn-u" type="submit"><i class="fa fa-paper-plane"></i> Cadastrar</button>
            </div>
        </div>
        </form>
  </div>
</div>
</div>

<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 100px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title" id="myModalLabel">
                    Login
                </h2>
            </div>
            
            <div class="modal-body">
                <?php
                $atributos = array('id'=>'form-login', 'class'=>'sky-form', 'method'=>'POST');
                echo form_open('login/loginValidate', $atributos);
                ?>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <br><br>
                            <section class="col-md-12">
                                <label class="input">
                                    <input name="email" placeholder="Entre com seu E-mail" id="email" type="email" autocomplete="off">
                                    <i class="icon-append fa fa-envelope"></i>
                                </label>
                            </section>
                            
                            <section class="col-md-12">
                                <label class="input">
                                    <i class="icon-append fa fa-lock"></i>
                                    <input name="password" placeholder="Entre com sua senha" id="password" type="password" autocomplete="off">
                                </label>
                            </section>
                            
                            <p align="center">
                                <label id="error"></label>
                            </p>
                            
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
                              <button class="btn-u" type="submit"><i class="fa fa-paper-plane"></i> Entrar</button>
                          </div>                                                    
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
  $msg = $this->session->userdata('msg');
  $this->session->unset_userdata('msg');
?> 

<script type="text/javascript">

  $( document ).ready(function() {

    var msg = '<?php echo $msg;?>'
    
    if (msg == 'email_equal')
    {

      $("#error").append('E-mail já cadastrado');
      $('#modal_quero_cadastrar_candidate').modal('toggle');
    }

  });

</script>
