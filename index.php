<?php
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

    <title>Show Data</title>
</head>

<body>

    <div class="container mt-5">
        <?php include 'message.php'; ?>
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> students Details</h4>
                        <a href="create_student.php" class="btn btn-danger float-end"> Add Student</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>SL.No</th>
                                    <th> id </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM student";
                                $x = 1;
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $data) {
                                        ?>
                                        <tr>
                                            <td><?= $x++ ?></td>
                                            <td><?= $data['id'] ?></td>
                                            <td><?= $data['name'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['phone'] ?></td>
                                            <td><?= $data['course'] ?></td>
                                            <td>
                                                <a href="view.php?id=<?= $data['id'] ?>" class="btn btn-info">view</a>
                                                <a href="edit_student.php?id=<?= $data['id'] ?>"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="code.php?id=<?= $data['id'] ?>" type="submit" name="delete-data"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<h5>No record found </h5>';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>

</html>