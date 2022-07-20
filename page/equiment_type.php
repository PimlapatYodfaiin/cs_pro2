<?php
// session_start();
include 'dbconnect.php';

$select_types= "SELECT * FROM types";
$query_types = mysqli_query($connect, $select_types);

$result = mysqli_query($connect, $select_types);
$count = mysqli_num_rows($result);



if (isset($_POST['type_name'])) {
    $type_id  = $_POST['type_id'];
    $type_name = $_POST['type_name'];
    $type_lifetime = $_POST['type_lifetime'];

    $insert = "INSERT INTO types SET
        type_id = '$type_id', 
        type_name = '$type_name', 
        type_lifetime = '$type_lifetime','";

    mysqli_query($connect, $insert);
    // echo '<script>window.location.href="money.php"</script>';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function() {
            if (this.checked) {
                checkbox.each(function() {
                    this.checked = true;
                });
            } else {
                checkbox.each(function() {
                    this.checked = false;
                });
            }
        });
        checkbox.click(function() {
            if (!this.checked) {
                $("#selectAll").prop("checked", false);
            }
        });
    });
    </script>
</head>

<body>
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title"> ข้อมูลประเภทครุภัณฑ์ </h2>

                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลหลัก</a></li>
                                    <li class="breadcrumb-item"><a href="#"
                                            class="breadcrumb-link">จัดการข้อมูลประเภทครุภัฑณ์</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ข้อมูลประเภทครุภัณฑ์</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header"><b>ประเภทครุภัณฑ์</b></h4>
                    <div class="card-body">
                        <form action="">
                            <div class="form-row">
                                <div class="col-4">
                                    <label for="validationCustom03">รหัสประเภทครุภัณฑ์</label>
                                    <input type="text" class="form-control" id="validationCustom03"
                                        placeholder="รหัสประเภทครุภัณฑ์" required>
                                </div>

                                <div class="col-4">
                                    <label for="validationCustom04">ประเภทครุภัณฑ์</label>
                                    <input type="text" class="form-control" id="validationCustom04"
                                        placeholder="ประเภทครุภัณฑ์" required>
                                </div>

                                


                            </div>
                        </form>
                    </div>
                </div>
            </div> -->



            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header">ข้อมูลประเภทครุภัณฑ์ <a href="?page=add_eq_type"
                                class="btn-info btn-sm">+เพิ่มข้อมูล</a> </h3>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th style="width: 150px;"> รหัสประเภทครุภัณฑ์</th>
                                        <th style="width: 300px;"> ประเภทครุภัณฑ์</th>
                                        <th style="width: 190px;"> อายุการใช้งานตามประเภท</th>
                                        <th style="width: 150px;"> จัดการประเภทครุภัณฑ์</th>
                                        <th style="width: 150px;">จัดการข้อมูล</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>

                                        <!-- <td><?= $i++; ?></td> -->
                                        <td><?= $row['type_id'] ?></td>
                                        <td><?= $row['type_name'] ?></td>
                                        <td><?= $row['type_lifetime'] ?></td>
                                        <td>
                                            <a href=""><i class="fa fa-plus-circle fa-lg"></i></a>
                                        </td>
                                        <td>
                                            <a href="?page=view_eqtype"><i class="fas fa-eye fa-lg"> </i></a>&nbsp &nbsp


                                            <a href="?page=edit_type_eq.php"><i class="fas fa-pencil-alt fa-lg"> </i></a>&nbsp &nbsp
                                            <a href=""><i class="fa  fa-trash fa-lg"> </i></a>
                                        </td>


                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>
</body>

</html>