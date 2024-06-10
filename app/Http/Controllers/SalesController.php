<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\sales;
use App\Models\sales_products;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|true[]
     */
    public function store(Request $request)
    {
        $params = $request->input('params');
        $products = $params['products'];
        $consumer = $params['consumer'];

        try {
            foreach ($products as $product)
            {
                $quantity = $product['quantity'];
                DB::beginTransaction();
                $product = product::find($product['id']);
                $product->update([
                    'stock' => $product['quantity'] - $product['quantity']
                ]);

                $sale = sales::create([
                    'value' => floatval($product['price']),
                    'costumer_name' => $consumer['name'],
                    'costumer_tel' => $consumer['tel'],
                    'costumer_address' => $consumer['address'],
                ]);


                sales_products::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product['id'],
                    'quantity' => intval($quantity),
                ]);

            }
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json([
                'error' => $exception->getMessage()
            ]);
        }

        DB::commit();

        return response()->json([
            'success' => true
        ]);

    }
}
