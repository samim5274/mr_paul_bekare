<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mr. Paul Bekare</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 20px;">

    <div style="max-width: 700px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; border: 1px solid #e0e0e0;">
        <h2 style="text-align: center; color: #333;">Mr. Paul Bekare</h2>

        <p style="font-size: 16px; color: #555;">Hi , I'm <strong>{{ $data['name'] }}</strong>, <span style="font-size: 10px; color: #555;">(Billing office)</span></p>

        <p style="font-size: 16px; color: #555;">Here is your order summary:</p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 10px; border: 1px solid #ddd;">Bill.</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Total</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Discount</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">VAT</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Payable</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Pay</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Due</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">P. Method</th>
                </tr>
            </thead>
            <tbody>
                @foreach($total as $val)
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $val->user->name }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $val->total }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $val->discount }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $val->vat }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $val->payable }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $val->pay }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $val->due }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $val->payment->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p style="margin-top: 20px; font-size: 14px; color: #999; text-align: center;">
            Copyright © ARS Soft. All Rights Reserved.
            Designed & Distributed by SAMIM-HosseN
        </p>
    </div>

</body>
</html>
