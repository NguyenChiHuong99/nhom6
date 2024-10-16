<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Trang đã được tải xong và HTML đã sẵn sàng.');
    });

    function updateCartCount() {
        $.ajax({
            url: "{{ route('cart.count') }}",
            type: 'GET',
            success: function(response) {




                $('.cart-count').text(response.cart_count);

            },
            error: function(xhr) {
                console.error('Lỗi khi cập nhật số lượng giỏ hàng!');
            }
        });
    }
</script>