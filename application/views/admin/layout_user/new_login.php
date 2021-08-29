<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>

        <!-- Bootstrap core CSS-->
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

        
        <link type="text/javascript" href=<?php echo site_url('assets/chart.js/Chart.js') ?>>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Dashboard BRILINK</h3></div>
                                    <div class="card-body">
                                        <form action="<?= site_url('user/login') ?>" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input type="text" autocomplete="off"  class="form-control" name="email" placeholder="Email.." required />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Password</label>
                                                <input oninput="turnOnPasswordStyle()" type="password" autocomplete="off"  class="form-control" name="password" placeholder="Password.." required />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#">Forgot Password?</a>
                                                <a class="btn btn-primary" type="submit" value="Login"  style="color:white;" >Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                    <?php 
                                        if( $this->session->flashdata('err_message') )
                                        {
                                            echo $this->session->flashdata('err_message');
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script>
            function turnOnPasswordStyle() {
                console.log("tes")
                $('#password').attr('type', "password");
            }
        </script>
    </body>
</html>