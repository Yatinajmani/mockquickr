<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$data = [
    		['name' => 'mobile'],
    		['name' => 'laptop'],
    		['name' => 'car'],
    		['name' => 'bike'],
    		['name' => 'furniture'],
    		['name' => 'pet'],
    		['name' => 'book'],
    		['name' => 'sport'],
    		['name' => 'fashion'],
    		['name' => 'kid'],
    		['name' => 'service'],
    		['name' => 'job'],
    		['name' => 'estate'],
    	];
    	
    	foreach ($data as $value) {
    		Category::create($value);
    	}
    }
}
