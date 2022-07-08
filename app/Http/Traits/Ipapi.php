<?php
namespace App\Http\Traits;

use App\Models\Country;
use App\Models\Money;
use App\Models\MoneyConvert;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

trait Ipapi {
    
    public function ipapi0() {
        return [
            'country_code' => 'BO',
            'country_name' => 'Bolivia',
            'region_name' => 'La Paz',
            'latitude' => '0',
            'longitude' => '0',
            'location' => [
                'calling_code' => '591'
            ]
        ];
        
    }

    public function ipapi() {
        $response = Http::get('http://api.ipapi.com/181.115.131.227?access_key=0e99946c267616d45e2d737fc2e8dd17');
        $ipapi = $response->json();
        Cache::put('ipapi', $ipapi);
 
        if(Country::where('code', $ipapi['country_code'])->exists())
        {
            $countryCurrent = Country::where('code', $ipapi['country_code'])->first();
        } else 
        {
            $countryCurrent =  Country::where('code', 'US')->first();
        }

        //$countryCurrent =  Country::where('code', 'US')->first();
        
        Cache::put('countryCurrent', $countryCurrent);

        Cache::put('moneyCurrent', $countryCurrent->money);

        return $ipapi;
    }

    public function ipapiData()
    {
        $ipapi = [
            'country_code' => 'US',
            'country_name' => 'United States',
            'region_name' => 'New York',
            'city' => 'La Brooklyn',
            'latitude' => '0',
            'longitude' => '0',
            'location' => [
                'calling_code' => '1'
            ]
        ];
        
        if (Cache::has('countryCurrent')) {
            $ipapi = Cache::get('countryCurrent');
        } else {
            //$record = Money::where('currency_iso', 'USD')->first();
            $ipapi = $this->ipapi();
        }
    
        //$ipapi = Cache::get('countryCurrent');
        return $ipapi;
    }

    public function moneyData()
    {
        
        if (Cache::has('moneyCurrent')) {
            $record = Cache::get('moneyCurrent');
        } else {
            $record = Money::where('currency_iso', 'USD')->first();
        }

        return $record;
    }
}
