<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    	<br />
        <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Country/edit" method="post">
        	
            <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Course Name<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <?php
				$k = 0;
				while ($k < count($countryData)) {
				$cntId = $countryData[$k]['cntId'];
				$countryName = $countryData[$k]['countryName'];
				?>
                	<input type="text" id="countryName" name="countryName" class="form-control col-md-7 col-xs-12" value="<?php echo $countryName;?>">
                    <input type="hidden" id="cntId" name="cntId" class="form-control col-md-7 col-xs-12" value="<?php echo $cntId;?>">
                <?php
    			$k++;
				}
				?>
				</div>
			</div>
			
	<div class="ln_solid"></div>
    <div class="form-group">
    	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        	<!--<button type="submit" class="btn btn-primary">Cancel</button>-->
            <button type="submit" class="btn btn-success" id="cntryName">Update</button>
		</div>
	</div>
      </form>
    </div>
</div>
<script>
<!-- Validation -->
$('#cntryName').click(function() {
        var err = 0;
        var err_msg = "";
        if (document.getElementById('cntId').value === "") {
            err = 1;
            err_msg = "Please Select country from the view page.<br>";
        }
		if (document.getElementById('countryName').value === "") {
            err = 1;
            err_msg += "Please Enter Country Name.<br>";
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