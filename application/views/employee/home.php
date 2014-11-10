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
                <input list="vagas" placeholder="Procure por vagas" name="vagas" class="form-control"
                  style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">
                <datalist id="vagas">
                  <option value="analista de marketing">
                  <option value="analista de pd">
                  <option value="analista técnico">
                  <option value="garçom">
                  <option value="Pedreiro">
                </datalist>
              </div>
            </div>
          </section>
        </div>

        <div class="col-md-3">
          <section>
            <div class="form-group" >
              <div class="input-group">
                <input list="salarios" placeholder="Salário" name="vagas" class="form-control"
                  style="box-shadow: 0 2px 1px #72c02c; border: 0px; height: 40px; background: #f3f3f3; border-radius: 0px">
                <datalist id="salarios">
                  <option value="Até 800">
                  <option value="Até 1500">
                  <option value="Acima de 1501">
                </datalist>
                <div class="input-group-addon" style="padding: 0px 0px ;border: 0px; background-color: transparent">
                  <a href="#" class="btn btn-u"style="padding: 12px 39px; font-size: 15px; box-shadow: 0 3px 1px #72c02c" >
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


<div id="map" style="width: 100%; height: 100%;"></div>

<script type="text/javascript">

var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];

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
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP
        }
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

function carregarPontos() {

  $.getJSON('<?php echo base_url();?>assets/js/pontos.json', function(pontos) {
    var latlngbounds = new google.maps.LatLngBounds();
    
    $.each(pontos, function(index, ponto) {
      
      if (ponto.status == 'waiting')
      {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
            icon: '<?php echo base_url();?>assets/images/marcador_azul.png',        
        });
      }
      else
      {
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
            icon: '<?php echo base_url();?>assets/images/marcador_verde.png',       
            size: new google.maps.Size(20, 32), 
        });        
      }
      
      var myOptions = {
        content: "<p>" + ponto.Descricao + "</p>",
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
