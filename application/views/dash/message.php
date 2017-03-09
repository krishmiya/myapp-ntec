
<div class="x_content bs-example-popovers">
  <?php
	if($this->session->userdata('succ_msg')){
               ?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
    <strong>Successful!</strong> <?php echo $this->session->userdata('succ_msg'); ?> </div>
  <?php 
				$this->session->unset_userdata('succ_msg');
				}
                if($this->session->userdata('err_msg')){
                ?>
  <div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
    <strong>Error!</strong><?php echo $this->session->userdata('err_msg'); ?> </div>
  <?php
				$this->session->unset_userdata('err_msg');
				} ?>
</div>
