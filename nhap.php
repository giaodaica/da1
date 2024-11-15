<form class="mb-30" action="" method="post">
    <div class="input-group">
        <?php
        if (empty($data_voucher)) { ?>
            <input type="text" name="" id="">
        <?php } else { ?>
            <select name="voucher" id="">
                <?php foreach ($data_voucher as $render_voucher) { ?>
                    <option value="<?php echo $render_voucher['discount_percent'] ?>"><?php echo $render_voucher['code'] . " Giảm " . $render_voucher['discount_percent'] * 100; ?>%</option>
                <?php } ?>
            </select>
        <?php } ?>
        <div class="input-group-append">
            <button class="btn btn-primary">Áp dụng voucher</button>
        </div>
    </div>
</form>
<form class="mb-30" action="" method="post">
    <div class="input-group">
        <?php if (empty($data_voucher)) { ?>
            <input type="text" name="voucher_code" id="voucher_code" placeholder="Nhập mã voucher">
        <?php } else { ?>
            <select name="voucher" id="voucher">
                <?php foreach ($data_voucher as $render_voucher) { ?>
                    <option value="<?php echo $render_voucher['voucher_id']; ?>|<?php echo $render_voucher['discount_percent']; ?>">
                        <?php echo $render_voucher['code'] . " Giảm " . ($render_voucher['discount_percent'] * 100) . "%"; ?>
                    </option>
                <?php } ?>
            </select>
        <?php } ?>
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Áp dụng voucher</button>
        </div>
    </div>
</form>
