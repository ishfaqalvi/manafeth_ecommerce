<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .invoice-box {
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            border: 1px solid #eee;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h2>Emanafeth</h2>
                            </td>
                            <td>
                                Invoice #: {{ $order->id }}<br>
                                Created: {{ $order->created_at->format('d M Y') }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Your Company Name<br>
                                12345 Street, City, State, Zip<br>
                                Email: info@company.com
                            </td>
                            <td>
                                {{ $order->name }}<br>
                                {{ $order->email }}<br>
                                {{ $order->address }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td colspan="2">Payment Method</td>
            </tr>
            <tr class="details">
                <td colspan="2">{{ $order->payment_method }}</td>
            </tr>
            @php($total = 0)
            @foreach($order->details as $detail)
            <tr class="heading">
                @php($price = $detail->quantity * $detail->price)
                @php($total += $price)
                <td>{{ $detail->product->name }}</td>
                <td>{{ $price }}</td>
            </tr>
            @endforeach
            <tr class="total">
                <td></td>
                <td>Total: {{ $total }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
