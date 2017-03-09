   <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>View <small>School</small></h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Campus</th>
                          <th>School</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
						$k = 0;
						while ($k < count($schoolData)) {
							$sId = $schoolData[$k]['sId'];
							$campus = $schoolData[$k]['campusName'];
							$schoolName = $schoolData[$k]['schoolName'];
						?>
                        <tr><td><?php echo $k + 1; ?></td><td><?php echo $campus; ?></td><td><?php echo $schoolName; ?></td><td><a href="<?php echo base_url();?>School/view/<?php echo $sId;?>">Edit</a></td></tr>
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