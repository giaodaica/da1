<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once "../commons/env.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
if (!isset($_SESSION['order_info'])) {
    header("Location: " . BASE_URL);
    exit;
}

$order_info = $_SESSION['order_info'];
$emailContent = "
    <h2>Đơn hàng của bạn đã được đặt thành công!</h2>
    <p>Xin chào <strong>{$order_info['name']}</strong>,</p>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Dưới đây là thông tin đơn hàng của bạn:</p>
    <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Kích Cỡ</th>
                <th>Màu Sắc</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            {$order_info['conten']}
        </tbody>
    </table>
    <p><strong>Tổng tiền:</strong> " . number_format($order_info['total'], 0, ',', '.') . " VND</p>
    <p>{$order_info['conten_voucher']}</p>
    <p><strong>Mã tra cứu đơn hàng:</strong> {$order_info['key_limited']}</p>
    <p>Vui lòng sử dụng mã này để kiểm tra trạng thái đơn hàng của bạn trên hệ thống của chúng tôi.</p>
    <p>Trân trọng,<br>Đội ngũ hỗ trợ khách hàng Nhóm 11 Dự Án 1</p>";

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = BASE_MAIL;
    $mail->Password = BASE_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->setFrom(BASE_MAIL, 'FPL SHOP');
    $mail->addAddress($order_info['email']);
    $mail->isHTML(true);
    $mail->Subject = 'Thông báo đơn hàng';
    $mail->Body = $emailContent;
    $mail->send();
    echo "<script>alert('Đặt hàng thành công! Email xác nhận đã được gửi.');</script>";
} catch (Exception $e) {
    echo "<script>alert('Đặt hàng thành công nhưng không thể gửi email: {$mail->ErrorInfo}');</script>";
}

unset($_SESSION['order_info']);
// header("Location: " . BASE_URL);
exit;
?>
hello