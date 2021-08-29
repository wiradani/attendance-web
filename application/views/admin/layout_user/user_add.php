<style type="text/css">
.field-icon {
  padding: 10px;
  min-width: 50px;
  text-align: center;
}

</style>


<div class="container-fluid">
        <div class="msg" style="display:none;"></div>


        <div class="card">
            <div class="card-body">
              <div class="tab-content">
                <form id="form-edit-user" method="post">
                    <div class="box-body form-horizontal">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name"required="" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username"required="" >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Division</label>
                            <div class="col-sm-10">
                                <input type="text" name="division" id="division" class="form-control" placeholder="division" required="">
                            </div>
                        </div>

                                                
                         <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="" >
                                    <div class="input-group-append">
                                        <span toggle="#password" style="padding-left:10px;" class="fa fa-fw fa-eye field-icon toggle-password btn btn-outline-secondary"></span>
                                    </div>
                                </div>
                                <p class="help-block" style="font-size: 10px;">Password must be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter</p>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Confirm Password</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Password" required="" >
                                    <div class="input-group-append">
                                        <span toggle="#confirm_password"  style="padding-left:10px;"  class="fa fa-fw fa-eye field-icon toggle-password btn btn-outline-secondary"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Mobile Number</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile Number" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">User Level</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="level" id="level" required="" aria-describedby="sizing-addon2">
                                <?php  foreach ($rolemaster as $row) { ?>
                                        <option value="<?php echo $row['rm_id'] ?>">
                                        <?php echo $row['client_code']." - ".$row['rm_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?php echo site_url('/user/User'); ?>" class="btn btn-danger" style="color:white;">Cancel</a>
                    <button type="submit" class="btn btn-info" onclick="goLogGeneral('User ','Add New User');" >Submit</button>
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

       
        $('#form-edit-user').submit(function(e) {

            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
            if($('#password').val().match(passw)) 
            { 
               
            }
            else
            { 
                alert("Password must be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter");
               
            }
        
            if($('#password').val() === $('#confirm_password').val()){
                e.preventDefault();
                sendRequest(e,new FormData(this), '/user/User/createData','/user/User/index');
                // window.location = '<?php echo site_url() ?>' ;
                }else{
                        e.preventDefault();
                        alert("Password not match!");
                    }
                });

        $(".toggle-password").click(function() {

          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
        });
    });
</script>

<?php  ?>