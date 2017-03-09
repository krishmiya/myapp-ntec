<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    	<br />
        <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Signature/add_sign" method="post">            
            <div class="form-group">
            	<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<input id="userfile" class="form-control col-md-7 col-xs-12" type="file" name="userfile"> Max 2500 kb / file format : .png
				</div>
			</div>
	<div class="ln_solid"></div>
    <div class="form-group">
    	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Submit</button>
		</div>
	</div>
      </form>
    </div>
</div>