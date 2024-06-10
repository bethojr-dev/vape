<?php

namespace App\Http\Controllers;

use App\Models\product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = product::all();
        return view('admin.home')->with(['products' => $products]);
    }

    public function showProducts()
    {
        $products = product::all();
        return view('admin.list-products')->with([
            'products' => $products
        ]);
    }

    public function createProduct()
    {
        return view('admin.create-product');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeProduct(Request $request): RedirectResponse
    {
         try {
            $productModel = new product();
            $productModel->store($request);

            $allProducts = $productModel->all();

             return redirect()->route('showProducts')->with([
                 'success' => 'Produto ' . $request->name . ' criado com sucesso',
                 'products' => $allProducts
             ],

             );
         } catch (Exception $e) {
             $allProducts = product::all();
             return redirect()->route('showProducts')->with([
                 'error' => 'Erro ao criar produto: ' . $e->getMessage(),
                 'products' => $allProducts
             ]);
         }
    }

    /**
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateProduct(int $id, Request $request): RedirectResponse
    {
        try {
            $product = product::find($id);

            $product->update([
                'name' => $request->name,
                'value' => $request->value,
                'stock' => $request->stock,
                'description' => $request->description,
            ]);

            return redirect()->route('showProducts')->with([
                'success' => 'Produto ' . $product->name . ' atualizado com sucesso',
            ]);

        } catch (Exception $e) {
            return redirect()->route('showProducts')->with([
                'error' => 'Erro ao atualizar produto: ' . $e->getMessage(),
            ]);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function deleteProduct(int $id)
    {
        try {
            $product = DB::table('products')->where('id', '=', $id)->first();
            $product->delete();

            $products = product::where('stock', '>', 0)->orderByDesc('id')->get();

            return view('admin.list-products')->with([
                'success' => 'Produto ' . $product->name . ' deletado com sucesso',
                'products' => $products
            ]);
        } catch (Exception $e) {
            return view('admin.list-products')->with([
                'error' => 'Erro ao deletar produto: ' . $e->getMessage(),
                'products' => $products
            ]);
        }
    }
}
