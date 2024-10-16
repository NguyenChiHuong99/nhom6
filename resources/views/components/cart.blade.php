<script>
    function updateCartCount() {
        $.ajax({
            url: "{{ route('cart.count') }}",
            type: 'GET',
            success: function(response) {
                console.log(response);

                if (response.status == 'success') {
                    $('.cart-count').text(response.cart_count);
                } else {
                    console.log('Lỗi khi lấy sản phẩm ');
                }
            },
            error: function(xhr) {
                console.error('Lỗi khi cập nhật số lượng giỏ hàng!');
            }
        });
    }

    function updateTotal() {
        var grandTotal = 0;


        $('#cart-table tbody tr').each(function() {
            var $row = $(this);
            var quantity = parseFloat($row.find('.quantity-input').val()) || 0;
            var price = parseFloat($row.find('.unit-price').text().replace(' VNĐ', '').replace(/,/g, '')) || 0;
            var totalPrice = quantity * price;


            $row.find('.total-price').text(new Intl.NumberFormat('vi-VN').format(totalPrice) + ' VNĐ');


            grandTotal += totalPrice;
        });



        $('#tong-thanh-tien').text(new Intl.NumberFormat('vi-VN').format(grandTotal) + ' VNĐ');
    }
</script>