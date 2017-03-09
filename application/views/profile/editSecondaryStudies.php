<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>StuProfile/update_secondary_studies" method="post">
      <?php
				$k = 0;
				while ($k < count($secondaryStudies)) {
				$ssId = $secondaryStudies[$k]['ssId'];
				$cntId = $secondaryStudies[$k]['cntId'];
				$countryName = $secondaryStudies[$k]['countryName'];
				$qualification = $secondaryStudies[$k]['qualification'];
				$institution = $secondaryStudies[$k]['institution'];
				$dateCompleted = $secondaryStudies[$k]['dateCompleted'];
				?>
      <div class="form-group col-md-6">
        <input type="hidden" id="last-name" name="ssId" required class="form-control col-md-7 col-xs-12" value="<?php echo $ssId;?>">
        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Highest qualification<span class="required">*</span> </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <input type="text" id="SShqg" name="SShqg" class="form-control col-md-12 col-xs-12 SShqg" value="<?php echo $qualification;?>"/>
        </div>
      </div>
      <div class="form-group col-md-6">
        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Institution <span class="required">*</span> </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <input type="text" id="SSi" name="SSi" class="form-control col-md-12 col-xs-12 SSi" value="<?php echo $institution;?>"/>
        </div>
      </div>
      <div class="form-group col-md-6">
        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> Country <span class="required">*</span> </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <select class="form-control col-md-12 col-xs-12 SSCountry" name="SSCountry" id="SSCountry">
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
          <input type="text" id="SSdc" name="SSdc" required class="form-control col-md-12 col-xs-12 SSdc" value="<?php echo $dateCompleted;?>">
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
