<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Divine Health Study Course</title>
    <link href="<?php echo SITE_DIR; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo SITE_DIR; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo SITE_DIR; ?>css/animate.css" rel="stylesheet" />
    <link href="<?php echo SITE_DIR; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo SITE_DIR; ?>color/default.css" rel="stylesheet">
    <script src="<?php echo SITE_DIR; ?>js/jquery.min.js"></script>
    <script src="<?php echo SITE_DIR; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo SITE_DIR; ?>js/jquery.easing.min.js"></script>
    <script src="<?php echo SITE_DIR; ?>js/jquery.scrollTo.js"></script>
    <script src="<?php echo SITE_DIR; ?>js/wow.min.js"></script>
    <script src="<?php echo SITE_DIR; ?>js/custom.js"></script>
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