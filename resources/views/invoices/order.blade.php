<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background: #fdfdfd;
        }

        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #eee;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #343a40;
            color: #fff;
            padding: 20px;
        }

        .invoice-header img {
            max-height: 60px;
        }

        .company-info {
            text-align: right;
            font-size: 13px;
            line-height: 1.4;
        }

        .invoice-title {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .invoice-title h2 {
            margin: 0;
            font-size: 24px;
            color: #222;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            font-size: 14px;
        }

        .invoice-details div {
            width: 48%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px;
            table-layout: fixed;
            /* prevent collapsing */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            font-size: 14px;
            word-wrap: break-word;
        }

        th {
            background: #f8f9fa;
            text-align: center;
        }

        td img {
            max-width: 60px;
            max-height: 60px;
            border-radius: 4px;
        }

        th:nth-child(1),
        td:nth-child(1) {
            width: 80px;
        }

        /* Image */
        th:nth-child(2),
        td:nth-child(2) {
            width: 40%;
        }

        /* Product name */
        th:nth-child(3),
        td:nth-child(3) {
            width: 10%;
        }

        /* Qty */
        th:nth-child(4),
        td:nth-child(4) {
            width: 15%;
        }

        /* Unit Price */
        th:nth-child(5),
        td:nth-child(5) {
            width: 15%;
        }

        /* Subtotal */

        .total {
            text-align: right;
            font-weight: bold;
            font-size: 16px;
            padding: 20px;
            border-top: 2px solid #ddd;
        }

        .invoice-footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            padding: 15px;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        {{-- Header with Logo + Company Info --}}
        <div class="invoice-header">
            <div>
                <img src="{{ public_path('images/3.png') }}" alt="Logo">
            </div>
            <div class="company-info">
                <strong>KoreanGlowBD</strong><br>
                Banani, Dhaka<br>
                mahmudul21124@gmail.com<br>
                +8801988-674940
            </div>
        </div>

        {{-- Title --}}
        <div class="invoice-title">
            <h2>Invoice #{{ $order->id }}</h2>
        </div>

        {{-- Order + Customer Info --}}
        <div class="invoice-details">
            <div>
                <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                <p><strong>Date:</strong> {{ $order->created_at->format('d M, Y') }}</p>
            </div>
            <div>
                <p><strong>Customer:</strong> {{ $order->user->name ?? 'Guest Checkout' }}</p>
                <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
            </div>
        </div>

        {{-- Products Table --}}
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>
                            @if ($item->product && $item->product->image)
                                <img src="{{ public_path('storage/' . $item->product->image) }}"
                                    alt="{{ $item->product->name }}">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $item->product->name ?? 'N/A' }}</td>
                        <td style="text-align:center;">{{ $item->quantity }}</td>
                        <td style="text-align:right;">৳{{ number_format($item->unit_price, 2) }}</td>
                        <td style="text-align:right;">৳{{ number_format($item->unit_price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Total --}}
        <div class="total">
            Total: ৳{{ number_format($order->total_price, 2) }}
        </div>

        {{-- Footer --}}
        <div class="invoice-footer">
            Thank you for shopping with us!<br>
            This is a computer-generated invoice and does not require a signature.
        </div>
    </div>
</body>

</html>
