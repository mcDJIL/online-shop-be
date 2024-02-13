<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequests;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $productGalleries = ProductGallery::with('product')->get();

        return view('pages.product_galleries.index')->with([
            'productGalleries' => $productGalleries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        return view('pages.product_galleries.create')->with([
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGalleryRequests $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store(
            'assets/product', 'public'
        );

        ProductGallery::create($data);
        return redirect()->route('product-galleries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductGallery::findOrFail($id)->delete();
    
        return redirect()->route('product-galleries.index');
    }

}
