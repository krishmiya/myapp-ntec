<!DOCTYPE html>

<html lang="en">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!-- Meta, title, CSS, favicons, etc. -->

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Ntec | My-App</title>

<!-- Bootstrap -->

<link href="<?php echo base_url(); ?>assets/dash/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->

<link href="<?php echo base_url(); ?>assets/dash/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<!-- iCheck -->

<link href="<?php echo base_url();?>assets/dash/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- Animate.css -->

<link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">

<!-- Custom Theme Style -->

<link href="<?php echo base_url(); ?>assets/dash/build/css/custom.min.css" rel="stylesheet">

<!-- Custom Theme Style -->

<script src="<?php echo base_url();?>assets/dash/vendors/jquery/dist/jquery.min.js"></script>

<!-- Bootbox -->

<script src="<?php echo base_url(); ?>assets/dash/js/bootbox/bootbox.min.js"></script>

<style>

.placeholder{color: grey;}

select option:first-child{color: grey; display: none;}

select option{color: #555;} /* bootstrap default color*/

</style>

</head>

<body class="login">

<div> <a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor" id="signin"></a>

  <div class="login_wrapper">

    <div class="animate form login_form">

      <section class="login_content">

        <form method="post" action="<?php echo base_url(); ?>Login/log_in">

          <h1>Ntec</h1>

          <div>

            <input type="email" class="form-control" placeholder="Email" name="email" required />

          </div>

          <div>

            <input type="password" class="form-control" placeholder="Password" name="password" required />

          </div>

          <div> 

            <!--<a class="btn btn-default submit" href="index.html">Log in</a>-->

            <button type="submit" class="btn btn-default source">Log in</button>

            <a class="reset_pass" href="<?php echo base_url(); ?>Login/lost_password">Lost your password?</a> </div>

          <div class="clearfix"></div>

          <div class="separator">

            <p class="change_link"> New to site? <a href="#signup" class="to_register"> Create Account </a> </p>

            <div class="clearfix"></div>

            <br />

            <div>

              <h1>My-App</h1>

              <p>©2016 All Rights Reserved. Ntec. Privacy and Terms</p>

            </div>

          </div>

        </form>

      </section>

    </div>

    <div id="register" class="animate form registration_form">

      <section class="login_content">

        <form action="<?php echo base_url(); ?>Login/create_account" method="post">

          <h1>Create Account</h1>

          <div>

            <input type="text" class="form-control" placeholder="Student Id" name="sId" required />

          </div>

          <div style="margin-bottom:15px"> 

            <!--<input type="text" class="form-control" placeholder="Campus" required />-->

            <select required class="form-control placeholder" name="campus" id="campus">

              <option value="">Campus</option>

              <?php

			  $k = 0;

              while ($k < count($campus)) {

				  $camId = $campus[$k]['camId'];

				  $campusName = $campus[$k]['campusName'];

				  echo "<option value='$camId'>$campusName</option>";

				  $k++;

              }

              ?>

            </select>

          </div>

          

          <div style="margin-bottom:15px"> 

            <!--<input type="text" class="form-control" placeholder="Campus" required />-->

            <select class="form-control placeholder" name="department" id="department" required>

              <option value="">Department</option>

              <?php

			  $k = 0;

              while ($k < count($department)) {

				  $mcId = $department[$k]['mcId'];

				  $mainDescription = $department[$k]['mainDescription'];

				  echo "<option value='$mcId'>$mainDescription</option>";

				  $k++;

              }

              ?>

            </select>

          </div>

          <div>

            <input type="text" class="form-control" placeholder="First Name" name="firstName" required />

          </div>

          <div>

            <input type="text" class="form-control" placeholder="Last Name" name="lastName" required />

          </div>

          <div>

            <input type="email" class="form-control" placeholder="Email" name="email" required />

          </div>

          <div>

            <input type="password" class="form-control" placeholder="Password" name="password" required />

          </div>

          <div>

            <button type="submit" class="btn btn-default source" id="stuReg">Submit</button>

          </div>

          <div class="clearfix"></div>

          <div class="separator">

            <p class="change_link"> Already a member ? <a href="#signin" class="to_register"> Log in </a> </p>

            <div class="clearfix"></div>

            <br />

            <div>

              <h1><!--<i class="fa fa-paw"></i>--> My-App</h1>

              <p>©2016 All Rights Reserved. Ntec. Privacy and Terms</p>

            </div>

          </div>

        </form>

      </section>

    </div>

  </div>

</div>

</body>

<!--placeholder-->

<script>

    $('select').change(function() {

     if ($(this).children('option:first-child').is(':selected')) {

       $(this).addClass('placeholder');

     } else {

      $(this).removeClass('placeholder');

     }

    });

</script>

</html>