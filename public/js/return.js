$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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

        updateQuantity(id, newQty, input);
    });

    $(document).on('change', '.qty-input', function () {
        var id = $(this).data('id');
        var newQty = parseInt($(this).val());

        if (newQty < 1 || isNaN(newQty)) {
            alert('Invalid quantity');
            $(this).val(1);
            newQty = 1;
        }

        updateQuantity(id, newQty, $(this));
    });

    function updateQuantity(id, newQty, input) {
        $.post('/return-cart/update-quantity', {
            id: id,
            quantity: newQty
        }, function (response) {
            if (response.status === 'success') {
                input.val(response.quantity);

                var card = input.closest('.card-body');
                var price = parseFloat(card.find('[data-price]').data('price'));
                var subtotal = price * response.quantity;
                card.find('.item-subtotal').text('৳' + subtotal.toFixed(2));

                updateCartTotal();
            } else {
                alert(response.message || 'Update failed');
            }
        }).fail(function (xhr) {
            alert('Something went wrong!');
            console.error(xhr.responseText);
        });
    }

    function updateCartTotal() {
        let total = 0;
        $('.card-body').each(function () {
            const price = parseFloat($(this).find('[data-price]').data('price'));
            const qty = parseInt($(this).find('.qty-input').val());
            if (!isNaN(price) && !isNaN(qty)) {
                total += price * qty;
            }
        });
        $('#cart-subtotal').text(total.toFixed(0));
        $('#cart-total').text(total.toFixed(0));
        $('#cart-total-input').val(Math.round(total));
    }
});
























function calculateAmount() {
    const subtotalText = document.getElementById('cart-total').innerText.replace(/,/g, '');
    const subtotal = parseFloat(subtotalText) || 0;

    const vatPercent = parseFloat(document.getElementById('num4').value) || 0;
    const discount = parseFloat(document.getElementById('num3').value) || 0;
    const pay = parseFloat(document.getElementById('num2').value) || 0;

    const confirmBtn = document.getElementById('confirmBtn');
    const result = document.getElementById('result');

    // Validation
    if (vatPercent < 0 || discount < 0 || pay < 0) {
        result.innerText = "Negative values are not allowed.";
        confirmBtn.disabled = true;
        return;
    }

    // Calculate VAT and grand total
    const vatAmount = (subtotal * vatPercent) / 100;
    const grandTotal = subtotal + vatAmount - discount;

    // Update VAT & Discount display
    document.getElementById('vat-amount').innerText = vatAmount.toFixed(2);
    document.getElementById('discount-amount').innerText = discount.toFixed(2);

    // Update calculated subtotal (grandTotal)
    document.getElementById('cart-subtotal').innerText = grandTotal.toFixed(2);

    // Determine due or return
    const balance = pay - grandTotal;
    let message = "";

    if (balance > 0) {
        message = "Return: ৳" + balance.toFixed(2) + "/-";
        result.classList.remove("text-danger");
        result.classList.add("text-success");
        confirmBtn.disabled = false;
    } else if (balance < 0) {
        message = "Due: ৳" + Math.abs(balance).toFixed(2) + "/-";
        result.classList.remove("text-success");
        result.classList.add("text-danger");
        confirmBtn.disabled = false;
    } else {
        message = "Fully Paid: ৳0.00/-";
        result.classList.remove("text-danger");
        result.classList.add("text-success");
        confirmBtn.disabled = false;
    }

    result.innerText = message;
}
