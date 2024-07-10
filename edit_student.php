<?php
session_start();
include 'dbconn.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Edit student</title>
</head>

<body>

    <div class="container mt-5">
        <?php include ('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heder">
                        <h4>Edit student
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        $editid = $_GET["id"];
                        $qry = "SELECT * FROM student WHERE id='$editid' ";
                        $qry_run = mysqli_query($con, $qry);

                        if (mysqli_num_rows($qry_run) > 0) {
                            foreach ($qry_run as $data) {
                                ?>
                                <form action="code.php" method="POST">
                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" value="<?= $data['name']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control" value="<?= $data['email']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="<?= $data['phone']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Course</label>
                                        <input type="text" name="course" class="form-control" value="<?= $data['course']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="hidden" name="student_id" value="<?= $data['id']; ?>">
                                        <input type="submit" name="update-data" id="update-data" value="Update Student"
                                            class="btn btn-primary">
                                    </div>

                                </form>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


</body>

</html>