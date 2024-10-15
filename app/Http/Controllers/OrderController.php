<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\OrderMaster;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('order.index', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customername' => 'required|string|max:255',
            'address'      => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'mobile'       => 'required|string|max:20',
            'orderitems'   => 'required|array',
            'orderitems.*.itemid_fk' => 'required|exists:items,id',  // Check that items exist
            'orderitems.*.qty' => 'required|integer|min:1',  // Ensure a valid quantity
        ]);
    
        // Create a new order in the `ordermaster` table
        $order = OrderMaster::create([
            'customername' => $request->customername,
            'address'      => $request->address,
            'phone'        => $request->phone,
            'mobile'       => $request->mobile,
            'orderdate'    => now(),  // Set the current date
            'totalamount'  => 0,      // Placeholder for total amount calculation
            'orderstatus'  => 'pending',  // Set default status
        ]);
    
        // Initialize total amount for the order
        $totalAmount = 0;
    
        // Save each order item
        foreach ($request->orderitems as $index => $item) {
            $itemDetails = Item::find($item['itemid_fk']);
            $itemPrice = $itemDetails->price;
            $itemQty = $item['qty'];
            $totalItemPrice = $itemPrice * $itemQty;
    
            OrderItem::create([
                'orderid_fk' => $order->id,
                'itemid_fk'  => $item['itemid_fk'],
                'qty'        => $itemQty,
                'price'      => $itemPrice,
            ]);
    
            // Accumulate the total amount
            $totalAmount += $totalItemPrice;
        }
    
        // Update the total amount in the order
        $order->update([
            'totalamount' => $totalAmount,
        ]);
    
        // Redirect back with success message
        return redirect()->route('orders.orders')->with('success', 'Order created successfully!');
    }
    
    


    public function showItems()
    {
        $items = Item::all();
        return view('order.items', compact('items'));
    }

    public function showOrders()
    {
        $orders = OrderMaster::with('orderItems')->get();
        return view('order.orders', compact('orders'));
    }

    public function destroy($id)
    {
        $order = OrderMaster::findOrFail($id);
        $order->orderItems()->delete(); // Delete associated order items
        $order->delete(); // Delete the order itself
    
        // Fetch updated orders list
        $orders = OrderMaster::with('orderItems')->get();
    
        return view('order.orders', compact('orders'))->with('success', 'Order deleted successfully!');
    }
    

public function show($id)
{
    $order = OrderMaster::with('orderItems')->findOrFail($id);
    return view('order.show', compact('order'));
}


}
