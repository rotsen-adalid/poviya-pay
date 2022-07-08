<?php

namespace App\Http\Livewire\Yosolidario\Fundraising;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Http\Traits\Utilities;
use App\Models\Campaign;
use App\Models\CampaignReward;
use App\Models\Money;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardExpirationMonth;
use App\Http\Traits\Ipapi;
use Illuminate\Support\Facades\App;

class RegisterFundraisingYosolidario extends Component
{
    use Ipapi;
    use Utilities;

    public $s3 = 'https://fanspi.s3.amazonaws.com/';
    public $paymentOrder, $campaign, $campaignReward, $campaignSetting, $campaignImage, $campaignUser;
    public $campaign_reward_id;

    public $country;
    public $user, $image, $title;
    public $code_collection;
    // data ys
    public $amount_pay, $money_pay, $amount_transaction, $money_transaction, $amount_percentage_yosolidario, $amount_total, $amount_yosolidario = 0;

    public $collection_countries_phone, $collection_countries, $collection_country_states = [], $country_phone_id = 1, $phone_prefix, $phone;
    public $name, $lastname, $show_name, $email, $country_id = 1, $country_state_id, $payment_method_ys = 'CARD_CYBERSOURCE', $commentary;
    public $address, $city, $postal_code;
    public $identification;
    public $type_payment = 'ONE_TIME';
    public $collaborate_min = 1, $collaborate_max = 1000;
    public $money, $moneyCurrent;

    // card
    public $cardData, $card_type, $card_number, $card_yy, $card_mm, $card_cvn, $card_expiry_date;
    public $params = [], $signInput;

    // cybersource
    public $merchant_defined_data1;

    // form
    public $formInfo = true, $formCard = false;

    public $device_fingerprint_id;

    // language
    public $lang;

    public function  mount($code_collection, $device_fingerprint_id)
    {
        $responsePaymentOrder = Http::post($this->httpHostYoSolidario().'/api/payment_order/petition/code_collection',[
            'code_collection' => $code_collection
            ]);
        $this->payment_order =  collect($responsePaymentOrder->json());     //dd($this->payment_order);
        
        // money
        $responseMoney = Http::post($this->httpHostYoSolidario().'/api/money',[
            'money_id' => $this->payment_order['data']['money_pay_id']
            ]);
        $this->money_pay = collect($responseMoney->json());

        //card
        $this->card_type;
        $this->card_mm = date("m");
        $this->card_yy = date("Y");

        //$this->amountPayment();
    }

    public function render()
    {
        return view('livewire.yosolidario.fundraising.register-fundraising-yosolidario');
    }

    public function collectionCountries()
    {
        $responseCountriesPhonePrefix = Http::get($this->httpHostYoSolidario().'/api/countries/phone_prefix');
        $this->collection_countries_phone = $responseCountriesPhonePrefix->json(); //dd($this->collection_countries_phone);

        $responseCountries = Http::get($this->httpHostYoSolidario().'/api/countries');
        $this->collection_countries = $responseCountries->json();                   //dd($this->collection_countries);
    }


    protected function rules(){

        $code = $this->countryOne();
        if($code == 'BO')
        {
            $this->postal_code = '0000';
        }
        // validate
        return [
            //'amount_pay' => "required|numeric|between:$this->collaborate_min,$this->collaborate_max",
            'amount_pay' => 'required|numeric|between:5,1000',
            'name' => 'required',
            'lastname' => 'required',
            'identification' => 'required|min:5|max:20',
            'email' => 'nullable|email',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required | numeric',
            'payment_method_ys' => 'required',
            'country_state_id' => 'required',
            'postal_code' => 'required | numeric',

            //'card_number' => 'required | numeric',
            //'card_yy' => 'required',
            //'card_mm' => 'required',
            //'card_cvn' => 'required | numeric',

            //'card_number' => ['required', new CardNumber], //'unique:cards,cardNo', 
            //'card_yy' => ['required', new CardExpirationYear($this->card_mm)],
            //'card_mm' => ['required', new CardExpirationMonth($this->card_yy)],
            //'card_cvn' => ['required', new CardCvc($this->card_number)]
        ];
    }
    protected $messages = [
        //'agency_id.required' => 'The country field is required.',
        //'title.required' => 'The title field is required.',
    ];

    protected $validationAttributes = [
        'amount_pay' => '',
        'name' => '',
        'lastname' =>'',
        'identification' => '',
        'show_name' => '',
        'email' => '',
        'city' => '',
        'address' => '',
        'city' => '',
        'phone' => '',
        'payment_method_ys' => '',
        'country_state_id' => '',
        'postal_code' => '',
    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function pay()
    {
        $this->validate();

        if(Auth()->id())
        {
            $this->merchant_defined_data1 = 'YES';
        } else {
            $this->merchant_defined_data1 = 'NO';
        }

        $value = $this->transaction();
        
        /*
        if($this->payment_method_ys == 'CARD_CYBERSOURCE' and $value['error'] == 0) { 
            $this->code_collection = $value['code_collection'];
            $params = [
                
                'transaction_type' => 'sale',
                'reference_number' => $this->code_collection,
                'amount' => $this->amount_transaction,
                'currency' => $this->money_transaction['currency_iso'],
                'payment_method' => 'card',
                'bill_to_forename' => $this->name,
                'bill_to_surname' => $this->lastname,
                'bill_to_email' => $this->email,
                'bill_to_phone' => $this->phone,
                'bill_to_address_line1' => $this->address,
                'bill_to_address_city' => $this->city,
                'bill_to_address_state' => $this->countryStateOne(),
                'bill_to_address_country' => $this->countryOne(),
                'bill_to_address_postal_code' => $this->postal_code,
                'device_fingerprint_id' => $this->device_fingerprint_id,

                'merchant_defined_data1' => $this->merchant_defined_data1,
                'merchant_defined_data4' => date("d") . date("m").date("Y"),
                'merchant_defined_data6' => 'NO',
                'merchant_defined_data9' => 'Pagina web', //Correo electrónico, Red Social, Pagina Web
                'merchant_defined_data11' => $this->identification,
                'merchant_defined_data87' =>  $this->code_collection,
                'merchant_defined_data90' => 'Suscripcion',
                'merchant_defined_data91' => $this->amount_transaction
            ];

            $responseSigneddatafileds = Http::post($this->httpHostYoSolidario().'/api/cybersource/signeddatafields', $params);

            $values = $responseSigneddatafileds->json();
           
            $this->params = $values['data'];   
            $this->signInput = $values['sign']; //dd($this->signInput);
            $this->card_expiry_date = $this->card_mm.'-'.$this->card_yy;
            $this->card_number = str_replace(' ', '', $this->card_number);
            $this->card_cvn = str_replace(' ', '', $this->card_cvn);

            $card_type_number = substr($this->card_number, 0, 1);
            if($card_type_number == 4)
            {
                $this->card_type = '001';
            } elseif($card_type_number == 5)
            {
                $this->card_type = '002';
            }

            $this->formCard = true;
            $this->formInfo = false;

            //if($responsePaymentOrder['error'] == 0)
            //{
                //return redirect()->route('collaborate/campaign/success/payment');
            //}
        } else {
            $this->emit('bannerDanger', 'Error!');
        }*/
        return redirect()->to($this->httpHostPoviyaPay().'/service/ys/f/checkout/'.$value['code_collection'].'/'.$this->lang);
    }

    public function transaction()
    {
        if($this->show_name) {
            $show_name = 'YES';
        } else {
            $show_name = 'NO';
        }

        if($this->user)
        {
            $this->user = $this->user;
        }
       
        $data = collect([
            'amount_pay' => $this->amount_pay,
            'money_pay_id' => $this->money_pay['id'],
            'amount' => $this->amount,
            'money_id' => $this->money['id'],
            'amount_transaction' => $this->amount_transaction,
            'money_transaction_id' => $this->money_transaction['id'],

            'user_id' => $this->user['id'],
            'campaign_id' => $this->campaign['id'],
            'campaign_reward_id' => $this->campaign_reward_id,
            'ipapi' => null,
            
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'city' => $this->city,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'country_id' => $this->country_id,
            'country_state_id' => $this->country_state_id,
            'country_phone_id' => $this->country_phone_id,
            'phone' => $this->phone,
            'show_name' => $show_name,
            'commentary' => $this->commentary,

            'payment_method' => 'CARD',
            'type_transaction' => 'PROD',

            'card_number' => $this->card_number,
            'card_mm' => $this->card_mm,
            'card_yy' => $this->card_yy,
            'card_cvn' => $this->card_cvn
            ]);
            //dd($data);
        $responsePaymentOrder = Http::post($this->httpHostYoSolidario().'/api/payment_order/fundraising/create-form', $data);
       
        return $responsePaymentOrder;  
    }
    
    public function cancelTrasaction()
    {
        $this->formInfo = true;
        $this->formCard = false;
    }

    public function verifieldCodeCollection()
    {
        $responsePaymentOrder = Http::post($this->httpHostYoSolidario().'/api/payment_order/petition/code_collection', [
            'code_collection' => $this->code_collection,
        ]);
        
        if($responsePaymentOrder['error'] != 0)
        {
            //return redirect()->route('home'); 
            return redirect()->to($this->httpHostYoSolidario());
        }
    }

    public function countryPrefix()
    {
        if($this->country_phone_id)
        {
            //$record = Country::findOrFail($this->country_phone_id);
            //$this->phone_prefix = $record->phone_prefix;
            foreach($this->collection_countries_phone as $item)
            {
                if($item['id'] == $this->country_phone_id)
                {
                    $this->phone_prefix = $item['phone_prefix'];
                }
            }

        }
    }
    
    public function countryStates()
    {
        if($this->country_id > 0)
        {   
            $responseCountryStates= Http::post($this->httpHostYoSolidario().'/api/country/states', [
                'country_id' => $this->country_id,
            ]);
            $this->country_state_id = null;
            $this->collection_country_states = $responseCountryStates->json(); //dd($this->collection_country_states);
        }
    }

    public function countryOne()
    {
        if($this->country_id)
        {
            foreach($this->collection_countries as $item)
            {
                if($item['id'] == $this->country_id)
                {
                    $code = $item['code'];
                }
            }
            return $code;
        }
    }

    public function countryStateOne()
    {
        if($this->country_state_id > 0)
        {  
            foreach($this->collection_country_states as $item)
            {
                if($item['id'] == $this->country_state_id)
                {
                    $code = $item['code'];
                }
            }
            return $code;
        }
    }

    public function amountPayment()
    {
        $responseMoney = Http::post($this->httpHostYoSolidario().'/api/money-iso',[
                            'iso' => 'USD'
                            ]);
        $moneyUSD =  collect($responseMoney->json());

        $responseMoney = Http::post($this->httpHostYoSolidario().'/api/money-iso',[
                    'iso' => 'BOB'
                    ]);
        $moneyBOB =  collect($responseMoney->json());

        if($this->campaignReward->count() > 0)
        {  
            $this->campaign_reward_id = $this->campaignReward['id'];
            $this->amount_pay = $this->campaignReward['amount'];
        } else {
            $this->amount_pay = 5;
        }
        
        $this->amount_pay = $this->convertMoney($this->amount_pay, $this->campaign['campaign_balance']['money']['id'], $this->money_pay['id']);
        $this->amount_pay = $this->numberBreakdown($this->amount_pay);
        
        $this->amount = $this->convertMoney($this->amount_pay, $this->money_pay['id'], $moneyUSD['id']);
        $this->money = $moneyUSD;

        $this->amount_transaction = $this->convertMoney($this->amount_pay, $this->money_pay['id'], $moneyBOB['id']);
        $this->amount_transaction = $this->numberBreakdown($this->amount_transaction);
        $this->money_transaction = $moneyBOB;
    }

    public function getTotalPayProperty()
    {
        if($this->amount_pay)
        {
            $amount = $this->amount_pay;
        } else {
            $amount = 0;
        }
        return $amount;
    }
}
