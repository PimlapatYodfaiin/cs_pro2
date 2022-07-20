<?php
include 'dbconnect.php';

// ------------------------------------จังหวัด อำเภอ ตำบล ไปร์ษณีย์-------------------------------------------------
if (isset($_POST['function']) && $_POST['function'] == 'provinces') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `amphures` WHERE province_id = '$id'";
    $query = mysqli_query($connect, $sql);
    echo '<option selected disabled>กรุณาเลือกอำเภอ</option>';
    foreach ($query as $value) {
        echo '<option value="' . $value['id'] . '">' . $value['name_tha'] . '</option>';
    }
    exit();
}

if (isset($_POST['function']) && $_POST['function'] == 'amphures') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `districts` WHERE amphure_id = '$id'";
    $query = mysqli_query($connect, $sql);
    echo '<option selected disabled>กรุณาเลือกตำบล</option>';
    foreach ($query as $value) {
        echo '<option value="' . $value['id'] . '">' . $value['name_thd'] . '</option>';
    }
    exit();
} 


if (isset($_POST['function']) && $_POST['function'] == 'districts') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `districts` WHERE id = '$id'";
    $query = mysqli_query($connect, $sql);
   $result = mysqli_fetch_assoc($query);
   echo $result['zip_code'];
    exit();
} 


// -------------------------------------ประเภทครุภัณฑ์ รายการ------------------------------------------


if (isset($_POST['function']) && $_POST['function'] == 'types') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `subcategorys` WHERE sub_eq_code = '$id'";
    $query = mysqli_query($connect, $sql);
    echo '<option selected disabled>กรุณาเลือกรายการ</option>';
    foreach ($query as $value) {
        echo '<option value="' . $value['sub_id'] . '">' . $value['sub_name'] . '</option>';
    }
    exit();
}



if (isset($_POST['function']) && $_POST['function'] == 'subcategorys') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `subcategorys` WHERE sub_id = '$id'";
    $query = mysqli_query($connect, $sql);
   $result = mysqli_fetch_assoc($query);
   echo $result['type_lifetime_low'];
    exit();
} 





// -------------------------------------คณะ สาขา------------------------------------------

if (isset($_POST['function']) && $_POST['function'] == 'agencys') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `branchs` WHERE branch_agency_id = '$id'";
    $query = mysqli_query($connect, $sql);
    echo '<option selected disabled>กรุณาเลือกสาขา</option>';
    foreach ($query as $value) {
        echo '<option value="' . $value['branch_id'] . '">' . $value['branch_name'] . '</option>';
    }
    exit();
}

if (isset($_POST['function']) && $_POST['function'] == 'agencys1') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `branchs` WHERE branch_agency_id = '$id'";
    $query = mysqli_query($connect, $sql);
    echo '<option selected disabled>กรุณาเลือกสาขา</option>';
    foreach ($query as $value) {
        echo '<option value="' . $value['branch_id'] . '">' . $value['branch_name'] . '</option>';
    }
    exit();
}
    // echo $_POST['function'];
?>

