   <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>View <small>Change of Campus / School / Programme</small></h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<div class="table-responsive">
                      <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Telephone</th>
                          <th>DOB</th>
                          <th>Reference #</th>
                          <th>Signed Date</th>
                          <th>Days</th>
                          <th>Campus</th>
                          <th>School</th>
                          <th>Course</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
						$k = 0;
						while ($k < count($pcData)) {
							$pdId = $pcData[$k]['pdId'];
							$cspId = $pcData[$k]['cspId'];
							$firstName = $pcData[$k]['firstName'];
							$lastName = $pcData[$k]['lastName'];
							$telephone = $pcData[$k]['telephone'];
							$dob = $pcData[$k]['dob'];
							$refNumber = $pcData[$k]['refNumber'];
							$sign_date = $pcData[$k]['sign_date'];
							$days_commencement = $pcData[$k]['days_commencement'];
							$campusName = $pcData[$k]['campusName'];
							$schoolName = $pcData[$k]['schoolName'];
							$courseName = $pcData[$k]['courseName'];
							
							
							
							//if($days_commencement < 10){
						?>
                        <tr><td><?php echo $k + 1; ?></td><td><?php echo $firstName." ".$lastName; ?></td><td><?php echo $telephone; ?></td><td><?php echo $dob; ?></td><td><?php echo $refNumber; ?></td><td><?php echo $sign_date; ?></td><td><?php echo $days_commencement; ?></td><td><?php echo $campusName; ?></td><td><?php echo $schoolName; ?></td><td><?php echo $courseName; ?></td><td><a href="<?php echo base_url();?>Csp/app_csp/<?php echo $cspId;?>"><i class="fa fa-search"></i> View</a></td></tr>
                        <?php
							//}
							$k++;
                        }
                        ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
              </div>
          </div>
      </div>