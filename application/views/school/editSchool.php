<?php
$stuId = $this->session->userdata('stuId');
$cmId = $this->session->userdata('cmId');
$mcId = $this->session->userdata('mcId');
$usrType = $this->session->userdata('usrType');
		
$accId = $stuId.$cmId.$mcId.$usrType;
?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel"> <br />
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>School/edit" method="post">
      <?php
				$k = 0;
				while ($k < count($schoolData)) {
				$sId = $schoolData[$k]['sId'];
				$camId = $schoolData[$k]['camId'];
				$campusName = $schoolData[$k]['campusName'];
				$schoolName = $schoolData[$k]['schoolName'];


				if($accId == 0001){
				?>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Campus<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="campus" id="campus">
            <option value="0"></option>
            <?php
			echo "<option value='$camId' selected='selected'>$campusName</option>";
						$k = 0;
						while ($k < count($campusData)) {
							$camId = $campusData[$k]['camId'];
							$campusName = $campusData[$k]['campusName'];
							echo "<option value='$camId'>$campusName</option>";
							$k++;
                        }
                        ?>
          </select>
        </div>
      </div>
      <?php
	  }else{
		  echo "<input type='hidden' value='$cmId' name='campus' id='campus' />";
	  }
	 ?>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">School Name<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="schoolName" name="schoolName" required class="form-control col-md-7 col-xs-12" value="<?php echo $schoolName;?>">
          <input type="hidden" id="sId" name="sId" required class="form-control col-md-7 col-xs-12" value="<?php echo $sId;?>">
        </div>
      </div>
      <?php
    			$k++;
				}
				?>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
          <!--<button type="submit" class="btn btn-primary">Cancel</button>-->
          <button type="submit" class="btn btn-success" id="schlName">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
<!-- Validation -->
$('#schlName').click(function() {
        var err = 0;
        var err_msg = "";
        if (document.getElementById('campus').value === "0" || document.getElementById('campus').value === "") {
            err = 1;
            err_msg = "Please Enter Campus Name or Select School from the view page.</br>";
        }
		if (document.getElementById('sId').value === "" || document.getElementById('sId').value === "") {
            err = 1;
            err_msg += "Please Enter School Name or Select School from the view page.";
        }
		if (document.getElementById('schoolName').value === "") {
            err = 1;
            err_msg += "Please Enter School Name.";
        }
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
