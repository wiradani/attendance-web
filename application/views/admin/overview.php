<div class="container-fluid">


		<!-- Icon Cards-->
		<div class="row " style="align-content: center;">
			<div class="col-xl-3 col-sm-6 mb-3"> 
			<div class="card user-card text-white bg-primary o-hidden h-100" style="background: linear-gradient(45deg,#4099ff,#73b4ff);font-size:80%;">
				<div class="card-body">
				<h5 class="card-title"  style="font-size:120%;">Online</h5>
				<div class="mr-5">
						Online : 50
					</div>
					<div class="mr-5">
						Offline : 2
					</div>
					<div class="mr-5">
							Percent Online: 25%
					</div>
				</div>
				
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100" style="background: linear-gradient(45deg,#FFB64D,#ffcb80);font-size:80%;">
				<div class="card-body">
				<h5 class="card-title" style="font-size:120%;">Work Status</h5>
					<div class="mr-5">
							WFA : 10 %
					</div>
					<div class="mr-5">
							WFO : 5 %
					</div>
					<div class="mr-5">
							WFH : 20 % 
					</div>
				</div>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card user-card text-white bg-primary o-hidden h-100" style="background: linear-gradient(45deg,#4099ff,#73b4ff);font-size:80%;">
				<div class="card-body">
				<h5 class="card-title"  style="font-size:120%;">Group</h5>
				<div class="mr-5">
							IT : 10 %
					</div>
					<div class="mr-5">
							HR : 5 %
					</div>
					<div class="mr-5">
							Ops : 20 % 
					</div>
					<div class="mr-5">
							Biz : 20 % 
					</div>
				</div>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100" style="background: linear-gradient(45deg,#FFB64D,#ffcb80);font-size:80%;">
				<div class="card-body">
				<h5 class="card-title"  style="font-size:120%; padding:0px">Last Action</h5>
				
						
							<div class="mr-5">
							Check In Danny IT  at  09:47
							</div>
					
							<div class="mr-5">
							Check In Robert OPS  at  08:50
					
							<div class="mr-5">
							Check In David OPS  at  08:30
							</div>
						</div>
				</div>
				
			</div>
			</div>
		</div>

		
		

		<div class="row">
    		<div class="col">
				<div class="card mb-3">
					<div class="card-header">
						<i class="fas fa-chart-area"></i>Chart</div>
						<div class="card-body">
							<div>            
								<div style="height: 0px auto; width: 0px auto; margin: 0px auto; padding: 10px;">
									<canvas  id="bar-chart"></canvas>
									
								</div>
							</div>
						</div>
					</div>
    			</div>  
    		<div class="col"> 
			<div class="card mb-3">
					<div class="card-header">
						<i class="fas fa-chart-area"></i>  Activity  </div>
						<div class="card-body">
							<div>            
								<div style="height: 0px auto; width: 0px auto; margin: 0px auto; padding: 10px;">
									<canvas  id="line-chart"></canvas>
								</div>
							</div>
						</div>
					</div>
    			</div>
    		</div>
  		</div>

		<div class="card" style="margin: 12px">
			<div class="card-body">
				<h5 class="card-title">Location Map</h5>
				<h6 class="card-subtitle mb-2 text-muted">Employee Location</h6>

				<div id="maps" class="card" style="width: 100%; height: 250px; padding:16px"></div>
				
			</div>
		</div>
		

	
		

	
	
	

</div>

<?php $this->load->view("admin/_partials/js.php") ?>
    



<script  type="text/javascript">
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ["Jan","Feb","March","Apr","Mei","Jun","Jul","Aug","Sept","Oct"],
    datasets: [{ 
        data: [50,20,70,2,5,40,30,50,0,0],
        label: "WFH",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [40,20,5,10,15,20,25,4,0,0],
        label: "WFO",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [20,5,30,34,20,40,30,50,0,0],
        label: "WFA",
        borderColor: "#3cba9f",
        fill: false
      }, { 
        data: [1,4,1,0,0,0,0,0,0,0],
        label: "Leave",
        borderColor: "#e8c3b9",
        fill: false
      }, { 
        data: [10,3,2,2,7,0,0,4,0,0],
        label: "Unknwon",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Employee'
    }
  }
});
</script>



<script>
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["WFH", "WFO", "WFA", "Leave", "Unkwnon"],
      datasets: [
        {
          label: "People",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [50,56,20,3,10]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Work Trends'
      }
    }
});

</script>


<script>
    var map = L.map('maps').setView({ lat : 0.7893, lon : 113.9213 }, 5);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
    }).addTo(map);

    L.marker({lat : 0.7893, lon : 113.9213}).bindPopup('Andre Ops Div ').addTo(map);

	L.marker({lat :-6.121435, lon : 106.774124}).bindPopup('David IT Div ').addTo(map);

	L.marker({lat :-6.121435, lon : 107.774124}).bindPopup('Adam IT Div ').addTo(map);

</script>


