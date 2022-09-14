<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __invoke()
    {
        return Product::query()
            ->when(request('category'),
                fn($builder) => $builder->whereCategory(request('category')),
                fn($builder) => $builder
            )
            ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function index()
    {
        return Product::query()
            ->when(request('category'),
                fn($builder) => $builder->whereCategory(request('category')),
                fn($builder) => $builder
            )
            ->get();
    } */
}
