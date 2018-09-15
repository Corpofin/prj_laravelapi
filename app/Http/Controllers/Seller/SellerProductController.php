<?php
//<project>/app/Http/Controllers/Seller/SellerProductController.php
namespace App\Http\Controllers\Seller;

use App\Product;
use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $oCollection = $seller->products;  //products.seller_id = s.id
        //dd($oCollection);
        return $this->showAll($oCollection);
    }//index

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Seller $seller)
    {
        $data = $request->validate([
            "name" => "required|max:255",
            "description" => "required|max:1000",
            "quantity" => "required|integer|min:1",
        ]);
        
        //El producto tiene un estado: Disponible o No disponible. 
        //Para que esté disponible debe tener al menos una categoria
        $data["status"] = Product::NOT_AVAILABLE;
        $data["seller_id"] = $seller->id; //el seller_id no se recupera de la url
        
        $product = Product::create($data);
        
        return $this->showOne($product,201);
        
    }//store

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller, Product $product)
    {
        //
    }
}//SellerProductController
