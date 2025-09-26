<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Barcodes - {{ $product->name }}</title>
    <style>
        @page {
            size: A4;
            margin: 4mm;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 2mm;
            justify-content: flex-start;
        }

        .barcode-item {
            width: 45.5mm;
            height: 33.5mm;
            padding: 3px;
            text-align: center;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 2px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            page-break-inside: avoid;
        }

        .product-info {
            font-size: 8px;
            font-weight: bold;
            color: #333;
            line-height: 1;
        }
        
        .sku {
            font-size: 7px;
            color: #888;
        }

        .price-tag {
            font-size: 10px;
            font-weight: bold;
            color: #333;
            margin-top: auto;
        }

        .barcode-image {
            max-width: 95%;
            max-height: 18mm;
            display: block;
            margin: auto;
        }

        @media print {
            body {
                background-color: #fff;
                margin: 0;
                padding: 0;
                display: block;
            }

            .barcode-item {
                display: inline-block;
                vertical-align: top;
                margin: 2mm;
                width: 45.5mm;
                height: 33.5mm;
            }

            .page-break {
                page-break-after: always;
            }
        }
    </style>
</head>
<body>
    @for($i = 1; $i <= $qty; $i++)
        <div class="barcode-item">
            <div>
                <p class="product-info">{{ $product->name }}</p>
                <p class="sku">SKU: {{ $product->sku }}</p>
            </div>
            <img class="barcode-image" src="data:image/png;base64,{{ $product->barcode }}" alt="barcode">
            <p class="price-tag">{{ $product->price }}/-</p>
        </div>
        
        @if($i % 28 == 0)
            <div class="page-break"></div>
        @endif
    @endfor

    <script>
        window.onload = function() {
            window.print();
            setTimeout(() => { window.close(); }, 500);
        };
    </script>
</body>
</html>