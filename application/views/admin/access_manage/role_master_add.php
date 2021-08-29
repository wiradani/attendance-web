<div class="container-fluid">
        <div class="msg" style="display:none;"></div>


        <div class="card">
            <div class="card-header">
                <h3><?php echo $title ?></h3>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <form id="form-add-rolemaster" method="post">
                    <div class="box-body form-horizontal">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Role Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" placeholder="Ex: Admin"required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" class="form-control" placeholder="Description"required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Client</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="client" required="" aria-describedby="sizing-addon2">
                                    <?php foreach ($client as $row) { ?>    
                                        <option value="<?php echo $row['client_code'] ?>">
                                            <?php echo $row['client_code']." - ".$row['client_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                       
                            <div class="form-group row">
                                <label class="col-sm-2 control-label label-form">Access</label>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-checkbox">
                                      <input class="custom-control-input" type="checkbox" name="su" id="su">
                                      <label for="su" class="custom-control-label">Super Admin</label>
                                    </div>
                                </div>
                            </div>
                      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?php echo site_url('user/RoleMaster'); ?>" class="btn btn-danger" style="color:white;">Cancel</a>
                    <button type="submit" class="btn btn-info" onclick="goLogGeneral('Setup Role ','Add new Role');" >Submit</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
          </div>
        </div>



























</div>

<?php $this->load->view("admin/_partials/js.php") ?>
    




<script type="text/javascript">
        $(document).ready(function(){
            $('#form-add-rolemaster').submit(function(e) {
                console.log("clicked");
                var formData = new FormData(this);
                var name = $('#name').val();
                var description = $('#description').val();
                

                formData.append("su",document.getElementById("su").checked);
                e.preventDefault();
                sendRequest(e,formData, '/user/RoleMaster/createrolemaster','/user/RoleMaster');
                
            });
        });
</script>

<?php  ?>