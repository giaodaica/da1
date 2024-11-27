$conten = "";
        $conten_voucher = "";
        if ($voucher_id != 0) {
            $conten_voucher = "Bạn được giảm giá " . ($_POST['voucher'] * 100) . "%";
        }
        $conten .= "<tr>
                <td>{$name_products}</td>
                <td>{$quantity}</td>
                <td>{$size}</td>
                <td>{$color}</td>
                <td>" . number_format($price, 0, ',', '.') . " VND</td>
            </tr>";
            $emailContent = "
        <h2>Đơn hàng của bạn đã được đặt thành công!</h2>
        <p>Xin chào <strong>{$name}</strong>,</p>
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
                {$conten}
            </tbody>
        </table>
        <p><strong>Tổng tiền:</strong> " . number_format($total, 0, ',', '.') . " VND</p>
        <p>$conten_voucher</p>
        <p><strong>Mã tra cứu đơn hàng:</strong> {$key_limited}</p>
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
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Thông báo đơn hàng';
            $mail->Body = $emailContent;
            $mail->send();
            echo "<script>alert('Đặt hàng thành công! Email xác nhận đã được gửi.');</script>";
        } catch (Exception $e) {
            echo "<script>alert('Đặt hàng thành công nhưng không thể gửi email: {$mail->ErrorInfo}');</script>";
        }
