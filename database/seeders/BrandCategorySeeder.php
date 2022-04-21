<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Brand;
Use App\Models\Category;
Use App\Models\BrandCategory;
use Faker\Factory as Faker;

class BrandCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($CatCount = 0; $CatCount < 10; $CatCount++)
            $this->addCat();

    }

    public  function addCat()
    {
        $this->faker = Faker::create();
        $CatTitle = $this->faker->name();
        $BrandTitle = $this->faker->name();
        $Brand = Brand::create([
            "brand_icon" => "image/image.png", "brand_title" => $BrandTitle, "brand_img" => "image/image.png",
            "brand_desc" => "Brand Desc"
        ]);

        $Category = Category::create([
            "category_icon" => "image/image.png", "category_title" => $CatTitle, "category_img" => "image/image.png",
            "category_desc" => "Category Desc"
        ]);

        BrandCategory::create([
            "brand_id" => $Brand->id,
            "category_id" => $Category->id
        ]);
    }
}
