<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;        
use Illuminate\Database\Seeder;

class municipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("municipalitiesの作成を開始します...");

        $memberSplFileObject = new \SplFileObject(__DIR__ . '/municipalities.csv');
        $memberSplFileObject->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );

        foreach ($memberSplFileObject as $key => $row) {
            //excelでcsvを保存するとBOM付きになるので削除する
            if ($key === 0) {
                $row[0] = preg_replace('/^\xEF\xBB\xBF/', '', $row[0]);
            }

            DB::table('municipalities')->insert([
                'municipalities' => trim($row[0]),
                'prefectures_id' => (int) trim($row[1]),
                'municipalities_id' => (int) trim($row[2]),
                
            ]);
        }
        $this->command->info("municipalitiesを作成しました。");
    }
}