<div id='cssmenu'>
   <ul>
      <li class="active"><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Gerenciamento</span></a></li>
   </ul>
</div>

<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <div class="row">
         <div class="col-md-12">
            <div class="col-sm-6">
               <img class="img-responsive img-center" width="400px" src="<?php echo base_url();?>/assets/images/placeholder.png" alt="">
            </div>
            <div class="col-sm-6 scrollimation fade-left">
               <div class="col-sm-12">
                  <h1 class="big-title">
                  Workedin
                  </h1>
                  <p>
                     Descrição da empresa Descrição da empresa Descrição da empresa
                     Descrição da empresa Descrição da empresa Descrição da empresa
                  </p>

                  <h4>
                     CNPJ: <small>12.12323.12312/123123</small>
                  </h4>
                  <h4>Ramo de atividade: <small>recrutamento de pessoas</small></h4>
                  <h4>
                     Nome: <small>Alan Alan Alan</small> <strong>/</strong>
                  Telefone: <small>48 8888-7777</small>
                  </h4>
                  <h4>
                  Email: <small>teste@teste.com.br</small>
                  </h4>
                  <p align="right"><a class="btn btn-u" href="#">Editar</a></p>
               </div>
            </div>
         </div>

         <div class="col-md-12 col-md-offset-1">
         <hr>
            <div class="col-md-12">
               <div class="col-sm-6 col-sm-6">
                  <h2>Endereços</h2>
               </div>
            </div>

            <div class="col-sm-6 col-sm-6 scrollimation fade-left">
               <div class="media scrollimation fade-left">
                  <div class="icon pull-left">
                     <i class="media-object icon-1 fa fa-road"></i>
                     <i class="media-object icon-2 fa fa-road"></i>
                  </div>
                  <div class="media-body">
                     <h3>Matriz</h3>
                     <p>
                     <h4>
                        Rua: <small>Marino Jorge dos Santos </small> <strong> / </strong>
                        Número: <small>820</small><br>
                        Cidade: <small>Palhoça </small> <strong> / </strong>
                        Estado: <small>Santa Catarina</small>
                     </h4>
                     </p>
                  </div>
               </div>
            </div>

            <div class="col-sm-6 col-sm-6 scrollimation fade-left">
               <div class="media scrollimation fade-left">
                  <div class="icon pull-left">
                     <i class="media-object icon-1 fa fa-road"></i>
                     <i class="media-object icon-2 fa fa-road"></i>
                  </div>
                  <div class="media-body">
                     <h3>Sede 1</h3>
                     <p>
                     <h4>
                        Rua: <small>Marino Jorge dos Santos </small> <strong> / </strong>
                        Número: <small>820</small><br>
                        Cidade: <small>Palhoça </small> <strong> / </strong>
                        Estado: <small>Santa Catarina</small>
                     </h4>
                     </p>
                  </div>
               </div>
            </div>

            <div class="col-sm-6 col-sm-offset-5 scrollimation fade-left">
               <p align="right"><a class="btn btn-u" href="#" data-toggle="modal" data-target="#modal_cadastrar_empresa">Novo endereço</a></p>
            </div>

         </div>
      </div>
   </div>
</section>


<div class="modal fade" id="modal_cadastrar_empresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="margin-top: 100px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h2 class="modal-title" id="myModalLabel">Novo endereço</h2>
         </div>
         <div class="modal-body">
            <form action="home_submit" class="sky-form" method="POST">
               <div class="row">
                  <div class="col-md-12" align="center">
                     <fieldset>
                        <section class="col-md-12">
                           <label class="label">Nome</label>
                              <label class="input">
                                 <input type="text" placeholder="Nome para identificá-lo" name="name" id="name">
                             </label>
                        </section>

                        <section class="col-md-6">
                           <label class="select">
                              <select name="estado">
                                 <option value="0">Estado</option>
                                 <option value="1">Male</option>
                                 <option value="2">Female</option>
                                 <option value="3">Other</option>
                              </select>
                           </label>
                        </section>

                        <section class="col-md-6">
                           <label class="select">
                              <select>
                                 <option value="0">Cidade</option>
                                 <option value="1">Alexandra</option>
                                 <option value="2">Alice</option>
                                 <option value="3">Anastasia</option>
                                 <option value="4">Avelina</option>
                              </select>
                           </label>
                        </section>

                        <section class="col-md-6">
                              <label class="input">
                                 <input type="text" placeholder="Rua / Avenida" name="name" id="name">
                             </label>
                        </section>

                        <section class="col-md-6">
                              <label class="input">
                                 <input type="text" placeholder="Número" name="name" id="name">
                             </label>
                        </section>
                     </fieldset>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-u">Salvar</button>
         </div>
      </div>
   </div>
</div>