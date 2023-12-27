<?php
    include_once 'classes/register.php';
    $re = new Register;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $register = $re->addRegister($_POST, $_FILES);
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registration Form</title>
  </head>
  <body>
  <br>
        <div class="container ">
            <div class="row d-flex justify-content-center ">
                <div class="col-md-7">
                    <div class="card shadow">
                        <?php
                            if(isset($register))
                            {
                                ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong><?php echo $register ; ?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                            }
                        ?>
                        <div class="card-header">
                            <div class="row">
                            <div class="col-md-6">
                                <h3> Add Student</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="index.php" class="btn btn-info float-right" >Show Student Info</a>
                            </div>
                           </div>
                        </div>
                        <div class="card-body" enctype="multipart/form-data">
                            <form method="POST" enctype="multipart/form-data">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Enter Your Name" class="form-control mb-3">

                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Enter Your Email" class="form-control mb-3">

                                <label for="">Phone Number</label>
                                <input type="number" name="phone" placeholder="Enter Your Phone Number" class="form-control mb-3">

                                <label for="">Photo</label>
                                <input type="file" name="photo"  class="form-control mb-3">

                                <label for="">Address</label>
                               <textarea name="address" class="form-control mb-4"></textarea>
                            
                                <input type="submit" value="Register" class="btn btn-success form-control">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>