<div class="container-fluid">

		
        <div class="row">
            <div class="col-8">
               
 

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Store <?php echo $edc->merchant_code; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo site_url('admin/batch/updateEDC'); ?>" method="post">
                            <div class="card-body">


                            <div class="row">
                                <div class="col">


                                    <div class="form-group">
                                        <label for="input">BRILink Code</label>
                                        <input type="text" class="form-control" id="merchant_code" name="merchant_code" placeholder="Enter code" value="<?php echo $edc->merchant_code ?>" required> 
                                    </div>
                                    <div class="form-group">
                                        <label for="input">BRILink Name</label>
                                        <input type="text" class="form-control" id="merchant_name" name="merchant_name" placeholder="Enter Name" value="<?php echo $edc->merchant_name ?>" required>
                                    </div>
                                    <div class="form-group">
                                            <label for="input">EDC SN</label>
                                            <input readonly="readonly"  type="text" class="form-control" id="sn"  name="sn" placeholder="Enter serial number" value="<?php echo $edc->sn ?>" required>
                                    </div>

                                    <div class="form-group">
                                            <label for="input">Area</label>
                                            <input type="text" class="form-control" id="area"  name="area" placeholder="Enter Area" value="<?php echo $edc->area ?>" required>
                                    </div>
                                   
                                    <div class="form-group">
                                            <label for="input">Kantor Wilayah</label>
                                            <input type="text" class="form-control" id="kanwil" name="kanwil" placeholder="Enter kantor wilayah" value="<?php echo $edc->kanwil ?>" required>
                                    </div>
                                   
                                    



                                </div>

                                <div class="col">

                                        
                                        <div class="form-group">
                                            <label for="input">Longitude</label>
                                            <input class="form-control"  type="text"   readonly  id="lng" name="longitude" placeholder="Longitude. . ." value="<?php echo $edc->longitude ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="input">latitude</label>
                                            <input class="form-control" type="text" readonly id="lat" name="latitude" placeholder="latitude. . ." value="<?php echo $edc->latitude ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" rows="3" id="address2" name="address2" placeholder="Enter Address ..." required ></textarea>
                                        </div>

                                        
                                        <div class="form-group">
                                                <label for="input">KCP</label>
                                                <input type="text" class="form-control" id="kcp" name="kcp" placeholder="Enter KCP" value="<?php echo $edc->kcp ?>" required>
                                        </div>
                                        

                                </div>
                            </div>

                                
                            
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary" onclick="goLogGeneral('Master EDC','Edit EDC <?php echo($edc->sn) ?>');">Submit</button>
                            </div>
                        </form>
                    </div>






                   



                    


            </div>

            <div class="col-4">

                        <div class="card">
                            <div class="card-group">
                                 <input class="form-control col-md-11 pull-left"  name="address" value="" id="address" onchange="searchCoordinat()"/>
                                <button class="btn btn-default btn-sm col-md-1"  onclick="searchCoordinat()"> <i class="fa fa-search"></i></button>
                            </div>
                            

                            <div id="map" style="width: 100%; height: 410px;"></div>
                            <div>
                                <p  style="margin-left: 15px" id="results"></p>
                            </div>
                        </div>




            </div>
        </div>
                
	


</div>



<?php $this->load->view("admin/_partials/js.php") ?>

        

<script>
    var markers = [];
    var marker;
    var circles =[];

    var loc = '<?php if($edc->longitude == null){echo 1;}else echo 0?>';

    var southWest = L.latLng(-89.98155760646617, -180),
	northEast = L.latLng(89.99346179538875, 180);
	var bounds = L.latLngBounds(southWest, northEast);



    var map = L.map('map', { center: bounds.getCenter(),
							minZoom: 3,
							zoom: 5,
							maxBounds: bounds,
							maxBoundsViscosity: 1.0});
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
    }).addTo(map);
    L.control.scale().addTo(map);

    getLocation();

    function chooseAddress(lat, lng) {
        map.setView({lon: lng, lat: lat}, 14);
        marker =  L.marker({lon:lng, lat:  lat}).addTo(map);
        markers.push(marker);
    }

    function searchCoordinat() {
        var input = document.getElementById("address");

        $.getJSON('http://nominatim.openstreetmap.org/search?format=json&limit=5&q=' + input.value +'&polygon_geojson=1', function(data) {
            console.log(data);
            var items = [];

            $.each(data, function(key, val) {
                lat = val.lat;
                lng = val.lon;
                items.push("<li><a href='#' onclick='chooseAddress(" + lat + ", " + lng + ")'>" + val.display_name + '</a></li>');
            });
            $('#results').empty();
            if (items.length != 0) {
                $('<p>', { html: "Search results:" }).appendTo('#results');
                $('<ul/>', {
                    'class': 'my-new-list',
                    html: items.join('')
                }).appendTo('#results');
            } else {
                $('<p>', { html: "No results found" }).appendTo('#results');
            }
        });
    }
    

    function getLocation() {

        var cur_long = 0.0;
        var cur_lat = 0.0;

        if(loc == 1){

            let cek = true;
            map.locate({
                setView: true,
                enableHighAccuracy: true
            })
                .on('locationfound', function(e) {
                    map.setView({lon: e.longitude, lat: e.latitude}, 18);
                    marker =  L.marker({lon: e.longitude, lat:  e.latitude}).addTo(map)
                        .bindPopup("Your Position")
                        .openPopup();
                    markers.push(marker);
                    cek = false;
                    cur_long = e.longitude;
                    cur_lat = e.latitude
                });

        }
        else{

            cur_long = <?php if($edc->longitude == null){echo 0.0;} else echo strtoupper($edc->longitude) ?>;
            cur_lat = <?php  if($edc->latitude == null){echo 0.0;} else  echo strtoupper($edc->latitude) ?>;
            map.setView({lon: cur_long, lat: cur_lat}, 14);
            marker =  L.marker({lon:cur_long, lat:  cur_lat}).addTo(map).bindPopup("Store Position") .openPopup();

        }

    }
 

    function setRadius(rad){
        // if (circles.length > 1) {
        //     map.removeLayer(circles.pop());
        // }

        console.log(rad);
        let circle = L.circle({lon:document.getElementById("lat").value, lat:  document.getElementById("lng").value}, rad, {
            color: 'red',
            fillColor: '#2a27ff',
            fillOpacity: 0.5
        }).addTo(map);
        circles.push(circle);
    }

    map.on('click', function(evt) {
        if (markers.length > 0) {
            map.removeLayer(markers.pop());
        }

        var pointLat = evt.latlng['lat'];
        var pointLng = evt.latlng['lng'];
        document.getElementById("lat").value = pointLat;
        document.getElementById("lng").value = pointLng;
        marker =  L.marker({lon:pointLng, lat:  pointLat}).addTo(map);
        markers.push(marker);
    });
</script>



