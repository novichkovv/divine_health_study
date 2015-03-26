<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Divine Health Reports</title>
    <link href="<?php echo R_SITE_DIR; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo R_SITE_DIR; ?>css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo R_SITE_DIR; ?>css/dashboard.css" rel="stylesheet">
    <link href="<?php echo R_SITE_DIR; ?>css/dataTables.css" rel="stylesheet">
    <link href="<?php echo R_SITE_DIR; ?>css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo R_SITE_DIR; ?>js/jquery.js"></script>
    <script src="<?php echo R_SITE_DIR; ?>js/jquery-ui.min.js"></script>
    <script src="<?php echo R_SITE_DIR; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo R_SITE_DIR; ?>js/dataTables.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/script.js"></script>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<br /><br /><br /><br /><br />
<div class="row">
    <div class="col-xs-offset-0 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4">
        <form action="" method="post">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="text-center">
                        <h3 class="panel-title">AUTHORIZATION</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <br />
                    <div class="col-md-8 col-md-offset-2">
                        <?php if($error): ?>
                            <div class="text-center">
                                <h3 class="text-danger">Wrong login/password</h3>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="text" value="" class="form-control input-lg" name="login" placeholder="login" />
                        </div>
                        <div class="form-group">
                            <input type="password" value="" class="form-control input-lg" name="password" placeholder="password" />
                        </div>
                        <div class="form-group">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" value="1" checked> Remember Me
                            </label>
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <input type="submit" value="Log In" name="login_btn" class="btn btn-info btn-lg">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>