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
        <div class="col-md-2"></div>
        
        <div class="col-md-3">
          
          <section class="col-md-12">
              <label class="select">
                  <select id="position" name="position"
                  style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">
                      <option value="-1" >Selecione um cargo</option>
                      {positions}
                      <option value="{positionId}" >{positionDescription}</option>
                      {/positions}
                  </select>                  
              </label>
          </section>  

        </div>

        <div class="col-md-3">
          <section class="col-md-12" >
              <label class="select">
                  <select id="salary" name="salary"
                  style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">
                      <option value="-1" >Selecione o salário</option>
                      <option value="1000-0" >Até R$ 1000,00</option>
                      <option value="1001-1500" >Entre R$ 1001,00 e R$ 1500,00</option>
                      <option value="1501-1000000" >Acima de R$ 1500,00</option>
                  </select>   
              </label>                
          </section>           
        </div>

        <div class="col-md-2" align="left">
          <div class="input-group-addon" style="padding: 0px 0px ;border: 0px; background-color: transparent">
            <a href="#" onclick="deleteMarkers(); carregarPontos();" class="btn btn-u"style="padding: 12px 39px; font-size: 15px; box-shadow: 0 3px 1px #72c02c" >
              <i class="fa fa-search"></i> Procurar vaga
            </a>
          </div>      
        </div>
                                 
        <div class="col-md-3" align="left"></div>


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


<div class="modal fade" id="modal_information" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top: 100px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h2 class="modal-title" id="modal_informationLabel"></h2>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-10">
            <table>
              <tr>
                <td width="30%" align="left">
                  <h4>Salário:</h4>
                </td>
                <td id="tableSalary">
                  
                </td>
              </tr>
              <tr>
                <td>
                  <h4>Horário de trabalho:</h4>
                </td>
                <td id="tableTimeStart"></td>
              </tr>
              <tr>
                <td>
                  <h4>Benefícios:</h4>
                </td>
                <td>
                  <h4><small id="tableBenefits">
                    
                  </small></h4>
                </td>
              </tr>
              <tr>
                <td>
                  <h4>Descrição</h4>
                </td>
                <td id="tableDescription"></td>
              </tr>              
            </table>
          </div>      
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

var map;
var infowindow = [];
var markers = [];
var markerClusterer;


function showInformation(vacancy)
{
  var url = '<?php echo base_url();?>index.php/employee/displayVacancy/' + vacancy;

  $("#tableSalary").empty();

  $.getJSON( url, function( data ) {
    
    var vacancy = data.vacancy[0];
    var timeStart = data.timeStart.slice(0,-3);
    var timeEnd = data.timeEnd.slice(0,-3);
    var benefits = data.benefits;

    $("#modal_informationLabel").empty();
    $( "#tableSalary").empty();
    $( "#tableBenefits").empty();
    $( "#tableDescription").empty();
    $( "#tableTimeStart").empty();
    

    $( "#modal_informationLabel" ).append(vacancy.vacancyPosition);
    $( "#tableSalary" ).append("<h4><small> " + accounting.formatMoney(vacancy.vacancySalary, "R$ ", 2, ".", ",") + "</small></h4>");
    $( "#tableTimeStart" ).append("<h4><small> Das " + timeStart + " às " + timeEnd + "</small></h4>");
    
    $.each( benefits, function( key, val ) {
        $( "#tableBenefits" ).append(val.benefitDescription + " - ");
    });

    $( "#tableDescription" ).append("<h4><small> " + vacancy.vacancyDescription + "</small></h4>");

    });

  $('#modal_information').modal('toggle');
}

function closeAllInfoWindows() {
  for (var i=0;i<infowindow.length;i++) {
     infowindow[i].close();
  }
}

function clearMarkers(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);    
  }
}

function deleteMarkers() {  
  clearMarkers(null);
  markers = [];
  markerClusterer.clearMarkers();
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

function buildContent(ponto)
{
  var hasPerfil = '<?php echo $hasPerfil;?>';
  var vacancy = ponto.Id;

  var contentPlace = "<div id='infobox'>";
  contentPlace += "<h4><b>Empresa:</b> " + ponto.company;
  contentPlace += "<br><b>Cargo:</b> " + ponto.position;
  contentPlace += "<br><b>Salário:</b>" + accounting.formatMoney(ponto.salary, "R$ ", 2, ".", ",");
  contentPlace += "<br><b>Descrição:</b>";
  contentPlace += "<small> " + ponto.description + "</small>";
  contentPlace += "</h4><br><br>";  
  contentPlace += "</div>";  

  
  if (hasPerfil == 0)
  {
    contentPlace += "<p align='center'>";
    contentPlace += "<a class='btn btn-u' href='#' onclick='showInformation(" + vacancy + ")' ><i class='fa fa-plus'></i> informações</a>";
    contentPlace += "<a class='btn btn-u' href='<?php echo base_url();?>index.php/employee/employeeEmpty/'>Quero essa vaga</a>";
    contentPlace += "</p>";    
    contentPlace += "</div></div>";
    return contentPlace;    
  }

  if (ponto.status == null || ponto.status == '7')
  {
    contentPlace += "<p align='center'>";
    contentPlace += "<a class='btn btn-u' href='#' onclick='showInformation(" + vacancy + ")' ><i class='fa fa-plus'></i> informações</a>";
    contentPlace += "<a class='btn btn-u' href='<?php echo base_url();?>index.php/employee/newCombine/" + vacancy + "/1'>Quero essa vaga</a>";
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

  if (position == -1)
    position = undefined

  if (position != undefined && salary == undefined){
    urlDefault += position + '/-1';
  }
  else if (position == undefined && salary != undefined){
    urlDefault += '-1/' + salary;
  }
  else if (position != undefined && salary != undefined){
    urlDefault += position + '/' + salary;
  } 
  console.log(urlDefault);
  return urlDefault;
}

function carregarPontos() { 

  var positionId = $('#position').val();  
  var salaryId = $('#salary').val();
  
  var url = makeUrl(positionId, salaryId);

  $.getJSON(url, function(pontos) {              
    var latlngbounds = new google.maps.LatLngBounds();    
    
    $.each(pontos, function(index, ponto) {      
      console.log('CARGO = ' + ponto.position);

      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
        icon: '<?php echo base_url();?>assets/images/markers/' + ponto.status + '.png' 
      });    

      infowindow = new google.maps.InfoWindow(), marker;

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {              
              infowindow.setContent(buildContent(ponto));
              infowindow.open(map, marker);
              closeAllInfoWindows();
          }
      })(marker));

      markers.push(marker);

      latlngbounds.extend(marker.position);
      
    });
    
    markerClusterer = new MarkerClusterer(map, markers);
    map.fitBounds(latlngbounds);        
    
  });
}

carregarPontos();

</script>
