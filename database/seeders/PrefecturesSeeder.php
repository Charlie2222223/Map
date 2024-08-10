<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;        
use Illuminate\Database\Seeder;

class PrefecturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("prefecturesの作成を開始します...");

        $memberSplFileObject = new \SplFileObject(__DIR__ . '/prefectures.csv');
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

            DB::table('prefectures')->insert([
                'id' => (int) trim($row[0]),
                'prefectures' => trim($row[1]),
                'region_id' => trim($row[2])
            ]);
        }
        $this->command->info("prefecturesを作成しました。");
    }
}
