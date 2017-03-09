   <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>View <small>Department</small></h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Department</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
						$k = 0;
						while ($k < count($departmentData)) {
							$mcId = $departmentData[$k]['mcId'];
							$mainDescription = $departmentData[$k]['mainDescription'];
						?>
                        <tr><td><?php echo $k + 1; ?></td><td><?php echo $mainDescription; ?></td><td><a href="<?php echo base_url();?>Department/view/<?php echo $mcId;?>">Edit</a></td></tr>
                        <?php
							$k++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
      </div>