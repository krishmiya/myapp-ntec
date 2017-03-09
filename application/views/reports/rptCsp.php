   <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>View <small>Change of Campus / School / Programme </small></h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Student ID</th>
                          <th>Sign Date</th>
                          <th>Refference #</th>
                          <th>Invoice #</th>
                          <th>Status</th>
                          <?php
						  $usrType = $this->session->userdata('usrType');
						  if($usrType == 3 || $usrType == 6){
							  echo "<th>Pdf</th>";
						  }
                          ?>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
						$k = 0;
						while ($k < count($cspData)) {
						?>
                        <tr>
                        <td><?php echo $k + 1; ?></td>
                        <?php
							$name = $cspData[$k]['firstName']." ".$cspData[$k]['lastName'];
							echo "<td>$name</td>";
                        ?>
                        <td><?php echo $cspData[$k]['stuId']; ?></td>
                        <td><?php echo $cspData[$k]['sign_date']; ?></td>
                        <td><?php echo $cspData[$k]['refNumber']; ?></td>
                        <td><?php echo $cspData[$k]['invoiceNo']; ?></td>
                        <td>
							<?php 
								$days_commencement = $cspData[$k]['days_commencement']; 
								$fac = $cspData[$k]['fac']; 
								$inCharge_consult = $cspData[$k]['inCharge_consult']; 
								$icd = $cspData[$k]['icd']; 
								$hodCurrent = $cspData[$k]['hodCurrent'];
								$hodNew = $cspData[$k]['hodNew']; 
								$status = $cspData[$k]['status']; 
								
								if($days_commencement <= 10){
									if($status == 6){
										echo "<lable class='btn btn-success dropdown-toggle btn-xs'>Finish</lable>";
									}else if($status == 0){
										echo "<lable class='btn btn-warning dropdown-toggle btn-xs'>Pending AC</lable>";
									}else if($status == 1){
										echo "<lable class='btn btn-warning dropdown-toggle btn-xs'>Pending FA</lable>";
									}else if($icd == 0 && $fac == 1 && $inCharge_consult == 1 && $status != 88){
										echo "<lable class='btn btn-warning dropdown-toggle btn-xs'>Pending ICD</lable>";
									}else if($status == 88){
										echo "<lable class='btn btn-danger dropdown-toggle btn-xs'>Decline</lable>";
									}
								}else{
									if($status == 6){
										echo "<lable class='btn btn-success dropdown-toggle btn-xs'>Finish</lable>";
									}else if($status == 0){
										echo "<lable class='btn btn-warning dropdown-toggle btn-xs'>Pending AC</lable>";
									}else if($status == 1){
										echo "<lable class='btn btn-warning dropdown-toggle btn-xs'>Pending FA</lable>";
									}else if($fac == 1 && $inCharge_consult == 1 && $hodCurrent == 0 && $status != 88){
										echo "<lable class='btn btn-warning dropdown-toggle btn-xs'>Pending HOD CP</lable>";
									}else if($fac == 1 && $inCharge_consult == 1 && $hodNew == 0 && $status != 88){
										echo "<lable class='btn btn-warning dropdown-toggle btn-xs'>Pending HOD NP</lable>";
									}else if($status == 88){
										echo "<lable class='btn btn-danger dropdown-toggle btn-xs'>Decline</lable>";
									}
								}
							?>
                        </td>
                        <?php
						  $usrType = $this->session->userdata('usrType');
						  /*if($usrType == 3 || $usrType == 6){
							  echo "<td><a href=".base_url()."Csp_pdf/create_pdf/".$cspData[$k]['cspId']." target='_new'><span class='glyphicon glyphicon-camera'></span></a></td>";
						  }*/
						  if($days_commencement <= 10){
									if($status == 6){
										echo "<td><a href=".base_url()."Csp_pdf/create_pdf/".$cspData[$k]['cspId']." target='_new'><span class='glyphicon glyphicon-camera'></span></a></td>";
									}else if($status == 0){
										echo "<td><lable class='btn btn-warning dropdown-toggle btn-xs'>Pending AC</lable></td>";
									}else if($status == 1){
										echo "<td><lable class='btn btn-warning dropdown-toggle btn-xs'>Pending FA</lable></td>";
									}else if($icd == 0 && $fac == 1 && $inCharge_consult == 1 && $status != 88){
										echo "<td><lable class='btn btn-warning dropdown-toggle btn-xs'>Pending ICD</lable></td>";
									}else if($status == 88){
										echo "<td><a href=".base_url()."Csp_pdf/create_pdf/".$cspData[$k]['cspId']." target='_new'><span class='glyphicon glyphicon-camera'></span></a></td>";
									}
								}else{
									if($status == 6){
										echo "<td><a href=".base_url()."Csp_pdf/create_pdf/".$cspData[$k]['cspId']." target='_new'><span class='glyphicon glyphicon-camera'></span></a></td>";
									}else if($status == 0){
										echo "<td><lable class='btn btn-warning dropdown-toggle btn-xs'>Pending AC</lable></td>";
									}else if($status == 1){
										echo "<td><lable class='btn btn-warning dropdown-toggle btn-xs'>Pending FA</lable></td>";
									}else if($fac == 1 && $inCharge_consult == 1 && $hodCurrent == 0 && $status != 88){
										echo "<td><lable class='btn btn-warning dropdown-toggle btn-xs'>Pending HOD CP</lable></td>";
									}else if($fac == 1 && $inCharge_consult == 1 && $hodNew == 0 && $status != 88){
										echo "<td><lable class='btn btn-warning dropdown-toggle btn-xs'>Pending HOD NP</lable></td>";
									}else if($status == 88){
										echo "<td><a href=".base_url()."Csp_pdf/create_pdf/".$cspData[$k]['cspId']." target='_new'><span class='glyphicon glyphicon-camera'></span></a></td>";
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