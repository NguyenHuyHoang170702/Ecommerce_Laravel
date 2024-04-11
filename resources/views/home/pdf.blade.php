<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Order Details</h1>

    <h2>Order Information:</h2>
    <p>Order ID: {{ $order->id }}</p>
    <p>Name: {{ $order->name }}</p>
    <!-- Thêm các thông tin khác về order tại đây -->

    <h2>Order Details:</h2>
    <table>
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th> <!-- Thêm cột hình ảnh -->
        </tr>
        </thead>
        <tbody>
        @foreach ($orderDetails as $detail)
            <tr>
                <td>{{ $detail->product_id }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ $detail->price }}</td>
                <td><img src="{{ asset('product/' . $detail->image) }}" alt="" style="width: 100px; height: 100px"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
