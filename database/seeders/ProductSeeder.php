<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<15;$i++){
            $product =New Product();
            $product->name = 'test'.$i;
            $product->description = 'description'.$i;
            $product->category = 'category'.$i;
            $product->amount = '100'.$i;
            $product->save();
        }
    }
}
