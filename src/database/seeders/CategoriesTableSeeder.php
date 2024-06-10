<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
 use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // FOREIGN_KEY_CHECKS OFF
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Data Delete
        Category::truncate();

        // 外FOREIGN_KEY_CHECKS ON
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $records = [
                        [ 'id' => 1,
                         'content' => '商品のお届けについて',
                        ],
                      [ 'id' => 2,
                         'content' => '商品の交換について',
                        ],
                      [ 'id' => 3,
                         'content' => '商品トラブル',
                        ],
                        [ 'id' => 4,
                         'content' => 'ショップへのお問い合わせ',
                        ],
                        [ 'id' => 5,
                         'content' => 'その他',
                        ],
                       ];
                        foreach ($records as $record) {
                              Category::create($record);
                        }
                      
    }
}
