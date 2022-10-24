<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\StoreProductJob;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Services\ProductService;
use Closure;
use Illuminate\Http\Request;

class ProductController extends BaseApiController
{
    /**
     * @var ProductService
     */
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->execute(function() {
            return $this->productService->products();
        }, true);
    }

    /**
     * @param Request $request
     * @return mixed
     */

    public function store(Request $request): mixed
    {
           $data = json_encode($request->all());
            return $this->execute(function() use ($data) {
                return $this->productService->store($data);;
            }, true);

        }


}
