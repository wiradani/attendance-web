<div class="container-fluid">
        


        <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-5" style="padding: 1;">
                  <h4><?php echo $title ?></h4>
                </div>
                <div class="col-md-4"></div>
                  <div class="col-md-3" style="padding: 0;">

                  <?php if(empty($cek)){ ?>
                    <button class="form-control btn btn-primary"  href="#"data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Check</button>
                     
                   
                    <?php } else { ?>
                            
                            <a   class=" btn btn-danger"  href="<?php echo site_url('user/atd/checkout/') ?>" >Check Out</a>
                         <?php } ?>
                    
                   
                   
                  </div>
                </div>
            </div>
              <div class="card-body" >
                <div class="tab-content p-0">




                <div class="chart tab-pane active" id="mor-grid" style="position: relative; font-size:90%;">
                <table id="dataTable" class="display table table-bordered table-hover" style="font-size:90%">
                      <thead>
                      <tr >
                          <th class="th-middle" style="width: 7%">No</th>
                          <th class="th-left" style="width: 30%">Name</th>
                          <th class="th-middle" style="width: 10%">Division</th>
                          <th class="th-middle" style="width: 10%">Status</th>
                          <th class="th-middle" style="width: 10%">Check IN</th>
                          <th class="th-middle" style="width: 10%">Check OUT</th>
                          <th class="th-middle" style="width: 10%">Date</th>
                         
                           
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < count($data); $i++) { ?>
                        <tr  id="<?php echo $data[$i]['id']; ?>">  
                          <td class="th-middle"><?php echo ($i+1) ?></td>
                          <td class="th-left"><?php echo $data[$i]['name'] ?></td>
                          <td class="th-middle"><?php echo $data[$i]['division'] ?></td>
                          <td class="th-middle"><?php echo $data[$i]['status'] ?></td>
                          <td class="th-middle"><?php echo $data[$i]['check_in'] ?></td>
                          <td class="th-middle"><?php echo $data[$i]['check_out'] ?></td>
                          <td class="th-middle"><?php echo $data[$i]['created_at'] ?></td>
                         
                         
                        
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>














                </div>
              </div>
            </div>
          </div>
        </div>
      </div>




























</div>




<?php $this->load->view("admin/_partials/js.php") ?>
    




<?php  ?>