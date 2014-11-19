<div id='cssmenu'>
   <ul>
      <li class="active"><a href='<?php echo base_url();?>index.php/employee/home/'><span>Vagas</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/employee/perfil/'><span>Perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/employee/editPerfil/'><span>Editar perfil</span></a></li>
      <li><a href='<?php echo base_url();?>index.php/employee/notify/'><span>Notificações</span></a></li>
   </ul>
</div>

<div id="search-vacancy">
  <form id="contact-form" class="" action="#" method="post" novalidate>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-3">
          <section>
            <div class="form-group" >
              <div class="controls">
                <input list="vacancy" placeholder="Digite o vaga que você quer" id="position" name="position" class="form-control"
                  style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">
                <datalist id="vacancy">
                  {positions}
                   <option id="{positionId}" value="{positionDescription}" />
                  {/positions} 
                </datalist>
              </div>
            </div>
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
  var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
  
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

function abrirInfoBox(id, marker) {
  if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
    infoBox[idInfoBoxAberto].close();
  }

  infoBox[id].open(map, marker);
  idInfoBoxAberto = id;
}


function buildContent(ponto)
{
  var vacancy = ponto.Id;

  var contentPlace = "<div class='infobox-wrapper'>";
  contentPlace += "<div id='infobox'>";
  contentPlace += "<h5>" + ponto.position +  "</h5>";
  contentPlace += ponto.description; 
  contentPlace += "<br><br>";  

  if (ponto.status == null)
  {
    contentPlace += "<p align='center'>";
    contentPlace += "<a class='btn' href='<?php echo base_url();?>index.php/employee/newCombine/" + vacancy + "/1'>Aplicar-se a vaga</a>";
    contentPlace += "</p>";
  }
  else if (ponto.status == '1')
  {
    contentPlace += "<p align='center'>";
    contentPlace += "<a class='btn' href='<?php echo base_url();?>index.php/employee/delCombine/" + vacancy + "'>Desistir da vaga</a>";
    contentPlace += "</p>";
  }

  contentPlace += "</div></div>";

  return contentPlace;

}

function makeUrl(position, salary)
{
  var urlDefault = '<?php echo base_url();?>index.php/employee/getJobs/';

  if (position != undefined && salary == undefined){
    urlDefault += position
  }
  else if (position == undefined && salary != undefined){
    // console.log('Busca por salário');
  }
  else if (position != undefined && salary != undefined){
    // console.log('Busca por salário e posição');
  }  

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


      var contentPlace = buildContent(ponto);
      
      var myOptions = {          
        content: contentPlace,
        pixelOffset: new google.maps.Size(-150, 0)
      };

      infoBox[ponto.Id] = new InfoBox(myOptions);
      infoBox[ponto.Id].marker = marker;
      
      infoBox[ponto.Id].listener = google.maps.event.addListener(marker, 'click', function (e) {
        abrirInfoBox(ponto.Id, marker);
      });
      
      markers.push(marker);
      
      latlngbounds.extend(marker.position);
      
    });
    
    var markerCluster = new MarkerClusterer(map, markers);
    
    map.fitBounds(latlngbounds);
    
  });
  
}

carregarPontos();

</script>
