<div id='cssmenu'>
   <ul>
      <li class="active"><a href='<?php echo base_url();?>index.php/employee/home/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/employee/perfil/'><span>Perfil</span></a></li>
      <li>
         <a href='<?php echo base_url();?>index.php/employee/notify/'>
         Histórico <span class="badge">{notificationNotRead}</span>
         </a>
      </li>
   </ul>
</div>

<div id="search-vacancy">
  <form id="" class="sky-form" action="#" method="post" novalidate>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-3">
          
          <section class="col-md-12">

              <label class="select">
                  <select name="position"
                  style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">
                      <option>Selecione um cargo</option>
                      {positions}
                      <option value="{positionId}" >{positionDescription}</option>
                      {/positions}
                  </select>                  
              </label>
          </section>          
          


        </div>

        <div class="col-md-3">
          <section>
            <div class="form-group" >
              <div class="input-group">
                <input list="salary" placeholder="Selecione o salário pretendido" id="salaries" name="salaries" class="form-control"
                  style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">
                  <datalist id="salary">
                     <option id="1" value="<800" />
                     <option id="2" value="<1500" />
                     <option id="3" value=">1500" />
                  </datalist>

                <div class="input-group-addon" style="padding: 0px 0px ;border: 0px; background-color: transparent">
                  <a href="#" onclick="deleteMarkers(); carregarPontos();" class="btn btn-u"style="padding: 12px 39px; font-size: 15px; box-shadow: 0 3px 1px #72c02c" >
                    <i class="fa fa-search"></i>
                  </a>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </form>
</div>

<div class="legend-maps">

      <p>
        <img src="<?php echo base_url();?>assets/images/marcador_azul.png" width="26px">
        Vagas abertas
        <br>
        <img src="<?php echo base_url();?>assets/images/marcador_verde.png" width="26px">
        Aguardando resposta
        <br>
        <img src="<?php echo base_url();?>assets/images/marcador_bandeira.png" width="26px">
        Currículo visualizado
        <br>
      </p>        
      </p>  

</div>

<div id="map" style="width: 100%; height: 100%;"></div>

<script type="text/javascript">

var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];


function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

function deleteMarkers() {
  setAllMap(null);
  markers = [];
}

function initialize() { 
  var latlng = new google.maps.LatLng(-27.575821, -48.517551);
  
    var options = {
        zoom: 10,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        panControl: false,

        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.RIGHT_TOP
        },
        scaleControl: true,
        streetViewControl: false,
    };


    map = new google.maps.Map(document.getElementById("map"), options);
}

initialize();

// function formatSalary(salary)
// {
//   var salary = salary.slice(0, -2);
//   return accounting.formatMoney(salary,[symbol = "R$ "],[precision = 2],[thousand = "."],[decimal = ","],[format = "%s%v"])
// }
 

function buildContent(ponto)
{
  var vacancy = ponto.Id;

  var contentPlace = "<div id='infobox'>";
  contentPlace += "<h4><b>Empresa:</b> " + ponto.company;
  contentPlace += "<br><b>Cargo:</b> " + ponto.position;
  // contentPlace += "<br><b>Salário:</b>" + formatSalary(ponto.salary);
  contentPlace += "<br><b>Salário:</b>" + ponto.salary;
  contentPlace += "<br><b>Descrição:</b>";
  contentPlace += "<small>" + ponto.description + "</small>";
  contentPlace += "</h4><br><br>";  
  contentPlace += "</div>";  

  if (ponto.status == null)
  {
    contentPlace += "<p align='center'>";
    contentPlace += "<a class='btn btn-u' href='<?php echo base_url();?>index.php/company/displayVacancy/" + vacancy + "/1'>Maiores informações</a>";
    contentPlace += "<a class='btn btn-u' href='<?php echo base_url();?>index.php/employee/newCombine/" + vacancy + "/1'>Aplicar-se a vaga</a>";
    contentPlace += "</p>";
  }
  else if (ponto.status == '1')
  {
    contentPlace += "<p align='center'>";
    contentPlace += "<a class='btn btn-u' href='<?php echo base_url();?>index.php/employee/delCombine/" + vacancy + "'>Desistir da vaga</a>";
    contentPlace += "</p>";
  }

  contentPlace += "</div></div>";

  return contentPlace;

}

function makeUrl(position, salary)
{
  var urlDefault = '<?php echo base_url();?>index.php/employee/getJobs/';

  if (position != undefined && salary == undefined){
    console.log('Só posição');
    urlDefault += position + '/-1';
  }
  else if (position == undefined && salary != undefined){
    console.log('Busca por salário');
    urlDefault += '-1/' + salary;
  }
  else if (position != undefined && salary != undefined){
    console.log('salário e posição');
    urlDefault += position + '/' + salary;
  }  

  console.log(position);
  console.log(salary);

  console.log(urlDefault);
  return urlDefault;

}

function carregarPontos() {

  var x = $('#position').val();  
  var z = $('#vacancy');  
  var val = $(z).find('option[value="' + x + '"]');    
  var positionId = val.attr('id'); 
  
  var x = $('#salaries').val();  
  var z = $('#salary');  
  var val = $(z).find('option[value="' + x + '"]');    
  var salaryId = val.attr('id');    

  var url = makeUrl(positionId, salaryId);
  
  $.getJSON(url, function(pontos) {

    var latlngbounds = new google.maps.LatLngBounds();
    
    $.each(pontos, function(index, ponto) {      
      console.log(ponto.status);
      if (ponto.status == null)
      {
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
          icon: '<?php echo base_url();?>assets/images/marcador_azul.png',
          size: new google.maps.Size(20, 32), 
        });        
      }

      else if (ponto.status == '1')
      {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
            icon: '<?php echo base_url();?>assets/images/marcador_verde.png',        
        });
      }

      else if (ponto.status == '2')
      {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
            icon: '<?php echo base_url();?>assets/images/marcador_bandeira.png',        
        });
      }      
      else if (ponto.status == '7')
      {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
            icon: '<?php echo base_url();?>assets/images/DESISTIU.png',        
        });
      }        
      var infowindow = new google.maps.InfoWindow(), marker;

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
              infowindow.setContent(buildContent(ponto));
              infowindow.open(map, marker);
          }
      })(marker));


      markers.push(marker);
      
      latlngbounds.extend(marker.position);
      
    });
    
    var markerCluster = new MarkerClusterer(map, markers);
    
    map.fitBounds(latlngbounds);
    
  });
  
}

carregarPontos();

</script>
