   <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>View <small>Tertiary Studies</small></h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Country</th>
                          <th>Qualification</th>
                          <th>Institution</th>
                          <th>Completed Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
						$k = 0;
						while ($k < count($tertiarystudies)) {
							$tsId = $tertiarystudies[$k]['tsId'];
							$countryName = $tertiarystudies[$k]['countryName'];
							$qualification = $tertiarystudies[$k]['qualification'];
							$institution = $tertiarystudies[$k]['institution'];
							$dateCompleted = $tertiarystudies[$k]['dateCompleted'];
						?>
                        <tr>
                            <td><?php echo $k + 1; ?></td>
                            <td><?php echo $countryName; ?></td>
                            <td><?php echo $qualification; ?></td>
                            <td><?php echo $institution; ?></td>
                            <td><?php echo $dateCompleted; ?></td>
                            <td align="center">
                            	<a href="<?php echo base_url();?>StuProfile/view_trtiary_studies/<?php echo $tsId;?>"><i class="fa fa-edit"></i> </a> /
                                <a href="<?php echo base_url();?>StuProfile/delete_trtiary_studies/<?php echo $tsId;?>"><i class="fa fa-trash"></i> </a>
                            </td>
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