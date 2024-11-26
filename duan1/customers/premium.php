<?php

?>
                <div class="total">
                    <div class="left">
                        <?php echo count($premium) ?>
                        <br>
                        Đơn hàng
                    </div>
                    <div class="divider"></div>
                    <div class="right">
                        <?php
                        $sum = 0;
                        foreach($premium as $sum_pre){
                            $sum += intval($sum_pre['total_amount']);
                        }
                        echo number_format($sum);

                        ?>
                        <br>
                       Tổng tiền tích lũy
                    </div>
                </div>
                
          