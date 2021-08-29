<div class="container-fluid">
				

		<div class="card" >
  			<div class="card-header">
  		  	

                <div class="row">
                    <div class="col-8">
                        EDC Data 
                    </div>
                    <div class="col-4">
                        <div class="btn-group float-right">
                        <?php if ($level === "superadmin" || $acc_edc["create"]){ ?>
                            <button type="button" class="btn btn-warning " style="font-size:75%;" onclick="window.location.href='<?php echo site_url('admin/batch/batch')?>'">Import Batch</button>
                            &nbsp
                            &nbsp
                            <button type="button" class="btn btn-primary " style="font-size:75%;" onclick="window.location.href='<?php echo site_url('admin/batch/addEDC/')?>'">Add</button>
                        <?php } ?>
                        </div>
                    </div>
                </div>
  			</div>
			<div class="card-body">

			<div class="chart tab-pane" id="mor-grid" style="position: relative; font-size:90%;">
				<table id="dataTable" class="display table table-bordered table-hover" style="font-size:90%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">SN</th>
                            <th style="text-align: center;">BRILINK Code</th>
                            <th style="text-align: center;">BRILINK Name</th>
                            <th style="text-align: center;">Area</th>
                            <th style="text-align: center;">Kantor Wilayah</th>
                            <th style="text-align: center;">KCP</th>
                            <th style="text-align: center;">Last Heartbeat</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Area Status</th>
                            <?php if ($level === "superadmin" || $acc_user["update"] || $acc_user["delete"]){ ?>
                                <th style="text-align: center;">Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody >
                        <?php  for ($i=0; $i < count($importData); $i++) { ?>
                            <tr  sn="<?php echo $importData[$i]['sn']; ?>">
                                <td style="text-align: center; vertical-align: middle;" >
                                <a href="<?php echo site_url('admin/batch/detailEDC/'.$importData[$i]['sn']) ?>"
										 class="btn-link"  onclick="goLogGeneral('Master EDC','Open edc detail <?php echo $importData[$i]['sn'] ?> ');" > <?php echo $importData[$i]['sn']; ?></a>
                                </td>
                                <td style="text-align: center; vertical-align: middle; " ><?php echo $importData[$i]['merchant_code']; ?>
                                <td style="text-align: center; vertical-align: middle;" ><?php echo $importData[$i]['merchant_name']; ?>
                                <td style="text-align: center; vertical-align: middle;" ><?php echo $importData[$i]['area'] ;?>
                                <td style="text-align: center; vertical-align: middle;" ><?php echo $importData[$i]['kanwil'] ;?>
                                <td style="text-align: center; vertical-align: middle; " ><?php echo $importData[$i]['kcp'] ;?>
                               
                                <td style="text-align: center; vertical-align: middle; " ><?php if($importData[$i]['date'] != null){echo$importData[$i]['date'];} else echo "-" ;?>
                                <!-- <td style="text-align: center; vertical-align: middle; " ><?php if($importData[$i]['date'] == null){echo "Disconnected";} else echo $importData[$i]['status'] ;?> -->

                                <td style="text-align: center; vertical-align: middle; " ><?php if($importData[$i]['date'] == null){?>
                                    <img src="<?php echo base_url("assets/image/silang.png")?>" style="height: 13px; width: 13px;">   
                                <?php }else{ ?>
                                    <?php if($importData[$i]['status']  == 'Disconnected'){?>
                                        <img src="<?php echo base_url("assets/image/silang.png")?>" style="height: 13px; width: 13px;">   
                                    <?php }else{ ?> 
                                        <img src="<?php echo base_url("assets/image/checklist.png")?>" style="height: 15px; width: 15px;">   
                                    <?php } ?>
                                <?php } ?>

                                <td style="text-align: center; vertical-align: middle; " >
                                    <?php 
                                        if($importData[$i]['gf_latitude']){
                                            //calculate distance betewwn coordinate
                                         $earthRadius = 6371000;
                                         $latFrom = deg2rad($importData[$i]['latitude']);
                                         $lonFrom = deg2rad($importData[$i]['longitude']);
                                         $latTo = deg2rad($importData[$i]['gf_latitude']);
                                         $lonTo = deg2rad($importData[$i]['gf_longitude']);
                             
                                         $lonDelta = $lonTo - $lonFrom;
                                         $a = pow(cos($latTo) * sin($lonDelta), 2) +
                                           pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
                                         $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
                             
                                         $angle = atan2(sqrt($a), $b);
                                         $distacne =  $angle * $earthRadius;
                                       
                                         if($distacne >= $importData[$i]['radius']){
                                            $distacne = $distacne/1000;
                                          echo "Outside of Area <br>";
                                          echo "(".round($distacne,2)." Km)";
                                         }
                                         else{
                                           echo "Inside of Area";
                                         }
                                       }else{
                                         echo "NOT SET";
                                       }
                                    ?>
                                </td>
                                <?php if ($level === "superadmin" || $acc_user["update"] || $acc_user["delete"]){ ?>
                                <td width="50">
                                    <div class="btn-group"> 
                                        <?php if ($level === "superadmin" || $acc_user["update"]) { ?>
                                            <a href="<?php echo site_url('admin/batch/editEDC/'.$importData[$i]['sn']) ?>"
                                                class="btn btn-small" style=" font-size: 10px;" ><i class="fas fa-edit"></i> Edit</a>
                                        <?php } ?>
                                        <?php if ($level === "superadmin" || $acc_user["delete"]) { ?>
                                            <button type="submit" class="btn btn-small btn-link text-danger remove" style=" font-size: 10px;"><i class="fas fa-trash"></i> Delete</button>
                                        <?php } ?>
                                    </div>
                                </td>
                                <?php } ?>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
                </div>  

			</div>
		</div>
       
               
          



</div>



<?php $this->load->view("admin/_partials/js.php") ?>
    

<script type="text/javascript">
    $(".remove").click(function(){
        var id =$(this).parents("tr").attr("sn");
        console.log(id);


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '<?php echo base_url(); ?>index.php/admin/batch/deleteEDC/'+id,
               type: 'DELETE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                   console.log(id);
                    $("#"+id).remove();
                    alert("Record removed successfully"); 
                    getLogActivity('<?php echo $client_code;?>', '<?php echo $user_id;?>', '<?php echo Site_url();?>','Master EDC ','Delete EDC - '+id);
                    location.reload(); 
               }
            });
        }
    });


</script>



