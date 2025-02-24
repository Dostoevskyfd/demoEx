<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;
class CategorieSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::insert([
            [
                'text'=>'рисунок',

            ],
            [
                'text'=>'акварель',

            ],
            [
                'text'=>'гуашь',

            ],
            [
                'text'=>'другое',

            ],
        ]);
    }
}
