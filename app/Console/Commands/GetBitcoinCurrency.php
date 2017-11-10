<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Currency;
use Log;
class GetBitcoinCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get_bitcoin_currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get price of bitcoin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $start = microtime(true);

        $api = 'https://blockchain.info/ru/ticker';

        $json = file_get_contents($api);
        $obj = json_decode($json, true);

        $usd = floatval( number_format($obj['USD']['buy'],2,'.','') );
        $eur = floatval( number_format($obj['EUR']['buy'],2,'.','') );
        $gbp = floatval( number_format($obj['GBP']['buy'],2,'.','') );

        $currency = new Currency;

        $currency->usd = $usd;
        $currency->eur = $eur;
        $currency->gbp = $gbp;

        $currency->save();

        $time_spend = microtime(true) - $start;

        Log::useDailyFiles(storage_path().'/logs/bitcoin.log');

        $loginfo = [
            'time'          => $currency->created_at,
            'time_to_spend' => $time_spend,
            'api'           => $api,
        ];

        Log::info($loginfo);
    }
}
