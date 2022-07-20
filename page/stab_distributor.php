<?php  
include 'dbconnect.php';

$select = "SELECT * FROM`equipments`";
$query = mysqli_query($connect, $select);
$row = mysqli_fetch_assoc($query);
$result = mysqli_query($connect, $select);
$count = mysqli_num_rows($result);

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
                        <h2 class="pageheader-title">จำหน่ายครุภัณฑ์ <a href="#" class="btn-success btn-sm">+เพิ่มข้อมูล</a></h2>

                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จำหน่ายครุภัณฑ์</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จัดการข้อมูลจำหน่ายครุภัณฑ์</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ข้อมูลผู้ขายจำหน่ายครุภัณฑ์</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- striped table -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">จำหน่ายครุภัณฑ์</h5><br>


                        <form class="form-inline ml-auto">
                          

                          
                            <button type="Search" class="btn btn-primary btn-sm btn-md my-0 ml-sm-2 ">กรองข้อมูล</button>

                        </form>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped  table-bordered">
                             </div>
                                         <thead> 
                                            <tr >
                                               <th style="width: 5px;">
                                                <label class="custom-control custom-checkbox" for="selectAll">
                                                    <input class="custom-control-input checkboxes" type="checkbox" id="selectAll">
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </th>
                                            <th scope="col">#</th>
                                                <th scope="col">ปีงบประมาณ</th>
                                                <th scope="col">ประเภทครุภัณฑ์</th>
                                                <th scope="col">หมวดหมู่ย่อย</th>
                                                <th scope="col">หมายเลขครุภัณฑ์</th>
                                                <th scope="col">หน่วยงาน</th>
                                            </tr>
                                        </thead>
                                        <thead> 
                                             <tr >                                      
                                                <th scope="col"> </th>      
                                                <th scope="col"> </th>        
                                                <th><input type="text" class="form-control"   id="myInput" placeholder="--ปีงบประมาณ--" disabled></th>
                                                <th><input type="text" class="form-control"  id="myInput" placeholder="ประเภทครุภัณฑ์" disabled></th>
                                                <th><input type="text" class="form-control"  id="myInput" placeholder="หมวดหมู่ย่อย" disabled></th> 
                                                <th><input type="text" class="form-control"   id="myInput"placeholder="หมายเลขครุภัณฑ์" disabled></th>
                                                <th><input type="text" class="form-control" id="myInput" placeholder="หน่วยงาน" disabled></th>
                                            </tr>
                                       </thead>


                                            
                                                <tbody>
                                <tr>
                                    <td>
                                        <label class="custom-control custom-checkbox">
                                            <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one"><span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td>1</td>
                                    <td>2559</td>
                                    <td>ครุภัณฑ์สำนักงาน</td>
                                    <td>ตู้โชว์</td>
                                    <td>01.13.0001/59</td>
                                    <td>วิทยาการคอม</td>


                                </tr>
                                <tr>
                                    <td>
                                        <label class="custom-control custom-checkbox">
                                            <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one"><span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td>2</td>
                                    <td>2559</td>
                                    <td>ครุภัณฑ์สำนักงาน</td>
                                    <td>ตู้โชว์</td>
                                    <td>01.13.0002/59</td>
                                    <td>วิทยาการคอม</td>

                                </tr>
                                <tr>
                                    <td>
                                        <label class="custom-control custom-checkbox">
                                            <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one"><span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td>3</td>
                                    <td>2559</td>
                                    <td>ครุภัณฑ์สำนักงาน</td>
                                    <td>ตู้โชว์</td>
                                    <td>01.13.0003/59</td>
                                    <td>วิทยาการคอม</td>


                                </tr>




                            </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>


        </div>

    </div>

    </div>
    <!-- ============================================================== -->
    <!-- end striped table -->



    </div>

    </div>
</body>

</html>