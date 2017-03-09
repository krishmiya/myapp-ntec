   <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>View <small>Campus</small></h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Campus</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
						$k = 0;
						while ($k < count($campusData)) {
							$camId = $campusData[$k]['camId'];
							$campusName = $campusData[$k]['campusName'];
						?>
                        <tr><td><?php echo $k + 1; ?></td><td><?php echo $campusName; ?></td><td><a href="<?php echo base_url();?>Campus/view/<?php echo $camId;?>">Edit</a></td></tr>
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