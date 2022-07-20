<?php 
// session_start();
include ('dbconnect.php');

$select_user = "SELECT * FROM users";
$query_user= mysqli_query($connect, $select_user);

$result = mysqli_query($connect, $select_user);
$count = mysqli_num_rows($result);
//  echo '<script>window.location.href="personnel.php"</script>';

if (isset($_GET['delete'])) {
    $user_id =  $_GET['delete'];
    $d = "DELETE FROM `user` WHERE `user_id` = '$user_id' ";
    mysqli_query($connect, $d);
    echo '<script>window.location.href="personnel.php"</script>';
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
                        <h2 class="pageheader-title">ข้อมูลบุคลากร
                            <a href="?page=add_personnel" class="btn-info btn-sm">+เพิ่มข้อมูล</a>
                        </h2>

                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลหลัก</a></li>
                                    <li class="breadcrumb-item"><a href="#"
                                            class="breadcrumb-link">จัดการข้อมูลบุคลากร</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ข้อมูลบุคลากร</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- striped table -->
            <!-- ============================================================== -->
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">ข้อมูลบุคลากร</h5>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th style="width: 5px;"><b> # </b></th>
                                    <th style="width: 200px;"><b>ชื่อ-นามสกุล</b></th>
                                    <th style="width: 40px;"><b>เบอร์มือถือ</b></th>
                                    <th style="width: 70px;"><b>สถานะผู้ใช้งาน</b></th>
                                    <th style="width: 40px;"><b>จัดการข้อมูล</b></th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>

                                <tr>

                                    <td><?= $i++; ?></td>
                                    <td>
                                        <?= $row['user_title_id'] . $row['user_fname'] . "&nbsp;&nbsp;" . $row['user_lname'] ?>
                                    </td>
                                    <td><?= $row['user_tel'] ?></td>
                                    <td><?= $row['user_userlevel_id'] ?></td>

                                    <th>
                                        <a href="?page=view_personnel&user_id=<?= $row['user_id'] ?>"><i
                                                class="fas fa-eye fa-3g"> </i></a>&nbsp &nbsp

                                        <a href="?page=edit_personnel&user_id=<?php  echo $row["user_id"] ?>"><i class="fas fa-pencil-alt fa-lg"> </i></a>&nbsp &nbsp
                                               
                                               

                                        <a href="?delete=<?= $row['user_id'] ?>"><i class="fa  fa-trash fa-3g"> </i></a>
                                    </th>




                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end striped table -->



        </div>

    </div>
</body>


