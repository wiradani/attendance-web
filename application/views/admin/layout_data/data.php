<div class="container-fluid">

    
    <div class="card mb-3">
      <div class="card-header ">
      <div class="row">
        <div class="col-8">
        <form action="<?php echo base_url(); ?>index.php/admin/Overview/queryParameterData" method='post' class="form-inline">

                <div class="input-group mb-2 mr-sm-2">
                <label for="tolerance">Tolerance</label>
                &nbsp
                <select id="tolerance" name="tolerance" clas="custom-select mr-sm-2">
                  <option value="1440"  <?php if  ($valueTimer === '1440') {  echo 'selected' ; }  ?> >Last 1 Days</option>
                  <option value="2880"  <?php if  ($valueTimer === '2880') {  echo 'selected' ; }  ?> >Last 2 Days</option>
                  <option value="4320"  <?php if  ($valueTimer === '4320') {  echo 'selected' ; }  ?> >Last 3 Days</option>
                  <option value="7200"  <?php if  ($valueTimer === '7200') {  echo 'selected' ; }  ?> >Last 5 Days</option>
                  <option value="10080"  <?php if  ($valueTimer === '10080') {  echo 'selected' ; }  ?> >Last 7 Days</option>
                  <option value="20160"  <?php if  ($valueTimer === '20160') {  echo 'selected' ; }  ?> >Last 14 Days</option>
                  <option value="43200"  <?php if  ($valueTimer === '43200') {  echo 'selected' ; }  ?> >Last 30 Days</option>
               
                </select>
                </div>

                <div class="input-group mb-2 mr-sm-2">
                <label for="btn">Data</label>
                &nbsp
                <select id="btn" name="btn">
                  <option value="area" <?php if  ($btn === 'area') {  echo 'selected' ; }  ?> >Area</option>
                  <option value="kanwil" <?php if  ($btn === 'kanwil') {  echo 'selected' ; }  ?> >Kanwil</option>
                  <option value="kcp" <?php if  ($btn === 'kcp') {  echo 'selected' ; }  ?>>KCP</option>
                </select>
                </div>

                <div class="input-group mb-2 mr-sm-2">
                  <input class="btn btn-primary btn-sm " type="submit" value="Submit">
                </div>
           </form>
        </div>
        <div class="col-4">
              <div class="row">
                  <div class="col">
                  </div>
                  <div class="col-md-auto">
                    
                    <table class="none" border="1px" style="height: 50px;text-align: center; font-size: 60%; padding: 0px !important; float: right; margin: 0px;" >
                              <tr>
                                <th rowspan="2" style="font-weight: bold; font-size: 170%;">&nbspEDC&nbsp</th>
                                <th style="color:#080DCC; font-size: 90%;">&nbspConnected&nbsp</th>
                                <th style="color:#000000; font-size: 90%;">&nbspRegistered&nbsp</th>
                              </tr>
                              <tr>
                                <td><span style="color:#080DCC; font-weight: bold; font-size: 160%;">&nbsp<?php echo $terminal_active;?>&nbsp</span></td>
                                <td><span style="color:#000000; font-weight: bold; font-size: 160%;">&nbsp<?php echo $terminal_total;?>&nbsp</span></td>
                              </tr>
                      </table>

                  </div>
              </div>
        </div>
    </div>
    </div>
    <div class="card-body" style="padding:6px;" >
                <div class="tab-content p-0">

                <?php if($btn == 'area'){ ?>
                  <div class="chart tab-pane  <?php if($btn == 'area') echo 'active';?>" id="mor-grid" style="position: relative; font-size:80%;">
                    <table id="dataTable" class="display table table-bordered table-hover" style="font-size:80%">
                      <thead>
                        <tr>
                          <th rowspan="2" style="text-align: center; width: 10%;">Area</th>
                          <th colspan="4" style="text-align: center; color: #007EFF; font-weight: bold;">AGENT</th>
                          <th colspan="4" style="text-align: center; color: #B90BFD; font-weight: bold;">TERMINAL</th>
                          <th rowspan="2" style="text-align: center; width: 10%;">ACTION</th>
                        </tr>
                        <tr>
                          <th style="text-align: center; width: 10%; color: #007EFF; font-weight: bold;">CON</th>
                          <th style="text-align: center; width: 10%; color: #B90BFD; font-weight: bold;">DIS</th>
                          <th style="text-align: center; width: 10%; color: #001E48; font-weight: bold;">TOTAL</th>
                          <th style="text-align: center; width: 10%;">% CON</th>
                          <th style="text-align: center; width: 10%; color: #007EFF; font-weight: bold;">CON</th>
                          <th style="text-align: center; width: 10%; color: #B90BFD; font-weight: bold;">DIS</th>
                          <th style="text-align: center; width: 10%; color: #001E48; font-weight: bold;">TOTAL</th>
                          <th style="text-align: center; width: 10%;">% CON</th>
                        </tr>
                      </thead>
                      <tbody >
                        <?php $no=1; for ($i=0; $i < count($data_area); $i++) { ?>
                        <tr>
                          <td style="text-align: center; " ><?php echo $data_area[$i]['area'] ?>
                          </td>
                          <td style="text-align: center;">
                             <a <?php if($data_area[$i]['connect'] != "0" || $data_area[$i]['connect'] == "0"){ ?> href="<?php echo site_url("admin/data/area_status/connected_")?><?php echo $data_area[$i]['area'];?>" target="_blank" <?php } ?> id="tooltrip_connect" title="Connected" style="color: #007EFF; font-weight: bold;"><?php echo $data_area[$i]['connect']?></a> 
                          </td>
                          <td style="text-align: center;">
                            <a <?php if($data_area[$i]['disconnect'] != "0"){ ?> href="<?php echo site_url("admin/data/area_status/disconnected_")?><?php echo $data_area[$i]['area'];?>" target="_blank" <?php } ?> id="tooltrip_disconnect" title="Disconnected" style="color: #B90BFD; font-weight: bold;"><?php echo $data_area[$i]['disconnect']?></a>
                          </td>
                          <td style="text-align: center;">
                            <a <?php if($data_area[$i]['total'] != "0"){ ?> href="<?php echo site_url("admin/data/area_status/total_")?><?php echo $data_area[$i]['area'];?>" target="_blank" <?php } ?> id="tooltrip_total" title="Total" style="color: #001E48; font-weight: bold;"><?php echo $data_area[$i]['total']?></a>
                          </td>
                          <td style="text-align: center;">
                            <?php if($data_area[$i]['total'] == null || $data_area[$i]['total'] == 0){ ?>
                              <?php echo"0%"?>
                            <?php } else { ?>
                              <?php echo round(($data_area[$i]['connect']/$data_area[$i]['total'])*100,2)."%"?>
                            <?php  } ?>
                          </td>

                          <td style="text-align: center;">
                            <?php echo $data_area[$i]['edc_connect']?>
                          </td>
                          <td style="text-align: center;">
                            <?php echo $data_area[$i]['edc_disconnect']?>
                          </td>
                          <td style="text-align: center;">
                            <?php echo $data_area[$i]['edc_total']?>
                          </td>
                          <td style="text-align: center;">
                            <?php if($data_area[$i]['edc_total'] == null || $data_area[$i]['edc_total'] == 0 ){ ?>
                                  <?php echo"0%"?>
                              <?php } else { ?>
                                   <?php echo round(($data_area[$i]['edc_connect']/$data_area[$i]['edc_total'])*100,2)."%"?>
                            <?php  } ?>
                          </td>
                          
                          <td style="text-align: center; ">
                            <button id="btnDetail" onclick="goLogGeneral('Perfomance','Detail Area <?php echo($data_area[$i]['area']) ?>');window.location.href='<?php echo site_url('admin/data/area_detail/').$data_area[$i]['area'];?>'" type="button" class="btn btn-primary btn-xs" style="width:50px; height:20px; font-size:x-small; align-items: center; padding: 0px;">Detail</button>
                          </td>                          
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>

                  </div>
                <?php }else if($btn == 'kanwil'){ ?>

              
                  <div class="chart tab-pane  <?php if($btn == 'kanwil') echo 'active';?>" id="mor-grid" style="position: relative; font-size:80%;">
                    <table id="dataTable" class="table table-bordered table-hover" style="font-size:80%">
                      <thead>
                        <tr>
                          <th rowspan="2" style="text-align: center; width: 10%;">Kantor Wilayah</th>
                          <th colspan="4" style="text-align: center; color: #007EFF; font-weight: bold;">AGENT</th>
                          <th colspan="4" style="text-align: center; color: #B90BFD; font-weight: bold;">TERMINAL</th>
                          <th rowspan="2" style="text-align: center; width: 10%;">ACTION</th>
                        </tr>
                        <tr>
                          <th style="text-align: center; width: 10%; color: #007EFF; font-weight: bold;">CON</th>
                          <th style="text-align: center; width: 10%; color: #B90BFD; font-weight: bold;">DIS</th>
                          <th style="text-align: center; width: 10%; color: #001E48; font-weight: bold;">TOTAL</th>
                          <th style="text-align: center; width: 10%;">% CON</th>
                          <th style="text-align: center; width: 10%; color: #007EFF; font-weight: bold;">CON</th>
                          <th style="text-align: center; width: 10%; color: #B90BFD; font-weight: bold;">DIS</th>
                          <th style="text-align: center; width: 10%; color: #001E48; font-weight: bold;">TOTAL</th>
                          <th style="text-align: center; width: 10%;">% CON</th>
                        </tr>
                      </thead>
                      <tbody >
                        <?php $no=1; for ($i=0; $i < count($data_kanwil); $i++) { ?>
                        <tr>
                          <td style="text-align: center; " ><?php echo $data_kanwil[$i]['kanwil'] ?>
                          </td>
                          <td style="text-align: center;">
                             <a <?php if($data_kanwil[$i]['connect'] != "0" || $data_kanwil[$i]['connect'] == "0"){ ?> href="<?php echo site_url("admin/data/kanwil_status/connected_")?><?php echo $data_kanwil[$i]['kanwil'];?>" target="_blank" <?php } ?> id="tooltrip_connect" title="Connected" style="color: #007EFF; font-weight: bold;"><?php echo $data_kanwil[$i]['connect']?></a> 
                          </td>
                          <td style="text-align: center;">
                            <a <?php if($data_kanwil[$i]['disconnect'] != "0"){ ?> href="<?php echo site_url("admin/data/kanwil_status/disconnected_")?><?php echo $data_kanwil[$i]['kanwil'];?>" target="_blank" <?php } ?> id="tooltrip_disconnect" title="Disconnected" style="color: #B90BFD; font-weight: bold;"><?php echo $data_kanwil[$i]['disconnect']?></a>
                          </td>
                          <td style="text-align: center;">
                            <a <?php if($data_kanwil[$i]['total'] != "0"){ ?> href="<?php echo site_url("admin/data/kanwil_status/total_")?><?php echo $data_kanwil[$i]['kanwil'];?>" target="_blank" <?php } ?> id="tooltrip_total" title="Total" style="color: #001E48; font-weight: bold;"><?php echo $data_kanwil[$i]['total']?></a>
                          </td>
                          <td style="text-align: center;">
                            <?php if($data_kanwil[$i]['total'] == null || $data_kanwil[$i]['total'] == 0 ){ ?>
                                <?php echo"0%"?>
                            <?php } else { ?>
                              <?php echo round(($data_kanwil[$i]['connect']/$data_kanwil[$i]['total'])*100,2)."%"?>
                            <?php  } ?>
                          </td>

                          <td style="text-align: center;">
                            <?php echo $data_kanwil[$i]['edc_connect']?>
                          </td>
                          <td style="text-align: center;">
                            <?php echo $data_kanwil[$i]['edc_disconnect']?>
                          </td>
                          <td style="text-align: center;">
                            <?php echo $data_kanwil[$i]['edc_total']?>
                          </td>
                          <td style="text-align: center;">
                          <?php if($data_kanwil[$i]['edc_total'] == null || $data_kanwil[$i]['edc_total'] == 0 ){ ?>
                                <?php echo"0%"?>
                          <?php } else { ?>
                              <?php echo round(($data_kanwil[$i]['edc_connect']/$data_kanwil[$i]['edc_total'])*100,2)."%"?>
                          <?php  } ?>
                          </td>
                          
                          <td style="text-align: center; ">
                            <button id="btnDetail" onclick="goLogGeneral('Perfomance','Detail Kanwil <?php echo($data_kanwil[$i]['kanwil']) ?>');window.location.href='<?php echo site_url('admin/data/kanwil_detail/').$data_kanwil[$i]['kanwil'];?>'" type="button" class="btn btn-primary btn-xs" style="width:50px; height:20px; font-size:x-small; align-items: center; padding: 0px;">Detail</button>
                          </td>                          
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>

                  </div>
                  <?php }else{ ?>

                  <div class="chart tab-pane  <?php if($btn == 'kcp') echo 'active';?>" id="mor-grid" style="position: relative; font-size:80%;">
                    <table id="dataTable" class="display table table-bordered table-hover" style="font-size:80%">
                      <thead>
                        <tr>
                          <th rowspan="2" style="text-align: center; width: 10%;">KCP</th>
                          <th colspan="4" style="text-align: center; color: #007EFF; font-weight: bold;">AGENT</th>
                          <th colspan="4" style="text-align: center; color: #B90BFD; font-weight: bold;">TERMINAL</th>
                          <th rowspan="2" style="text-align: center; width: 10%;">ACTION</th>
                        </tr>
                        <tr>
                          <th style="text-align: center; width: 10%; color: #007EFF; font-weight: bold;">CON</th>
                          <th style="text-align: center; width: 10%; color: #B90BFD; font-weight: bold;">DIS</th>
                          <th style="text-align: center; width: 10%; color: #001E48; font-weight: bold;">TOTAL</th>
                          <th style="text-align: center; width: 10%;">% CON</th>
                          <th style="text-align: center; width: 10%; color: #007EFF; font-weight: bold;">CON</th>
                          <th style="text-align: center; width: 10%; color: #B90BFD; font-weight: bold;">DIS</th>
                          <th style="text-align: center; width: 10%; color: #001E48; font-weight: bold;">TOTAL</th>
                          <th style="text-align: center; width: 10%;">% CON</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; for ($i=0; $i < count($data_kcp); $i++) { ?>
                        <tr>
                          <td style="text-align: center;"><?php echo  $data_kcp[$i]['kcp'];?>
                          </td>
                          <td style="text-align: center;">
                             <a <?php if($data_kcp[$i]['connect'] != "0" || $data_kcp[$i]['connect'] == "0"){ ?> href="<?php echo site_url("admin/data/kcp_status/connected_")?><?php echo $data_kcp[$i]['kcp'];?>" target="_blank" <?php } ?> id="tooltrip_connect" title="Connected" style="color: #007EFF; font-weight: bold;"><?php echo $data_kcp[$i]['connect']?></a> 
                          </td>
                          <td style="text-align: center;">
                            <a <?php if($data_kcp[$i]['disconnect'] != "0"){ ?> href="<?php echo site_url("admin/data/kcp_status/disconnected_")?><?php echo $data_kcp[$i]['kcp'];?>" target="_blank" <?php } ?> id="tooltrip_disconnect" title="Disconnected" style="color: #B90BFD; font-weight: bold;"><?php echo $data_kcp[$i]['disconnect']?></a>
                          </td>
                          <td style="text-align: center;">
                            <a <?php if($data_kcp[$i]['total'] != "0"){ ?> href="<?php echo site_url("admin/data/kcp_status/total_")?><?php echo $data_kcp[$i]['kcp'];?>" target="_blank" <?php } ?> id="tooltrip_total" title="Total" style="color: #001E48; font-weight: bold;"><?php echo $data_kcp[$i]['total']?></a>
                          </td>
                          <td style="text-align: center;">
                            <?php if($data_kcp[$i]['total'] == null || $data_kcp[$i]['total'] == 0){ ?>
                                  <?php echo"0%"?>
                            <?php } else { ?>
                              <?php echo round(($data_kcp[$i]['connect']/$data_kcp[$i]['total'])*100,2)."%"?>
                            <?php  } ?>
                          </td>
                          <td style="text-align: center;">
                            <?php echo $data_kcp[$i]['edc_connect']?>
                          </td>
                          <td style="text-align: center;">
                            <?php echo $data_kcp[$i]['edc_disconnect']?>
                          </td>
                          <td style="text-align: center;">
                            <?php echo $data_kcp[$i]['edc_total']?>
                          </td>
                          <td style="text-align: center;">
                            <?php if($data_kcp[$i]['edc_total'] == null || $data_kcp[$i]['edc_total'] == 0){ ?>
                                    <?php echo"0%"?>
                            <?php } else { ?>
                              <?php echo round(($data_kcp[$i]['edc_connect']/$data_kcp[$i]['edc_total'])*100,2)."%"?>
                            <?php  } ?>
                          </td>
                          <td style="text-align: center;">
                            <button id="btnDetail" onclick="goLogGeneral('Perfomance','Detail KCP <?php echo($data_kcp[$i]['kcp']) ?>');window.location.href='<?php echo site_url('admin/data/kcp_detail/').$data_kcp[$i]['kcp'];?>'" class="btn btn-primary btn-xs" style="width:50px; height:20px; font-size:x-small; align-items: center; padding: 0px;">Detail</button>
                          </td>                          
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                  </div>
                    
                <?php } ?>
                </div>
              </div>
          </div>




</div>




<?php $this->load->view("admin/_partials/js.php") ?>
    

