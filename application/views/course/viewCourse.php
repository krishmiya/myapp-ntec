   <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>View <small>Course</small></h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Campus</th>
                          <th>School</th>
                          <th>Department</th>
                          <th>Course</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
						$k = 0;
						while ($k < count($courseData)) {
							$camId = $courseData[$k]['camId'];
							$sId = $courseData[$k]['sId'];
							$crsId = $courseData[$k]['crsId'];
							$campusName = $courseData[$k]['campusName'];
							$schoolName = $courseData[$k]['schoolName'];
							$mainDescription = $courseData[$k]['mainDescription'];
							$courseName = $courseData[$k]['courseName'];
						?>
                        <tr><td><?php echo $k + 1; ?></td><td><?php echo $campusName; ?></td><td><?php echo $schoolName; ?></td><td><?php echo $mainDescription; ?></td><td><?php echo $courseName; ?></td><td><a href="<?php echo base_url();?>Course/view/<?php echo $crsId;?>">Edit</a></td></tr>
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