<?php

namespace App\Http\Controllers\Api;

use App\Models\Prefectures;
use App\Http\Controllers\Controller;

class RandomTravelController extends Controller
{
    // 地方IDの選択画面を表示するメソッド
    public function showRegionSelection()
    {
        // 地域のリストを取得し、ビューに渡す
        $regions = Prefectures::select('region_id')->distinct()->get();
        return view('random_search', ['regions' => $regions]);
    }

    // 地方IDに基づいてランダムにデータを取得するメソッド
    public function getRandomData()
    {
        $regionId = request('region_id');

        // 地方IDが指定されている場合、その地方IDからランダムにデータを取得
        if ($regionId) {
            $query = Prefectures::where('region_id', $regionId);
        } else {
            // 地方IDが指定されていない場合はすべての都道府県からランダムにデータを取得
            $query = Prefectures::query();
        }

        $random = $query->inRandomOrder()->first();

        if (!$random) {
            return "データが見つかりませんでした";
        }

        return view('prefectures', ['data' => $random]);
    }
}