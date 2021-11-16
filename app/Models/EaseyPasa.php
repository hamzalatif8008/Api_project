<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EaseyPasa extends Model
{
    use HasFactory;
    private $HOST ;           // your host
	private $URL  ; //          ='https://uexel.com'; // url
	private $STORE_ID ; //      ='1234';   // your store id
	private $HASH_KEY ; //     ='23222sdfsafsf'; // your hash key
	private $STORE_NAME ; //     ='storename';        ///your store name
	private $EXPIRY_DATE ; ///   ='10'; /// days to expire
	private $ORDER_PREFIX ; //  ='cd';
	private $LIVE          ; // ='no';
	private $PAYMENT_METHOD ; // =''; // null for all payment methods
    private $AUTO_REDIRECT ; // = '0'; // 
    

    function __construct()
    {
        $this->HOST            ="http://planetsid.com/";
        $this->URL             ="http://planetsid.com/";
        $this->STORE_ID        ="store id";
        $this->HASH_KEY        ="hashkeygdf";
        $this->STORE_NAME      ="store";
        $this->EXPIRY_DATE     ="10";
        $this->ORDER_PREFIX    ="pfx";
        $this->LIVE            ="no";
        $this->PAYMENT_METHOD  ="";
        $this->AUTO_REDIRECT   ="0";
    }
}