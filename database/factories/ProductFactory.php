<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgName = $this->faker->image(storage_path("app/public/uploads/products"), $width = 640, $height = 480, 'cats', false);
        return [
            'name' => $this->faker->name(),
            'cate_id' => Category::all()->random()->id,
            'image' => "uploads/products/" . $imgName,
            'price' => rand(1, 3000),
            'status' => rand(0, 1),
            'quantity' => rand(1, 100),
            'detail' => $this->faker->realText($maxNbChars = 200, $indexSize = 2)
        ];
    }
}
