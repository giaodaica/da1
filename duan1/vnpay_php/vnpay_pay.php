<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Tạo mới đơn hàng</title>
        <!-- Bootstrap core CSS -->
        <link href="vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
<style>
    .inp-custom{
        width: 200px;
    }
</style>
    <body>
        <?php require_once("./vnpay_php/config.php");?>             
        <div class="container">
        <h3 class="text-success">Đơn Hàng <?= $_SESSION['key']; ?></h3>
            <div class="table-responsive">
                <form action="?act=create_payment" id="frmCreateOrder" method="post">      
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control inp-custom" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="amount" type="number" value="<?=$_SESSION['total'] ?>" readonly />
                    </div>
                     <h4>Chọn phương thức thanh toán</h4>
                    <div class="form-group">
                      
                       <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                       <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>
                       <input type="radio" id="bankCode" name="bankCode" value="cod">
                       <label for="bankCode">Thanh toán khi nhận hàng</label><br>
                    </div>
                    <div class="form-group">
                        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                         <input type="radio" id="language" Checked="True" name="language" value="vn">
                         <label for="language">Tiếng việt</label><br>
                         <input type="radio" id="language" name="language" value="en">
                         <label for="language">Tiếng anh</label><br>
                         
                    </div>
                    <input type="hidden" name="limit" value="<?= $_SESSION['key'] ?>">
                    <input type="hidden" name="order_id" value="<?= $_SESSION['order_id'] ?>">
                    <button type="submit" class="btn btn-primary" href>Thanh toán</button>
                </form>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; VNPAY 2020</p>
            </footer>
        </div>  
    </body>
</html>
