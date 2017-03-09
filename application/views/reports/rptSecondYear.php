   <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>View <small>2<sup>nd</sup>Year Application Form </small></h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Campus</th>
                          <th>School</th>
                          <th>Course</th>
                          <th>Sign Date</th>
                          <th>Refference #</th>
                          <th>Status</th>
                          <?php
						  $usrType = $this->session->userdata('usrType');
						  if($usrType == 3 || $usrType == 6 && $usrType != 0){
							  echo "<th>Pdf</th>";
						  }
                          ?>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
						$k = 0;
						while ($k < count($syafData)) {
						?>
                        <tr>
                        <td><?php echo $k + 1; ?></td>
                        <td><?php echo $syafData[$k]['campusName']; ?></td>
                        <td><?php echo $syafData[$k]['schoolName']; ?></td>
                        <td><?php echo $syafData[$k]['courseName']; ?></td>
                        <td><?php echo $syafData[$k]['sign_date']; ?></td>
                        <td><?php echo $syafData[$k]['refNumber']; ?></td>
                        <td>
							<?php  
								$status = $syafData[$k]['status'];
								
								if($status == 0){
									echo "<lable class='btn btn-warning dropdown-toggle btn-xs'>Not In Process Still</lable>";
								}
								if($status == 1){
									echo "<lable class='btn btn-warning dropdown-toggle btn-xs'>Pending FA</lable>";
								}
								if($status == 6){
									echo "<lable class='btn btn-success dropdown-toggle btn-xs'>Finish</lable>";
								}
								if($status == 88){
									echo "<lable class='btn btn-danger dropdown-toggle btn-xs'>Decline</lable>";
								}
							?>
                        </td>
                        
                        <?php
						  $usrType = $this->session->userdata('usrType');
						  
						  if($usrType == 3 || $usrType == 6 && $usrType != 0){
							  if($status == 6 || $status == 88){
								  echo "<td><a href=".base_url()."Syaf_pdf/create_pdf/".$syafData[$k]['syaId']." target='_new'><span class='glyphicon glyphicon-camera'></span></a></td>";
							  }else{
								  if($status == 0){
									  echo "<td><lable class='btn btn-warning dropdown-toggle btn-xs'>Not In Process Still</lable></td>";
								   }
								   if($status == 1){
									   echo "<td><lable class='btn btn-warning dropdown-toggle btn-xs'>Pending FA</lable></td>";
								   }
						  	  }
						  }
                        ?>
                        
                        </tr>
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