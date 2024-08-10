<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    public function run()
    {
        DB::table('region')->insert([
            ['id' => 1, 'region' => '北海道'],
            ['id' => 2, 'region' => '東北'],
            ['id' => 3, 'region' => '関東'],
            ['id' => 4, 'region' => '中部'],
            ['id' => 5, 'region' => '近畿'],
            ['id' => 6, 'region' => '中国'],
            ['id' => 7, 'region' => '四国'],
            ['id' => 8, 'region' => '九州'],
        ]);
    }
}