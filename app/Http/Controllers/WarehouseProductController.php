<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouseproduct;
use App\Models\Warehouse;
use App\Models\Product;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\Validator;

class WarehouseProductController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sender_warehouse_id'          => 'required|exists:warehouses,id',
            'receiver_warehouse_id'        => 'required|exists:warehouses,id',
            'product_id'                   => 'required|exists:products,id',
            'quantity'                     => 'required'
            ]);

            //we check if we have such a Sender_Warehouse
            $hasSenderWarehouse = DB::table('warehouses')->where('id', $request->sender_warehouse_id)->first();
                    if(!$hasSenderWarehouse){
                    return response()
                    ->json(['message' => "Doesn't have $request->sender_warehouse_id.No Warehouse"]);
                    }
            //we check if we have such a Receiver_Warehouse or not
            $hasReceiverWarehouse = DB::table('warehouses')->where('id', $request->receiver_warehouse_id)->first();
                    if(!$hasReceiverWarehouse){
                    return response()
                    ->json(['message' => "Doesn't have $request->receiver_warehouse_id.No Warehouse"]);
                }

            if ($validator->fails()) {
                return getError();
            }


            //we examine that Warehouse has the product or no
            $receiver_product = DB::table('warehouseproducts')
            ->where('receiver_warehouse_id', $request->sender_warehouse_id)
            ->where('product_id', $request->product_id)
            ->get()
            ->sum('quantity');

            $sender_product   = DB::table('warehouseproducts')
            ->where('sender_warehouse_id',   $request->sender_warehouse_id)
            ->where('product_id', $request->product_id)
            ->get()
            ->sum('quantity');
            $total=$receiver_product-$sender_product;


            //we check warehouses are same or no
            if($request->receiver_warehouse_id == $request->sender_warehouse_id){

                return response()->error(["Same Warehouses"], 401);
            }

            if($total >= $request->quantity )
                {
                    $Warehousproduct = Warehouseproduct::create($request->all());
                    return $Warehousproduct;
                }

            else
                {

                    return response()->error(["You dont have enough product"], 404);
                }

    }
    public function index(Request $request)
    {

        $hasWarehouse = DB::table('warehouses')->where('id', $request->warehouse)->first();
        if(!$hasWarehouse){
            return response()
            ->json(['message' => "We don't have $request->warehouse.No Warehouse"]);
        }


        $receiver_product = DB::table('warehouseproducts')
        ->where('receiver_warehouse_id', $request->warehouse)
        ->where('product_id', $request->product)
        ->get()
        ->sum('quantity');

        $sender_product = DB::table('warehouseproducts')
        ->where('sender_warehouse_id', $request->warehouse)
        ->where('product_id', $request->product)
        ->get()
        ->sum('quantity');

        $total=$receiver_product-$sender_product;

        if($total <= 0)
        {
          return response()
           ->json(['message' => "You don't have any product", "Received from $receiver_product products", "Sended $sender_product products"]);
        }
        else
        {
            return response()
            ->json(['message' => "You have $total products" , "Received $receiver_product products", "Sended $sender_product products"]);

        }


    }
}
