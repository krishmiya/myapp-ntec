<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Personal Details.</p>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Family Name<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['firstName']."</label>";
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name(s)<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['lastName']."</label>";
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Preferred Name<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['preferredName']."</label>";
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of Birth<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['dob']."</label>";
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gender<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
			if($viewProfile[0]['gender'] == 1){
				echo "<label class='control-label' for='first-name'>Male</label>";
			}else{
				echo "<label class='control-label' for='first-name'>Femaale</label>";
			}
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Citizenship<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['citizenshipName']."</label>";
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country of Birth<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['countryName']."</label>";
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Passport Number<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['ppNumber']."</label>";
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Issue Date<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['ppIssueDate']."</label>";
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Expiry Date<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['ppExpiryDate']."</label>";
            ?>
        </div>
    </div>
    
<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Applicant's Contact Details.</p>

<div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['address']."</label>";
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telephone<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['telephone']."</label>";
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fax<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['fax']."</label>";
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
                echo "<label class='control-label' for='first-name'>".$viewProfile[0]['email']."</label>";
            ?>
        </div>
    </div>