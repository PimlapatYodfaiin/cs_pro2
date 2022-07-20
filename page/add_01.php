.
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
                        <h2 class="pageheader-title"> ครุภัณฑ์สำนักงาน </h2>
                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลหลัก</a></li>
                                    <li class="breadcrumb-item"><a href="?page=equiment_type" class="breadcrumb-link">จัดการข้อมูลประเภทครุภัณฑ์</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลประเภทครุภัณฑ์</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">เพิ่มข้อมูลหมวดหมู่ย่อยครุภัณฑ์</h5>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">รหัสประเภทครุภัณฑ์</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <!-- <input type="text" required="" placeholder="Type something" class="form-control"> -->
                                <select class="form-control">
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">ประเภทครุภัณฑ์</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <!-- <input type="text" required="" placeholder="Type something" class="form-control"> -->
                                <select class="form-control">
                                    <option>ครุภัณฑ์สำนักงาน</option>
                                    <option>ครุภัณฑ์ยานพาหนะเเละขนส่ง</option>
                                    <option>ครุภัณฑ์การเกษตร</option>
                                    <option>ครุภัณฑ์ก่อสร้าง</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-12 col-sm-3 col-form-label text-sm-right">รหัสหมวดหมู่ย่อยครุภัณฑ์</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" required="" class="form-control">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">หมวดหมู่ย่อยครุภัณฑ์</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" required="" class="form-control">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">อัพเดตล่าสุด</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="date" required="" class="form-control">
                            </div>
                        </div>


                        <div class="form-group row text-right">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                <button type="submit" class="btn btn-space btn-primary">บันทึก</button>
                                <button class="btn btn-space btn-secondary">ยกเลิก</button>
                            </div>
                        </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>






    </div>







    </div>



    </div>

</body>

</html>