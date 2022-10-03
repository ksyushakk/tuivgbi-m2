<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Product\ProductCreateValidation;
use App\Models\Product;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends Controller
{
    public function index()
    {
       $products = Product::paginate(15);
       return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.createOrUpdate');
    }
    public function store(ProductCreateValidation $request)
    {
        $validate = $request->validated();
        unset($validate['photo_file']);
        $photo = $request->file('photo_file')->store('public');
        $validate['photo'] = explode('/', $photo)[1];

        Product::create($validate);
        return back()->with(['success', true]);

    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }





}
