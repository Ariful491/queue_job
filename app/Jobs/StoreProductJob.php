<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use DB;


class StoreProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */



    public function __construct( )
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
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
        unlink($path.'/temp.json');
    }
}
