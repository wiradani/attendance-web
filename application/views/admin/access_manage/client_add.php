<div class="container-fluid">
        <div class="msg" style="display:none;"></div>


            <div class="card">
                <div class="card-header">
                    <h3><?php echo $title ?></h3>
                </div>
                <div class="card-body">
                <div class="tab-content">
                    <form id="form-add-form" method="post">
                        <div class="box-body form-horizontal">
                            <div class="form-group row">
                                <label class="col-sm-2 control-label label-form">Client Code</label>
                                <div class="col-sm-10">
                                    <input type="text" name="code" id="code" class="form-control" placeholder="Client Name"required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label label-form">Client Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Client Name"required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label label-form">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" id="description" name="description" class="form-control" placeholder="Description">
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="<?php echo site_url('user/Client'); ?>" class="btn btn-danger" style="color:white;">Cancel</a>
                        <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>



























</div>


<?php $this->load->view("admin/_partials/js.php") ?>
    

        


<script type="text/javascript">


   
    
    $(document).ready(function(){
        $('#form-add-form').submit(function(e) {
            var formData = new FormData(this);
            var name = $('#name').val();
            var description = $('#description').val();
            var code = $('#code').val();
            
           
            formData.append("name",name);
            formData.append("description",description);
            formData.append("code",code);
            e.preventDefault();
            
            sendRequest(e,formData, '/user/Client/create','/user/Client');
            
           
            
            
        });
    });
</script>

<?php  ?>