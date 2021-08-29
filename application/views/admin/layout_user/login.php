<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>

  <!-- Bootstrap core CSS-->
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="container ">
        <div class="row justify-content-center  ">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                       
                        <h4 class="text-center my-4"> Attendance Web </h4>
                    </div>
                        <div class="card-body">
                            <form action="<?= site_url('user/login') ?>" method="POST">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" autocomplete="off"  class="form-control" name="email" placeholder="Enter email address" required />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password </label>
                                    <input oninput="turnOnPasswordStyle()" type="password" autocomplete="off"  class="form-control" name="password" placeholder="Enter password" required />
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary w-100" value="Login" />
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

</body>

<script>
    function turnOnPasswordStyle() {
        console.log("tes")
        $('#password').attr('type', "password");
    }
</script>
</html>