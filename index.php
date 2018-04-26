<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 22_AJAX_Cities</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/css/styles.css"> 
        <link rel="stylesheet" href="/maps/documentation/javascript/demos/demos.css">
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/ajax.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="container">
            <div class="row">                
                <div class="col-12 col-lg-10 col-md-10 col-sm-10 col-xl-10 pt-5 pb-5">
                    <h2>City Data</h2>
                    <hr>                    
                </div>

                <div class="col-12 col-lg-10 col-md-10 col-sm-10 col-xl-10">
                    <label>
                        <select name="country" class="form-control">
                            <option>Please select country</option>
                        </select>                   
                    </label>
                </div>
                <div class="col-12 col-lg-10 col-md-10 col-sm-10 col-xl-10">    
                    <label>
                        <select name="province" class="form-control">
                            <option>Please select province</option>
                        </select>
                    </label>
                </div>
                <div class="col-12 col-lg-10 col-md-10 col-sm-10 col-xl-10">
                    <label>
                        <select name="city" class="form-control">
                            <option>Please select city</option>
                        </select>
                    </label>
                </div>
                <hr class="mt-5">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xl-12 w-6">
                    <label><h3>City-Informationen</h3>
                        <table class="table table-bordered">
                            <thead class="table-secondary">
                                <tr>
                                    <th>ISO-Code</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Country</th>
                                    <th>Population</th>
                                </tr>                                
                            </thead>
                            <tbody>
                                <tr class="tableInfoTr">
                                    <td id="iso3">Countrycode</td>
                                    <td id="city1">City</td>
                                    <td id="province">Province</td>
                                    <td id="country">Country</td>
                                    <td id="pop">Population</td>
                                </tr>
                            </tbody>

                        </table>
                    </label>
                </div>
                <hr>
            </div>                
            <!--button id="mapbtn" type="button">map</button-->
            <div id="map"></div>
            <!--a href="https://www.google.de/maps/dir//Nikolassee,+Berlin/@52.4578848,13.1521705,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x47a85908fd725847:0x8bc8ad981d8e90d0!2m2!1d13.1909568!2d52.4426533" target="_blank" class="btn btn-info"></a-->

        </div>
    </div>
    <script src="assets/js/main.js" type="text/javascript"></script>    
    <script>
//      var btn = document.querySelector('#mapbtn');
//          btn.addEventListener('click', function () {
//              initMap(39.384493,2.342243);
//          });
      var LAT = 42.121274;
      var LNG = 9.536878;

      function initMap() {
          if (arguments.length === 2) {
              LAT = arguments[0];
              LNG = arguments[1];
          }
          var pos = {lat: LAT, lng: LNG};
          //var pos={lat:latitude, lng:longitude};
          // Create a map object and specify the DOM element for display.
          var map = new google.maps.Map(document.getElementById('map'), {
              center: pos,
              zoom: 8
          });
          var marker = new google.maps.Marker({
              position: pos,
              map: map
          });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAk2EwTT8hhy4jBCuiM9OvYJhGkG5EX2wI&callback=initMap"

    async defer></script>



</body>
</html>
