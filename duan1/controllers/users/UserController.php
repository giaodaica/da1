<?php
class Controller_User{
    public $models_users;
    public $gift;
    public $shoping_Cart;
    public $cart;
    public function __construct()
    {
       $this->models_users = new User_model();
       $this->shoping_Cart = new shoping_cart_big();
       $this->gift = new Voucher_model();
       $this->cart = new shoping_cart();
    }
    public function handerViewRegister(){
        require_once "./views/register.php";
    }
    public function handerViewLogin(){
        require_once "./views/login.php";
    }
    public function login(){
        $errorUL = "";
        $errorPL = "";
        $username = strtolower(trim($_POST['username']));
        $password = strtolower(trim($_POST['password']));
    
        // Kiểm tra tên đăng nhập
        if (trim($username) == "") {
            $errorUL = "Tên Đăng Nhập Không Được Để Trống";
            $this->showErrorUL($errorUL);
            return;
        }
        if (preg_match('/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/i', $username)) {
            $errorUL = "Tài Khoản không được chứa ký tự có dấu.";
            $this->showErrorUL($errorUL);
            return;
        }
        if (strlen($username) < 5) {
            $errorUL = "Tên Đăng Nhập Phải Chứa 5 Ký Tự Trở Lên";
            $this->showErrorUL($errorUL);
            return;
        }
        if (preg_match('/\s/', $username)) { // Kiểm tra dấu cách trong tên đăng nhập
            $errorUL = "Tên Đăng Nhập Không Được Chứa Khoảng Trắng";
            $this->showErrorUL($errorUL);
            return;
        }
        // Kiểm tra mật khẩu
        if (trim($password) == "") {
            $errorPL = "Mật Khẩu Không Được Để Trống";
            $this->showErrorPL($errorPL);
            return;
        }
        if (strlen($password) < 6) {
            $errorPL = "Mật Khẩu Phải Chứa 6 Ký Tự Trở Lên";
            $this->showErrorPL($errorPL);
            return;
        }
        if (preg_match('/\s/', $password)) { // Kiểm tra dấu cách trong tên đăng nhập
            $errorPL = "Mật Khẩu Không Được Chứa Khoảng Trắng";
            $this->showErrorPL($errorPL);
            return;
        }
        if (preg_match('/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/i', $password)) {
            $errorPL = "Mật khẩu không được chứa ký tự có dấu.";
            $this->showErrorPL($errorPL);
            return;
        }
        $users = $this->models_users->select_User(strtolower(trim($username)));
        // $data = $this->models_users->select_User(strtolower(trim("11111111")));
        if(!$users){
            $errorUL = "Tài khoản không tồn tại!!";
            $this->showErrorUL($errorUL);
            return;
        }

        $passwordDatabase = $users['password'];
       
        if(password_verify($_POST['password'],$passwordDatabase)){
        
        }
        elseif($password == $users['password']){
          
        }else{
            $errorUL = "Tài Khoản Hoặc Mật Khẩu Không Chính Xác Vui Lòng Kiểm Tra Lại";
            $this->showErrorUL($errorUL);
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
                    session_start();
                    $_SESSION['user'] = $users['username'];
                    $_SESSION['role_epl'] = $users['role'];
                    header("location:".BASE_URL);
                    break;
                        case 4:
                            session_start();
                        $_SESSION['user'] = $users['username'];
                        $_SESSION['role_customers'] = $users['role'];
                        $_SESSION['id'] = $users['user_id'];
                        // echo $_SESSION['id'];
                        // die;
                        // $id = 23;
                        // $data_Gift = $this->gift->select_Gift_byUserID($id);
                        header("location:".BASE_URL);
                        exit;
                            break;

        }
    }
    
    public function post_Register(){
        
        $errorUR = "";
        $errorPR = "";
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Kiểm tra tên đăng nhập
        if (strtolower(trim($username)) == "") {
            $errorUR = "Tên Đăng Nhập Không Được Để Trống";
            $this->showErrorUR($errorUR);
            return;
        }
        if (preg_match('/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/i', $username)) {
            $errorUR = "Tài Khoản không được chứa ký tự có dấu.";
            $this->showErrorUR($errorUR);
            return;
        }
        if (preg_match('/[^a-zA-Z0-9]/', $username)) { 
            $errorUR = "Tên Đăng Nhập Không Được Chứa Ký Tự Đặc Biệt";
            $this->showErrorUR($errorUR);
            return;
        }
        if (strlen($username) < 5) {
            $errorUR = "Tên Đăng Nhập Phải Chứa 5 Ký Tự Trở Lên";
            $this->showErrorUR($errorUR);
            return;
        }
        if (preg_match('/\s/', $username)) { // Kiểm tra dấu cách trong tên đăng nhập
            $errorUR = "Tên Đăng Nhập Không Được Chứa Khoảng Trắng";
            $this->showErrorUR($errorUR);
            return;
        }
        // Kiểm tra mật khẩu
        if (strtolower(trim($password)) == "") {
            $errorPR = "Mật Khẩu Không Được Để Trống";
            $this->showErrorPR($errorPR);
            return;
        }
        if (preg_match('/[^a-zA-Z0-9]/', $password)) { // Kiểm tra ký tự đặc biệt
            $errorPR = "Mật Khẩu Không Được Chứa Ký Tự Đặc Biệt";
            $this->showErrorPR($errorPR);
            return;
        }
        if (strlen($password) < 6) {
            $errorPR = "Mật Khẩu Phải Chứa 6 Ký Tự Trở Lên";
            $this->showErrorPR($errorPR);
            return;
        }
        if (preg_match('/\s/', $password)) { // Kiểm tra dấu cách trong tên đăng nhập
            $errorPR = "Mật Khẩu Không Được Chứa Khoảng Trắng";
            $this->showErrorPR($errorPR);
            return;
        }
        if (preg_match('/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/i', $password)) {
            $errorPR = "Mật khẩu không được chứa ký tự có dấu.";
            $this->showErrorPR($errorPR);
            return;
        }
        $data = $this->models_users->select_User(strtolower(trim($username)));
        if($data){
            $errorUR = "Tên Đăng Nhập Đã Tồn Tại Vui Lòng Lựa Chọn Tên Khác!!";
            $this->showErrorUR($errorUR);
            return;
        }
        // Nếu không có lỗi nào xảy ra, tạo người dùng
        $password_sha = password_hash(strtolower($password),PASSWORD_DEFAULT);
        // echo $password_sha;
        // die;
       session_start();
        $this->models_users->create_User(strtolower(trim($username)),(trim($password_sha)));
        $data_id = $this->models_users->select_User(strtolower(trim($username)));
        $id = $data_id['user_id'];
        $this->gift->gift_Voucher($id);
       $cart_id =  $this->shoping_Cart->insert_cart_user($id);
       if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $cart_item){
            $image = $cart_item['image'];
            $name = $cart_item['name'];
            $quantity = $cart_item['quantity'];
            $price = $cart_item['price'];
            $size = $cart_item['size'];
            $color = $cart_item['color'];
            $id = $cart_id;
            $product_id = $cart_item['product_id'];
            $this->cart->insert_Cart_items_of_user($id, $product_id, $size, $color,$image,$price);
        }
       }
       echo "<script>";
       echo "alert('Đăng ký thành công cập nhật thông tin ngay để mua sắm bạn nhé')";
       echo "window.location.href = '?act=info';";
       echo  "</script>";
       $this->login();

    }
    public function logout(){
        session_start();
        session_destroy();
        header("location:".BASE_URL);
    }
    // Hàm hiển thị lỗi
    public function showErrorUL($errorUL) {
        
        require_once "./views/login.php";
    }
    public function showErrorPL($errorPL){
        require_once "./views/login.php";
    }
    public function showErrorUR($errorUR) {
        
        require_once "./views/register.php";
    }
    public function showErrorPR($errorPR){
        require_once "./views/register.php";
    }
}
$users = new Controller_User;
