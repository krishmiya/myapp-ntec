<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>-->

<?php
	date_default_timezone_set("NZ");
	$stuId = $this->session->userdata('stuId');
	$cmId = $this->session->userdata('cmId');
	$usrType = $this->session->userdata('usrType');
	$mcId = $this->session->userdata('mcId');
		
	$accId = $stuId.$cmId.$mcId.$usrType;

	if($accId == 0001 || $usrType == 0){
?>

<div class="col-md-12 col-xs-12"> 
  <!--<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">If you wish to submit a request for change of campus,school or programme,please fill out your details below,read and sign the declaration,and hand this to your programme Administrator.</p>-->
  <p class="lead">Student Declaration :</p>
  <ol type="i">
    <li>Any change of campus,programme or school is subject to availability,and is at the descretion of the Heads of the relevant Faculties.</li>
    <li><b><i>Change of campus : </i></b>Students who receive approval from Ntec to change to a different campus (while staying with the same school and programme) must pay a transfer fee of $100 (if application is received within 10 days of commencement) <b> or $500 </b> (if application is received after 10 days of commencement)</li>
    <li><b><i>Change of school / Change of programme : </i></b> (new offer of place will be issued)
      <ul type="disc">
        <li>Students who receive approval from Ntec to change to a different school and/or programme are subject to <u>Ntec's Student Fee Refund Policy </u>(refer to Ntec website),and are required to withdraw from their original school and/or programme and re-enrol in the new school and/or programme.</li>
        <li><u>If the application is received 10 working days of the original programme's commencement, </u>the student fees,which he/she paid for the original school/programme, and which are held in the public Trust under FeeProject,will be transffered to the new programme/school,less an administration fee of 25% of the original fees paid.Where the fees for the new programme/school are higher than the original,the student will be required to pay the difference.If the fees for the new programme are less than the original refunded fee,the student will be refunded the difference (if students enrol on a 1 year course) or will be adjusted to the 2nd year (if students enrol on a 2 year course).In addition,student <b>must pay $100 for the admin fee.</b></li>
        <li><u>If the application is received more than 10 working days from the original programme's commencement,</u> as per Ntec's Student Fee Refund Policy, there will be no fee refund, and the student must pay <b>$500 transfer fee and additional fees per term studied(programme changed).</b></li>
      </ul>
    </li>
    <li>Any change of campus,school and/or programme is subject to immigration New Zealand(INZ) approving a Variation of Conditions Application, Which the student must submit to INZ.Ntec will not be liable for any loss or cost of any kind that the student may suffer or incur as a result of his/her transfer application being denied by INZ.</li>
  </ol>
</div>
<?php
		}
?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel"> <br />
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Csp/add_csp" method="post">
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
		?>
      <!-- End of Student Use -->
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Personal Details.</p>
      <?php
      $k = 0;
      while ($k < count($pdData)) {
		  if($usrType != 0){
			  $cspId = $this->session->set_userdata('cspId', $pdData[$k]['cspId']);
			  $days_commencement = $pdData[$k]['days_commencement'];
		  }
		
      	$firstName = $pdData[$k]['firstName'];
        $lastName = $pdData[$k]['lastName'];
		$dob = $pdData[$k]['dob'];
		$stuId = $pdData[$k]['stuId'];
		$telephone = $pdData[$k]['telephone'];
		$email = $pdData[$k]['email'];
		$courseName = $pdData[$k]['courseName'];
		$proposedStartDate = $pdData[$k]['proposedStartDate'];
		$campusName = $pdData[$k]['campusName'];
		//$days_commencement = $pdData[$k]['days_commencement'];
      ?>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$firstName "." "." $lastName</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of Birth<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$dob</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student ID<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$stuId</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact Phone<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$telephone</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='form-control-staticl' for='first-name'>$email</label>";
                ?>
        </div>
      </div>
      <?php
	  $k++;
	  }
	  ?>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Details of Current Enrolment.</p>
      <?php
	  	$b = 0;
		if($usrType != 0){
			$data = $ccData;
		}else{
			$data = $pdData;
		}
		$crsId = 0;
		while ($b < count($data)) {
			$campusName = $data[$b]['campusName'];
			$proposedStartDate = $data[$b]['proposedStartDate'];
			$crsId = $data[$b]['crsId'];
			$courseName = $data[$b]['courseName'];
			$schoolName = $data[$b]['schoolName'];
      ?>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Campus<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$campusName</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">School<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$schoolName</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Programme<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$courseName</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Start Date<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$proposedStartDate</label>";
                ?>
        </div>
      </div>
      <?php
	  $b++;
	  }
	  ?>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Change Requested.</p>
      <?php
		if($accId == 0001 || $usrType == 0){
        ?>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Campus<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control ccdCampus" name="campus" id="campus">
            <option value="0">Select campus</option>
            <?php
                        if(count($campusData) > 0){
                            $k = 0;
                            while ($k < count($campusData)) {
                                $camId = $campusData[$k]['camId'];
                                $campusName = $campusData[$k]['campusName'];
                                echo "<option value='$camId'>$campusName</option>";
                                $k++;
                            }
                        }else{
                            echo '<option value="">Campus not available</option>';
                        }
                        ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">School<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="school" id="school">
            <option value="0">Select campus first</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Programme<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control cCDCourse" name="course" id="course">
            <option value="0">Select school first</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Why do you wish to change your campus/ school/ programme<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <textarea id="message" class="form-control" name="comment" id="comment" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10">
          </textarea>
        </div>
      </div>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Payment Details.</p>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Invoice Number<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="invoiceNumber" class="form-control col-md-7 col-xs-12" id="invoiceNumber">
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
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date <?php echo date("Y-m-d");?>
                  <input type="hidden" name="sign_date" value="<?php echo date("Y-m-d");?>" /></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
          <!--<button type="submit" class="btn btn-primary">Cancel</button>-->
          <button type="submit" class="btn btn-success pull-right" id="addStuDec">Submit</button>
        </div>
      </div>
      <?php
		}else{
		  $n = 0;
		  while ($n < count($rcData)) {
			$campusName = $rcData[$n]['campusName'];
			$schoolName = $rcData[$n]['schoolName'];
			$courseName = $rcData[$n]['courseName'];
			$csp_comments = $pdData[0]['csp_comments'];
			$invoiceNo = $pdData[0]['invoiceNo'];
      ?>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Campus<span class="required">* </span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$campusName</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">School<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$schoolName</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Programme</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$courseName</label>";
                ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Why do you wish to change your campus/ school/ programme<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$csp_comments</label>";
                ?>
        </div>
      </div>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Payment Details.</p>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Invoice Number<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <?php
                	echo "<label class='form-control-static' for='first-name'>$invoiceNo</label>";
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
    <?php 
	if($usrType != 0){
		$bs_url = base_url(). "Csp/view_profile/". $cspId;
    	//echo '<div><a href="" class="btn btn-primary" target="_new"> View Profile</a></div>';
	}
	?>
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Csp/ac" method="post">
      <!-- Account Clarke -->
      <?php
		if($usrType == 2 && $cmId != "" && $stuId == 0){
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
                <td>Account Clerk</td>
                <td><?php
					if($approve == 0){
				?>
                  <select class="form-control" name="ac" id="ac">
                    <option value="0">Select</option>
                    <option value="1">Approve</option>
                    <option value="88">Decline</option>
                  </select>
                  <?php
				}else{
					echo "Complete";
				}
				?></td>
              </tr>
              <tr>
                <td>Invoice Amount</td>
                <td><input type="text" name="invoiceAmount" class="form-control col-md-7 col-xs-12" id="invoiceAmount"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <?php
			if($approve == 0){
		?>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
          <!--<button type="submit" class="btn btn-primary">Cancel</button>-->
          <button type="submit" class="btn btn-success pull-left" id="accClrk">Submit</button>
        </div>
      </div>
      <?php
			}
		}else if($accId == 0001 || $usrType == 1 || $usrType == 3 || $usrType == 6 || $usrType == 9){
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
                <td>Account Clarke</td>
                <td><?php
				$ac = count($acData);
				if($ac != 0){
					echo "Approved";
				}else{
					echo "Not Approved";
				}
				?></td>
              </tr>
              <tr>
                <td>Invoice Amount ($)</td>
                <td><?php
				$ac = count($acData);
				if($ac != 0){
					echo $acData[0]['invoiceAmount'];
				}
				?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <?php
		}
        ?>
      <!-- Account Clarke -->
    </form>
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Csp/fac_cws" method="post">
      <!-- Start of Office Use -->
      <?php
		if($accId == 0001 || $usrType == 3 || $usrType == 6 && $cmId != "" && $stuId == 0){
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
                <td><?php
					if($approve == 0){
				?>
                  <select class="form-control" name="faic" id="faic">
                    <option value="0">Select</option>
                    <option value="1">Approve</option>
                    <option value="88">Decline</option>
                  </select>
                  <?php
				}else{
					echo "Complete";
				}
				?></td>
              </tr>
              <tr>
                <td>Cunsulton with student</td>
                <td><?php
					if($approve == 0){
				?>
                  <select class="form-control" name="cws" id="cws">
                    <option value="0">Select</option>
                    <option value="1">Approve</option>
                    <option value="88">Decline</option>
                  </select></td>
                <?php
				}else{
					echo "Complete";
				}
				?>
              </tr>
              <tr>
                <td>Number of days since commencement of original programme &nbsp;&nbsp;<?php echo "(Sign Date ".$ccData[0]['sign_date']." - Proposed Start Date ".$ccData[0]['proposedStartDate'].")"; ?></td>
                <td><?php
					if($approve == 0){
						date_default_timezone_set("NZ");
				?>
                  <input type="text" name="date_commencement" id="date_commencement" class="form-control col-md-7 col-xs-12">
                  <input type="hidden" name="currentDate" value="<?php echo date("Y:m:d");?>" required class="form-control col-md-7 col-xs-12">
                  <?php
				}else{
					echo $ccData[0]['days_commencement'];
				}
				?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Comment<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php
			if($approve == 0){
		?>
          <textarea id="ofcMessage" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
          <?php
			}else{
				echo '<label class="form-control-static col-md-12 col-sm-12 col-xs-12" for="first-name">'.$pdData[0]['office_comment'].'</label>';
			}
		 ?>
        </div>
      </div>
      <?php
			if($approve == 0){
		?>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
          <!--<button type="submit" class="btn btn-primary">Cancel</button>-->
          <button type="submit" class="btn btn-success pull-left" id="facCws">Submit</button>
        </div>
      </div>
      <?php
			}
		}else if($accId == 0001 || $usrType == 1 || $usrType == 3 || $usrType == 6 || $usrType == 9){
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
                <td><?php
				$fac_cws = count($asData);
				if($fac_cws != 0){
					echo "Approved";
				}else{
					echo "Not Approved";
				}
				?></td>
              </tr>
              <tr>
                <td>Cunsulton with student</td>
                <td><?php
				$fac_cws = count($asData);
				if($fac_cws != 0){
					echo "Approved";
				}else{
					echo "Not Approved";
				}
				?></td>
              </tr>
              <tr>
                <td>Number of days since commencement of original programme</td>
                <td><?php
				$fac_cws = count($asData);
				
				if($fac_cws != 0){
					echo $pdData[0]['days_commencement'];
				}else{
					echo "Not Approved";
				}
				?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Comment<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <label class="form-control-static col-md-12 col-sm-12 col-xs-12" for="first-name">
            <?php 
		  $fac_cws = count($asData);
		  if($fac_cws != 0){
			  echo $pdData[0]['office_comment'];
		   }else{
			   echo "No comment";
		   }
		  ?>
          </label>
        </div>
      </div>
      <?php
		}
        ?>
      <!-- End of Office Use -->
    </form>
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Csp/icd" method="post">
      <!-- Approved --> 
      <!--icd-->
      <?php
		if($accId == 0001 || $usrType == 9 && $cmId != "" && $stuId != ""){
			if(count($asoData) == 0){
        ?>
      <div class="form-group">
        <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <label class="" for="first-name">International Counsellor Director,<span class="required">*</span></label>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Action</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="icd" id="icd">
            <option value="0">Select</option>
            <option value="1">Approve</option>
            <option value="88">Decline</option>
          </select>
          <input type="hidden" name="app_date" value="<?php echo date("Y-m-d");?>" />
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success pull-left" id="icdAction">Submit</button>
        </div>
      </div>
      <?php
			}
		}
        ?>
    </form>
    <?php
			
        if($usrType == 1 && $pdData[0]['mcId'] == $ccData[0]['mcId'] && $rcData[0]['camId'] == $ccData[0]['camId']){
			
		?>
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Csp/nc_cc_HOD" method="post">
      <!--hod_np-->
      <?php
		if($usrType == 1 && $mcId == $pdData[0]['mcId'] && $cmId == $rcData[0]['camId']){
			if(count($asoData) == 0){
        ?>
      <div class="form-group">
        <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <label class="" for="first-name">Head of Faculty (current and new programme)<span class="required">*</span></label>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Action</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="hod_cc_np" id="hod_cc_np">
            <option value="0">Select</option>
            <option value="1">Approve</option>
            <option value="88">Decline</option>
          </select>
          <input type="hidden" name="app_date" value="<?php echo date("Y-m-d");?>" />
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success pull-left" id="npcpHOD">Submit</button>
        </div>
      </div>
      <?php
			}
		}
        ?>
      <!-- Approved -->
    </form>
    <?php
		}else{
		?>
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Csp/ccHOD" method="post">
      <!--hod_cp-->
      <?php
		if($usrType == 1 && $mcId == $ccData[0]['mcId'] && $cmId == $ccData[0]['camId']){ //user table stuId(current user crsId) = applicant crsId 
					
		if(count($asoData) == 0){
			
        ?>
      <div class="form-group">
        <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <label class="" for="first-name">Head of Faculty (current programme)<span class="required">*</span></label>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Action</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="hod_cp" id="hod_cp">
            <option value="0">Select</option>
            <option value="1">Approve</option>
            <option value="88">Decline</option>
          </select>
          <input type="hidden" name="app_date" value="<?php echo date("Y-m-d");?>" />
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success pull-left" id="cpHOD">Submit</button>
        </div>
      </div>
      <?php
			}
		}
		?>
    </form>
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Csp/ncHOD" method="post">
      <!--hod_np-->
      <?php
		if($usrType == 1 && $mcId == $pdData[0]['mcId'] && $cmId == $rcData[0]['camId']){
			if(count($asoData) == 0){
        ?>
      <div class="form-group">
        <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <label class="" for="first-name">Head of Faculty (new programme)<span class="required">*</span></label>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Action</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="hod_np" id="hod_np">
            <option value="0">Select</option>
            <option value="1">Approve</option>
            <option value="88">Decline</option>
          </select>
          <input type="hidden" name="app_date" value="<?php echo date("Y-m-d");?>" />
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success pull-left" id="npHOD">Submit</button>
        </div>
      </div>
      <?php
			}
		}
        ?>
      <!-- Approved -->
    </form>
    <?php
	}
	?>
  </div>
</div>
<script>
<!-- Validation -->
<!-- Student -->
$('#addStuDec').click(function() {
        var err = 0;
        var err_msg = "";

		if (document.getElementById('campus').value === "0") {
            err = 1;
            err_msg += "Please Select Campus.<br>";
        }
		if (document.getElementById('school').value === "0") {
            err = 1;
            err_msg += "Please Select School Name.<br>";
        }
		if (document.getElementById('course').value === "0") {
            err = 1;
            err_msg += "Please Select Course Name.<br>";
        }
		if (document.getElementById('message').value === "") {
            err = 1;
            err_msg += "Please Enter the reason for change your campus / school / course.<br>";
        }
		if (document.getElementById('invoiceNumber').value === "") {
            err = 1;
            err_msg += "Please Enter Invoice Number.<br>";
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
	<!-- Account Clerk -->
	$('#accClrk').click(function() {
        var err = 0;
        var err_msg = "";

		if (document.getElementById('ac').value === "0") {
            err = 1;
            err_msg += "Please Select Account Clerk Approve / Decline.<br>";
        }
		if (document.getElementById('invoiceAmount').value === "0") {
            err = 1;
            err_msg += "Please Enter Invoice Amount.<br>";
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
	<!-- Account Clerk -->
	<!-- FAC CWS-->
	$('#facCws').click(function() {
        var err = 0;
        var err_msg = "";

		if (document.getElementById('faic').value === "0") {
            err = 1;
            err_msg += "Please Select Faculty Admin in Charge Approve / Decline.<br>";
        }
		if (document.getElementById('cws').value === "0") {
            err = 1;
            err_msg += "Please Select Cunsulton with student Approve / Decline.<br>";
        }
		if (document.getElementById('date_commencement').value === "") {
            err = 1;
            err_msg += "Please Enter Difference of date (working days).<br>";
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
	<!-- ICD -->
	$('#icdAction').click(function() {
        var err = 0;
        var err_msg = "";

		if (document.getElementById('icd').value === "0") {
            err = 1;
            err_msg = "Please Select International Counsellor Director Approve / Decline.<br>";
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
	<!-- ICD -->
	<!-- CP HOD -->
	$('#cpHOD').click(function() {
        var err = 0;
        var err_msg = "";

		if (document.getElementById('hod_cp').value === "0") {
            err = 1;
            err_msg = "Please Select Head of Faculty (current programme) Approve / Decline.<br>";
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
	<!-- CP HOD -->
	<!-- NP HOD -->
	$('#npHOD').click(function() {
        var err = 0;
        var err_msg = "";

		if (document.getElementById('hod_np').value === "0") {
            err = 1;
            err_msg = "Please Select Head of Faculty (new programme) Approve / Decline.<br>";
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
	<!-- NP HOD -->
	<!-- CC NP HOD -->
	$('#npcpHOD').click(function() {
        var err = 0;
        var err_msg = "";

		if (document.getElementById('hod_cc_np').value === "0") {
            err = 1;
            err_msg = "Please Select Head of Faculty (current and new programme) Approve / Decline.<br>";
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
	<!-- CC NP HOD -->
<!-- Validation -->
</script> 
<script type="text/javascript">
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
                    $('#course').html('<option value="">Select school first</option>'); 
                }
            }); 
        }else{
            $('#school').html('<option value="">Select campus first</option>');
            $('#course').html('<option value="">Select school first</option>'); 
        }
    });
    
    $('#school').on('change',function(){
        var sID = $(this).val();
        if(sID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url() ?>Course/get_course',
                data:{sID :sID},
                success:function(html){
                    $('#course').html(html);
                }
            }); 
        }else{
            $('#course').html('<option value="">Select school first</option>'); 
        }
    });
});
<!-- Dynamic dependent select box jquery ajax php -->
</script>