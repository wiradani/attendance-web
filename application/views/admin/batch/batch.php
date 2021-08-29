<div class="container-fluid">
        
                        <?php {?>
                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper" style="padding: 0rem !important;">
                                        <!-- Page body start -->
                                        <div class="page-body">
                                            <?php 
                                            if ($status == "add") { ?>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- Basic Form Inputs card start -->
                                                        <div class="card mb-3">
                                                            <!-- <form id="form_add" method="post"> -->
                                                                <div class="card-block msg" style="display:none; padding: 1rem !important;"></div>
                                                                <div class="card-header">
                                                                    <h3 class="sub-title"><?php echo $title ?></h3>
                                                                </div>
                                                                    

                                                                    
                                                                <form method="post" action="<?php echo site_url("admin/batch/preview"); ?>"
                                                                    enctype="multipart/form-data">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-12">
                                                                            <input type="file" class="form-control" name="file" required="" >
                                                                            <br>
                                                                            
                                                                            <input style="float: right;"  class="btn btn-sm btn-primary" type="submit" id="preview" name="preview" value="Preview">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <button type="button" class="btn btn-sm btn-warning" onclick="goLogGeneral('Master EDC','Download Batch Template ');window.location='<?php echo site_url("admin/batch/export");?>'">Download Format</button>
                                                                        </div>

                                                                        <div class="col-sm-6" align="right">
                                                                            <div class="row" style="float: right;">
                                                                                <div class="column" style="margin-right: 1.25rem !important">
                                                                                    <a onClick="window.history.back();" href="#" class="btn btn-sm btn-success"
                                                                                    style="color:white;">Cancel</a>
                                                                                </div>  
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            <!-- </form> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            

                                            <?php } if(isset($_POST['preview'])){?>
                                            
                                            <div class="card">
                                                        <div class="card-header" style="padding-bottom: 0px !important;">
                                                            <h4>Preview Batch Upload BIN to Import</h4>
                                                        </div>
                                                        <div class="card-body">
                                                        <div class="tab-content p-0">
                                                            <?php
                                                            if(isset($upload_error)){ // Jika proses upload gagal
                                                            echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                                                            die; // stop skrip
                                                            }

                                                            
                                                            echo "<form style='width:100%' id='form-import' method='post' action='".site_url("admin/batch/import")."'>";

                                                            echo "<div class='table-responsive dt-responsive'> 
                                                            <div class='table-responsive dt-responsive'><table id='bin' class='table table-striped table-bordered mytable'>
                                                            <thead>
                                                            <tr align='center'>
                                                                <th style='width: 10%'>No.</th>
                                                                <th style='width: 10%'>SN</th>
                                                                <th style='width: 10%'>BRILINK Code</th>
                                                                <th style='width: 10%'>BRILINK Name</th>
                                                            
                                                                <th style='width: 10%'>Address</th>
                                                                <th style='width: 10%'>Area</th>
                                                                <th style='width: 10%'>Kantor Wilayah</th>
                                                                <th style='width: 10%'>KCP</th>
                                                                <th style='width: 10%'>Longitude</th>
                                                                <th style='width: 10%'>Latitude</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>";

                                                            $numrow = 1;
                                                            $kosong = 0;
                                                            $no = 1;
                                                            $ket = null;
                                                            $noimport = 0;
                                                            $empyError = 0;

                                                            foreach($sheet as $row){
                                                            $exSn = $row['B'];
                                                            $exMerhcantCode = $row['C'];
                                                            $exMerchantName = $row['D'];
                                                            $exAddress = $row['E'];
                                                            $exArea = $row['F'];
                                                            $exKantorWilayah = $row['G'];
                                                            $exKcp = $row['H'];
                                                            $exlongitude = $row['I'];
                                                            $exlatitude = $row['J'];
                                                            if($exSn == "" && $exMerhcantCode == "" && $exMerchantName == ""  && $exAddress == ""  && $exArea == "" && $exKantorWilayah == "" && $exKcp == "" )
                                                                continue; 

                                                            if($numrow > 1){
                                                                $exSn_td = ( ! empty($exSn))? "" : " style='background: #FF0000;'"; 
                                                                $exMerhcantCode_td = ( ! empty($exMerhcantCode))? "" : " style='background: #FF0000;'"; 
                                                                $exMerchantName_td = ( ! empty($exMerchantName))? "" : " style='background: #FF0000;'";
                                                                $exAddress_td = ( ! empty($exAddress))? "" : " style='background: #FF0000;'";
                                                                $exArea_td = ( ! empty($exArea))? "" : " style='background: #FF0000;'";
                                                                $exKantorWilayah_td = ( ! empty($exKantorWilayah))? "" : " style='background: #FF0000;'";
                                                                $exKcp_td = ( ! empty($exKcp))? "" : " style='background: #FF0000;'";
                                                            

                                                                if (empty($exSn) && empty($exMerhcantCode) && empty($exMerchantName)  && empty($exAddress) && empty($exArea)  && empty($exKantorWilayah) && empty($exKcp)) {
                                                                $ket = "All data not available"; $noimport = 1; $empyError = 1;
                                                                }elseif (empty($exSn)) { $ket = "SN not available"; $noimport = 1; $empyError = 1;
                                                                }elseif (empty($exMerhcantCode)) { $ket = "BRILINK Code is not available"; $noimport = 1; $empyError = 1;
                                                                }elseif (empty($exMerchantName)) { $ket = "BRILINK Name is not available"; $noimport = 1; $empyError = 1;
                                                                }elseif (empty($exAddress)) { $ket = "Address not available"; $noimport = 1; $empyError = 1;
                                                                }elseif (empty($exArea)) { $ket = "Area not available"; $noimport = 1; $empyError = 1;
                                                                }elseif (empty($exKantorWilayah)) { $ket = "Kantor Wilayah not available"; $noimport = 1; $empyError = 1;
                                                                }elseif (empty($exKcp)) { $ket = "KCP not available"; $noimport = 1; $empyError = 1;
                                                                }else{
                                                                $ket = "Success";
                                                                $exInfo_td = " style='background: #66ff33;'";
                                                                }

                                                                if($exSn == "" or $exMerhcantCode == "" or $exMerchantName == ""  or $exAddress == "" or $exArea == "" or $exKantorWilayah == "" or $exKcp == ""){
                                                                $kosong++; 
                                                                $noimport = 1;
                                                                }

                                                                if ($ket != "true" OR $ket == "true") {
                                                                echo "<tr align='center'>";
                                                                echo "<td>".$no."</td>";
                                                                echo "<td".$exSn_td.">".$exSn."</td>";
                                                                echo "<td".$exMerhcantCode_td.">".$exMerhcantCode."</td>";
                                                                echo "<td".$exMerchantName_td.">".$exMerchantName."</td>";
                                                                echo "<td".$exAddress_td.">".$exAddress."</td>";
                                                                echo "<td".$exArea_td.">".$exArea."</td>";
                                                                echo "<td".$exKantorWilayah_td.">".$exKantorWilayah."</td>";
                                                                echo "<td".$exKcp_td.">".$exKcp."</td>";
                                                                echo "<td>".$exlongitude."</td>";
                                                                echo "<td>".$exlatitude."</td>";
                                                                $no++;
                                                                }  
                                                            }

                                                            $numrow++;
                                                            }
                                                            echo "</tbody></table></div></div>";

                                                            if($kosong > 0){
                                                                echo "<hr>";
                                                                echo " <a class='btn btn-sm btn-warning' >Cancel</a>";
                                                                
                                                            ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                                                                    $("#kosong").show();
                                                                });
                                                            </script>
                                                            <?php
                                                            }else{
                                                            if ($noimport === 1 or $empyError === 1) {
                                                                echo "<hr>";
                                                                echo " <a class='btn btn-sm btn-warning' href='#' onClick='window.history.back();' >Cancel</a>";

                                                                
                                                            }else{
                                                                if ($empyError === 0) {
                                                                    echo "<center><h5>Success Read File, No Error Data, Go Import!</h5></center>";
                                                                }
                                                                echo "<hr>"; 
                                                                echo "<button class='btn btn-sm btn-success' type='submit' name='import' id='import' value='import'>Import</button>";
                                                                echo " <a class='btn btn-sm btn-warning' href='#' onClick='window.history.back();' >Cancel</a>";
                                                            }
                                                            }
                                                            echo "</form>";?>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        </div>


</div>




<?php $this->load->view("admin/_partials/js.php") ?>
    

        



<script type="text/javascript">
  $(document).ready(function(){

    $('#bin').dataTable({
            "pageLength": 10
        })


  });
</script>


<?php  ?>