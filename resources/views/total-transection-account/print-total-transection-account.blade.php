<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Total Order List</title>
    <link rel="icon" href="./img/LOGO35 pix.png" type="image/x-icon"> 
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            margin: 20px;
            color: #222;
        }
        h1 { 
            margin: 0; 
            font-size: 24px; 
            font-weight: bold; 
            text-align: center; 
            color: #2c3e50;
        }
        h3 { 
            margin: 5px 0 15px 0; 
            font-size: 18px; 
            font-weight: 600; 
            text-align: center; 
            color: #34495e;
        }
        p { 
            margin: 2px 0; 
            text-align: center; 
            font-size: 13px; 
            color: #555;
        }
        hr {
            margin: 15px 0;
            border: none;
            border-top: 2px solid #2c3e50;
        }
        .qrImg {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px;
            font-size: 14px;
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 10px; 
        }
        th { 
            background-color: #f8f9fa; 
            font-weight: bold;
            text-align: center;
        }
        td { 
            text-align: right; 
        }
        td:first-child {
            text-align: left;
            font-weight: 600;
        }
        .closing-balance {
            background: #f4f6f9;
            font-weight: bold;
            color: #e74c3c;
            text-align: right;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
            page-break-inside: avoid;
        }
        .signature-block {
            width: 40%;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 8px;
            font-weight: bold;
        }
        .note {
            font-size: 11px;
            margin-top: 40px;
            text-align: center;
            color: #555;
        }
        @media print {
            body { margin: 0; }
            .note { page-break-after: avoid; }
        }
    </style>
</head>
<body>

    <div class="invoice-box">
        <h1>{{ $company[0]->name }}</h1>
        <p>{{ $company[0]->address }}</p>
        <p>Email: {{ $company[0]->email }} | Phone: {{ $company[0]->phone }} | Website: {{ $company[0]->website }}</p>
        <h3>Daily Total Transection Reports</h3>
        <p style="text-align:center; font-size:13px; color:#555;">Date : {{ $date }}</p>
        <hr>
        <!-- <div class="qrImg">
            {!! QrCode::size(70)->generate('Abir Bekare & Foods') !!}
        </div> -->
        <table>
            <tbody>
                <tr>
                    <td>Total Amount</td>
                    <td>৳{{ number_format($total, 2) }}/-</td>
                </tr>
                <tr>
                    <td>VAT</td>
                    <td>৳{{ number_format($vat, 2) }}/-</td>
                </tr>
                <tr>
                    <td>Payable</td>
                    <td>৳{{ number_format($payable, 2) }}/-</td>
                </tr>
                <tr>
                    <td>Pay</td>
                    <td>৳{{ number_format($pay, 2) }}/-</td>
                </tr>
                <tr>
                    <td>Due</td>
                    <td>৳{{ number_format($due, 2) }}/-</td>
                </tr>
                <tr>
                    <td>Due Collection</td>
                    <td>৳{{ number_format($dueCollecion, 2) }}/-</td>
                </tr>
                <tr>
                    <td>Expenses</td>
                    <td>৳{{ number_format($expenses, 2) }}/-</td>
                </tr>
                <tr class="closing-balance">
                    <td>Closing Balance</td>
                    <td>৳{{ number_format(($dueCollecion + $pay) - $expenses, 2) }}/-</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="signature-section">
        <div class="signature-block">
            Manager Signature
        </div>
        <div class="signature-block">
            Admin Signature
        </div>
    </div>

    <p class="note"><strong>Note:</strong> Developed by <strong>SAMIM-HosseN</strong>, created by <strong>SAMIM-HosseN</strong>. Call: +8801624209291</p>

     <script>
        window.onload = function() {
            window.print();
            setTimeout(() => {
                window.close();
            }, 300); 
        };
    </script>
</body>
</html>
