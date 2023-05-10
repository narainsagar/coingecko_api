<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class FetchCoinGecko extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:coingecko';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch data from Coingecko API and store in the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://api.coingecko.com/api/v3/coins/list?include_platform=true');

        if ($response->ok()) {
            $coins_records = array();

            $coins = $response->json();
            foreach ($coins as $coin) {
                array_push($coins_records, [
                    'coin_id' => $coin['id'],
                    'symbol' => $coin['symbol'],
                    'name' => $coin['name'],
                    'platforms' => json_encode($coin['platforms'], JSON_FORCE_OBJECT),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::table('coins')->upsert($coins_records, 'coin_id');

            $this->info('Coins data fetched successfully.');
        } else {
            $this->error('Failed to fetch coins data.');
        }

        return 0;
    }
}
