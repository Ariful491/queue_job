<?php

namespace App\Services;

use App\Jobs\ShowProductJob;
use App\Jobs\StoreProductJob;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductService
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */

    public function products(): \Illuminate\Database\Eloquent\Collection|array
    {
       /* $dataJob = new ShowProductJob();
        return  $dataJob->handle();*/
       return  Product::with('category','productVariant')->orderBy('id','desc')->get();


    }


    public function store($data){
        $name = "/temp.json";
        $path = resource_path('temp');
        file_put_contents($path . $name,$data);
        StoreProductJob::dispatch();
        $item['success'] = "saved Successfully";
        $item['status'] = "200";
        return $item;
    }



}
