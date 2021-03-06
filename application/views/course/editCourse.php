<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
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
        <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Course/edit" method="post">
        	<?php
			if($accId == 0001){
			?>
            <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Campus Name<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="campus" id="campus">
                <option value="0">Select campus</option>
                        <?php
						if(count($commData) > 0){
							$k = 0;
							while ($k < count($commData)) {
								$camId = $commData[$k]['camId'];
								$campusName = $commData[$k]['campusName'];
								echo "<option value='$camId' selected='selected'>$campusName</option>";
								$k++;
							}
							
							$n = 0;
							while ($n < count($campusData)) {
								$camId = $campusData[$n]['camId'];
								$campusName = $campusData[$n]['campusName'];
								echo "<option value='$camId'>$campusName</option>";
								$n++;
							}
						}
						else{
							$n = 0;
							while ($n < count($campusData)) {
								$camId = $campusData[$n]['camId'];
								$campusName = $campusData[$n]['campusName'];
								echo "<option value='$camId'>$campusName</option>";
								$n++;
							}
						}
                        ?>
                    </select>
				</div>
			</div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">School<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<select class="form-control" name="school" id="school">
                        <?php
						if(count($commData) > 0){
							$k = 0;
							while ($k < count($commData)) {
								$sId = $commData[$k]['sId'];
								$schoolName = $commData[$k]['schoolName'];
								echo "<option value='$sId' selected='selected'>$schoolName</option>";
								$k++;
							}
						}
						else{
							echo "<option value='0'>Select campus first</option>";
						}
                        ?>
                    </select>
                </div>
			</div>
            <?php
				}else{
					echo "<input type='hidden' value='$cmId' name='campus' id='campus' />";
				?>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">School<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<select class="form-control" name="school" id="school">
                        <?php
						if(count($commData) > 0){
							$k = 0;
							while ($k < count($commData)) {
								$sId = $commData[$k]['sId'];
								$schoolName = $commData[$k]['schoolName'];
								echo "<option value='$sId' selected='selected'>$schoolName</option>";
								$k++;
							}
							
							$n = 0;
							while ($n < count($schoolData)) {
								$sId = $schoolData[$n]['sId'];
								$schoolName = $schoolData[$n]['schoolName'];
								echo "<option value='$sId'>$schoolName</option>";
								$n++;
							}
						}
						else{
							echo "<option value='0'>Select campus first</option>";
						}
                        ?>
                    </select>
                </div>
			</div>
            <?php
				}
			?>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Department<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<select class="form-control" name="department" id="department">
                        <option value="0">Select department</option>
                         <?php
						if(count($commData) > 0){
							$k = 0;
							while ($k < count($commData)) {
								$mcId = $commData[$k]['mcId'];
								$mainDescription = $commData[$k]['mainDescription'];
								echo "<option value='$mcId' selected='selected'>$mainDescription</option>";
								$k++;
							}
							
							$n = 0;
							while ($n < count($departmentData)) {
								$mcId = $departmentData[$n]['mcId'];
								$mainDescription = $departmentData[$n]['mainDescription'];
								echo "<option value='$mcId'>$mainDescription</option>";
								$n++;
                        	}
						}
						else{
							$k = 0;
							while ($k < count($departmentData)) {
								$mcId = $departmentData[$k]['mcId'];
								$mainDescription = $departmentData[$k]['mainDescription'];
								echo "<option value='$mcId'>$mainDescription</option>";
								$k++;
                        	}
						}
                        ?>
                    </select>
                </div>
			</div>
            
            <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Course Name<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <?php
				$k = 0;
				while ($k < count($commData)) {
					$crsId = $commData[$k]['crsId'];
					$courseName = $commData[$k]['courseName'];
					echo "<input type='text' id='courseName' name='courseName' value='$courseName' class='form-control col-md-7 col-xs-12'>";
					echo "<input type='hidden' value='$crsId' name='crsId' id='crsId' />";
					$k++;
				}
                ?>
				</div>
			</div>
			
	<div class="ln_solid"></div>
    <div class="form-group">
    	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        	<!--<button type="submit" class="btn btn-primary">Cancel</button>-->
            <button type="submit" class="btn btn-success" id="crsName">Update</button>
		</div>
	</div>
      </form>
    </div>
</div>
<script>
<!-- Validation -->
$('#crsName').click(function() {
        var err = 0;
        var err_msg = "";
        if (document.getElementById('campus').value === "" || document.getElementById('campus').value === "0") {
            err = 1;
            err_msg = "Please Select Campus Name.<br>";
        }
		if (document.getElementById('courseName').value === "" || document.getElementById('courseName').value === "0") {
            err = 1;
            err_msg += "Please Enter Course Name.<br>";
        }
		if (document.getElementById('crsId').value === "" || document.getElementById('crsId').value === "0") {
            err = 1;
            err_msg += "Please Select School Name.<br>";
        }
		if (document.getElementById('school').value === "" || document.getElementById('school').value === "0") {
            err = 1;
            err_msg += "Please Select School Name.<br>";
        }
		if (document.getElementById('department').value === "" || document.getElementById('department').value === "0") {
            err = 1;
            err_msg += "Please Select Department Name.<br>";
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
<script>
<!-- Dynamic dependent select box jquery ajax php -->
$(document).ready(function(){
    $('#campus').on('change',function(){
        var camID = $(this).val();
        if(camID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url() ?>School/get_school',
                data: {camID :camID},
                success:function(html){
                    $('#school').html(html);
                    //$('#course').html('<option value="">Select school first</option>'); 
                }
            }); 
        }else{
            $('#school').html('<option value="">Select campus first</option>');
            //$('#course').html('<option value="">Select school first</option>'); 
        }
    });
});
<!-- Dynamic dependent select box jquery ajax php -->
</script>