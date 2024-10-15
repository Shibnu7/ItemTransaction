
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Create Order</h2>
        <form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="customername">Customer Name</label>
        <input type="text" name="customername" id="customername" class="form-control" required>
    </div>
    <div class="form-group mb-3">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control" required>
    </div>
    <div class="form-group mb-3">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" required>
    </div>
    <div class="form-group mb-4">
        <label for="mobile">Mobile</label>
        <input type="text" name="mobile" id="mobile" class="form-control" required>
    </div>

    <!-- Order Items Section -->
    <div class="form-group mb-4">
        <label>Order Items</label>
        <div id="order-items">
            <div class="order-item mb-3">
                <select name="orderitems[0][itemid_fk]" class="form-control" required>
                    <option value="" disabled selected>Select an item</option>
                    @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->itemname }}</option>
                    @endforeach
                </select>
                <input type="number" name="orderitems[0][qty]" class="form-control mt-2" placeholder="Quantity" required>
                <!-- No need for price input if you fetch price from the database -->
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit Order</button>
</form>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
        }
        h2 {
            font-size: 32px;
            font-weight: 600;
            color: #343a40;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn {
            padding: 10px;
            font-size: 18px;
        }
    </style>
</body>
</html>

