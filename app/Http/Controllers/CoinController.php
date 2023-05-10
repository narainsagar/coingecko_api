<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Coin;

class CoinController extends Controller
{
    public function getAll()
    {
        $coins = Coin::all();

        return response()->json($coins);
    }

    public function getByCoinId($coin_id)
    {
        $coin = Coin::where('coin_id', '=', $coin_id)->firstOrFail();

        if (!$coin) {
            return response()->json([
                'message' => 'Coin not found'
            ], 404);
        }

        return response()->json($coin);
    }

}
