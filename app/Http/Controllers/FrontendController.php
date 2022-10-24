<?php

namespace App\Http\Controllers;

use App\Jobs\ShowProductJob;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Services\ProductService;
use Illuminate\Http\Request;

class FrontendController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
           return view('welcome')
               ->with('data',$this->productService->products());
     }
     public function test(){
         $path = resource_path('temp');
         $data =  json_decode(file_get_contents($path.'/temp.json'), true);
         foreach ($data as $item){
             $category = Category::updateOrCreate(
                 ['id'=>$item['category']['id']],
                 ['title'=>$item['category']['title']],
             );
         }
         foreach ($data  as $item) {
             // $product = Product::insert($item);
             $product = Product::updateOrCreate(
                 ['title' => $item['title']],
                 ['cat_id' => $item['cat_id']],
                 ['product_type' => $item['product_type']]
             );

         }
         foreach ($data  as $item){
             $product_variant =  ProductVariant::insert($item['product_variant']);
         }
         return "success";
     }
}
