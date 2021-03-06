<!DOCTYPE html>
<html class="no-js">

<head>
    <?php echo $_head; ?>
</head>

 
<body> 
	<?php echo $_navbar; ?>
	
		<div id="wrapper">
			<?php echo $_sidebar; ?> 
			<?php echo $_content; ?>  
			<?php echo $_footer; ?>
		</div>
		

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

	 	 <center>
            <img class="img" style="height: 60px;" src="<?php echo base_url(); ?>assets\images\assets\out_icon.png" alt="Theme-Logo" >
         </center>
	  Select "Logout" below if you are ready to end your current session.
	  </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?php echo site_url('user/login/logout') ?>" onclick="goLogGeneral('Logout','Logout Success')">Logout</a>
      </div>
    </div>
  </div>
</div>


<!-- SET UP PIN Modal-->
<div class="modal fade bd-example-modal-sm"   id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
  <form action="<?php echo site_url('admin/overview/settingPIN'); ?>" method="POST">
    <div class="modal-content">
	  
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Set Up EDC PIN</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<div class="modal-body">
				<div class="form-group">
                  <label>Input PIN:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-lock"></i></span>
					</div>
					<div class="col-xs-2">
						<input type="number" name="pin" id="pin" class="form-control" pattern="/^-?\d+\.?\d*$/"  value="<?php echo $pin->pin ?>" onKeyPress="if(this.value.length==6) return false;" />
					</div>
				  </div>
				  <p class="help-block" style="font-size: 10px;">PIN must be  6  numeric characters</p>
                </div>
		</div>

		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button  name="btnUpdatePIN"   onclick="goLogPIN();" id="btnUpdatePIN" type="submit" class="btn btn-primary" >Set up</button>
      	</div>

    </div>
</form>
  </div>
</div>

<!-- Setting Modal -->
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
<div class="modal fade bd-example-modal-lg" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="<?php echo site_url('user/atd/checkIn'); ?>" method="POST">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check IN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			         	<div class="aParent">
						    <div style="width: 50%;">
			          			<div class="col-12">
						          	<div class="card" style="margin-bottom: 0px;">
							            <div style="padding: 15px;">
										
					                      	<div class="item form-group" style="width: 100%;">
					                        	<label class="control-label" for="name">Status<span class="required"></span>
					                        	</label>
						                        <div class="input-group">
													<select name="status" id="status">
														<option value="WFO">WFO</option>
														<option value="WFH">WFH</option>
														<option value="WFA">WFA</option>
														<option value="etc">etc</option>
													</select>
						                        </div>
					                      	</div>

											  <div class="item form-group" style="width: 100%;">
													 <label class="control-label" for="name">Desc<span class="required"></span>
								                        <div class="input-group item form-group">	                            
								                          	<input style="text-align: center; width: 100%;" id="desc" class="form-control" name="desc"  type="text"  >
								                        </div>
								              </div>



						              </div>
						          </div>
				        		</div>
					    	</div>
						   
      <div class="modal-footer">
        <br>
        <br>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  name="btnUpdateParam" type="submit" class="btn btn-info" >Submit</button>
      </div>
    </div>
    </form>
  </div>
</div>




</body>

<script type="text/javascript">
	function goLog(){		
    	var timepickers = document.getElementById("timepickers").value;
    	var periode = document.getElementById("periode").value;
    	var second = document.getElementById("second").value;
    	
		getLogActivity('<?php echo $client_code;?>', '<?php echo $user_id;?>', '<?php echo site_url();?>','EDC Sync Setting','Update Time <?php echo $valueParam["time"]?> to '+timepickers+ ' - Primary - <?php echo $valueParam["priodic"]?> to '+periode+' & secondary- <?php echo $valueParam["second"]?> to '+second);
	}
</script>

<script type="text/javascript">
	function goLogPIN(){		
    	var pin = document.getElementById("pin").value;
    	
		getLogActivity('<?php echo $client_code;?>', '<?php echo $user_id;?>', '<?php echo site_url();?>','Set up PIN EDC','PIN <?php echo $pin->pin ?> to '+pin);
	}
</script>




</html>
