<!DOCTYPE html>
<html>
  <head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57899999-2', 'auto');
  ga('send', 'pageview');

</script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jqx.base.css" type="text/css"/>
    <title>Yearbook 2014</title>
    <style type="text/css">
        #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 5px
        }
    
        html, body {
            height: 100%;
            width: 100%;
            margin-top: 0px;
            margin-left: 0px;
            margin-right: 0px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            overflow: hidden;
            background-color: #eee;
        }
        
        .lower {
            overflow:scroll;
        }
        
        .labels {
             color: red;
             background-color: white;
             font-family: "Lucida Grande", "Arial", sans-serif;
             font-size: 10px;
             font-weight: bold;
             text-align: center;
             width: 100px;
             border: 1px solid black;
             white-space: nowrap;
        }
    </style>
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.js"></script>    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script type="text/javascript" src="js/jqxcore.js"></script>
    <script type="text/javascript" src="js/jqxbuttons.js"></script>
    <script type="text/javascript" src="js/jqxsplitter.js"></script>
    <script type="text/javascript" src="js/markerwithlabel.js"></script>
    <script type="text/javascript" src="js/markerclusterer.js"></script>
    <script type="text/javascript" src="js/users.js"></script>
    <script>    
        
    $(document).ready(function () {
        $('#splitter').jqxSplitter({ width: '100%', height: '100%', panels: [{ size: '34%'}, { size: '66%'}] });
    });    
        
    var myMark;
    var myLatlng
    var map;
        
    function loadStudents() {
        for(var i = 0; i < users.length; i++) {
            if(users[i][7] == 'A') {
                document.write('<tr>');
                document.write('<td><center>' + users[i][0] + '</center></td>');
                document.write('<td><center><img src="img/icon_' + users[i][1] + '"/></center></td>');
                document.write('<td><center>'+
                               '<a href="javascript:centerMapOnUser('+users[i][5]+','+users[i][6]+');">' + users[i][2] + '</a>'+                                '</center></td>');
                document.write('<td><center>' + users[i][3] + '</center></td>');
                document.write('<td><center>' + users[i][4] + '</center></td>');
                document.write('</tr>');
            }
        }
    }    
        
    function loadTeachers() {
        for(var i = 0; i < users.length; i++) {
            if(users[i][7] == 'P') {
                document.write('<tr>');
                document.write('<td><center>' + users[i][0] + '</center></td>');
                document.write('<td><center><img src="img/icon_' + users[i][1] + '"/></center></td>');
                document.write('<td><center>'+
                               '<a href="javascript:centerMapOnUser('+users[i][5]+','+users[i][6]+');">' + users[i][2] + '</a>'+                                '</center></td>');
                document.write('<td><center>' + users[i][3] + '</center></td>');
                document.write('<td><center>' + users[i][4] + '</center></td>');
                document.write('</tr>');
            }
        }
    }   
        
    function getMyInformation() {
        document.getElementById("txtLat").setAttribute("value", myLatlng.lat());
        document.getElementById("txtLng").setAttribute("value", myLatlng.lng());
    }
        
    function centerMap() {
        map.setCenter(myLatlng);
        map.setZoom(12);
    }
        
    function resetMap() {
        map.setCenter(myLatlng);
        map.setZoom(5);
    }   
        
    function initialize() {
        getLocation();
    }    
        
    function getLocation() {
        if (navigator.geolocation)
            navigator.geolocation.getCurrentPosition(showPosition, onError);
    }

    function showPosition(position) {
        myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        completeInitialization(myLatlng);
    }    
        
    function onError() {
        myLatlng = new google.maps.LatLng(-19.931, -44.141); //Load a default value
        completeInitialization(); 
    }
        
    function completeInitialization() {
        var mapOptions = {
            zoom: 5,
            center: myLatlng,
            panControl: true,
            zoomControl: true,
            scaleControl: true
        };
        
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        
        myMark = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: "Eu",
            animation: google.maps.Animation.DROP
        });
        
        var markers = [];
        
        for (var i = 0; i < users.length; i++) {
            
            var marker = new MarkerWithLabel({
                position: new google.maps.LatLng(users[i][5], users[i][6]),
                draggable: false,
                raiseOnDrag: false,
                map: map,
                labelContent: users[i][2],
                labelAnchor: new google.maps.Point(50, -2),
                labelClass: "labels", // the CSS class for the label
                icon: 'img/icon_' + users[i][1]
            });
            
            var message = 
                '<section>'+
                    '<img src="img/' + users[i][1] + '" alt="' + users[i][1] + '"/><br><br>'+
			        '<p>Nome: '+ users[i][2] + '</p>'+
			        '<p>Cidade: '+ users[i][3] + '</p>'+
			        '<p>Estado: '+ users[i][4] + '</p>'+
		        '</section>'
            
            addInfoWindow(marker, message, map);
            
            markers.push(marker);
        }
        var markerCluster = new MarkerClusterer(map, markers);
    }
        
    function addInfoWindow(marker, message, map) {
        var info = message;
        var infoWindow = new google.maps.InfoWindow({
            content: message,
            position: marker.position
            
        });

        google.maps.event.addListener(marker, 'click', function() {
            infoWindow.open(map, marker);
        });
    }  
        
    function centerMapOnUser(lat, lon) {
        map.setCenter(new google.maps.LatLng(lat, lon));
        map.setZoom(16);
    }
        
    google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>
<body>
    <div class="row">
        <center><h1>Yearbook 2014</h1></center>
    </div>
    <div id=nav>
            <ol class="breadcrumb">
                <li><a href="javascript:history.back(-1);"><span class="glyphicon glyphicon-home"></span>   Home</a> <span class="divider"></span></li>
                <li class="active">Mapa de Usuários</li>
            </ol>
        </div>
    <div style="border: none;" id='splitter'>
        <div class="lower">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-user"></span>   Alunos
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td><center><b>Id</b></center></td>
                                    <td><center><b>Foto</b></center></td>
                                    <td><center><b>Nome</b></center></td>
                                    <td><center><b>Cidade</b></center></td>
                                    <td><center><b>Estado</b></center></td>
                                </tr>
                                <script>
                                    loadStudents();
                                </script>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <span class="glyphicon glyphicon-tower"></span>   Professores
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td><center><b>Id</b></center></td>
                                    <td><center><b>Foto</b></center></td>
                                    <td><center><b>Nome</b></center></td>
                                    <td><center><b>Cidade</b></center></td>
                                    <td><center><b>Estado</b></center></td>
                                </tr>
                                <script>
                                    loadTeachers();
                                </script>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThird">
                                <span class="glyphicon glyphicon-cog"></span>   Minhas Informações
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThird" class="panel-collapse collapse">
                        <div id="myinformation" class="panel-body">
                            <div class="grid-form">                                
                                <div data-row-span="12">
                                    <div data-field-span="1">
                                        <br>
                                        <center><input type="button" onclick="javascript:centerMap();" value="Minha Localização" class="btn"/>
                                        <input type="button" onclick="javascript:resetMap();" value="Redefinir Zoom" class="btn"/></center>
                                        <br>
                                    </div>
                                </div>
                                <div data-row-span="12">
                                    <div data-field-span="1">
                                        <label>Latitude</label> 
                                        <input type="text" id="txtLat" class="form-control" readonly="true"/>
                                        <br>
                                    </div>
                                </div>
                                <div data-row-span="12">
                                    <div data-field-span="1">
                                        <label>Longitude</label> 
                                        <input type="text" id="txtLng" class="form-control" readonly="true"/>
                                        <br>
                                    </div>
                                </div>
                                <div data-row-span="12">
                                    <div data-field-span="1">
                                    <center>
                                        <input type="button" onclick="javascript:getMyInformation();" value="Obter Minha Localização" class="btn"/>
                                    </center>
                                    <br>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div id="map-canvas"></div>
        </div>
    </div>
</body>
</html>