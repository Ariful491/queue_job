<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

      Category::insert([
            array('id' => '1','title' => 'foods'),
            array('id' => '2','title' => 'clothing'),
            array('id' => '3','title' => 'electronics'),
            array('id' => '4','title' => 'plastics')
        ]);

        /**
         * Product Seeders
         */

        for($i=1; $i<=50 ; $i++){
           Product::create([
               'title'=>'product_'.$i,
               'cat_id'=>rand(1,4),
               'product_type'=>'standard',
           ]);
        }
        for($i=51; $i<=100 ; $i++){
           Product::create([
               'title'=>'product_'.$i,
               'cat_id'=>rand(1,4),
               'product_type'=>'variant',
           ]);
        }

        /**
         * ProductVariant Seeders
         *
         */

        for($i=1; $i<=101 ; $i++){
           $productType = Product::where('id',$i)->value('product_type');
            if($productType=='standard'){
                ProductVariant::create([
                    'product_id'=>$i,
                    'sku'=>rand(1,10000000000000000),
                    'barcode'=>rand(1,100000000),
                    'price'=>rand(10,5000),
                ]);
            }else{
                ProductVariant::create([
                    'product_id'=>$i,
                    'name'=>implode(",", fake()->randomElements(['color', 'size', 'flavor'], 2)),
                    'value'=>implode(",", fake()->randomElements(['green', 'xl', 'rose'], 2)),
                    'sku'=>rand(1,10000000000000000),
                    'barcode'=>rand(1,100000000),
                    'price'=>rand(10,5000),
                ]);
            }

        }



    }
}
