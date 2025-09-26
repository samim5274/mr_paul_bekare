<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Total Order List</title>
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
        <h5 style="text-align:center;">Print Total Stock list</h5>
        <hr>
        <!-- <div class="qrImg">
            {!! QrCode::size(60)->generate('Abir Bekare & Foods') !!}
        </div> -->
        <table class="print-table" id="printableTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Sub-Category</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Price (৳)</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $key => $val)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $val->name }}</td>
                <td>{{ $val->category->name }}</td>
                <td>{{ $val->subcategory->name }}</td>
                <td class="text-center">{{ $val->stock }}</td>
                <td class="text-center">৳{{ $val->price }}/-</td>
                <td class="text-center">
                    @if($val->availability)
                        <span class="status-available">Available</span>
                    @else
                        <span class="status-unavailable">Not Available</span>
                    @endif                                    
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4">Total:</td>
                <td class="text-center">{{ $stock }}</td>
                <td class="text-center">৳{{ $price }}/-</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <h5>Total Stock Price (৳): {{$stock * $price}}/-</h5>
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
