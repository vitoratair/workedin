<div id='cssmenu'>
   <ul>
      <li><a href='<?php echo base_url();?>index.php/company/home/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/vacancy/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/company/management/'><span>Entrevistas</span></a></li>
   </ul>
</div>

<section class="gray-bg padding-top-bottom">
   <div class="container features">
      <h1 class="section-title">Editar Endereço</h1>
   </div>

   <div class="row">
      <div class="col-md-12">
         <div class="col-md-10 col-md-offset-2">
            <form method="post" id="form-newAddress" action="<?php echo base_url();?>index.php/company/aupdateAddress" class="contact-form">
               <div class="col-md-8 col-md-offset-1">
                  <section>
                     <div class="form-group" >
                        <div class="input-group">
                           <input type="text" placeholder="Clique e arraste" id="txtEndereco" name="txtEndereco" class="form-control"
                           style="box-shadow: 0 2px 1px #72c02c; border: 0px; width: 550px; height: 40px; background: #f3f3f3; border-radius: 0px">
                                                
                           <div class="input-group-addon" style="padding: 0px 0px ;border: 0px; background-color: transparent">
                              <input type="button"  class="btn btn-u" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa"
                              style="padding: 12px 39px; font-size: 15px; box-shadow: 0 3px 1px #72c02c"/>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>

               <div id="mapa"></div>
               
               <input type="hidden" id="txtLatitude" name="txtLatitude" />
               <input type="hidden" id="txtLongitude" name="txtLongitude" />
               <input type="hidden" id="addressId" name="addressId" value="{addressId}" />
               <div class="col-md-6 col-md-offset-2">
                  <section>
                     <div class="form-group" >
                        <div class="input-group">
                           <input type="text" value="{addressName}" id="addressName" name="addressName" class="form-control"
                           style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">
                                                
                           <div class="input-group-addon" style="padding: 0px 0px ;border: 0px; background-color: transparent">
                              <input type="submit" class="btn btn-u submit" value="Salvar" 
                              style="padding: 12px 39px; font-size: 15px; box-shadow: 0 3px 1px #72c02c"/>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>

            </form>
         </div>
      </div>
   </div>
</section>

<script type="text/javascript">

var geocoder;
var map;
var marker;

function initialize() {

   var latlng = new google.maps.LatLng('{lat}', '{lon}');
   var options = {
      zoom: 15,
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

$(document).ready(function () {

   initialize();
   
   function carregarNoMapa(endereco) {
      geocoder.geocode({ 'address': endereco + ', Brasil', 'region': 'BR' }, function (results, status) {
         console.log(results);
         if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
               var latitude = results[0].geometry.location.lat();
               var longitude = results[0].geometry.location.lng();
      
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
   
$( "#form-newAddress" ).submit(function( event ) {
  
  if ( $('#addressName').val() == '')
      event.preventDefault();
});


</script>
  
