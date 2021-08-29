

		<div class="container-fluid">
        <div class="msg" style="display:none;"></div>

      
        <div class="card">
            <div class="card-header">
                <h3><?php echo $title ?></h3>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <form id="form-edit-form" method="post">
                    <div class="box-body form-horizontal">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Form Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Form Name"required="" value="<?php echo $data->form_name ?>" readonly> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label label-form">Description</label>
                            <div class="col-sm-10">
                                <input type="text" id="description" name="description" class="form-control" placeholder="Description" value="<?php echo $data->form_description ?>">
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
                        <a href="<?php echo site_url('/user/Form'); ?>" class="btn btn-danger" style="color:white;">Cancel</a>
                    <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
          </div>
        </div>


























</div>


<?php $this->load->view("admin/_partials/js.php") ?>
    



<script type="text/javascript">


    document.getElementById("form_create").checked = <?php if($data->form_create==1){?>true<?php }else{ ?>false<?php } ?>;
    document.getElementById("form_read").checked = <?php if($data->form_read==1){?>true<?php }else{ ?>false<?php } ?>;
    document.getElementById("form_update").checked = <?php if($data->form_update==1){?>true<?php }else{ ?>false<?php } ?>;
    document.getElementById("form_delete").checked = <?php if($data->form_delete==1){?>true<?php }else{ ?>false<?php } ?>;

    $(document).ready(function(){
        $('#form-edit-form').submit(function(e) {
            var formData = new FormData(this);
            var name = $('#name').val();
            var description = $('#description').val();


            formData.append("form_create",document.getElementById("form_create").checked);
            formData.append("form_read",document.getElementById("form_read").checked);
            formData.append("form_update",document.getElementById("form_update").checked);
            formData.append("form_delete",document.getElementById("form_delete").checked);
            formData.append("name",name);
            formData.append("description",description);
            formData.append("id",<?php echo $data->form_id ?>);
            e.preventDefault();
            console.log(document.getElementById("form_create").checked);
            sendRequest(e,formData, '/user/Form/updateform','/user/Form');
            
            var name = $('#name').val();
            
            
        });
    });
</script>

<?php  ?>