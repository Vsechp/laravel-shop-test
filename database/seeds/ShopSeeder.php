<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class ShopSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Одежда' => [
                ['name' => 'Джинсы Levi\'s 501', 'price' => 5990, 'description' => 'Классические джинсы прямого кроя', 'slug' => 'dzinsy-levis-501-odezda'],
                ['name' => 'Футболка Nike', 'price' => 2990, 'description' => 'Спортивная футболка из дышащей ткани', 'slug' => 'futbolka-nike-odezda'],
                ['name' => 'Куртка The North Face', 'price' => 15990, 'description' => 'Теплая куртка для активного отдыха', 'slug' => 'kurtka-the-north-face-odezda'],
                ['name' => 'Платье Zara', 'price' => 4990, 'description' => 'Элегантное платье для особых случаев', 'slug' => 'plate-zara-odezda'],
                ['name' => 'Блузка H&M', 'price' => 2990, 'description' => 'Стильная блузка для офиса', 'slug' => 'bluzka-hm-odezda'],
                ['name' => 'Юбка Mango', 'price' => 3990, 'description' => 'Классическая юбка-карандаш', 'slug' => 'yubka-mango-odezda'],
            ],
            'Мужская одежда' => [
                ['name' => 'Джинсы Levi\'s 501', 'price' => 5990, 'description' => 'Классические джинсы прямого кроя', 'slug' => 'dzinsy-levis-501'],
                ['name' => 'Футболка Nike', 'price' => 2990, 'description' => 'Спортивная футболка из дышащей ткани', 'slug' => 'futbolka-nike'],
                ['name' => 'Куртка The North Face', 'price' => 15990, 'description' => 'Теплая куртка для активного отдыха', 'slug' => 'kurtka-the-north-face'],
            ],
            'Женская одежда' => [
                ['name' => 'Платье Zara', 'price' => 4990, 'description' => 'Элегантное платье для особых случаев', 'slug' => 'plate-zara'],
                ['name' => 'Блузка H&M', 'price' => 2990, 'description' => 'Стильная блузка для офиса', 'slug' => 'bluzka-hm'],
                ['name' => 'Юбка Mango', 'price' => 3990, 'description' => 'Классическая юбка-карандаш', 'slug' => 'yubka-mango'],
            ],
            'Спорт' => [
                ['name' => 'Гантели 5 кг', 'price' => 1990, 'description' => 'Разборные гантели для домашних тренировок', 'image' => 'images/dumbbells.jpg'],
                ['name' => 'Коврик для йоги', 'price' => 990, 'description' => 'Нескользящий коврик из экологичных материалов', 'image' => 'images/yoga-mat.jpg'],
                ['name' => 'Скакалка', 'price' => 590, 'description' => 'Регулируемая скакалка для кардио тренировок', 'image' => 'images/jump-rope.jpg'],
                ['name' => 'Боксерская груша', 'price' => 4500, 'description' => 'Профессиональная боксерская груша для тренировок', 'image' => 'images/boxing-bag.jpg'],
                ['name' => 'Скамья для жима', 'price' => 8900, 'description' => 'Универсальная скамья для жима лежа', 'image' => 'images/bench.jpg'],
                ['name' => 'Штанга олимпийская', 'price' => 12000, 'description' => 'Олимпийская штанга 20кг для силовых тренировок', 'image' => 'images/barbell.jpg'],
                ['name' => 'Беговая дорожка', 'price' => 45000, 'description' => 'Электрическая беговая дорожка с множеством программ', 'image' => 'images/treadmill.jpg'],
                ['name' => 'Велотренажер', 'price' => 28000, 'description' => 'Стационарный велотренажер для кардио тренировок', 'image' => 'images/exercise-bike.jpg'],
                ['name' => 'Эллиптический тренажер', 'price' => 35000, 'description' => 'Эллиптический тренажер для комплексных тренировок', 'image' => 'images/elliptical.jpg'],
            ],
        ];

        foreach ($categories as $categoryName => $products) {
            $category = Category::create(['name' => $categoryName]);
            
            foreach ($products as $productData) {
                Product::create([
                    'name' => $productData['name'],
                    'category_id' => $category->id,
                    'price' => $productData['price'],
                    'description' => $productData['description'],
                    'image' => $productData['image'] ?? null,
                    'slug' => $productData['slug'] ?? null,
                ]);
            }
        }
    }
}
