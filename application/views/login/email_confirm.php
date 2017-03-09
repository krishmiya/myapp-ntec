<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>email Confirm </title>
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
                        <h1>Cheers!</h1><br>
                        <i class="fa fa-check-circle-o fa-5x" aria-hidden="true"></i><br>
                        <p>Your Email has been confirmed</p>
                    </div>
                    <div class="separator">
                        <p class="change_link">
                            <!--<i class="fa fa-sign-in fa-2x" aria-hidden="true"></i>
                            <a href="#signup" class="to_register"> Login Here </a>-->
                            <a class="btn btn-lg btn-success" href="<?php echo base_url();?>Welcome/index"><i class="fa fa-sign-in fa-lg"></i> Login Here </a>
                        </p>

                        <div class="clearfix"></div>
                        <br>
                    </div>
                </section>
            </div>

        </div>
    </div>
</body>
</html>