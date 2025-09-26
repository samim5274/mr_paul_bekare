<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Total Expenses Report</title>
    <link rel="icon" href="./img/LOGO35 pix.png" type="image/x-icon"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap">
    <style>
        body {
            font-family: 'Public Sans', sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
            background-color: #fff;
        }

        .invoice-box {
            max-width: 900px;
            margin: auto;
            padding: 20px 30px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            background-color: #fff;
        }

        h1, h2, h3, h4, h5 {
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
        }

        h3 {
            margin-top: 10px;
            font-size: 20px;
            font-weight: 600;
            color: #007bff;
        }

        p {
            margin: 3px 0;
            font-size: 14px;
        }

        .company-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .info-text h5 {
            font-weight: 500;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 14px;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 8px 10px;
        }

        table th {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            font-weight: 600;
        }

        table td {
            vertical-align: middle;
        }

        .table-info {
            font-weight: 600;
            background-color: #e9f7fd;
            color: #0c5460;
        }

        .text-end {
            text-align: right;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
        }

        .signature-block {
            width: 45%;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 5px;
            font-weight: 600;
        }

        .note {
            margin-top: 40px;
            font-size: 12px;
            color: #555;
            text-align: center;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
            .no-print {
                display: none;
            }
            table th {
                background-color: #007bff !important;
                color: white !important;
            }
            .table-info {
                background-color: #e9f7fd !important;
            }
            .invoice-box {
                box-shadow: none;
                border: none;
                margin: 0;
                padding: 0;
            }
        }
    </style>
</head>
<body>

    <div class="invoice-box">
        <div class="company-info">
            <h1>{{ $company[0]->name }}</h1>
            <p>{{ $company[0]->address }}</p>
            <p>Email: {{ $company[0]->email }} | Phone: {{ $company[0]->phone }} | Website: {{ $company[0]->website }}</p>
            <h3>Total Expenses List</h3>
        </div>

        <div class="info-row">
            <div class="info-text">
                <h5>Date: {{ \Carbon\Carbon::parse($expenses[0]->date)->format('d M Y')}}</h5>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Remark</th>
                    <th>Amount (৳)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $key => $val)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $val->date }}</td>
                        <td>{{ $val->user->name }}</td>
                        <td>{{ $val->category->name }}</td>
                        <td>{{ $val->subcategory->name }}</td>
                        <td>{{ $val->remark }}</td>
                        <td class="text-end">৳{{ number_format($val->amount, 2) }}</td>
                    </tr>
                @endforeach
                <tr class="table-info">
                    <td colspan="6" class="text-end">Total:</td>
                    <td class="text-end">৳{{ number_format($total, 2) }}/-</td>
                </tr>
            </tbody>
        </table>

        <div class="signature-section">
            <div class="signature-block">Manager Signature</div>
            <div class="signature-block">Admin Signature</div>
        </div>

        <p class="note">
            <strong>Note:</strong> Developed by <strong>SAMIM-HosseN</strong> | Contact: +8801624209291
        </p>
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
