<?php

namespace Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields;

use Mare06xa\Geckoboard\Abstracts\DatasetFieldSQL;

class Money extends DatasetFieldSQL
{
    protected $currency;

    public function __construct()
    {
        $this->type  = self::MONEY;

        $this->rules = [
            $this->name     => 'integer',
            'currency_code' => 'string|size:3|regex:/^AED|AFN|ALL|AMD|ANG|AOA|ARS|AUD|AWG|AZN|BAM|BBD|BDT|BGN|BHD|BIF|BMD|BND|BOB|BRL|BSD|BTN|BWP|BYR|BZD|CAD|CDF|CHF|CLP|CNY|COP|CRC|CUC|CUP|CVE|CZK|DJF|DKK|DOP|DZD|EGP|ERN|ETB|EUR|FJD|FKP|GBP|GEL|GGP|GHS|GIP|GMD|GNF|GTQ|GYD|HKD|HNL|HRK|HTG|HUF|IDR|ILS|IMP|INR|IQD|IRR|ISK|JEP|JMD|JOD|JPY|KES|KGS|KHR|KMF|KPW|KRW|KWD|KYD|KZT|LAK|LBP|LKR|LRD|LSL|LYD|MAD|MDL|MGA|MKD|MMK|MNT|MOP|MRO|MUR|MVR|MWK|MXN|MYR|MZN|NAD|NGN|NIO|NOK|NPR|NZD|OMR|PAB|PEN|PGK|PHP|PKR|PLN|PYG|QAR|RON|RSD|RUB|RWF|SAR|SBD|SCR|SDG|SEK|SGD|SHP|SLL|SOS|SPL|SRD|STD|SVC|SYP|SZL|THB|TJS|TMT|TND|TOP|TRY|TTD|TVD|TWD|TZS|UAH|UGX|USD|UYU|UZS|VEF|VND|VUV|WST|XAF|XCD|XDR|XOF|XPF|YER|ZAR|ZMW|ZWD$/',
            'optional'      => 'boolean',
        ];
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    public function isOptional()
    {
        $this->isOptional = true;

        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function toArray()
    {
        $baseArray = parent::toArray();

        $baseArray['currency_code'] = $this->getCurrency();
        $baseArray['optional'] = $this->isOptional;

        return $baseArray;
    }
}
