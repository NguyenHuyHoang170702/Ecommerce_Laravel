<?php
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Đưa các file CSS vào đây nếu cần -->
</head>
<body>

<h1>Shopping Cart</h1>

@if(!empty($cart))
    <table border="1">
        <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cart as $item)
            <tr>
                <td>{{ $item['title'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['quantity'] * $item['price'] }}</td>
                <td>
{{--                    <form action="{{ route('remove_from_cart', $item['id']) }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <button type="submit">Remove</button>--}}
{{--                    </form>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3">Total:</td>
            <td>{{ $totalPrice }}</td>
            <td></td>
        </tr>
        </tfoot>
    </table>
@else
    <p>Your shopping cart is empty.</p>
@endif

<!-- Đưa các file JavaScript vào đây nếu cần -->

</body>
</html>


