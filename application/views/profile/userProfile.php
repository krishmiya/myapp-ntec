<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>-->
<script src="<?php echo base_url();?>assets/dash/js/userProfile/MaskedPassword.js"></script>

<div class="x_content">
  <?php
  		date_default_timezone_set("NZ");
		$cmId = $this->session->userdata('cmId');
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
  
  <!-- start accordion -->
  
  <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel"> <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <h4 class="panel-title">Personal Details (as shown in passport)</h4>
      </a>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body"> 
          
          <!--Personal Details (as shown in passport)-->
          
          <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>StuProfile/personalDetails" method="post">
            <?php

                            //echo validation_errors();

                            /* when page load view the current data*/

                            /*$n = 0;

                            while ($n < count($pdData)) {

                            $preferredName = $pdData[$n]['preferredName'];

                            $dob = $pdData[$n]['dob'];

                            $dob = $pdData[$n]['gender'];

                            $dob = $pdData[$n]['dob'];

                            $dob = $pdData[$n]['dob'];

                            $dob = $pdData[$n]['dob'];

                            $dob = $pdData[$n]['dob'];

                            $dob = $pdData[$n]['dob'];

                            $dob = $pdData[$n]['dob'];

                            $dob = $pdData[$n]['dob'];

                            $dob = $pdData[$n]['dob'];

                            $dob = $pdData[$n]['dob'];

                            $dob = $pdData[$n]['dob'];

                            $n++;

                            }*/

                            /* when page load view the current data*/

                            ?>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Preferred Name <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" name="preferredName" class="form-control col-md-7 col-xs-12 pdPreferredName" id="pdPreferredName">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Date of Birth <span class="required">*</span> </label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="dOB" name="dOB" class="form-control col-md-7 col-xs-12 pdDOB">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Gender <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <select class="form-control pdGender" name="pdGender" id="pdGender">
                  <option value="0">Select Gender</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Citizenship <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <select class="form-control pdCitizenship" name="pdCitizenship" id="pdCitizenship">
                  <option value="0">Select citizenship</option>
                  <?php

                                        if(count($citizenshipData) > 0){

                                        $k = 0;

                                        while ($k < count($citizenshipData)) {

                                        $cId = $citizenshipData[$k]['cId'];

                                        $citizenshipName = $citizenshipData[$k]['citizenshipName'];

                                        echo "

                                        <option value='$cId'>$citizenshipName</option>";

                                        $k++;

                                        }

                                        }else{

                                        echo '

                                        <option value="">Citizenship not available</option>';

                                        }

                                        ?>
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Country of Birth <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <select class="form-control pdCountry" name="pdCountry" id="pdCountry">
                  <option value="0">Select Country</option>
                  <?php

                                        if(count($countryData) > 0){

                                        $k = 0;

                                        while ($k < count($countryData)) {

                                        $cntId = $countryData[$k]['cntId'];

                                        $countryName = $countryData[$k]['countryName'];

                                        echo "

                                        <option value='$cntId'>$countryName</option>";

                                        $k++;

                                        }

                                        }else{

                                        echo '

                                        <option value="">Country not available</option>';

                                        }

                                        ?>
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> <span class="required"></span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="hidden" name="current_date" id="current_date" value="<?php echo date("Y-m-d");?>" />
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Passport Number <span class="required">*</span> </label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="text" id="pdPassportNumber" name="pdPassportNumber" class="form-control col-md-7 col-xs-12 pdPassportNumber">
              </div>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Issue Date <span class="required">*</span> </label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="text" id="ppIssuDate" name="ppIssuDate" class="form-control col-md-7 col-xs-12 ppIssuDate">
              </div>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Expiry Date <span class="required">*</span> </label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="text" id="ppExpiryDate" name="ppExpiryDate" class="form-control col-md-7 col-xs-12 ppExpiryDate">
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Current Visa Expiration Date <span class="required">*</span> </label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="text" id="ppVisaDate" name="ppVisaDate" class="form-control col-md-7 col-xs-12 ppVisaDate">
              </div>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> </label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="hidden" class="form-control col-md-7 col-xs-12">
              </div>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> </label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="hidden" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Insurance <span class="required">*</span> </label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="text" id="pdInsurence" name="pdInsurence" class="form-control col-md-7 col-xs-12 pdInsurence">
              </div>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Issue Date <span class="required">*</span> </label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="text" id="iIssueDate" name="iIssueDate" class="form-control col-md-7 col-xs-12 iIssueDate">
              </div>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Expiry Date <span class="required">*</span> </label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="text" id="iExpiryDate" name="iExpiryDate" class="form-control col-md-7 col-xs-12 iExpiryDate">
              </div>
            </div>
            <div class="form-group col-md-12">
              <p><strong>Disability</strong></p>
              The following information will help us improve services for students with disabilities.The information you supply is confidential.<br />
              <b>Do you live with the effects of significant injury,long-term mental/physical illness or disability?</b> Yes
              <input type="radio" name="disaDesc" value="Yes" id="Y" />
              No
              <input type="radio" name="disaDesc" value="No" id="N" checked="checked" />
            </div>
            <div class="form-group col-md-12">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> If "Yes", Please describe this disability</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" id="pdDisaDescription" name="pdDisaDescription" class="form-control col-md-7 col-xs-12 pdDisaDescription">
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Password <span class="required">*</span> </label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="password" class="form-control" id="PDpwd" name="PersonalDetailspwd" />
              </div>
              <button type="submit" class="btn btn-success" id="pdData">Submit</button>
            </div>
          </form>
          
          <!--Personal Details (as shown in passport)--> 
          
        </div>
      </div>
    </div>
    <div class="panel"> <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <h4 class="panel-title">Personal Contact Details</h4>
      </a>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>StuProfile/personalContactDetails" method="post">
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Address <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="pcdAddress" name="address" class="form-control col-md-7 col-xs-12 pcdAddress">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Telephone <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="pcdTelephone" name="telephone" class="form-control col-md-7 col-xs-12 pcdTelephone">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Fax <span class="required"></span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="pcdFax" name="fax" class="form-control col-md-7 col-xs-12 pcdFax">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Email <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="email" id="pcdEmail" name="email" class="form-control col-md-7 col-xs-12 pcdEmail">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Password <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="password" class="form-control" id="PCDpwd" name="PersonalContactDetailspwd" />
              </div>
                <button type="submit" class="btn btn-success" id="pcdData">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="panel"> <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      <h4 class="panel-title">Parents Contact Details</h4>
      </a>
      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
        <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>StuProfile/parentsContactDetails" method="post">
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Name <span class="required">*</span> </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" id="hcdName" name="name" class="form-control col-md-7 col-xs-12 pacdName">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Relationship With You <span class="required">*</span> </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" id="hcdRelationship" name="relationship" class="form-control col-md-7 col-xs-12 pacdRelationship">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Address <span class="required">*</span> </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" id="hcdAddress" name="address" class="form-control col-md-7 col-xs-12 pacdAddress">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Tel / mobile number <span class="required">*</span> </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" id="hcdTelephone" name="telephone" class="form-control col-md-7 col-xs-12 pacdTelephone">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Email <span class="required"></span> </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="email" id="first-name" name="email" class="form-control col-md-7 col-xs-12 pacdEmail">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Password <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" class="form-control" id="PACDpwd" name="ParentsContactDetailspwd" />
            </div>
            <button type="submit" class="btn btn-success" id="pacd">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="panel"> <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
      <h4 class="panel-title">Emergency Contact in New Zealand (if any)</h4>
      </a>
      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
        <form id="emergencyContactNz" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url() ?>StuProfile/emergencyContactNz">
          <?php

                        echo validation_errors();

                        ?>
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Name <span class="required">*</span> </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" id="first-name" name="name" class="form-control col-md-7 col-xs-12 name">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Relationship With You <span class="required">*</span> </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" id="first-name" name="relationship" class="form-control col-md-7 col-xs-12 relationship">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Address <span class="required">*</span> </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" id="first-name" name="address" class="form-control col-md-7 col-xs-12 address">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Tel / mobile number <span class="required">*</span> </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" id="first-name" name="telephone" class="form-control col-md-7 col-xs-12 telephone">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Email <span class="required">*</span> </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="email" id="first-name" name="email" class="form-control col-md-7 col-xs-12 email">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Password <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" class="form-control" id="ECNZpwd" name="emergencyContactNzpwd" />
            </div>
            <button type="submit" class="btn btn-success" id="eciNZ">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="panel"> <a class="panel-heading collapsed" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
      <h4 class="panel-title">Agent Contact Details (for approved Ntec agent, if applicable)</h4>
      </a>
      <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
        <div class="panel-body">
          <form id="agentContact" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url() ?>StuProfile/agentContact">
            <?php

                            echo validation_errors();

                            ?>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Agent Name <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="first-name" name="name" class="form-control col-md-7 col-xs-12 aCDname">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Address <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="first-name" name="address" class="form-control col-md-7 col-xs-12 aCDaddress">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Tel / mobile number <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="first-name" name="telephone" class="form-control col-md-7 col-xs-12 aCDtelephone">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Fax <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="number" id="first-name" name="fax" class="form-control col-md-7 col-xs-12 aCDfax">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Email <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="email" id="first-name" name="email" class="form-control col-md-7 col-xs-12 aCDemail">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Password <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="password" class="form-control" id="ACpwd" name="agentContactNzpwd" />
              </div>
              <button type="submit" class="btn btn-success" id="aC">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="panel"> <a class="panel-heading collapsed" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
      <h4 class="panel-title">Current Course Details</h4>
      </a>
      <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
        <div class="panel-body">
          <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>StuProfile/currentCourseDetails" method="post">
            <?php

                            //echo validation_errors();

                            ?>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Campus <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <select class="form-control ccdCampus" name="campus" id="campus">
                  <option value="0">Select campus</option>
                  <?php

                                        if(count($campusData) > 0){

                                        $k = 0;

                                        while ($k < count($campusData)) {

                                        $camId = $campusData[$k]['camId'];

                                        $campusName = $campusData[$k]['campusName'];

                                        //echo "<option value='$camId'>$cmId</option>";
										if($camId == $cmId){
											echo "<option value='$camId'>$campusName</option>";
										}

                                        $k++;

                                        }

                                        }else{

                                        echo '

                                        <option value="">Campus not available</option>';

                                        }

                                        ?>
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> School <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <select class="form-control" name="school" id="school">
                  <option value="0">Select campus first</option>
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Programme Title <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <select class="form-control cCDCourse" name="course" id="course">
                  <option value="0">Select school first</option>
                </select>
              </div>
            </div>
            
            <!--empty Div-->
            
            <div class="form-group col-md-6 hidden-xs hidden-sm">
              <label class="control-label col-md-4 col-sm-4 col-xs-12">&nbsp;</label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" style="visibility: hidden;" id="#" name="" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            
            <!--empty Div end-->
            
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Start Date <span class="required">*</span> </label>
              <div class="col-md-4 col-sm-4 col-xs-12"> 
                
                <!--<input type="text" id="first-name" name="preferredName" required class="form-control col-md-7 col-xs-12">-->
                
                <input type="text" id="cCDStartDate" name="startDate" class="form-control col-md-7 col-xs-12 cCDStartDate">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Finish Date <span class="required">*</span> </label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="cCDFinishDate" name="finishDate" class="form-control col-md-7 col-xs-12 cCDFinishDate">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Password <span class="required">*</span> </label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="password" class="form-control" id="CCDpwd" name="currentCDpwd" />
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="panel"> <a class="panel-heading collapsed" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
      <h4 class="panel-title">Secondary Studies (high school / secondary school)</h4>
      </a>
      <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
        <div class="panel-body">
          <form id="secondaryStudies" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url() ?>StuProfile/secondaryStudies">
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Highest qualification <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="SShqg" name="SShqg" class="form-control col-md-7 col-xs-12  SShqg" />
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Institution <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="SSi" name="SSi" class="form-control col-md-7 col-xs-12  SSi" />
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Country <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <select class="form-control SSCountry" name="SSCountry" id="SSCountry">
                  <option value="0">Select Country</option>
                  <?php

                                        if(count($countryData) > 0){

                                        $k = 0;

                                        while ($k < count($countryData)) {

                                        $cntId = $countryData[$k]['cntId'];

                                        $countryName = $countryData[$k]['countryName'];

                                        echo "

                                        <option value='$cntId'>$countryName</option>";

                                        $k++;

                                        }

                                        }else{

                                        echo '

                                        <option value="">Country not available</option>';

                                        }

                                        ?>
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Date Completed <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="SSdc" name="SSdc" class="form-control col-md-7 col-xs-12 SSdc">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Password <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="password" class="form-control" id="SSpwd" name="secondaryStudies" />
              </div>
              <button type="submit" class="btn btn-success pull-right">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="panel"> <a class="panel-heading collapsed" role="tab" id="headingEight" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
      <h4 class="panel-title">Tertiary Studies (college, university, polytechnic)</h4>
      </a>
      <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
        <div class="panel-body">
          <form id="tertiaryStudies" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url() ?>StuProfile/tertiaryStudies">
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Highest qualification <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="TShqg" name="TShqg" class="form-control col-md-7 col-xs-12  TShqg" />
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Institution <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="TSi" name="TSi" class="form-control col-md-7 col-xs-12  TSi" />
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Country <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <select class="form-control TSCountry" name="TSCountry" id="TSCountry">
                  <option value="0">Select Country</option>
                  <?php

                                        if(count($countryData) > 0){

                                        $k = 0;

                                        while ($k < count($countryData)) {

                                        $cntId = $countryData[$k]['cntId'];

                                        $countryName = $countryData[$k]['countryName'];

                                        echo "

                                        <option value='$cntId'>$countryName</option>";

                                        $k++;

                                        }

                                        }else{

                                        echo '

                                        <option value="">Country not available</option>';

                                        }

                                        ?>
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Date Completed <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="TScd" name="TScd" class="form-control col-md-7 col-xs-12 TScd">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Password <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="password" class="form-control" id="TSpwd" name="tertiaryStudiespwd" />
              </div>
              <button type="submit" class="btn btn-success pull-right">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- end of accordion --> 
  
</div>
</div>
<script type="text/javascript">

  $(document).ready(function () {
    
    function checkradiobox(){
		
	    var radio = $("input[name='disaDesc']:checked").val();
        $('#pdDisaDescription').attr('disabled',true);
        if(radio == "Yes"){
            $('#pdDisaDescription').attr('disabled',false);
            $("#pdDisaDescription").focus();
			$('#pdDisaDescription').val('');
	    }else if(radio == "No"){
		    $('#pdDisaDescription').attr('disabled',true);
            $("#pdDisaDescription").focus();
			$('#pdDisaDescription').val('NA');
	    }
    }
    
    $("#Y, #N").change(function () {
	    checkradiobox();
    });
  
    checkradiobox();
    
});

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

<!-- Validation -->
$('#pdData').click(function() {
        var err = 0;
        var err_msg = "";
        if (document.getElementById('pdPreferredName').value === "") {
            err = 1;
            err_msg += "Please Enter Preferred Name.<br>";
        }
		if (document.getElementById('dOB').value === "") {
            err = 1;
            err_msg += "Please Select Date of Birth.<br>";
        }
		if (document.getElementById('dOB').value != "" && document.getElementById('dOB').value > document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Date of Birth.<br>";
        }
		if (document.getElementById('pdGender').value === "0") {
            err = 1;
            err_msg += "Please Select Gender.<br>";
        }
		if (document.getElementById('pdCitizenship').value === "0") {
            err = 1;
            err_msg += "Please Select Citizenship.<br>";
        }
		if (document.getElementById('pdCountry').value === "0") {
            err = 1;
            err_msg += "Please Select Country.<br>";
        }
		if (document.getElementById('pdPassportNumber').value === "") {
            err = 1;
            err_msg += "Please Enter Valid Passport Number.<br>";
        }
		if (document.getElementById('ppIssuDate').value === "") {
            err = 1;
            err_msg += "Please Select Issu Date.<br>";
        }
		if (document.getElementById('ppIssuDate').value != "" && document.getElementById('ppIssuDate').value > document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Issu Date.<br>";
        }
		if (document.getElementById('ppExpiryDate').value === "") {
            err = 1;
            err_msg += "Please Select Expiry Date.<br>";
        }
		if (document.getElementById('ppExpiryDate').value != "" && document.getElementById('ppExpiryDate').value < document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Expiry Date.<br>";
        }
		if (document.getElementById('ppVisaDate').value === "") {
            err = 1;
            err_msg += "Please Select Visa Date.<br>";
        }
		if (document.getElementById('ppVisaDate').value != "" && document.getElementById('ppVisaDate').value < document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Visa Date.<br>";
        }
		if (document.getElementById('pdInsurence').value === "") {
            err = 1;
            err_msg += "Please Enter Insurence.<br>";
        }
		if (document.getElementById('iIssueDate').value === "") {
            err = 1;
            err_msg += "Please Select Issue Date.<br>";
        }
		if (document.getElementById('iIssueDate').value != "" && document.getElementById('iIssueDate').value > document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Issue Date.<br>";
        }
		if (document.getElementById('iExpiryDate').value === "") {
            err = 1;
            err_msg += "Please Select Expiry Date.<br>";
        }
		if (document.getElementById('iExpiryDate').value != "" && document.getElementById('iExpiryDate').value < document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Expiry Date.<br>";
        }
		if (document.getElementById('PDpwd').value === "") {
            err = 1;
            err_msg += "Please Enter Correct Password.<br>";
        }
		if (document.getElementById("Y").checked === true) {
            if (document.getElementById('pdDisaDescription').value === "NA" || document.getElementById('pdDisaDescription').value === "") {
				err = 1;
				err_msg += "Please Describe This Disability.<br>";
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
	$('#pcdData').click(function() {
        var err = 0;
        var err_msg = "";
        if (document.getElementById('pcdAddress').value === "") {
            err = 1;
            err_msg += "Please Enter Address.<br>";
        }
		if (document.getElementById('pcdTelephone').value === "") {
            err = 1;
            err_msg += "Please Enter Telephone.<br>";
        }
		if (document.getElementById('pcdEmail').value === "") {
            err = 1;
            err_msg += "Please Enter Email.<br>";
        }
		if (document.getElementById('PCDpwd').value === "") {
            err = 1;
            err_msg += "Please Enter Correct Password.<br>";
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
	
	$('#pacd').click(function() {
        var err = 0;
        var err_msg = "";
        if (document.getElementById('hcdName').value === "") {
            err = 1;
            err_msg += "Please Enter Name.<br>";
        }
		if (document.getElementById('hcdRelationship').value === "") {
            err = 1;
            err_msg += "Please Enter Relationship.<br>";
        }
		if (document.getElementById('hcdAddress').value === "") {
            err = 1;
            err_msg += "Please Enter Address.<br>";
        }
		if (document.getElementById('hcdTelephone').value === "") {
            err = 1;
            err_msg += "Please Enter Telephone.<br>";
        }
		if (document.getElementById('PACDpwd').value === "") {
            err = 1;
            err_msg += "Please Enter Correct Password.<br>";
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
	
	$('#eciNZ').click(function() {
        var err = 0;
        var err_msg = "";
        if (document.getElementById('ecnzName').value === "") {
            err = 1;
            err_msg += "Please Enter Name.<br>";
        }
		if (document.getElementById('enczRelationship').value === "") {
            err = 1;
            err_msg += "Please Enter Relationship.<br>";
        }
		if (document.getElementById('enczAddress').value === "") {
            err = 1;
            err_msg += "Please Enter Address.<br>";
        }
		if (document.getElementById('enczTelephone').value === "") {
            err = 1;
            err_msg += "Please Enter Telephone.<br>";
        }
		if (document.getElementById('ECNZpwd').value === "") {
            err = 1;
            err_msg += "Please Enter Correct Password.<br>";
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
	
	$('#aC').click(function() {
        var err = 0;
        var err_msg = "";
        if (document.getElementById('acName').value === "") {
            err = 1;
            err_msg += "Please Enter Agent Name.<br>";
        }
		if (document.getElementById('acAddress').value === "") {
            err = 1;
            err_msg += "Please Enter Address.<br>";
        }
		if (document.getElementById('acTelephone').value === "") {
            err = 1;
            err_msg += "Please Enter Telephone.<br>";
        }
		if (document.getElementById('acEmail').value === "") {
            err = 1;
            err_msg += "Please Enter Email Address.<br>";
        }
		if (document.getElementById('ACpwd').value === "") {
            err = 1;
            err_msg += "Please Enter Correct Password.<br>";
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
	
	$('#ccData').click(function() {
        var err = 0;
        var err_msg = "";
        if (document.getElementById('campus').value === "0" || document.getElementById('campus').value === "") {
            err = 1;
            err_msg += "Please Select Campus.<br>";
        }
		if (document.getElementById('school').value === "0" || document.getElementById('school').value === "") {
            err = 1;
            err_msg += "Please Select School.<br>";
        }
		if (document.getElementById('course').value === "0" || document.getElementById('course').value === "0") {
            err = 1;
            err_msg += "Please Select Course.<br>";
        }
		if (document.getElementById('cCDStartDate').value === "") {
            err = 1;
            err_msg += "Please Select Start Date.<br>";
        }
		if (document.getElementById('cCDStartDate').value != "" && document.getElementById('cCDStartDate').value > document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Start Date.<br>";
        }
		if (document.getElementById('cCDFinishDate').value === "") {
            err = 1;
            err_msg += "Please Select Finish Date.<br>";
        }
		if (document.getElementById('cCDFinishDate').value != "" && document.getElementById('cCDFinishDate').value < document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Finish Date.<br>";
        }
		if (document.getElementById('CCDpwd').value === "") {
            err = 1;
            err_msg += "Please Enter Correct Password.<br>";
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
	
	$('#SSqua').click(function() {
        var err = 0;
        var err_msg = "";
        if (document.getElementById('SShqg').value === "") {
            err = 1;
            err_msg += "Please Enter Highest Qualification Gained.<br>";
        }
		if (document.getElementById('SSi').value === "") {
            err = 1;
            err_msg += "Please Enter Institution.<br>";
        }
		if (document.getElementById('SSCountry').value === "0") {
            err = 1;
            err_msg += "Please Enter Country.<br>";
        }
		if (document.getElementById('SSdc').value === "") {
            err = 1;
            err_msg += "Please Enter Date Completed.<br>";
        }
		if (document.getElementById('SSdc').value != "" && document.getElementById('SSdc').value > document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Date Completed.<br>";
        }
		if (document.getElementById('SSpwd').value === "") {
            err = 1;
            err_msg += "Please Enter Correct Password.<br>";
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
	
	$('#TSqua').click(function() {
        var err = 0;
        var err_msg = "";
        if (document.getElementById('TShqg').value === "") {
            err = 1;
            err_msg += "Please Enter Highest Qualification Gained.<br>";
        }
		if (document.getElementById('TSi').value === "") {
            err = 1;
            err_msg += "Please Enter Institution.<br>";
        }
		if (document.getElementById('TSCountry').value === "0") {
            err = 1;
            err_msg += "Please Enter Country.<br>";
        }
		if (document.getElementById('TScd').value === "") {
            err = 1;
            err_msg += "Please Enter Date Completed.<br>";
        }
		if (document.getElementById('TScd').value != "" && document.getElementById('TScd').value > document.getElementById('currentDate').value) {
				err = 1;
				err_msg += "Please Select Valid Date Completed.<br>";
        }
		if (document.getElementById('TSpwd').value === "") {
            err = 1;
            err_msg += "Please Enter Correct Password.<br>";
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

<!-- Password Mask -->
	new MaskedPassword(document.getElementById("PDpwd"), '\u25CF');
	new MaskedPassword(document.getElementById("PCDpwd"), '\u25CF');
	new MaskedPassword(document.getElementById("PACDpwd"), '\u25CF');
	new MaskedPassword(document.getElementById("ECNZpwd"), '\u25CF');
	new MaskedPassword(document.getElementById("ACpwd"), '\u25CF');
	new MaskedPassword(document.getElementById("CCDpwd"), '\u25CF');
	new MaskedPassword(document.getElementById("SSpwd"), '\u25CF');
	new MaskedPassword(document.getElementById("TSpwd"), '\u25CF');
<!-- Password Mask -->
</script>