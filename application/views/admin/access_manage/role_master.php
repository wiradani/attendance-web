<div class="container-fluid">


        <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-4" style="padding: 1;">
                  <h4><?php echo $title ?></h4>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4" style="padding: 0;text-align: right;">
                    <?php if ($level === "superadmin" || $acc_rmaster["create"]){ ?>
                      <button class="form-control btn btn-primary" onclick="location.href='<?php echo site_url("user/RoleMaster/add") ?>'"><i class="fa fa-plus-circle"></i> New Role Master</button>
                    <?php } ?>
                </div>
            </div>
            </div>
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="chart tab-pane active" id="mor-grid" style="position: relative; font-size:90%;">
                    <table id="dataTable" class="display table table-bordered table-hover" style="font-size:90%">
                   
                      <thead>
                        <tr>
                        <th class="th-middle" style="width: 5%">NO</th>
                        <th class="th-left" style="width: 25%">Role Master Name</th>
                        <th class="th-left" style="width: 13%">Client Code</th>
                        <th class="th-left" style="width: 25%">Client Name</th>
                        <th class="th-middle" style="width: 12%">Super Admin</th>
                        <?php if ($level === "superadmin" || $acc_rmaster["update"] || $acc_rmaster["delete"]){ ?>
                          <th class="th-middle" style="width: 20%">Action</th>
                        <?php }  ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < count($data); $i++) { ?>
                          <tr  id="<?php echo $data[$i]['rm_id']; ?>">  
                          <td class="th-middle"><?php echo ($i+1) ?></td>
                          <td class="th-left"><?php echo strtoupper($data[$i]['rm_name']) ?></td>
                          <td class="th-left"><?php echo $data[$i]['client_code'] ?></td>
                          <td class="th-left"><?php echo $data[$i]['client_name'] ?></td>
                          <td class="th-middle"><?php if($data[$i]['su']==1) $delete = "True"; else $delete = "False"; echo $delete?></td>
                          <?php if ($level === "superadmin" || $acc_rmaster["update"] || $acc_rmaster["delete"] || $acc_rdetail["read"]){ ?>
                          <td class="th-middle">
                            <?php if ($level === "superadmin" || $acc_rmaster["update"]){ ?>
                              <a class="btn btn-xs btn-warning" href="<?php echo site_url().'/user/RoleMaster/edit/'.$data[$i]['rm_id']; ?>" style=" font-size: 10px;">
                                  <i class="fa fa-edit"></i> Edit</a> 
                              <?php }  ?>
                            <?php if ($level === "superadmin" || $acc_rmaster["delete"]){ ?>
                                  <button type="submit" class="btn btn-small btn-danger  remove" style=" font-size: 10px;"><i class="fas fa-trash"></i> Delete</button>
                              <?php }  ?>
                            <?php if ($level === "superadmin" || $acc_rdetail["read"]){ ?>
                              <a class="btn btn-xs btn-success" onclick="goLogGeneral('Setup Role','Open role detail <?php echo $data[$i]['rm_name'] ?> ');" href="<?php echo site_url().'/user/RoleDetail/detail/'.$data[$i]['rm_id']; ?>" style=" font-size: 10px;">
                                  <i class="fa fa-search"></i> Detail</a> 
                            <?php }  ?>
                          </td>
                          <?php }  ?>
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
        


















        <?php show_my_confirm('confirmDeleteRM', 'confirmDelete-RoleMaster', 'Delete this Role?', 'Yes');?>






</div>

<?php $this->load->view("admin/_partials/js.php") ?>

        
<script type="text/javascript">
    $(".remove").click(function(){
        var id =$(this).parents("tr").attr("id");
        console.log(id);


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '<?php echo base_url(); ?>index.php/user/RoleMaster/deleteRoleMaster/'+id,
               type: 'DELETE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                   console.log(id);
                    $("#"+id).remove();
                    alert("Record removed successfully"); 
                    getLogActivity('<?php echo $client_code;?>', '<?php echo $user_id;?>', '<?php echo Site_url();?>','Setup Role ','Delete Role - '+id);
                    location.reload(); 
               }
            });
        }
    });


</script>




<?php  ?>