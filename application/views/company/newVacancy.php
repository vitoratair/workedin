<section class="gray-bg padding-top-bottom" style="margin-top: 70px">
   <div class="container features">
      <h1 class="section-title">Nova Vaga</h1>

      <?php 
         $atributos = array('id'=>'vacancy', 'class'=>'sky-form', 'method'=>'POST');
         echo form_open('company/addVacancy', $atributos);
      ?>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                
                <section class="col-md-12">
                    <h4>Cargo</h4>
                    <label class="select">
                        <select name="position">
                            <option>Selecione um cargo</option>
                            {positions}
                            <option value="{positionId}" >{positionDescription}</option>
                            {/positions}
                        </select>
                        <i></i>
                    </label>
                </section>
                <section class="col-md-6">
                    <h4>Endereço</h4>
                    <label class="select">
                        <select name="address">
                            <option>Selecione um endereço</option>
                            {address}
                            <option value="{addressId}" >{addressDescription}</option>
                            {/address}
                        </select>
                        <i></i>
                    </label>
                </section>
                <section class="col-md-6">
                    <h4>Salário</h4>
                    <label class="input">
                        <i class="icon-append fa fa-asterisk"></i>
                        <input name="salary" id="salary" type="text">
                    </label>
                </section>
                <section class="col-md-6">
                    <h4>Horário inicial</h4>
                    <label class="select">
                        <select name="timeStart">
                            <option>Selecione um horário</option>
                            <?php foreach ($times as $time): ?>
                                <option value='<?php echo $time->timeId;?>' ><?php echo substr($time->timeDescription, 0, -3);?></option>
                            <?php endforeach; ?>
                        </select>
                        <i></i>
                    </label>
                </section>
                <section class="col-md-6">
                    <h4>Horário Final</h4>
                    <label class="select">
                        <select name="timeEnd">
                            <option>Selecione um horário</option>
                            <?php foreach ($times as $time): ?>
                                <option value='<?php echo $time->timeId;?>' ><?php echo substr($time->timeDescription, 0, -3);?></option>
                            <?php endforeach; ?>
                        </select>
                        <i></i>
                    </label>
                </section>
                <section class="col-md-12">
                    <h4>Benefícios</h4>
                    <div class="inline-group">
                        {benefits}
                        <label class="checkbox"><input type="checkbox" name="benefit[]" value="{benefitId}" ><i></i>{benefitDescription}</label>
                        {/benefits}
                    </div>
                </section>
                <section class="col-md-12">
                    <label class="textarea">
                        <i class="icon-append fa fa-comment"></i>
                        <textarea id="descriptions" name="descriptions"  rows="4" placeholder="Atividades que serão desempenhadas"></textarea>
                    </label>
                </section>
            </div>
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




