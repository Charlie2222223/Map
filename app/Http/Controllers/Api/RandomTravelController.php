<?php

// app/Http/Controllers/Api/RandomTravelController.php

namespace App\Http\Controllers\Api;

use App\Models\Prefectures;
use App\Models\Municipalities;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RandomTravelController extends Controller
{
    public function getRandomData(Request $request)
    {
        $regionId = $request->input('region_id');

        if ($regionId) {
            $query = Prefectures::where('region_id', $regionId);
        } else {
            $query = Prefectures::query();
        }

        $randomPrefecture = $query->inRandomOrder()->first();

        if (!$randomPrefecture) {
            return response()->json(['error' => 'データが見つかりませんでした'], 404);
        }

        $randomMunicipality = Municipalities::where('prefectures_id', $randomPrefecture->id)
            ->inRandomOrder()
            ->first();

        if (!$randomMunicipality) {
            return response()->json(['error' => '市町村データが見つかりませんでした'], 404);
        }

        return response()->json([
            'data' => [
                'prefectures' => $randomPrefecture->prefectures,
                'municipalities' => $randomMunicipality->municipalities,
                'detail' => 'ここに詳細情報が入ります。'
            ]
        ]);
    }
}