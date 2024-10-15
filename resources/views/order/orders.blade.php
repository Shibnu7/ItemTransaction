<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            border-radius: 5px;
            overflow: hidden;
        }
        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }
        .list-unstyled {
            padding-left: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="my-4">All Orders</h1>
    
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Order Status</th>
                <th>Order Items</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customername }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->orderdate }}</td>
                    <td>{{ $order->totalamount }}</td>
                    <td>{{ $order->orderstatus }}</td>
                    <td>
                        <ul class="list-unstyled">
                            @foreach($order->orderItems as $item)
                                <li>{{ $item->item->itemname }} (Qty: {{ $item->qty }}, Price: {{ $item->price }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <!-- View Button -->
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                        <!-- Delete Button Form -->
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Optional: Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
