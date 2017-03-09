<script src="<?php echo base_url();?>assets/dash/js/userProfile/MaskedPassword.js"></script>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    	<br />
        <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Login/reset_password" method="post">
        	
            <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                        <?php
                        echo $this->session->userdata('usrEmail');
                        ?>
                    </label>
				</div>
			</div>
            
            <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Old Password<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" name="oPwd" class="form-control col-md-7 col-xs-12" id="oldPwd">
				</div>
			</div>
            
            <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">New Password<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" name="nwPwd" class="form-control col-md-7 col-xs-12" id="newPwd">
				</div>
			</div>
            
            <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Re-type Password<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" name="rTpwd" class="form-control col-md-7 col-xs-12" id="reTpPwd">
				</div>
			</div>
			
	<div class="ln_solid"></div>
    <div class="form-group">
    	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        	<!--<button type="submit" class="btn btn-primary">Cancel</button>-->
            <button type="submit" class="btn btn-success" id="changePass">Submit</button>
		</div>
	</div>
      </form>
    </div>
</div>
<script>
<!-- Validation -->
$('#changePass').click(function() {
        var err = 0;
        var err_msg = "";
		var newPwd = $("#newPwd").val();
    	var reTpPwd = $("#reTpPwd").val();
	
        if (document.getElementById('oldPwd').value === "") {
            err = 1;
            err_msg += "Please Enter Old Password.<br>";
        }
		
		if (document.getElementById('newPwd').value === "") {
            err = 1;
            err_msg += "Please Enter New Password.<br>";
        }
		
		if (document.getElementById('reTpPwd').value === "") {
            err = 1;
            err_msg += "Please Re Enter New Password.<br>";
        }
		
		if (newPwd != "" && reTpPwd != "") {
            if (newPwd != reTpPwd) {
				err = 1;
				err_msg += "Your password and confirmation password do not match.<br>";
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
<!-- Validation -->

	new MaskedPassword(document.getElementById("oldPwd"), '\u25CF');
	new MaskedPassword(document.getElementById("newPwd"), '\u25CF');
	new MaskedPassword(document.getElementById("reTpPwd"), '\u25CF');
</script>