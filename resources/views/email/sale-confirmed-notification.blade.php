<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sale Confirmed</title>
</head>
<body>
    <h2>Hello {{ $user->name }},</h2>

    <p>Your sale with ID <strong>#{{ $sale->reg }}</strong> has been confirmed.</p>

    <h3>Order Details:</h3>
    <table border="1" cellpadding="6" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>৳{{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>৳{{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Payment Method:</strong> {{ $sale->payment->name }}</p>
    <p><strong>Total:</strong> ৳{{ number_format($sale->total, 2) }}</p>
    <p><strong>Discount:</strong> ৳{{ number_format($sale->discount, 2) }}</p>
    <p><strong>VAT:</strong> ৳{{ number_format($sale->vat, 2) }}</p>
    <p><strong>Payable:</strong> ৳{{ number_format($sale->payable, 2) }}</p>
    <p><strong>Paid:</strong> ৳{{ number_format($sale->pay, 2) }}</p>
    <p><strong>Due:</strong> ৳{{ number_format($sale->due, 2) }}</p>

    <p>
        <a href="{{ url('/order-view/' . $sale->reg) }}">View Sale Details</a>
    </p>

    <p>Thank you for your business!</p>
</body>
</html>
