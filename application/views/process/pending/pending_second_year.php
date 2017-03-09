   <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>View <small>2<sup>nd</sup> Year : Application Form</small></h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Telephone</th>
                          <th>DOB</th>
                          <th>Reference #</th>
                          <th>Signed Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
						$k = 0;
						while ($k < count($pcData)) {
							$pdId = $pcData[$k]['pdId'];
							$syaId = $pcData[$k]['syaId'];
							$firstName = $pcData[$k]['firstName'];
							$lastName = $pcData[$k]['lastName'];
							$telephone = $pcData[$k]['telephone'];
							$dob = $pcData[$k]['dob'];
							$refNumber = $pcData[$k]['refNumber'];
							$sign_date = $pcData[$k]['sign_date'];
							
						?>
                        <tr><td><?php echo $k + 1; ?></td><td><?php echo $firstName." ".$lastName; ?></td><td><?php echo $telephone; ?></td><td><?php echo $dob; ?></td><td><?php echo $refNumber; ?></td><td><?php echo $sign_date; ?></td><td><a href="<?php echo base_url();?>Syaf/app_syaf/<?php echo $syaId;?>"><i class="fa fa-search"></i> View</a></td></tr>
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