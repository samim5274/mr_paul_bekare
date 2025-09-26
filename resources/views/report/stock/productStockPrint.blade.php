<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Total Order List</title>
    <link rel="icon" href="./img/LOGO35 pix.png" type="image/x-icon"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        h2 { margin-bottom: 0; }
        p { margin-top: 2px; margin-bottom: 5px; }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
            page-break-inside: avoid;
        }

        .signature-block {
            width: 45%;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 5px;
            font-weight: bold;
        }

        .invoice-print-wrapper {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            color: #000;
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }

        .company-header {
            text-align: center;
            margin-bottom: 15px;
        }

        .company-header h2 {
            margin: 0;
            font-size: 24px;
        }

        .company-header p {
            margin: 5px 0;
            font-size: 14px;
        }

        .company-header h4 {
            margin: 5px 0;
            font-size: 18px;
            text-decoration: underline;
        }

        .qr-section {
            text-align: right;
            margin-bottom: 10px;
        }

        .print-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .print-table th,
        .print-table td {
            border: 1px solid #000;
            padding: 8px;
        }

        .print-table thead {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .print-table tfoot td {
            background-color: #e6e6e6;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .footer-summary {
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: right;
        }

        /* Print Styling */
        @media print {
            body {
                margin: 0;
                padding: 0;
                background: #fff;
            }

            a[href]:after {
                content: "";
            }

            .qr-section {
                position: absolute;
                top: 0;
                right: 0;
            }

            .invoice-print-wrapper {
                page-break-inside: avoid;
                padding: 0;
            }
        }
    </style>
</head>
<body>

    <div class="invoice-print-wrapper">
        <div class="company-header">
            <h1>{{ $company[0]->name }}</h1>
            <p>{{ $company[0]->address }}</p>
            <p>Email: {{ $company[0]->email }} || Phone: {{ $company[0]->phone }} || Website: {{ $company[0]->website }}</p>
            <h4>{{ $stock[0]->product->name }} - Stock Report</h4>
        </div>

        <!-- <div class="qr-section">
            {!! QrCode::size(60)->generate('Abir Bekare & Foods') !!}
        </div> -->

        <table class="print-table" id="printableTable">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Product</th>
                    <th class="text-center">Stock In</th>
                    <th class="text-center">Stock Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock as $key => $val)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $val->product->name }}</td>
                    <td class="text-center">{{ $val->stockIn }}</td>
                    <td class="text-center">{{ $val->stockOut }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><strong>Total:</strong></td>
                    <td class="text-center"><strong>{{ $stockIn }}</strong></td>
                    <td class="text-center"><strong>{{ $stockOut }}</strong></td>
                </tr>
            </tfoot>
        </table>

        <div class="footer-summary">
            <strong>Available Quantity:</strong> {{ $stockIn - $stockOut }}
        </div>
    </div>


    <div class="signature-section">
        <div class="signature-block">
            Manager Signature
        </div>
        <div class="signature-block">
            Admin Signature
        </div>
    </div>

    <p class="small"><strong>Note:</strong> This Software develop by <strong>BGMIT</strong> created by <strong>SAMIM-HosseN</strong>. Call: +8801 62420 9291. Thank You!</p>

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
