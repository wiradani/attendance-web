<div class="container-fluid">
        <div class="msg" style="display:none;"></div>


        






        <div class="card">
            <div class="card-header">
                <h3><?php echo $title ?></h3>
            </div>
            <div class="card-body"> 
              <div class="tab-content">
                <form id="form-edit-roledetail" method="post">
                    <div class="box-body form-horizontal">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Role Master</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="rolemaster" id="rolemaster" required="" aria-describedby="sizing-addon2">
                                    <?php foreach ($master as $row) { ?>
                                        <option value="<?php echo $row['rm_id'] ?>" 
                                            <?php if($row['rm_id'] == $data['rm_id']){ ?>
                                                selected="selected" <?php } ?>>
                                            <?php echo $row['rm_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Form</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="form" id="form" required="" aria-describedby="sizing-addon2">
                                    <?php foreach ($form as $row) { ?>
                                        <option value="<?php echo $row['form_id'] ?>"
                                            <?php if($row['form_id'] == $data['form_id']) { ?>
                                                selected="selected" <?php } ?>>
                                            <?php echo $row['form_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Access</label>
                            <div class="col-sm-10">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" name="form_create" id="form_create">
                                  <label for="form_create" class="custom-control-label">Create</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="form_read"name="form_read">
                                  <label for="form_read" class="custom-control-label">Read</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="form_update"name="form_update" >
                                  <label for="form_update" class="custom-control-label">Update</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="form_delete"name="form_delete" >
                                  <label for="form_delete" class="custom-control-label">Delete</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?php echo site_url('/user/RoleDetail/detail/'.$role_master); ?>" class="btn btn-danger" style="color:white;">Cancel</a>
                    <button type="submit" class="btn btn-info" onclick="goLogGeneral('Role Detail ','Edit  Role');" >Submit</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
          </div>
        </div>
























</div>

<?php $this->load->view("admin/_partials/js.php") ?>
    




<script type="text/javascript">

    document.getElementById("form_create").checked = <?php if($data['rd_create']==1){?>true<?php }else{ ?>false<?php } ?>;
    document.getElementById("form_read").checked = <?php if($data['rd_read']==1){?>true<?php }else{ ?>false<?php } ?>;
    document.getElementById("form_update").checked = <?php if($data['rd_update']==1){?>true<?php }else{ ?>false<?php } ?>;
    document.getElementById("form_delete").checked = <?php if($data['rd_delete']==1){?>true<?php }else{ ?>false<?php } ?>;

    $(document).ready(function(){

        $('#form-edit-roledetail').submit(function(e) {
            var formData = new FormData(this);
            formData.append("form_create",document.getElementById("form_create").checked);
            formData.append("form_read",document.getElementById("form_read").checked);
            formData.append("form_update",document.getElementById("form_update").checked);
            formData.append("form_delete",document.getElementById("form_delete").checked);
            e.preventDefault();
            console.log(document.getElementById("form_create").checked);
            sendRequest(e,formData, '/user/RoleDetail/update','/user/RoleDetail/detail/<?php echo $role_master ?>');
        });

        getAccess();

        $('#form').on("change", function(event) { 
            event.preventDefault();
            getAccess();
        });
            
        function getAccess(){
            var selectedform = $("#form").val();
            $.ajax({
                url: "<?php echo site_url('/user/RoleDetail/getFormAccess'); ?>",
                type: "POST",
                data: { "id": selectedform},
                async : false,
                dataType : "json",
                success: function (data) {
                    var access = data.acc;
                    if(access.form_create==="0"){
                        document.getElementById("form_create").disabled = true;
                        document.getElementById("form_create").checked = false;
                    }else{
                        document.getElementById("form_create").disabled = false;
                    }
                    if(access.form_read==="0"){
                        document.getElementById("form_read").disabled = true;
                        document.getElementById("form_read").checked = false;
                    }else{
                        document.getElementById("form_read").disabled = false;
                    }
                    if(access.form_update==="0"){
                        document.getElementById("form_update").disabled = true;
                        document.getElementById("form_update").checked = false;
                    }else{
                        document.getElementById("form_update").disabled = false;
                    }
                    if(access.form_delete==="0"){
                        document.getElementById("form_delete").disabled = true;
                        document.getElementById("form_delete").checked = false;
                    }else{
                        document.getElementById("form_delete").disabled = false;
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError);
                }
            });
        }
    });
</script>

<?php  ?>