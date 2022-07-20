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
                        <h2 class="pageheader-title"> ข้อมูลเเบ่งตามประเภทครุภัณฑ์ </h2>

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

            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header">ข้อมูลเเบ่งตามประเภทครุภัณฑ์ </h4>
                    <div class="col-md-12">
                        <br>

                        <div class="tab-vertical">
                            <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-vertical-tab" data-toggle="tab"
                                        href="#home-vertical" role="tab" aria-controls="home" aria-selected="true">
                                        ครุภัณฑ์สำนักงาน</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-vertical-tab" data-toggle="tab"
                                        href="#profile-vertical" role="tab" aria-controls="profile"
                                        aria-selected="false">ครุภัณฑ์ยานพาหนะเเละขนส่ง</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-vertical-tab" data-toggle="tab"
                                        href="#contact-vertical" role="tab" aria-controls="contact"
                                        aria-selected="false">ครุภัณฑ์การเกษตร</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-vertical-tab" data-toggle="tab"
                                        href="#contact-vertical" role="tab" aria-controls="contact"
                                        aria-selected="false">ครุภัณฑ์ก่อสร้าง</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="profile-vertical-tab" data-toggle="tab"
                                        href="#profile-vertical" role="tab" aria-controls="profile"
                                        aria-selected="false">ครุภัณฑ์ไฟฟ้าเเละวิทยุ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-vertical-tab" data-toggle="tab"
                                        href="#contact-vertical" role="tab" aria-controls="contact"
                                        aria-selected="false">ครุภัณฑ์โฆษณาเเละการเผยเเพร่</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-vertical-tab" data-toggle="tab"
                                        href="#contact-vertical" role="tab" aria-controls="contact"
                                        aria-selected="false">ครุภัณฑ์วิทยาศาสตร์เเละการเเพทย์</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="contact-vertical-tab" data-toggle="tab"
                                        href="#contact-vertical" role="tab" aria-controls="contact"
                                        aria-selected="false">ครุภัณฑ์งานบ้านเเละงานครัว</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-vertical-tab" data-toggle="tab"
                                        href="#contact-vertical" role="tab" aria-controls="contact"
                                        aria-selected="false">ครุภัณฑ์โรงงาน</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="profile-vertical-tab" data-toggle="tab"
                                        href="#profile-vertical" role="tab" aria-controls="profile"
                                        aria-selected="false"> ครุภัณฑ์กีฬา</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-vertical-tab" data-toggle="tab"
                                        href="#profile-vertical" role="tab" aria-controls="profile"
                                        aria-selected="false"> ครุภัณฑ์สนาม,สำรวจ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-vertical-tab" data-toggle="tab"
                                        href="#profile-vertical" role="tab" aria-controls="profile"
                                        aria-selected="false"> ครุภัณฑ์ดนตรีเเละนาฎศิลป์</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" id="profile-vertical-tab" data-toggle="tab"
                                        href="#profile-vertical" role="tab" aria-controls="profile"
                                        aria-selected="false">ครุภัณฑ์คอมพิวเตอร์</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-vertical-tab" data-toggle="tab"
                                        href="#contact-vertical" role="tab" aria-controls="contact"
                                        aria-selected="false">ครุภัณฑ์การศึกษา</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-vertical-tab" data-toggle="tab"
                                        href="#contact-vertical" role="tab" aria-controls="contact"
                                        aria-selected="false">ครุภัณฑ์อาวุธ</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent3">
                                <div class="tab-pane fade show active" id="home-vertical" role="tabpanel"
                                    aria-labelledby="home-vertical-tab">
                                    <p class="lead"> All the Lorem Ipsum generators on the Internet tend to repeat
                                        predefined chunks as necessary, making this the first true generator on the
                                        Internet. </p>
                                    <p>Phasellus non ante gravida, ultricies neque a, fermentum leo. Etiam ornare enim
                                        arcu, at venenatis odio mollis quis. Mauris fermentum elementum ligula in
                                        efficitur. Aliquam id congue lorem. Proin consectetur feugiasse
                                        platea dictumst. Pellentesque sed justo aliquet, posuere sem nec, elementum
                                        ante.</p>
                                    <a href="#" class="btn btn-secondary">Go somewhere</a>
                                </div>
                                <div class="tab-pane fade" id="profile-vertical" role="tabpanel"
                                    aria-labelledby="profile-vertical-tab">
                                    <h3>ครุภัณฑ์ยานพาหนะเเละขนส่ง</h3>
                                    <hr>
                                    <p>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <!-- <h5 class="card-header">ข้อมูลประเภทเงิน</h5> -->
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered first">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>รหัสหมวดหมู่ย่อยครุภัณฑ์</th>
                                                            <th>หมวดหมู่</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody id="myTable">
                                                        <?php $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>

                                                            <td><?= $i++; ?></td>
                                                            <td><?= $row['tr_date'] ?></td>
                                                            <td><?= $row['tr_document_num'] ?></td>
                                                            


                                                        </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                   
                                       
                                                </table>
                                            </div>

                                        </div>

                                    </div>


                                </div>
                                </p>
                                <p> Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus
                                    scelerisque risus, a commodo mi tempus eu.</p>
                            </div>
                            <div class="tab-pane fade" id="contact-vertical" role="tabpanel"
                                aria-labelledby="contact-vertical-tab">
                                <h3>Tab Heading Vertical Title</h3>
                                <p>Vivamus pellentesque vestibulum lectus vitae auctor. Maecenas eu sodales arcu.
                                    Fusce lobortis, libero ac cursus feugiat, nibh ex ultricies tortor, id dictum
                                    massa nisl ac nisi. Fusce a eros pellentesque, ultricies urna
                                    nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.
                                </p>
                                <p> Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus
                                    scelerisque risus, a commodo mi tempus eu.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





    </div>

    </div>
    </div>
</body>

</html>