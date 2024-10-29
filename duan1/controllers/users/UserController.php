<?php
class Controller_User{
    public $models_users;
    public function __construct()
    {
       $this->models_users = new User_model();
    }
    public function handerViewRegister(){
        require_once "./views/register.php";
    }
    public function handerViewLogin(){
        require_once "./views/login.php";
    }
    public function login(){
        $error = "";
        $username = strtolower(trim($_POST['username']));
        $password = strtolower(trim($_POST['password']));
    
        // Kiểm tra tên đăng nhập
        if (trim($username) == "") {
            $error = "Tên Đăng Nhập Không Được Để Trống";
            $this->showErrorLogin($error);
            return;
        }
        if (preg_match('/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/i', $username)) {
            $error = "Tài Khoản không được chứa ký tự có dấu.";
            $this->showErrorLogin($error);
            return;
        }
        if (strlen($username) < 5) {
            $error = "Tên Đăng Nhập Phải Chứa 5 Ký Tự Trở Lên";
            $this->showErrorLogin($error);
            return;
        }
        if (preg_match('/\s/', $username)) { // Kiểm tra dấu cách trong tên đăng nhập
            $error = "Tên Đăng Nhập Không Được Chứa Khoảng Trắng";
            $this->showErrorLogin($error);
            return;
        }
        // Kiểm tra mật khẩu
        if (trim($password) == "") {
            $error = "Mật Khẩu Không Được Để Trống";
            $this->showErrorLogin($error);
            return;
        }
        if (strlen($password) < 6) {
            $error = "Mật Khẩu Phải Chứa 6 Ký Tự Trở Lên";
            $this->showErrorLogin($error);
            return;
        }
        if (preg_match('/\s/', $password)) { // Kiểm tra dấu cách trong tên đăng nhập
            $error = "Mật Khẩu Không Được Chứa Khoảng Trắng";
            $this->showErrorLogin($error);
            return;
        }
        if (preg_match('/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/i', $password)) {
            $error = "Mật khẩu không được chứa ký tự có dấu.";
            $this->showErrorLogin($error);
            return;
        }
        $users = $this->models_users->select_User(strtolower(trim($username)));
        // $data = $this->models_users->select_User(strtolower(trim("11111111")));
        if(!$users){
            $error = "Tài khoản không tồn tại!!";
            $this->showErrorLogin($error);
            return;
        }
        
        if(password_verify($password,$users['password'])){
          
        
        }
        else if($password == $users['password']){
          
        }else{
            $error = "Tài Khoản Hoặc Mạt Khẩu Không Chính Xác Vui Lòng Kiểm Tra Lại";
            $this->showErrorLogin($error);
            return;
        }
        switch($users['role']){
            case 0:
                session_start();
                $_SESSION['user'] = $users['username'];
                $_SESSION['role_admin'] = $users['role'];
                header("location:".BASE_URL);
                break;
                case 1:
                    $_SESSION['user'] = $users['username'];
                    $_SESSION['role_epl'] = $users['role'];
                    header("location:".BASE_URL);
                    break;
                        case 4:
                            session_start();
                        $_SESSION['user'] = $users['username'];
                        $_SESSION['role_customers'] = $users['role'];
                        header("location:".BASE_URL);
                            break;

        }
    }

    public function post_Register(){
        $error = "";
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Kiểm tra tên đăng nhập
        if (strtolower(trim($username)) == "") {
            $error = "Tên Đăng Nhập Không Được Để Trống";
            $this->showError($error);
            return;
        }
        if (preg_match('/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/i', $username)) {
            $error = "Tài Khoản không được chứa ký tự có dấu.";
            $this->showError($error);
            return;
        }
        if (strlen($username) < 5) {
            $error = "Tên Đăng Nhập Phải Chứa 5 Ký Tự Trở Lên";
            $this->showError($error);
            return;
        }
        if (preg_match('/\s/', $username)) { // Kiểm tra dấu cách trong tên đăng nhập
            $error = "Tên Đăng Nhập Không Được Chứa Khoảng Trắng";
            $this->showError($error);
            return;
        }
        // Kiểm tra mật khẩu
        if (strtolower(trim($password)) == "") {
            $error = "Mật Khẩu Không Được Để Trống";
            $this->showError($error);
            return;
        }
        if (strlen($password) < 6) {
            $error = "Mật Khẩu Phải Chứa 6 Ký Tự Trở Lên";
            $this->showError($error);
            return;
        }
        if (preg_match('/\s/', $password)) { // Kiểm tra dấu cách trong tên đăng nhập
            $error = "Mật Khẩu Không Được Chứa Khoảng Trắng";
            $this->showError($error);
            return;
        }
        if (preg_match('/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/i', $password)) {
            $error = "Mật khẩu không được chứa ký tự có dấu.";
            $this->showError($error);
            return;
        }
        $data = $this->models_users->select_User(strtolower(trim($username)));
        if($data){
            $error = "Tên Đăng Nhập Đã Tồn Tại Vui Lòng Lựa Chọn Tên Khác!!";
            $this->showError($error);
            return;
        }
        // Nếu không có lỗi nào xảy ra, tạo người dùng
        $password_sha = password_hash($password,PASSWORD_DEFAULT);
        // echo $password_sha;
        // die;
        $this->models_users->create_User(strtolower(trim($username)), strtolower(trim($password_sha)));
       echo "<script>";
       echo "alert('Đăng ký thành công')";
       echo  "</script>";
    }
    public function logout(){
        session_start();
        session_destroy();
        header("location:".LOGIN);
    }
    // Hàm hiển thị lỗi
    public function showError($error) {
        $autofocus = true;
        require_once "./views/register.php";
    }
    public function showErrorLogin($error){
        require_once "./views/login.php";
    }
    
}
$users = new Controller_User;