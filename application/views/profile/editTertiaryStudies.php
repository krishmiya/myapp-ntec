<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel"> <br />
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>StuProfile/update_tertiary_studies" method="post">
      <?php
				$k = 0;
				while ($k < count($tertiaryStudies)) {
				$tsId = $tertiaryStudies[$k]['tsId'];
				$cntId = $tertiaryStudies[$k]['cntId'];
				$countryName = $tertiaryStudies[$k]['countryName'];
				$qualification = $tertiaryStudies[$k]['qualification'];
				$institution = $tertiaryStudies[$k]['institution'];
				$dateCompleted = $tertiaryStudies[$k]['dateCompleted'];
				?>
      <div class="form-group col-md-6">
        <input type="hidden" id="tsId" name="tsId" required class="form-control col-md-7 col-xs-12" value="<?php echo $tsId;?>">
        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Highest qualification <span class="required">*</span> </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <input type="text" id="TShqg" name="TShqg" class="form-control col-md-12 col-xs-12 TShqg" value="<?php echo $qualification;?>"/>
        </div>
      </div>
      <div class="form-group col-md-6">
        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Institution <span class="required">*</span> </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <input type="text" id="TSi" name="TSi" class="form-control col-md-12 col-xs-12 TSi" value="<?php echo $institution;?>"/>
        </div>
      </div>
      <div class="form-group col-md-6">
        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Country <span class="required">*</span> </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <select class="form-control col-md-12 col-xs-12 TSCountry" name="TSCountry" id="TSCountry">
            <option value="0">Select Country</option>
            <?php
                    echo "<option value='$cntId' selected='selected'>$countryName</option>";
                              
                    if(count($countryData) > 0){
                        $k = 0;
                        while ($k < count($countryData)) {
                            $cntId = $countryData[$k]['cntId'];
                            $countryName = $countryData[$k]['countryName'];
                            echo "<option value='$cntId'>$countryName</option>";
                            $k++;
                        }
                        }else{
                            echo '<option value="">Country not available</option>';
                        }
                        ?>
          </select>
        </div>
      </div>
      <div class="form-group col-md-6">
        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Date Completed <span class="required">*</span> </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <input type="text" id="TSdc" name="TSdc" required class="form-control col-md-12 col-xs-12 TSdc" value="<?php echo $dateCompleted;?>">
        </div>
      </div>
      <?php
                	$k++;
                }
                ?>
      <div class="form-group col-md-12">
        <div class="ln_solid"></div>
      </div>
      <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <button type="submit" class="btn btn-success pull-right">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
