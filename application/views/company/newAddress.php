<section class="gray-bg padding-top-bottom" style="margin-top: 70px">
   <div class="container features">
<div class="container features">
      <h1 class="section-title">Novo Endereço</h1>
   </div>      
      <div class="row">
         <div class="col-md-10 col-md-offset-1">
            <div class="col-md-12">
               <form method="post" id="form-newAddress" action="<?php echo base_url();?>index.php/company/addAddress">
                  
                  <input type="hidden" id="txtLatitude" name="txtLatitude" />
                  <input type="hidden" id="txtLongitude" name="txtLongitude" />
                  <input type="hidden" id="city" name="city"/>
                  
                  <div class="col-md-12">
                     <section>
                        <div class="form-group" >
                           <div class="input-group">
                              <input type="text" placeholder="Escreva aqui o endereço, ou clique e arraste o balão pelo mapa" id="txtEndereco" name="txtEndereco" class="form-control"
                              style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">
                              
                              <div class="input-group-addon" style="padding: 0px 0px ;border: 0px; background-color: transparent">
                                 <input type="button"  class="btn btn-u" id="btnEndereco" name="btnEndereco" value="Exibir"
                                 style="padding: 12px 39px; font-size: 15px; box-shadow: 0 3px 1px #72c02c">
                              </div>
                           </div>
                        </div>
                     </section>
                  </div>
                  <div id="mapa"></div>
                  <br>
                  <div class="col-md-6 col-md-offset-6" align="right">
                     <section>
                        <div class="form-group" >
                           <div class="input-group">
                              <input type="text" placeholder="Entre com um nome. Ex: Matriz ou Filia Shopping" id="addressName" name="addressName" class="form-control"
                           style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">                              
                              
                              <div class="input-group-addon" style="padding: 0px 0px ;border: 0px; background-color: transparent">
                                 <a href="#" onclick='$("#btnEndereco").click();' data-toggle="modal" data-target="#modal_confirm_new_address" class="btn btn-u submit" style="padding: 12px 20px; font-size: 15px; box-shadow: 0 3px 1px #72c02c">
                                    Salvar
                                 </a>
                              </div>
                           </div>
                        </div>
                     </section>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>


<div class="modal fade" id="modal_addressEmpty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top: 100px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h2 class="modal-title">
           Adicionar um novo endereço
        </h2>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-10">
            <div>
               
               Notamos que você ainda não possui um endereço cadastrado, endereços
               são importantantes para cadastrar vagas, através dele que os candidatos
               verão sua vaga no mapa.

            </div>
          </div>      
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-u btn-u-default" data-dismiss="modal">
          Entendi
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_confirm_new_address" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top: 100px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h2 class="modal-title">
           Confirmar endereço
        </h2>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-10">
            <div id="confirm-content"></div>
          </div>      
        </div>
      </div>
      <div class="modal-footer">
         <button onclick='$( "#form-newAddress" ).submit();' class="btn btn-u">
            <i class="fa fa-paper-plane"></i> Salvar
         </button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

var geocoder;
var map;
var marker;

function initialize() {
   var latlng = new google.maps.LatLng(-27.594521, -48.551529);
   var options = {
      zoom: 10,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
   };
   
   map = new google.maps.Map(document.getElementById("mapa"), options);
   
   geocoder = new google.maps.Geocoder();
   
   marker = new google.maps.Marker({
      map: map,
      draggable: true,
   });
   
   marker.setPosition(latlng);
}

function buildModal(results)
{

   $( "#confirm-content" ).empty();

   $.each( results ,function(key, val) {                  
      $.each( val,function(key1, parser) {

         if (parser.types)
         {
            if (parser.types[0] ==  'administrative_area_level_1')
               $( "#confirm-content" ).append("<h4>Estado: <small>" + parser.short_name + "</small></h4>");                  

            if (parser.types[0] ==  'administrative_area_level_2'){   
               $( "#confirm-content" ).append("<h4>Cidade: <small>" + parser.long_name + "</small></h4>");               
               $("#city").val(parser.short_name);
            }

            if (parser.types[0] ==  'neighborhood')
               $( "#confirm-content" ).append("<h4>Bairro: <small>" + parser.long_name + "</small></h4>");                                                                  
         }

      });
   });


   if ($("#city").val() == '')
   {
      $( "#confirm-content" ).append("<h4>Não foi possível selecionar um endereço, favor tentar novamente.</h4>");                  
   }
   else if ( $('#addressName').val() == '')
      $( "#confirm-content" ).append("<h4>Entre com um nome para o endereço.</h4>");                  


}

$(document).ready(function () {

   initialize();
   
   function carregarNoMapa(endereco) {
      geocoder.geocode({ 'address': endereco + ', Brasil', 'region': 'BR' }, function (results, status) {
         
         if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {                        

               var latitude = results[0].geometry.location.lat();
               var longitude = results[0].geometry.location.lng();                  

               buildModal(results[0]);

               $('#txtEndereco').val(results[0].formatted_address);
               $('#txtLatitude').val(latitude);
                     $('#txtLongitude').val(longitude);
      
               var location = new google.maps.LatLng(latitude, longitude);
               marker.setPosition(location);
               map.setCenter(location);
               map.setZoom(16);
            }
         }
      })
   }
   
   $("#btnEndereco").click(function() {
      if($(this).val() != "")
         carregarNoMapa($("#txtEndereco").val());
   })
   
   $("#txtEndereco").blur(function() {
      if($(this).val() != "")
         carregarNoMapa($(this).val());
   })
   
   google.maps.event.addListener(marker, 'drag', function () {
      geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
         if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {  
               $('#txtEndereco').val(results[0].formatted_address);
               $('#txtLatitude').val(marker.getPosition().lat());
               $('#txtLongitude').val(marker.getPosition().lng());
            }
         }
      });
   });
   
   $("#txtEndereco").autocomplete({
      source: function (request, response) {
         geocoder.geocode({ 'address': request.term + ', Brasil', 'region': 'BR' }, function (results, status) {
            response($.map(results, function (item) {
               return {
                  label: item.formatted_address,
                  value: item.formatted_address,
                  latitude: item.geometry.location.lat(),
                     longitude: item.geometry.location.lng()
               }
            }));
         })
      },
      select: function (event, ui) {
         $("#txtLatitude").val(ui.item.latitude);
         $("#txtLongitude").val(ui.item.longitude);
         var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
         marker.setPosition(location);
         map.setCenter(location);
         map.setZoom(16);
      }
   });

});
</script>

<script type="text/javascript">
  
  $( document ).ready(function() {

    var addressEmpty = '<?php echo $msg;?>'

    if (addressEmpty == 'addressEmpty')
      $('#modal_addressEmpty').modal('toggle');      

  });

$( "#form-newAddress" ).submit(function( event ) {
     
   if ( $('#addressName').val() == '')
      event.preventDefault();
   else
      $('#modal_confirm_new_address').modal('toggle');      
});
</script>
  
