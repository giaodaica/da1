<?php
class controller_Customers{
    public $gift;
    public $info;
    public function __construct()
    {
        $this->info = new customers_models();
        $this->gift = new Voucher_model();
    }
    public function renderInfo(){
        session_start();
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $data_Custm = $this->info->renderInfo($id);
        }
         if(isset($_SESSION['id'])){
            $data_Gift = $this->gift->select_Gift_byUserID($_SESSION['id']);
         }
        require_once "customers/info.php";
    }
    public function render_Infodetail(){
        session_start();
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $data_Custm = $this->info->renderInfo($id);
        }
         if(isset($_SESSION['id'])){
            $data_Gift = $this->gift->select_Gift_byUserID($_SESSION['id']);
         }
        require_once "customers/info_detail.php";
    }
    public function hander_insert_info() {
        session_start();
        $error = "";
        $full_name = $_POST['full_name'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $date_of_birth = $_POST['date_of_birth'];
    
        // Kiểm tra Tên
        if (strtolower(trim($full_name)) == "") {
            $error = "Tên không được để trống";
            $this->showError($error);
            return;
        }
        if (strlen($full_name) < 5) {
            $error = "Tên phải chứa 5 ký tự trở lên";
            $this->showError($error);
            return;
        }
        if (preg_match("/\d/", $full_name)) { 
            $error = "Tên không được chứa số";
            $this->showError($error);
            return;
        }
    
        // Kiểm tra Giới tính
        if ($gender == "") {
            $error = "Giới tính không được để trống";
            $this->showError($error);
            return;
        }
    
        // Kiểm tra Số điện thoại
        if (strtolower(trim($phone)) == "") {
            $error = "Số điện thoại không được để trống";
            $this->showError($error);
            return;
        }
        if (!preg_match("/^\d{10}$/", $phone)) { 
            $error = "Số điện thoại phải bao gồm 10 chữ số";
            $this->showError($error);
            return;
        }
    
        // Kiểm tra Địa chỉ
        if (strtolower(trim($address)) == "") {
            $error = "Địa chỉ không được để trống";
            $this->showError($error);
            return;
        }
        if (strlen($address) < 10) { 
            $error = "Địa chỉ phải dài ít nhất 10 ký tự";
            $this->showError($error);
            return;
        }
    
        // Kiểm tra Ngày sinh
        if (strtolower(trim($date_of_birth)) == "") {
            $error = "Ngày sinh không được để trống";
            $this->showError($error);
            return;
        }
        $today = date("Y-m-d");
        if ($date_of_birth >= $today) { 
            $error = "Ngày sinh không thể là hôm nay hoặc trong tương lai";
            $this->showError($error);
            return;
        }

        if(isset($_SESSION['user'])){
            $user_id = $_SESSION['id'];
            $this->info->insert_info_ctm($user_id,$full_name,$phone,$address,$gender,$date_of_birth);
            echo "<script>";
            echo "alert('Cập nhật thành công');";
            echo "window.location.href = '?act=info_detail';";
            echo "</script>";
        }
        
    }
    public function hander_update_info(){
        session_start();
        $error = "";
        $full_name = $_POST['full_name'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $date_of_birth = $_POST['date_of_birth'];
        if(isset($_SESSION['user'])){
            $user_id = $_SESSION['id'];
            $this->info->update_info_ctm($user_id,$full_name,$phone,$address,$gender,$date_of_birth);
            echo "<script>";
            echo "alert('Cập nhật thành công');";
            echo "window.location.href = '?act=info_detail';";
            echo "</script>";
        }
       
    }
        
        
    
    
        public function showError($error){
            require_once "customers/info_detail.php";
        }
}
$customers = new controller_Customers;