<div class="container-fluid">

		
        <div class="row">
            <div class="col-8">
            

                    <div class="card card-primary">
                        <div class="card-header">
                            
                            <h3 class="card-title">Detail Store: <?php echo $edc->merchant_code;?>
                            <?php if ($level === "superadmin" || $acc_edc["update"]|| $acc_edc["delete"]){ ?>
                            <div class="btn-group float-right">
                                <?php if ($level === "superadmin" || $acc_edc["update"]){ ?>
                                    <a href="<?php echo site_url('admin/batch/editEDC/'.$edc->sn) ?>"
                                                    class="btn btn-link btn-small"><i class="fas fa-edit"></i> Edit</a>
                                    &nbsp
                                    &nbsp
                                <?php } ?>
                                <?php if ($level === "superadmin" || $acc_edc["delete"]){ ?>
                                <button type="submit" class="btn btn-small btn-link text-danger remove" ><i class="fas fa-trash"></i> Delete</button>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                            <div class="card-body">


                            <div class="row">
                                <div class="col">


                                    <div class="form-group">
                                        <label for="input">BRILink Name</label>
                                        <input  disabled type="text" class="form-control" id="merchant_name" name="merchant_name" placeholder="No Data" value="<?php echo $edc->merchant_name ?>">
                                    </div>
                                    <div class="form-group">
                                            <label for="input">EDC SN</label>
                                            <input disabled type="text" class="form-control" id="sn"  name="sn" placeholder="No Data" value="<?php echo $edc->sn ?>">
                                    </div>

                                    <div class="form-group">
                                            <label for="input">EDC Brand</label>
                                            <input disabled type="text" class="form-control" id="brand"  name="brand" placeholder="No Data" value="<?php echo $edc->brand ?>">
                                    </div>

                                    <div class="form-group">
                                            <label for="input">Device Type</label>
                                            <input disabled type="text" class="form-control" id="device_type"  name="device_type" placeholder="No Data" value="<?php echo $edc->device_type ?>">
                                    </div>

                                    <div class="form-group">
                                            <label for="input">EDC ICCID</label>
                                            <input disabled type="text" class="form-control" id="iccid"  name="iccid" placeholder="No Data" value="<?php echo $edc->iccid ?>">
                                    </div>

                                   
                                   
                                    



                                </div>

                                <div class="col">

                                        
                                        <div class="form-group">
                                            <label for="input">Longitude</label>
                                            <input disabled  class="form-control"  type="text"   readonly  id="lng" name="longitude" placeholder="No Data" value="<?php echo $edc->longitude ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="input">latitude</label>
                                            <input disabled class="form-control" type="text" readonly id="lat" name="latitude" placeholder="No Data" value="<?php echo $edc->latitude ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="input">Geofance Longitude</label>
                                            <input disabled  class="form-control"  type="text"   readonly  id="gf_longitude" name="gf_longitude" placeholder="No Data" value="<?php echo $edc->gf_longitude ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="input">Geofance latitude</label>
                                            <input disabled class="form-control" type="text" readonly id="gf_latitude" name="gf_latitude" placeholder="No Data" value="<?php echo $edc->gf_latitude ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="input">Area Status</label> 
                                            <input disabled class="form-control" type="text" readonly id="gf_latitude" name="gf_latitude" placeholder="No Data" 
                                            value="<?php 


                                                if($edc->gf_latitude){
                                                    //calculate distance betewwn coordinate
                                                 $earthRadius = 6371000;
                                                 $latFrom = deg2rad($edc->latitude);
                                                 $lonFrom = deg2rad($edc->longitude);
                                                 $latTo = deg2rad($edc->gf_latitude);
                                                 $lonTo = deg2rad($edc->gf_longitude);
                                     
                                                 $lonDelta = $lonTo - $lonFrom;
                                                 $a = pow(cos($latTo) * sin($lonDelta), 2) +
                                                   pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
                                                 $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
                                     
                                                 $angle = atan2(sqrt($a), $b);
                                                 $distacne =  $angle * $earthRadius;
                                               
                                                 if($distacne >= 100){
                                                    $distacne = $distacne/1000 ;
                                                    echo  "Outside of Area ";
                                                    echo "(".round($distacne,2)." Km)";
                                                 }
                                                 else{
                                                    $distacne = $distacne/1000 ;
                                                    echo  "Inside of Area";
                                                   echo "(".round($distacne,2)."Km)";
                                                 }
                                               }else{
                                                echo "NOT SET";
                                                 
                                               }
                                            ?>">
                                        </div>


                                       
                                        
                                       

                                        
                                       
                                        

                                </div>


                                <div class="col">


                                         <div class="form-group">
                                                <label for="input">Area</label>
                                                <input  disabled type="text" class="form-control" id="area"  name="area" placeholder="No Data" value="<?php echo $edc->area ?>">
                                        </div>
                                    
                                        <div class="form-group">
                                                <label for="input">Kantor Wilayah</label>
                                                <input  disabled type="text" class="form-control" id="kanwil" name="kanwil" placeholder="No Data" value="<?php echo $edc->kanwil ?>">
                                        </div>

                                        <div class="form-group">
                                                    <label for="input">KCP</label>
                                                    <input disabled type="text" class="form-control" id="kcp" name="kcp" placeholder="No Data" value="<?php echo $edc->kcp ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea disabled class="form-control" aria-label="With textarea" > <?php echo $edc->address ?> </textarea>
                                        </div>



                                </div>


                            </div>

                                
                                <div class="card-footer">
                                    Status : <?php if($edc->date==null){echo "Disconnected";} else echo $edc->status; ?>
                                    <br>
                                    Last Heartbeat : <?php echo $edc->date; ?>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            
                        
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
                
        <a class="anchors" id="<?php echo $edc->sn; ?>" ></a>

		

</div>



<?php $this->load->view("admin/_partials/js.php") ?>
    

        
<script type="text/javascript">
    $(".remove").click(function(){
        var sn =document.getElementsByClassName("anchors")[0].id;
        console.log(sn);


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '<?php echo base_url(); ?>index.php/admin/batch/deleteEDC/'+sn,
               type: 'DELETE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                   console.log(sn);
                    $("#"+sn).remove();
                    alert("Record removed successfully"); 
                    location.replace( '<?php echo base_url(); ?>index.php/admin/batch/viewData/')
               }
            });
        }
    });


</script>



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


    function getDistance(lat1, lon1, lat2, lon2) {
	        pi80 = Math.PI / 180;
	        lat1 *= pi80;
	        lon1 *= pi80;
	        lat2 *= pi80;
	        lon2 *= pi80;
	        r = 6372.797; // mean radius of Earth in km
	        dlat = lat2 - lat1;
	        dlon = lon2 - lon1;
	        a = Math.sin(dlat / 2) * Math.sin(dlat / 2) + Math.cos(lat1) * Math.cos(lat2) * Math.sin(dlon / 2) * Math.sin(dlon / 2);
	        c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
			m = r * c *1000;
			// if(m > 1000){
			// 	m = m/1000;
			// 	return m.toFixed(2)+' Km';
			// }else{
			// 	return m.toFixed(2)+' m';
			// }
			return m;
	        
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

            var iconIn = L.icon({
							iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
							iconSize: [25, 41],
							iconAnchor: [12, 41],
							popupAnchor: [1, -34],
							shadowSize: [41, 41]
						});

            cur_long = <?php if($edc->longitude == null){echo 0.0;} else echo strtoupper($edc->longitude) ?>;
            cur_lat = <?php  if($edc->latitude == null){echo 0.0;} else  echo strtoupper($edc->latitude) ?>;
            map.setView({lon: cur_long, lat: cur_lat}, 14);
            marker =  L.marker({lon:cur_long, lat:  cur_lat}).addTo(map).bindPopup("Store Position") .openPopup();
            

            gf_long = <?php if($edc->gf_longitude == null){echo 0.0;} else echo strtoupper($edc->gf_longitude) ?>;
            gf_lat = <?php  if($edc->gf_latitude == null){echo 0.0;} else  echo strtoupper($edc->gf_latitude) ?>;


            let distance = getDistance(cur_lat,cur_long, gf_lat,gf_long);
            
            console.log(distance);

            if(gf_long != 0.0){

                if(distance >= 100){
                    L.marker([gf_lat,gf_long],{icon: iconIn}).addTo(map).bindPopup("Geofence Location") .openPopup();
                
                var latlngs = [
                    [cur_lat, cur_long],
                    [gf_lat, gf_long]
                ];
                L.polyline(latlngs, {color: 'red'}).addTo(map);


                L.circle([cur_lat, cur_long], {radius: <?php if($edc->radius == null){echo 0.0;} else echo strtoupper($edc->radius) ?>}).addTo(map);
                }
               
            }
                                  


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

   
</script>




