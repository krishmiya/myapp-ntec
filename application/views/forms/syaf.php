<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>-->
<?php
	date_default_timezone_set("NZ");
	$stuId = $this->session->userdata('stuId');
	$cmId = $this->session->userdata('cmId');
	$usrType = $this->session->userdata('usrType');
	$mcId = $this->session->userdata('mcId');
		
	$accId = $stuId.$cmId.$mcId.$usrType;
?>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel"> <br />
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Syaf/add_syaf" method="post">
    	<?php
			if($this->session->userdata('succ_msg')){
        ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
          <strong>Successful!</strong> <?php echo $this->session->userdata('succ_msg'); ?> </div>
        <?php
        	$this->session->unset_userdata('succ_msg');
			}
            if($this->session->userdata('err_msg')){
        ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
          <strong>Error!</strong><?php echo $this->session->userdata('err_msg'); ?> </div>
        <?php
			$this->session->unset_userdata('err_msg');
			}
			if($this->session->userdata('war_msg')){
        ?>
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
          <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
          <strong>Error!</strong><?php echo $this->session->userdata('war_msg'); ?> </div>
        <?php
			$this->session->unset_userdata('war_msg');
			}
			
      $k = 0;
      while ($k < count($pdData)) {
		  if($usrType != 0){
			  $syaId = $this->session->set_userdata('syaId', $pdData[$k]['syaId']);
		  }
		
      	$firstName = $pdData[$k]['firstName'];
        $lastName = $pdData[$k]['lastName'];
		$dob = $pdData[$k]['dob'];
		$stuId = $pdData[$k]['stuId'];
		$telephone = $pdData[$k]['telephone'];
		$email = $pdData[$k]['email'];
		$address = $pdData[$k]['address'];
		$iExpiryDate = $pdData[$k]['iExpiryDate'];
		$ppVisaDate = $pdData[$k]['ppVisaDate'];
      ?>
      <!-- Start of Student Use -->
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Personal Details.</p>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <label class="col-md-6 col-sm-6 col-xs-12" for="first-name"><sup>(First Name)</sup></label>
          <label class="col-md-6 col-sm-6 col-xs-12" for="first-name"><sup>(Last Name)</sup></label>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
		  	echo "<label class='control-label col-md-6 col-sm-6 col-xs-12' style='text-align:left;' for='first-name'>$firstName</label><label class='control-label col-md-6 col-sm-6 col-xs-12' style='text-align:left;' for='first-name'>$lastName</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of Birth<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='control-label' for='first-name'>$dob</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student ID<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='control-label' for='first-name'>$stuId</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='control-label' for='first-name'>$email</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Current Address<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='control-label' for='first-name'>$address</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact Phone<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='control-label' for='first-name'>$telephone</label>";
                ?>
        </div>
      </div>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Insurence and Visa Details.</p>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Current Visa Expiration Date<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='control-label' for='first-name'>$ppVisaDate</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Current Insurence Expiration Date<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='control-label' for='first-name'>$iExpiryDate</label>";
                ?>
        </div>
      </div>
      <?php
	  $k++;
	  }
      ?>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Second Year Request.</p>
      <?php
		if($accId == 0001 || $usrType == 0){
        ?>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="course" id="course">
            <option value="0">Select course</option>
            <?php
                        if(count($courseData) > 0){
                            $k = 0;
                            while ($k < count($courseData)) {
                                $crsId = $courseData[$k]['crsId'];
                                $campusName = $courseData[$k]['campusName'];
								$schoolName = $courseData[$k]['schoolName'];
								$courseName = $courseData[$k]['courseName'];
                                echo "<option value='$crsId'>$schoolName <b>/</b> $courseName</option>";
                                $k++;
                            }
                        }else{
                            echo '<option value="0">Course not available</option>';
                        }
                        ?>
          </select>
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="x_content">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><u>Student Declaration:</u></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> I have read and understood the requirements for campus/school/programme change outlined above. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="agree" id="stuDec" value="1" class="flat" data-parsley-multiple="hobbies">
                  <input type="hidden" name="app_date" value="<?php echo date("Y-m-d");?>" />
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date <?php echo date('Y-m-d');?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
          <!--<button type="submit" class="btn btn-primary">Cancel</button>-->
          <button type="submit" class="btn btn-success pull-right" id="stuSecond">Submit</button>
        </div>
      </div>
      <?php
		}else{
			$n = 0;
		  while ($n < count($rcData)) {
			$schoolName = $rcData[$n]['schoolName'];
			$courseName = $rcData[$n]['courseName'];
        ?>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">School<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <?php
		  	echo "<label class='control-label' for='first-name'>$schoolName</label>";
          ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Programme</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        	<?php
		  		echo "<label class='control-label' for='first-name'>$courseName</label>";
            ?>
        </div>
      </div>
      <?php
	  $n++;
		  }
		}
        ?>
      <!-- End of Student Use -->
    </form>
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Syaf/fac_cws" method="post">
    <!-- Start of Office Use -->
    <?php
		if($usrType == 3 || $usrType == 6 && $cmId != "" && $stuId == 0){
			$approve = count($csData);
        ?>
        <input type="hidden" name="app_date" value="<?php echo date("Y-m-d");?>" />
        <div class="form-group">
        <div class="x_content">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th colspan="2"><i><<< Office Use Only >>></i></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Faculty Admin in Charge</td>
                <td>
                <?php
					if($approve != 0){// I changed here == to !=
				?>
                <select class="form-control" name="faic" id="faic">
                    <option value="0">Select</option>
                    <option value="1">Approve</option>
                    <option value="2">Decline</option>
                  </select>
                <?php
				}else{
					echo "Complete";
				}
				?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Comment<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
        <?php
			if($approve != 0){// I changed here == to !=
		?>
          <textarea id="ofcMessage" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
         <?php
			}else{
				echo '<p class="form-control-static col-md-12 col-sm-12 col-xs-12" for="first-name">'.$pdData[0]['office_comment'].'</p>';
			}
		 ?>
        </div>
      </div>
      <?php
			if($approve != 0){// I changed here == to !=
		?>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
          <!--<button type="submit" class="btn btn-primary">Cancel</button>-->
          <button type="submit" class="btn btn-success pull-right" id="facCws">Submit</button>
        </div>
      </div>
        <?php
			}
		}else if($usrType == 4){
        ?>
        <div class="form-group">
        <div class="x_content">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th colspan="2"><i><<< Office Use Only >>></i></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Faculty Admin in Charge</td>
                <td>
				<?php
				//$fac_cws = count($asData);
				if($pdData[0]['status'] == 1){
					echo "Approved";
				}
				if($pdData[0]['status'] == 2){
					echo "Not Approved";
				}
				?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Comment<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <p class="form-control-static col-md-12 col-sm-12 col-xs-12" for="first-name">
          <?php 
		  //$fac_cws = count($asData);
		  if($pdData[0]['status'] == 1 || $pdData[0]['status'] == 2){
			  echo $pdData[0]['office_comment'];
		   }else{
			   echo "No comment";
		   }
		  ?>
          </p>
        </div>
      </div>
        <?php
		}
        ?>
      <!-- End of Office Use -->
    </form>
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Syaf/add_acc" method="post">
      <!-- Start of Office Use -->
      <?php
		if($usrType == 4 && $pdData[0]['status'] == 1){
        ?>
      <div class="form-group">
        <div class="x_content">
          <table class="table table-bordered">
            <tr>
              <th colspan="11">&lt;&lt;&lt; Office Use Only &gt;&gt;&gt;</th>
            </tr>
            <tr>
              <th rowspan="2">Course</th>
              <td colspan="3">Course (Term) Start Date</td>
              <td colspan="3"><input type="text" id="csDate" name="csDate" class="form-control col-md-7 col-xs-12 csDate"></td>
              <td colspan="2">Average Marks</td>
              <td><input type="text" id="avgMarks" name="avgMarks" class="form-control col-md-7 col-xs-12"></td>
              <td>%</td>
            </tr>
            <tr>
              <td colspan="3">Course Completion Date</td>
              <td colspan="3"><input type="text" id="ccDate" name="ccDate" class="form-control col-md-7 col-xs-12 csDate"></td>
              <td colspan="2">Attendance</td>
              <td><input type="text" id="attendance" name="attendance" class="form-control col-md-7 col-xs-12"></td>
              <td>%</td>
            </tr>
            <tr>
              <th>English Test</th>
              <td>IELTS Internal Test </td>
              <td colspan="2"><input type="radio" name="ielts" id="Yes" value="1" />
                Yes</td>
              <td><input type="radio" name="ielts" id="No" value="2" />
                No </td>
              <td>Test Date</td>
              <td colspan="5">
              	<input type="text" id="ieltsDate" name="ieltsDate" class="form-control col-md-7 col-xs-12 ieltsDate">
                <input type="hidden" name="sign_date" id="currentDate" value="<?php echo date("Y-m-d");?>" />
              </td>
            </tr>
            <tr>
              <th scope="row">Scholarship/Discount</th>
              <td>Scholarship</td>
              <td><input type="text" id="first-name" name="scholarship" class="form-control col-md-7 col-xs-12"></td>
              <td>%</td>
              <td>Discount</td>
              <td><input type="text" id="first-name" name="discount" class="form-control col-md-7 col-xs-12"></td>
              <td>%</td>
              <td>Criterion 1</td>
              <td><input type="text" id="first-name" name="cone" class="form-control col-md-7 col-xs-12"></td>
              <td>Criterion 2</td>
              <td><input type="text" id="first-name" name="ctwo" class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <th rowspan="3">Fees</th>
              <td colspan="5">(Original 2nd yr tuition fee)</td>
              <td>$</td>
              <td colspan="4"><input type="text" id="otf" name="otf" class="form-control col-md-7 col-xs-12" /></td>
            </tr>
            <tr>
              <td colspan="5">(Resource fee)</td>
              <td>+$</td>
              <td colspan="4"><input type="text" id="rf" name="rf" class="form-control col-md-7 col-xs-12" /></td>
            </tr>
            <tr>
              <td colspan="5">(Insurance fee)</td>
              <td>+$</td>
              <td colspan="4"><input type="text" id="ifee" name="if" class="form-control col-md-7 col-xs-12" /></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <!--<button type="submit" class="btn btn-primary">Cancel</button>-->
          	<button type="submit" class="btn btn-success pull-right" id="ac">Submit</button>
          </div>
      </div>
      <?php
		}
        ?>
      <!-- End of Office Use -->
    </form>
  </div>
</div>
<script>
<!-- Student -->
	$('#stuSecond').click(function() {
        var err = 0;
        var err_msg = "";
		if (document.getElementById('course').value === "0") {
            err = 1;
            err_msg += "Please Select Second Year Course.<br>";
        }
		if (document.getElementById('stuDec').checked == false) {
            err = 1;
            err_msg += "You must agree to terms and conditions.<br>";
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
	<!-- Student -->
	<!-- FAC CWS-->
	$('#facCws').click(function() {
        var err = 0;
        var err_msg = "";

		if (document.getElementById('faic').value === "0") {
            err = 1;
            err_msg = "Please Select Faculty Admin in Charge Approve / Decline.<br>";
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
	<!-- FAC CWS-->
	<!-- ACADEMIC CLERK-->
	$('#ac').click(function() {
        var err = 0;
        var err_msg = "";

		if (document.getElementById('csDate').value === "") {
            err = 1;
            err_msg += "Please Select Course (Term) Start Date.<br>";
        }
		if (document.getElementById('ccDate').value === "") {
            err = 1;
            err_msg += "Please Select Course Completion Date.<br>";
        }
		if (document.getElementById('csDate').value != "" && document.getElementById('csDate').value < document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Course (Term) Start Date.<br>";
        }
		if (document.getElementById('ccDate').value != "" && document.getElementById('ccDate').value < document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Course Completion Date.<br>";
        }
		if (document.getElementById('ccDate').value != "" && document.getElementById('csDate').value != "" && document.getElementById('ccDate').value < document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Course Completion Date.<br>";
        }
		if (document.getElementById('avgMarks').value === "") {
            err = 1;
            err_msg += "Please Enter Average Marks.<br>";
        }
		if (document.getElementById('attendance').value === "") {
            err = 1;
            err_msg += "Please Enter Attendance.<br>";
        }
		if (document.getElementById('otf').value === "") {
            err = 1;
            err_msg += "Please Enter Original 2nd yr Tuition Fee.<br>";
        }
		if (document.getElementById('rf').value === "") {
            err = 1;
            err_msg += "Please Enter Resource Fee.<br>";
        }
		if (document.getElementById('ifee').value === "") {
            err = 1;
            err_msg += "Please Enter Insurance Fee.<br>";
        }
		if (document.getElementById("Yes").checked === true) {
            if (document.getElementById('ieltsDate').value === "") {
				err = 1;
				err_msg += "Please Select IELTS Date.<br>";
        	}
			if (document.getElementById('ieltsDate').value !="" && document.getElementById('ieltsDate').value < document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid IELTS Date.<br>";
        	}
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
	<!-- ACADEMIC CLERK-->
	</script>
