<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book Appointment</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords"
        content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="<?=base_url(); ?>assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/style.css">
</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" method="post" action="<?=base_url(); ?>login">
                            <div class="text-center">
                                <?php if (session()->has('error')) : ?>
                                <div id="errorMessage" class="alert alert-danger" role="alert">
                                    <?= session()->get('error') ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-centar txt-primary">Sign In</h3>
                                    </div>
                                </div>
                                <hr />
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Your Email Address">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-25 text-left">

                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" value="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign
                                            in</button>
                                    </div>
                                </div>
                                <hr />


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="<?=base_url(); ?>assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?=base_url(); ?>assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?=base_url(); ?>assets/js/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url(); ?>assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?=base_url(); ?>assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="<?=base_url(); ?>assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="<?=base_url(); ?>assets/js/common-pages.js"></script>
    <script>
    // Hide the error message after 5 seconds
    setTimeout(function(){
        var errorMessage = document.getElementById('errorMessage');
        if(errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 5000); // 5000 milliseconds = 5 seconds
</script>
</body>

</html>