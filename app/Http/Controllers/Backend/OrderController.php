<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function allOrderList (){
        // $orders = Order::get();

        $orders = Order::with('orderDetails')->get();
        // dd($orders);

        // return view('backend.order.all-order-list');
        return view('backend.order.all-order-list', compact('orders'));
    }

    public function editOrder ($id) {
        $order = Order::with('orderDetails')->where('id', $id)->first();
        // dd($order);
        return view('backend.order.edit-order', compact('order'));
    }

    public function updateOrder (Request $request, $id){
        $order = Order::find($id);

        $order->c_name = $request->c_name;
        $order->c_phone = $request->c_phone;
        $order->address = $request->address;
        $order->area = $request->area;
        $order->courier_name = $request->courier_name;
        $order->price = $request->price;

        $order->save();
        return redirect()->back();
    }

    public function updateOrderStatus ($status, $id){
        $order = Order::find($id);
        // dd($order);
        $order->status = $status;

        // for Steadfast API 
        if($status == "delivered"){
            if($order->courier_name == "steadfast"){
                // return "Sent To Courier";
                //API EndPoint
                $endPoint = "https://portal.packzy.com/api/v1/create_order";

                //Auth Parameters
                $apiKey = "sl4xb4fhx4xefuodes3gjoh6uuktl3vl";
                $secretKey ="lwp49erccevuglcxzjlfb0hk";
                $contentType = "application/json";

                //Body Parameters
                $invoiceID = $order->invoiceID;
                $customerName = $order-> c_name;
                $customerPhone = $order-> c_phone;
                $customerAddress = $order-> address;
                $orderPrice = $order->price;

                // The Header Array
                $header = [
                    'Api-Key' => $apiKey,
                    'Secret-Key' => $secretKey,
                    'Content-Type' => $contentType,
                ];

                //The Payload
                $payload = [
                    'invoice' => $invoiceID,
                    'recipient_name' => $customerName,
                    'recipient_phone' => $customerPhone,
                    'recipient_address' => $customerAddress,
                    'cod_amount' => $orderPrice,
                ];
                    
                //For Call API
                $response = Http::withHeaders($header)->post($endPoint, $payload);
                // dd($response);

                $responseData = $response->json();
                // dd($responseData);


            }
            else{
                return "Select Courier";
            }
        }

        $order->save();
        return redirect()->back();
    }

    // public function statusWiseOrder ($status){
    //     return view('backend.order.status-wise-order-list');
    // }

    public function statusWiseOrder ($status){
        // $orders = Order::where('status', $status)->get();
        $orders = Order::where('status', $status)->with ('orderDetails')->get();
        return view('backend.order.status-wise-order-list', compact('orders'));
    }
}
