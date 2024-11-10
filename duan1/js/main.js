(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });

    $(document).ready(function() {
        // Cập nhật tổng giỏ hàng (subtotal, discount, total)
        function updateCartSummary() {
            var subtotal = 0;
    
            // Duyệt qua từng sản phẩm và tính subtotal
            $('.table tbody tr').each(function() {
                var rowTotal = parseFloat($(this).find('.total').text());
                if (!isNaN(rowTotal)) {
                    subtotal += rowTotal;
                }
            });
    
            // Cập nhật subtotal nếu là số hợp lệ
            $('#cart-subtotal').text('$' + subtotal.toFixed(2));
    
            // Cập nhật shipping (giả sử shipping là $10)
            var shipping = 10;
            $('#shipping-cost').text('$' + shipping.toFixed(2));
    
            // Cập nhật tổng (subtotal + shipping)
            var total = subtotal + shipping;
            $('#total-amount').text('$' + total.toFixed(2));
    
            return subtotal; // Trả về subtotal cho việc tính giảm giá
        }
    
        // Thực hiện khi thay đổi số lượng sản phẩm
        $('.quantity button').on('click', function() {
            var button = $(this);
            var oldValue = button.parent().parent().find('input').val(); // Lấy giá trị số lượng cũ
            var price = parseFloat(button.closest('tr').find('.price').data('price')); // Lấy giá sản phẩm từ thuộc tính data-price
            var row = button.closest('tr'); // Lấy dòng hiện tại của sản phẩm
    
            var newVal;
    
            // Nếu là nút tăng
            if (button.hasClass('btn-plus')) {
                newVal = parseInt(oldValue) + 1;
            } 
            // Nếu là nút giảm
            else {
                if (oldValue > 1) {
                    newVal = parseInt(oldValue) - 1;
                } else {
                    newVal = 1; // Tránh giá trị nhỏ hơn 1
                }
            }
    
            // Cập nhật giá trị số lượng trong ô input
            button.parent().parent().find('input').val(newVal);
    
            // Cập nhật lại thành tiền nếu số lượng và giá đều hợp lệ
            if (!isNaN(newVal) && newVal > 0 && !isNaN(price)) {
                var total = price * newVal;
                row.find('.total').text(total.toFixed(2)); // Cập nhật ô "Thành tiền" với giá trị mới
            } else {
                row.find('.total').text('0'); // Nếu có vấn đề, đặt thành tiền là 0
            }
    
            // Cập nhật tổng giỏ hàng
            var subtotal = updateCartSummary();
    
            // Áp dụng giảm giá nếu có mã voucher
            applyDiscount(subtotal);
        });
    
        // Thực hiện khi người dùng chọn mã giảm giá
        $('#apply-coupon').on('click', function() {
            var couponCode = $('#coupon-code').val().trim();
            var selectedVoucher = $('#voucher-select option:selected').val();
    
            // Kiểm tra mã giảm giá và voucher
            if (couponCode !== '' || selectedVoucher !== '') {
                var subtotal = parseFloat($('#cart-subtotal').text().replace('$', ''));
                applyDiscount(subtotal, selectedVoucher);
            } else {
                alert('Vui lòng nhập mã giảm giá hoặc chọn voucher!');
            }
        });
    
        // Hàm áp dụng giảm giá
        function applyDiscount(subtotal, discountPercent = 0) {
            // Kiểm tra subtotal và discountPercent là số hợp lệ
            if (isNaN(subtotal)) subtotal = 0;
            if (isNaN(discountPercent)) discountPercent = 0;
    
            // Nếu có voucher hoặc mã giảm giá
            var discount = subtotal * (discountPercent);
    
            // Cập nhật giảm giá
            $('#discount-amount').text('$' + discount.toFixed(2));
    
            // Tính lại tổng sau giảm giá
            var shipping = parseFloat($('#shipping-cost').text().replace('$', ''));
            if (isNaN(shipping)) shipping = 0;
    
            var totalAfterDiscount = subtotal - discount + shipping;
    
            // Cập nhật tổng thanh toán
            $('#total-amount').text('$' + totalAfterDiscount.toFixed(2));
        }
    
        // Cập nhật tổng giỏ hàng khi trang được tải
        updateCartSummary();
    });
    
    
    $(document).ready(function() {
        // Cập nhật mảng số lượng sản phẩm
        function updateCartTotalQuantity() {
            var productQuantities = []; // Mảng lưu số lượng sản phẩm
    
            // Duyệt qua từng sản phẩm trong giỏ hàng và lấy số lượng
            $('.table tbody tr').each(function() {
                var quantity = parseInt($(this).find('.quantity input').val()); // Lấy số lượng sản phẩm từ ô input
                if (!isNaN(quantity)) {
                    productQuantities.push(quantity); // Thêm số lượng vào mảng
                }
            });
    
            // Cập nhật mảng số lượng vào thẻ div dưới dạng chuỗi
            $('#cart-total-quantity').text('Mảng số lượng sản phẩm: ' + JSON.stringify(productQuantities));
    
            // Cập nhật giá trị của input hidden để gửi lên server
            $('#product-quantities').val(JSON.stringify(productQuantities));
        }
    
        // Cập nhật mảng số lượng khi thay đổi số lượng sản phẩm
        $('.quantity button').on('click', function() {
            updateCartTotalQuantity();
        });
    
        // Cập nhật mảng số lượng khi trang được tải
        updateCartTotalQuantity();
    
        // Lắng nghe sự kiện submit form (nếu có)
        $('#checkout-btn').on('click', function(e) {
            // Kiểm tra xem mảng có trống không (có thể thêm các kiểm tra khác tùy theo yêu cầu)
            if ($('#product-quantities').val() === '') {
                alert('Vui lòng cập nhật giỏ hàng trước khi thanh toán!');
                e.preventDefault(); // Ngừng hành động mặc định của nút submit nếu mảng rỗng
            }
        });
    });
    
    
})(jQuery);

