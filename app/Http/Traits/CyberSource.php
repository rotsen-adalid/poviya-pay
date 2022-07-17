<?php
namespace App\Http\Traits;

trait CyberSource {
    public $HMAC_SHA256 = 'sha256';
    //  test
    /*
    public $SECRET_KEY = 'e900a9b1e2f745988d97102e95c9f32d299dc62dbfa84790aa176fb94d69440a44cd3933821c4647a0385551cf6fd137ca6177a1d0f845ca862b0b4c467bef65f7abcf5b51ee4fbe9d1b0a635628f077e9ccae723bd24fd097dd616b5716a2d9dea1fb9242754ebab73f58a47fd4b29858dfeb68fbcc49948b12d869d3ce9376';
    public $access_key = 'a228c5c36ab6353486d7a2c468f73c06';
    public $profile_id = 'E9747F8E-5F21-4E53-B300-927EAC49E206';
    */
    // production
    
    public $SECRET_KEY = '29499710c5644eb894ad4570d5d96058a859cba6a645474e9f556e454ed1f0995906d04889364d3080eef883dd562ac93d40c7abc7a347f58c32ee9e857fb8dd07f3b4f992fd4950a2dc23a38dde8b21b0e0e8e2405f424c89e4ea771fc3f7777749fc6fabc549afbc6164953f42329f8c44f9ec29114dea918dc6bf940ad39e';
    public $access_key = '47fd0808ac3039b3b57c87160dea2a2f';
    public $profile_id = 'E00FEC0B-376A-467D-AF8A-E6C026619265';
    
    // endpotint
    // test
    // https://testsecureacceptance.cybersource.com/silent/pay
    // prod
    // https://secureacceptance.cybersource.com/silent/pay

    // DeviceFingerPrint
    // test
    // 1snn5n9w
    // prod
    // k8vif92e

    public $transaction_uuid, $signed_field_names, $unsigned_field_names, $signed_date_time;
    public $transaction_type, $reference_number, $amount, $currency, $payment_method, $bill_to_forename, $bill_to_surname;
    public $bill_to_email, $bill_to_phone, $bill_to_address_line1, $bill_to_address_city, $bill_to_address_state;
    public $bill_to_address_country, $bill_to_address_postal_code, $merchant_defined_data1;
    public $submit;

    public $params = [];
    public $signInput;
    public $card_type, $card_number, $card_expiry_date, $card_cvv;

    public function signeddatafiels($data)
    {  
        $this->transaction_uuid = uniqid();
        $this->signed_field_names = 'access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,payment_method,bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone,bill_to_address_line1,bill_to_address_city,bill_to_address_state,bill_to_address_country,bill_to_address_postal_code,device_fingerprint_id,merchant_defined_data1,merchant_defined_data4,merchant_defined_data6,merchant_defined_data9,merchant_defined_data11,merchant_defined_data87,merchant_defined_data90,merchant_defined_data91';
        $this->unsigned_field_names = 'card_type,card_number,card_expiry_date,card_cvn';
        $this->signed_date_time = gmdate("Y-m-d\TH:i:s\Z");
        $this->locale = 'en';
        /*
        $this->transaction_type = 'sale';
        $this->reference_number = '1650841543199';
        $this->amount = 100.00;
        $this->currency = 'USD';
        $this->payment_method = 'card';
        $this->bill_to_forename = 'Rotsen Adalid';
        $this->bill_to_surname = 'Luque Copa';
        $this->bill_to_email = 'rotsen.adalid@hotmail.com';
        $this->bill_to_phone = '67020452';
        $this->bill_to_address_line1 = '1 Card Lane';
        $this->bill_to_address_city = 'My City';
        $this->bill_to_address_state = 'CA';
        $this->bill_to_address_country = 'US';
        $this->bill_to_address_postal_code = '94043';
        $this->submit = 'Submit';

        $this->merchant_defined_data1 = 'SI';
        */
        $data = [
            'access_key' => $this->access_key, 
            'profile_id' => $this->profile_id, 
            'transaction_uuid' => $this->transaction_uuid,
            'signed_field_names' => $this->signed_field_names,
            'unsigned_field_names' => $this->unsigned_field_names,
            'signed_date_time' => $this->signed_date_time,
            'locale' => $this->locale,

            'transaction_type' => $data['transaction_type'],
            'reference_number' => $data['reference_number'],
            'amount' => $data['amount'],
            'currency' =>  $data['currency'],
            'payment_method' =>  $data['payment_method'],
            'bill_to_forename' =>  $data['bill_to_forename'],
            'bill_to_surname' =>  $data['bill_to_surname'],
            'bill_to_email' =>  $data['bill_to_email'],
            'bill_to_phone' =>  $data['bill_to_phone'],
            'bill_to_address_line1' =>  $data['bill_to_address_line1'],
            'bill_to_address_city' =>  $data['bill_to_address_city'],
            'bill_to_address_state' =>  $data['bill_to_address_state'],
            'bill_to_address_country' =>  $data['bill_to_address_country'],
            'bill_to_address_postal_code' =>  $data['bill_to_address_postal_code'],
            'device_fingerprint_id' => $data['device_fingerprint_id'],

            'merchant_defined_data1' => $data['merchant_defined_data1'],
            'merchant_defined_data4' => $data['merchant_defined_data4'],
            'merchant_defined_data6' => $data['merchant_defined_data6'],
            'merchant_defined_data9' => $data['merchant_defined_data9'],
            'merchant_defined_data11' => $data['merchant_defined_data11'],
            'merchant_defined_data87' => $data['merchant_defined_data87'],
            'merchant_defined_data90' => $data['merchant_defined_data90'],
            'merchant_defined_data91' => $data['merchant_defined_data91'],

            'submit' => 'Submit'
        ];

        $params = [
            'data' => $data,
            'sign' => $this->sign($data)
        ];

        return $params;
    }

    public function sign($params) {
        return $this->signData($this->buildDataToSign($params), $this->SECRET_KEY);
    }
        
    public function signData($data, $secretKey) {
        return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
    }
    
    public function buildDataToSign($params) {
            $signedFieldNames = explode(",",$params["signed_field_names"]);
            foreach ($signedFieldNames as $field) {
                $dataToSign[] = $field . "=" . $params[$field];
            }
            return $this->commaSeparate($dataToSign);
    }
    
    public function commaSeparate ($dataToSign) {
        return implode(",",$dataToSign);
    }
}