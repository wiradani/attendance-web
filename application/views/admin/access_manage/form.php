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
                    <button class="form-control btn btn-primary" onclick="location.href='<?php echo site_url("user/Form/add") ?>'"><i class="fa fa-plus-circle"></i> New Form</button>
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
                          <th class="th-left" style="width: 30%">Form Name</th>
                          <th class="th-middle" style="width: 10%">Create</th>
                          <th class="th-middle" style="width: 10%">Read</th>
                          <th class="th-middle" style="width: 10%">Update</th>
                          <th class="th-middle" style="width: 10%">Delete</th>
                          <th class="th-middle" style="width: 12%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < count($data); $i++) { ?>
                        <tr  id="<?php echo $data[$i]->form_id; ?>">  
                          <td class="th-middle"><?php echo ($i+1) ?></td>
                          <td class="th-left"><?php echo $data[$i]->form_name ?></td>
                          <td class="th-middle"><?php if($data[$i]->form_create==1) $create = "True"; else $create = "False"; echo $create?></td>
                          <td class="th-middle"><?php if($data[$i]->form_read==1) $read = "True"; else $read = "False"; echo $read?></td>
                          <td class="th-middle"><?php if($data[$i]->form_update==1) $update = "True"; else $update = "False"; echo $update?></td>
                          <td class="th-middle"><?php if($data[$i]->form_delete==1) $delete = "True"; else $delete = "False"; echo $delete?></td>
                          <td class="th-middle">
                          <a href="<?php echo site_url('user/form/edit/'.$data[$i]->form_id) ?>"
                                            class="btn btn-small" style=" font-size: 10px;" ><i class="fas fa-edit"></i> Edit</a>

                                <button type="submit" class="btn btn-small btn-link text-danger remove" style=" font-size: 10px;"><i class="fas fa-trash"></i> Delete</button>
                            </td>
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
    
</body>
        
<script type="text/javascript">
    $(".remove").click(function(){
        var id =$(this).parents("tr").attr("id");
        console.log(id);


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '<?php echo base_url(); ?>index.php/user/form/deleteForm/'+id,
               type: 'DELETE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                   console.log(id);
                    $("#"+id).remove();
                    alert("Record removed successfully"); 
                    location.reload(); 
               }
            });
        }
    });


</script>




<?php  ?>