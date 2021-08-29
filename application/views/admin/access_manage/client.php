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
                    <button class="form-control btn btn-primary" onclick="location.href='<?php echo site_url("user/Client/add") ?>'"><i class="fa fa-plus-circle"></i> New Client</button>
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
                          <th class="th-left" style="width: 30%">Client Code</th>
                          <th class="th-middle" style="width: 10%">Client Name</th>
                          <th class="th-middle" style="width: 10%">Description</th>
                          <th class="th-middle" style="width: 12%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < count($data); $i++) { ?>
                        <tr  id="<?php echo $data[$i]->client_id; ?>">  
                          <td class="th-middle"><?php echo ($i+1) ?></td>
                          <td class="th-left"><?php echo $data[$i]->client_code ?></td>
                          <td class="th-middle"><?php echo $data[$i]->client_name ?></td>
                          <td class="th-middle"><?php echo $data[$i]->client_description ?></td>
                          <td class="th-middle">
                          <a href="<?php echo site_url('user/client/edit/'.$data[$i]->client_id) ?>"
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
    

        
<script type="text/javascript">
    $(".remove").click(function(){
        var id =$(this).parents("tr").attr("id");
        console.log(id);


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '<?php echo base_url(); ?>index.php/user/client/delete/'+id,
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