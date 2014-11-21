<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li class='active'><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Entrevistas</span></a></li>
   </ul>
</div>
<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <h1 class="section-title">Nova Vaga</h1>

      <?php 
         $atributos = array('id'=>'contact-form', 'class'=>'col-sm-8 col-sm-offset-2 contact-form', 'method'=>'POST');
         echo form_open('company/addVacancy', $atributos);
      ?>
         <div class="row">

            <section class="col-md-12">
               <div class="form-group">
                  <p>Cargo</p>
                  <div class="controls">
                  <input type="text" placeholder="Digite o cargo desejado" class="form-control" list="positions" name="position" />
                    <datalist id="positions">
                      {positions}
                       <option id="{positionId}" value="{positionDescription}" />
                      {/positions}                        
                    </datalist>
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Endereço</p>
                  <div class="controls">
                     <select class="form-control" name="address">
                       <option>Selecione um endereço</option>
                       {address}
                       <option value="{addressId}" >{addressDescription}</option>
                       {/address}
                     </select>
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Salário</p>
                  <div class="controls">
                     <input name="salary" id="salary" placeholder="R$ 00,00" class="form-control" type="text">
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Horário inicial</p>
                  <div class="controls">
                     <select class="form-control" name="timeStart">
                       <option>Selecione um horário</option>
                       {times}
                       <option value="{timeId}" >{timeDescription}</option>
                       {/times}
                     </select>
                  </div>
               </div>
            </section>

            <section class="col-md-6">
               <div class="form-group">
                  <p>Horário final</p>
                  <div class="controls">
                     <select class="form-control" name="timeEnd">
                       <option>Selecione um horário</option>
                       {times}
                       <option value="{timeId}" >{timeDescription}</option>
                       {/times}
                     </select>
                  </div>
               </div>
            </section>

            <section class="col-md-12">
               <div class="form-group">
                  <p>Benefícios</p>
                     <div class="inline-group">
                     {benefits}
                        <input type="checkbox" name="benefit[]" value="{benefitId}" > {benefitDescription}
                     {/benefits}                       
                     </div>
               </div>
            </section>

            <section class="col-md-12">
               <div class="form-group">
                  <div class="controls">
                     <p>Descrição da vaga</p>
                     <textarea id="contact-message" name="descriptions"  placeholder="Atividades que serão desempenhadas" class="form-control requiredField" rows="8" data-error-empty="Please enter your message"></textarea>
                  </div>
               </div>
            </section>

            <p class="text-center">
               <button name="submit" type="submit" class="btn btn-quattro" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent">
                  <i class="fa fa-paper-plane"></i>Salvar Vaga
               </button>
            </p>
            <input type="hidden" name="submitted" id="submitted" value="true" />
         </div>
      </form>

   </div>
</div>
</section>


<script type="text/javascript">
   
   $( document ).ready(function() { 
      $('#salary').mask('000.000.000.000.000,00', {reverse: true});
   });
  
</script>



