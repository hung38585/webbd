<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Order_detail;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = ['id'];
    protected $timestamp = true;

    public function order_detail()
    {
    	return $this->hasMany('App\Models\Order_detail');	
    }

    public function getAll($quantity)
    {
        return Order::orderBy('created_at', 'desc')->paginate($quantity)->appends(request()->query());
    }

    public function getById($id)
    {
        $order = Order::findOrFail($id);
        return $order;
    }

    public function create($orderData)
    {
        $order = new Order;
        $order->total_amount = $orderData['total_amount'];
        $order->status = 1;
        $order->transaction_date = Carbon::now('Asia/Ho_Chi_Minh');
        $order->note = $orderData['note'];
        $order->name = $orderData['name'];
        $order->phone = $orderData['phone'];
        $order->address = $orderData['address'];
        $order->save();
        $carts = session()->get('cart');
        if (isset($carts)) {
            foreach ($carts as $key => $cart) {
               $order_detail = new Order_detail;
               $order_detail->order_id = $order->id;
               $order_detail->product_id = $cart['id'];
               $order_detail->quantity = $cart['quantity'];
               $order_detail->price = isset($cart['promotion']) ? $cart['promotion'] : $cart['price'];
               $order_detail->save();
            }
        }
        return true;
    }

    public function edit($orderData, $id)
    {
        $order = $this->getById($id); 
        $order->status = $orderData['status'];
        $order->update();
        return $order;
    }

    public function getOrderDetail($id)
    {
        return Order_detail::where('order_id', $id)->with('product')->get();
    }
}
