<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Specific Expenses Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media print {
            .no-print {
                display: none;
            }
        }

        body {
            font-size: 18px;
            background-color: #f8f9fa;
            color: #212529;
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
        }

        .header h2 {
            font-size: 34px;
            font-weight: bold;
        }

        .header h5 {
            font-size: 20px;
            color: #6c757d;
        }

        .report-title {
            font-size: 26px;
            margin-top: 20px;
            font-weight: 700;
            border-bottom: 3px solid #343a40;
            display: inline-block;
            padding-bottom: 5px;
        }

        .invoice-card {
            background: #fff;
            border-radius: 10px;
            padding: 30px 35px;
            margin-bottom: 40px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        .info-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .info-label {
            font-weight: 600;
            color: #343a40;
        }

        .info-value {
            color: #212529;
            margin-left: 8px;
        }

        .amount-box {
            text-align: right;
            font-size: 2.2rem;
            font-weight: 800;
            color: #0d6efd;
            border-top: 2px dashed #dee2e6;
            padding-top: 20px;
            margin-top: 30px;
        }

        .signature-section {
            margin-top: 80px;
        }

        .signature-line {
            width: 100%;
            border-top: 2px solid #000;
            margin-top: 60px;
            text-align: center;
            padding-top: 10px;
            font-size: 18px;
            font-weight: 600;
        }

        .btn-print {
            font-size: 18px;
            padding: 12px 30px;
        }
    </style>
</head>
<body class="container py-5">

    <!-- Header -->
    <div class="header">
        <div class="invoice-box">
        <h1 style="text-align:center;">{{ $company[0]->name }}</h1>
        <p style="text-align:center;">{{ $company[0]->address }}</p>
        <p>Email: {{ $company[0]->email }} || Phone: {{ $company[0]->phone }} || Website: {{ $company[0]->website }}</p>
        <h5 style="text-align:center;">Expenses Print</h5>
        <hr>
        <!-- <div class="qrImg">
            {!! QrCode::size(60)->generate('Abir Bekare & Foods') !!}
        </div> -->
    </div>

    <!-- Expense Loop -->
    @foreach($expenses as $val)
    <div class="invoice-card">

        <!-- Row 1: Date and User -->
        <div class="info-row">
            <div><span class="info-label"> Date:</span><span class="info-value">{{ $val->date }}</span></div>
            <div><span class="info-label"> User:</span><span class="info-value">{{ $val->user->name ?? '' }}</span></div>
        </div>

        <!-- Row 2: Category, Subcategory, Remark -->
        <div class="info-row">
            <div><span class="info-label"> Category:</span><span class="info-value">{{ $val->category->name ?? '' }}</span></div>
            <div><span class="info-label"> Subcategory:</span><span class="info-value">{{ $val->subcategory->name ?? '' }}</span></div>
            <div><span class="info-label"> Remark:</span><span class="info-value">{{ $val->remark ?? '' }}</span></div>
        </div>

        <!-- Row 3: Amount -->
        <div class="amount-box">৳{{ number_format($val->amount, 2) }}/-</div>
    </div>
    @endforeach

    <!-- Signature Section -->
    <div id="signature-section" style="display: flex; justify-content: space-between; margin-top: 40px;">
        <div style="text-align: center; width: 45%;">
            <div style="border-top: 1px solid #000; width: 60%; margin: 0 auto;"></div>
            <small class="text-muted">Prepared By</small>
        </div>
        <div style="text-align: center; width: 45%;">
            <div style="border-top: 1px solid #000; width: 60%; margin: 0 auto;"></div>
            <small class="text-muted">Approved By</small>
        </div>
    </div>





    <script>
        window.onload = function () {
            window.print();
            setTimeout(function () {
                window.close();
            }, 500);
        };
    </script>

</body>
</html>
