<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ntec-My-App</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/dash/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/dash/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/dash/build/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post" action="<?php echo base_url(); ?>Login/reset_pwd">
                        <h1>Ntec</h1>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" name="email" required />
                        </div>
                        <div>
                        	<button type="submit" class="btn btn-default source">Send</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <p class="change_link"> Already a member ?
                            	<a href="<?php echo base_url(); ?>Welcome/index" class="to_register"> Log in </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1>Ntec-My-App</h1>
                                <p>©2016 All Rights Reserved. Ntec. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>