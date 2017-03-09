<?php
$stuId = $this->session->userdata('stuId');
$cmId = $this->session->userdata('cmId');
$mcId = $this->session->userdata('mcId');
$usrType = $this->session->userdata('usrType');
		
$accId = $stuId.$cmId.$mcId.$usrType;

?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    	<br />
        <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Login/add_users" method="post">
        	<div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">User Type<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<select class="form-control placeholder" name="userType" id="userType">
                      <option value="0">User Type</option>
                      <?php
                      if($accId == 0001){
					  ?>
                      <option value="1">Campus Super Admin</option>
                      <option value="9">International Counsellor</option>
                      <?php
					  }else{
					  ?>
                      <option value="1">Head of Department</option>
                      <option value="2">Account Clerk</option>
                      <option value="3">Consultation with student</option>
                      <option value="4">Academic Clerk</option>
                      <option value="6">Faculty Admin in Charge</option>
                      <?php
					  }
					  ?>
                    </select>
				</div>
			</div>
            <?php
				if($accId == 0001){
				?>
            <div class="form-group" id="camRow" style='display:none;'>
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Campus<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<select class="form-control placeholder" name="campus" id="campus">
                      <option value="0">Campus</option>
                      <?php
                      $k = 0;
                      while ($k < count($campus)) {
                          $camId = $campus[$k]['camId'];
                          $campusName = $campus[$k]['campusName'];
                          echo "<option value='$camId'>$campusName</option>";
                          $k++;
                      }
                      ?>
                    </select>
				</div>
			</div>
            <?php
				}else{
					echo "<input type='hidden' value='$cmId' name='campus' id='campus'/>";
				}
				
						if($accId != 0001){
						?>
            <div class="form-group" id="depRow" style='display:none;'>
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Department<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<select class="form-control placeholder" name="department" id="department">
                      <option value="0">Department</option>
                      <?php
                      $k = 0;
                      while ($k < count($department)) {
                          $mcId = $department[$k]['mcId'];
                          $mainDescription = $department[$k]['mainDescription'];
                          echo "<option value='$mcId'>$mainDescription</option>";
                          $k++;
                      }
                      ?>
                    </select>
				</div>
			</div>
            <?php
						}
			?>
            <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">First Name<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<input type="text" name="firstName" class="form-control col-md-7 col-xs-12" id="firstName">
				</div>
			</div>
            
            <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<input type="text" name="lastName" class="form-control col-md-7 col-xs-12" id="lastName">
				</div>
			</div>
            
            <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<input type="email" name="email" class="form-control col-md-7 col-xs-12" id="email">
				</div>
			</div>
			
	<div class="ln_solid"></div>
    <div class="form-group">
    	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        	<!--<button type="submit" class="btn btn-primary">Cancel</button>-->
            <button type="submit" class="btn btn-success" id="addUsr">Submit</button>
		</div>
	</div>
      </form>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#userType').on('change', function() {
	<?php
	if($accId == 0001){
	?>
	  if ( this.value == '1')
      {
        $("#camRow").show();
      }
      else
      {
        $("#camRow").hide();
      }
	<?php
	}else{
	?>
	if ( this.value == '1')
      {
        $("#depRow").show();
      }
      else
      {
        $("#depRow").hide();
      }
	<?php
	}
	?>
    });
});
</script>
<script>
<!-- Validation -->
$('#addUsr').click(function() {
        var err = 0;
        var err_msg = "";
		<?php
		if($accId == 0001){
		?>
		if (document.getElementById('userType').value === "1") {
			if (document.getElementById('campus').value === "0") {
            err = 1;
            err_msg += "Please Enter Campus Name.<br>";
        	}
        }
		if (document.getElementById('userType').value === "0") {
            err = 1;
            err_msg += "Please Select User Type.<br>";
        }
		if (document.getElementById('firstName').value === "") {
            err = 1;
            err_msg += "Please Enter First Name.<br>";
        }
		if (document.getElementById('lastName').value === "") {
            err = 1;
            err_msg += "Please Enter Last Name.<br>";
        }
		if (document.getElementById('email').value === "") {
            err = 1;
            err_msg += "Please Enter Email.<br>";
        }
		<?php
		}else{
		?>
		if (document.getElementById('userType').value === "0") {
            err = 1;
            err_msg += "Please Select User Type.<br>";
        }
		if (document.getElementById('userType').value === "1") {
			if (document.getElementById('department').value === "0") {
            err = 1;
            err_msg += "Please Select Department Name.<br>";
        	}
        }
		if (document.getElementById('firstName').value === "") {
            err = 1;
            err_msg += "Please Enter First Name.<br>";
        }
		if (document.getElementById('lastName').value === "") {
            err = 1;
            err_msg += "Please Enter Last Name.<br>";
        }
		if (document.getElementById('email').value === "") {
            err = 1;
            err_msg += "Please Enter Email.<br>";
        }
		<?php
		}
		?>
        if (err === 1) {
			
            bootbox.dialog({
                message: err_msg,
                title: "Error",
                buttons: {
                    main: {
                        label: "Close",
                        className: "btn-danger",
                        callback: function() {
                            console.log("Alert Callback");
                        }
                    }
                }
            });
            return false;
        }
    });
<!-- Validation -->
</script>