<?php

namespace App\Http\Traits;

use App\Models\Campaign;
use App\Models\Country;
use App\Models\Money;
use App\Models\MoneyConvert;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Cache;

trait Utilities {

    public $hostReturn;
    
    /*
    public function convertMoney($amount, $money_id_of, $money_id_a) 
    {
        $recordBOB = Money::where('currency_iso', 'BOB')->first();
        $recordUSD = Money::where('currency_iso', 'USD')->first();

        if($money_id_of == $money_id_a)
        {
            return $amount; 
        }        
        if($money_id_of == $recordUSD->id or $money_id_a == $recordUSD->id)
        {
            if (MoneyConvert:: 
                where('money_id_of', '=', $money_id_of) 
                ->where('money_id_a', '=', $money_id_a)   
                ->exists()) 
            {
                $record = MoneyConvert:: 
                        where('money_id_of', '=', $money_id_of) 
                        ->where('money_id_a', '=', $money_id_a)    
                        ->first();
                $convert = (float)$amount * (float)$record->amount_sale;
                return $convert;
            } elseif (MoneyConvert:: 
                where('money_id_of', '=', $money_id_a) 
                ->where('money_id_a', '=', $money_id_of)   
                ->exists()) 
            {
                $record = MoneyConvert:: 
                        where('money_id_of', '=', $money_id_a) 
                        ->where('money_id_a', '=', $money_id_of)   
                        ->first();
                $convert = (float)$amount / (float)$record->amount_sale; // amount_buy
                return $convert;
            } else {
                return 0;
            }

        } elseif (MoneyConvert:: 
            where('money_id_of', '=', $recordUSD->id) 
            ->where('money_id_a', '=', $money_id_of)   
            ->exists()) 
        {
            // conver USD
            $record = MoneyConvert:: 
                        where('money_id_of', '=', $recordUSD->id)  
                        ->where('money_id_a', '=', $money_id_of) 
                        ->first();
            $convertUSD = (float)$amount / (float)$record->amount_buy;

            $record = MoneyConvert:: 
                    where('money_id_of', '=', $recordUSD->id)
                    ->where('money_id_a', '=', $money_id_a)
                    ->first();
            $convert = (float)$convertUSD * (float)$record->amount_sale;
            return $convert;
        } else {
            return 0;
        }
    }*/
    
    public function numberBreakdown($number)
    {
        $number = round($number, 1);
        $array = explode('.', $number);
        if(array_key_exists(1, $array))
        {
            if($array[1] >= 1 and $array[1] <= 5) 
            {
                $fraction = 0.5;
            } elseif($array[1] >= 6 and $array[1] <= 9) 
            {
                $fraction = 1;
            } 
            $int = intval($number);
            return (float)$int + (float)$fraction;
        } else {
            return $number;
        }
    }

    public function httpHostPoviyaPay()
    {
        if(env('APP_ENV') != 'production') {
            $this->hostReturn = 'http://poviya-pay.test';
        } else {
            $this->hostReturn = 'https://pay.poviya.com';
        }
        return $this->hostReturn;
    }

    public function httpHostYoSolidarioAgency()
    {
        $host = $_SERVER["HTTP_HOST"];
        if($host == 'yosolidario.test') {
            $this->hostReturn = 'http://yosolidario-agency.test';
        } elseif($host == 'yosolidario.com') {
            $this->hostReturn = 'https://agency.yosolidario.com';
        }
        return $this->hostReturn;
    }

    public function httpHostPoviya()
    {
        $host = $_SERVER["HTTP_HOST"];
        if($host == 'yosolidario.test') {
            $this->hostReturn = 'https://poviya.test';
        } elseif($host == 'yosolidario.com') {
            $this->hostReturn = 'https://poviya.com';
        }
        return $this->hostReturn;
    }

    public function httpHostYoSolidario()
    {
        if(env('APP_ENV') != 'production') {
            $this->hostReturn = 'http://yosolidario.test';
        } else {
            $this->hostReturn = 'https://yosolidario.com';
        }
        return $this->hostReturn;
    }

}