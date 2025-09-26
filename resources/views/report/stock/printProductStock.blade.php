<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Total Order List</title>
    <link rel="icon" href="./img/LOGO35 pix.png" type="image/x-icon"> 
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            margin: 20px;
            position: relative;
        }
        h1, h3, p { 
            margin: 0; 
            text-align: center; 
        }
        hr {
            margin: 10px 0;
            border: none;
            border-top: 1px solid #000;
        }
        .qrImg {
            position: absolute;
            top: 0;
            right: 0;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px;
            font-size: 14px;
        }
        th, td { 
            border: 1px solid #000; 
            padding: 6px 8px; 
            text-align: left; 
        }
        th { 
            background-color: #f4f4f4; 
            font-weight: bold;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 60px;
            page-break-inside: avoid;
        }
        .signature-block {
            width: 45%;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 5px;
            font-weight: bold;
        }
        .note {
            font-size: 12px;
            margin-top: 15px;
            text-align: center;
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
        <p>Email: {{ $company[0]->email }} || Phone: {{ $company[0]->phone }} || Website: {{ $company[0]->website }}</p>
        <h3 style="text-align:center;">Total Product Stock</h3>
        <hr>
        <!-- <div class="qrImg">
            {!! QrCode::size(60)->generate('Abir Bekare & Foods') !!}
        </div> -->
        <table class="table table-bordered table-striped " id="printableTable">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">#</th>
                    <th>Product</th>
                    <th class="text-center">Stock In</th>
                    <th class="text-center">Stock Out</th>
                    <th class="text-center">Available</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stockSummary as $key => $val)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $products[$val->product_id]->name ?? 'Unknown' }}</td>
                    <td class="text-center">{{$val->total_in}}</td>
                    <td class="text-center">{{$val->total_out}}</td>
                    <td class="text-center">{{$val->total_in - $val->total_out}}</td>
                </tr>
                @endforeach
                <tr class="table-info">
                    <td colspan="2">Total:</td>
                    <td class="text-center">{{$totalStockIn}}</td>
                    <td class="text-center">{{$totalStockOut}}</td>
                    <td class="text-center">{{$totalStockIn - $totalStockOut}}</td>
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
