
    <div class="container-fluid">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <ul class="nav nav-pills ml p-2">
                <h4><?php echo $title ?></h4>
              </ul>
            </div>
          
          
          </div>
          <div class="card-body">
                <div class="tab-content p-0">
                  <div class="chart tab-pane active" id="mor-grid" style="position: relative;" style="font-size:70%">
                    <table id="dataTable" class="display table table-bordered table-hover"  style="font-size:70%">
                      <thead>
                        <tr>
                          <th style="width:5%">No.</th>
                          <th>Client Code</th>
                          <th>User</th>
                         
                          <th>Form</th>
                          <th>Action</th>
                          <th>Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < count($log_activity); $i++) { ?>
                        <tr>
                          <td><?php echo ($i+1) ?></td>
                          <td><?php echo $log_activity[$i]['client_code'] ?></td>
                          <td><?php echo $log_activity[$i]['name'] ?></td>
                         
                          <td><?php echo $log_activity[$i]['form'] ?></td>
                          <td><?php echo $log_activity[$i]['action'] ?></td>
                          <td><?php echo $log_activity[$i]['time'] ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>



            &nbsp
            <p class="card-subtitle mb-2 text-muted" style="font-size: 80%;">*only shows data for the last 3 months</p>
      </div>
    </div>

  
<?php $this->load->view("admin/_partials/js.php") ?>