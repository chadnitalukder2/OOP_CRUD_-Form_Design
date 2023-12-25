<?php
    include_once 'classes/register.php';
    $re = new Register;

   
   
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>All Student</title>
  </head>
  <body>
  <br>
        <div class="container ">
            <div class="row d-flex justify-content-center ">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header">
                           <div class="row">
                            <div class="col-md-6">
                                <h3>All Student Info</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="addStudent.php" class="btn btn-info float-right" >Add Student</a>
                            </div>
                           </div>
                        </div>
                        <div class="card-body" enctype="multipart/form-data">
                         
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Photo</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                $allStd = $re->allStudent();
                                if($allStd){
                                    while($row = mysqli_fetch_assoc($allStd)){
                                        ?>
                                            <tr>
                                                <td><?=$row['name']?></td>
                                                <td><?=$row['email']?></td>
                                                <td><?=$row['phone']?></td>
                                               <!-- <td><img src="..."></td> -->
                                                <td>photo</td>
                                                <td><?=$row['address']?></td>
                                                <td>
                                                    <a href="edit.php?id=<?=base64_encode($row['id'])?>" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="delete.php?id=<?=$row['id']?>" class="btn btn-sm btn-danger">delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>