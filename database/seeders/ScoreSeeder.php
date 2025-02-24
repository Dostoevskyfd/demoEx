<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Score;
class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Score::insert([
        
        [
            'number'=>'1'
        ],
        [
            'number'=>'2'
        ],
        [
            'number'=>'3'
        ],
        [
            'number'=>'4'
        ],
        [
            'number'=>'5'
        ],
        [
            'number'=>'6'
        ],
        [
            'number'=>'7'
        ],
        [
            'number'=>'8'
        ],
        [
            'number'=>'9'
        ],
        [
            'number'=>'10'
        ],
      ]); 
    }
}
