<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders (Request $request, string $order_status)
    {
        $type = "generalorder";
        $query = Order::with('orderDetails', 'affiliateMember')->orderBy('id', 'desc');

        if(isset($request->status_search)){
            $orders = $query->where('status', $request->status_search)->paginate(300);
            return view('admin.order.index', compact('orders', 'order_status', 'type'));
        }
        elseif(isset($request->db_search)){
            $orders = $query->where(function ($query) use ($request) {
                $query->where('buyer_phone', 'LIKE', '%' . $request->db_search . '%')
                      ->orWhere('invoice_no', 'LIKE', '%' . $request->db_search . '%');
            })->paginate(300);
            
            return view('admin.order.index', compact('orders', 'order_status', 'type'));
        }
        else{
            if($order_status == "all"){
                $orders = $query->paginate(300);
            }
            else{
                $orders = $query->where('status', $order_status)->paginate(300);
            }

            return view('admin.order.index', compact('orders', 'order_status', 'type'));
        }
    }

    public function updateStatus(Request $request)
    {
        $order = Order::find($request->order_id);

        if ($order) {
            $order->status = $request->status;
            $order->save();
            
            return response()->json(['success' => true]);
        }
        
        return response()->json(['success' => false]);
    }

    public function getOrgOrders (Request $request,string $org_id, string $order_status)
    {
        $type = "orgorder";
        $query = Order::with('orderDetails', 'affiliateMember')->orderBy('id', 'desc')->where('org_id', $org_id);

        if(isset($request->status_search)){
            $orders = $query->where('status', $request->status_search)->paginate(300);
            return view('admin.order.index', compact('orders', 'order_status', 'type'));
        }
        elseif(isset($request->db_search)){
            $orders = $query->where(function ($query) use ($request) {
                $query->where('buyer_phone', 'LIKE', '%' . $request->db_search . '%')
                      ->orWhere('invoice_no', 'LIKE', '%' . $request->db_search . '%');
            })->paginate(300);
            
            return view('admin.order.index', compact('orders', 'order_status', 'type'));
        }
        else{
            if($order_status == "all"){
                $orders = $query->paginate(300);
            }
            else{
                $orders = $query->where('status', $order_status)->paginate(300);
            }

            return view('admin.order.index', compact('orders', 'order_status', 'type'));
        }
    }
}
