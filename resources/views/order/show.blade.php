<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .container {
            margin-top: 50px;
            background-color: white; /* White background for the container */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
            padding: 20px; /* Inner padding */
        }
        h2 {
            color: #343a40; /* Dark text for headings */
            font-weight: bold; /* Bold headings */
        }
        h4 {
            margin-top: 20px; /* Margin on top of the subheading */
            color: #495057; /* Slightly lighter color for subheadings */
        }
        p {
            font-size: 16px; /* Standard font size for paragraphs */
            color: #6c757d; /* Gray color for text */
        }
        .list-unstyled li {
            background-color: #e9ecef; /* Light gray background for list items */
            border-radius: 5px; /* Rounded corners for list items */
            padding: 10px; /* Inner padding for list items */
            margin-bottom: 5px; /* Space between list items */
        }
        .btn-primary {
            background-color: #007bff; /* Custom primary button color */
            border-color: #007bff; /* Border color for button */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
            border-color: #0056b3; /* Darker border on hover */
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Order Details</h2>

    <p><strong>Customer Name:</strong> {{ $order->customername }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>Phone:</strong> {{ $order->phone }}</p>
    <p><strong>Mobile:</strong> {{ $order->mobile }}</p>
    <p><strong>Order Date:</strong> {{ $order->orderdate }}</p>
    <p><strong>Total Amount:</strong> {{ $order->totalamount }}</p>
    <p><strong>Order Status:</strong> {{ $order->orderstatus }}</p>

    <h4>Order Items:</h4>
    <ul class="list-unstyled">
        @foreach($order->orderItems as $item)
            <li>{{ $item->item->itemname }} (Qty: {{ $item->qty }}, Price: {{ $item->price }})</li>
        @endforeach
    </ul>

    <a href="{{ route('orders.orders') }}" class="btn btn-primary">Back to Orders</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
