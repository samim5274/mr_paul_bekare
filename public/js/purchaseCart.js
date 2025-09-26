$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Plus / Minus button click
    $(document).on('click', '.btn-plus, .btn-minus', function () {
        var id = $(this).data('id');
        var input = $('input.qty-input[data-id="' + id + '"]');
        var currentQty = parseInt(input.val());
        var newQty = currentQty;

        if ($(this).hasClass('btn-plus')) {
            newQty = currentQty + 1;
        } else if ($(this).hasClass('btn-minus') && currentQty > 1) {
            newQty = currentQty - 1;
        }

        if (newQty === currentQty) return;

        console.log('Button Clicked - ID:', id, 'New Qty:', newQty);

        updateQuantity(id, newQty, input);
    });

    // Manually changing quantity in input
    $(document).on('change', '.qty-input', function () {
        var input = $(this);
        var id = input.data('id');
        var newQty = parseInt(input.val());

        if (isNaN(newQty) || newQty < 1) {
            newQty = 1;
            input.val(1);
        }

        console.log('Input Changed - ID:', id, 'New Qty:', newQty);

        updateQuantity(id, newQty, input);
    });

    // Main AJAX function
    function updateQuantity(id, quantity, input) {
        $.post('/update-purchase-cart-qty', {
            id: id,
            quantity: quantity
        }, function (response) {
            if (response.status === 'success') {
                input.val(response.quantity);

                let price = parseFloat(input.data('price')) || 0;

                let newSubtotal = price * response.quantity;

                $('.item-subtotal[data-id="' + id + '"]').text('৳' + newSubtotal.toFixed(2));

                updateCartTotal();
            } else {
                alert(response.message || 'Update failed');
            }
        }).fail(function (xhr) {
            alert('Something went wrong!');
        });
    }



    // Update cart subtotal/total
    function updateCartTotal() {
        let total = 0;
        $('.card-body').each(function () {
            const price = parseFloat($(this).find('[data-price]').data('price'));
            const qty = parseInt($(this).find('.qty-input').val());
            if (!isNaN(price) && !isNaN(qty)) {
                total += price * qty;
            }
        });
        console.log('New Cart Total:', total);

        $('#cart-subtotal').text(total.toFixed(0));
        $('#cart-total').text(total.toFixed(0));
        $('#cart-total-input').val(Math.round(total));
    }

});

// remove from cart get data in link 
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.remove-item-link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            if (!confirm('Are you sure you want to remove this item?')) return;

            let id = this.dataset.id;
            let input = document.querySelector('input.qty-input[data-id="' + id + '"]');
            let quantity = input ? input.value : 0;

            // রিডাইরেক্ট করে GET রিকোয়েস্ট পাঠানো
            window.location.href = `/remove-to-cart/${id}?txtStock=${quantity}`;
        });
    });
});


window.onload = function () {
    const searchInput = document.getElementById('search');
    if (searchInput) {
        searchInput.focus();
    }
};