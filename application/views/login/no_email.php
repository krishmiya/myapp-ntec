<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Confirm </title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/dash/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/dash/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/dash/build/css/custom.css" rel="stylesheet">
</head>
<body class="login_confirm">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_confirm">
                    <div class="jumbotron">
                        <!--<i class="fa fa-check-circle-o fa-5x" aria-hidden="true"></i>-->
                        <i class="fa fa-envelope fa-5x" aria-hidden="true"></i>
                        <p>
                            Please Confirm<br> <strong>Your E-mail:</strong><br>
                            <a class="blue" href="mailto:#"><?php echo $this->session->userdata('user_email');?></a><br> before log in to the system
                        </p>
                        <!--<address>
                            <strong>Your E-mail:</strong><br>
                            <a href="mailto:#">first.last@example.com</a>
                        </address>-->
                    </div>
                </section>
            </div>

        </div>
    </div>
</body>
</html>