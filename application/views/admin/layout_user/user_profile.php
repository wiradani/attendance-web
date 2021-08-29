<div class="container-fluid">
        




        <div class="card">
            <div class="card-body">
              <div class="tab-content">
                <form id="form-edit-user" method="post">
                    <div class="box-body form-horizontal">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <h4>Profile</h4>
                            </div>
                            <div class="col-sm-8"></div>
                            <div class="col-sm-2" style="text-align:right">
                                <a href="<?php echo site_url(); ?>" class="btn btn-success" style="color:white;"><i class="fa fa-arrow-left"></i>  Back</a>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="fullname" class="form-control" placeholder="Name" required="" value="<?php echo $profile[0]['name'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" placeholder="Email" required="" value="<?php echo $profile[0]['email'] ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Mobile Number</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" name="hp" class="form-control" placeholder="Handphone Number"  value="<?php echo $profile[0]['mobile_no'] ?>" readonly>
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">User Level</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="User Level"  value="<?php echo $profile[0]['rm_name']?><?php IF($profile[0]['su'] === '1'){ ?> (Super Admin)<?php } ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <h4>Access</h4>
                            </div>
                            <div class="col-sm-8"></div>
                            <div class="col-sm-2" style="text-align:right">
                                <a href="<?php echo site_url('user/user/myProfileEdit/'.$profile[0]['id']) ?>" class="btn btn-primary" style="color:white;"><i class="fa fa-edit"></i>  Update Profile</a>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-12 chart tab-pane active" id="mor-grid" style="position: relative;">
                                <table id="dataTable" class="table table-bordered table-hover" style="font-size:80%" >
                                  <thead>
                                    <tr>
                                      <th class="th-middle" style="width: 10%">NO</th>
                                      <th class="th-left" style="width: 40%">Form Name</th>
                                      <th class="th-left" style="width: 50%">Access</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php for ($i=0; $i < count( $access); $i++) { ?>
                                    <tr>  
                                        <td class="th-middle"><?php echo ($i+1) ?></td>
                                        <td class="th-left"><?php echo $access[$i]['form_name'] ?></td>
                                        <td class="th-left">
                                            <?php $acc=''; 
                                                if($access[$i]['rd_create']=='Create'){ $acc = 'Create'; } 
                                                if($access[$i]['rd_read']=='Read'){ if($acc !=''){ $acc .=', ';} $acc .= 'Read'; } 
                                                if($access[$i]['rd_update']=='Update'){ if($acc !=''){ $acc .=', ';} $acc .= 'Update'; } 
                                                if($access[$i]['rd_delete']=='Delete'){ if($acc !=''){ $acc .=', ';} $acc .= 'Delete'; } 
                                                echo $acc;
                                            ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
          </div>
        </div>




























</div>

<?php $this->load->view("admin/_partials/js.php") ?>
    





<?php  ?>