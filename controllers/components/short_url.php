<?php 
<?php
/** 
* Short Url (Bitly, MigreMe and Google)
*
* A CakePHP Component. 
*
* @author       Marcelo Siqueira - http://marcelosiqueira.com.br
* @copyright    Copyright 2000-2011, IPê Multimidia.
* @license      http://opensource.org/licenses/mit-license.php - Licensed under The MIT License
* @link         
*/

// Let's use HttpSocket
App::import('Core', 'HttpSocket');

class ShortUrlComponent extends Object {
    public $Http = false;
    
    function Bitly($longURL){        
		$login   = 'bitlyapidemo'; //change you Bitly login
		$apiKey  = 'R_0da49e0a9118ff35f52f629d2d71bf07'; //change you Bitly apiKey
	    $baseURL = 'http://api.bit.ly/v3/shorten?login='.$login.'&apiKey='.$apiKey;
        // Start a new Socket
        $HttpSocket = new HttpSocket();

        $results = json_decode($HttpSocket->get($baseURL . '&longUrl=' . $longURL), true);
        
        if(strlen(trim($results['data']['url'])) > 0){
            return $results['data']['url'];
        }else{
			return false;
        }
    }

    function MigreMe($longURL){        
	    $baseURL = 'http://migre.me/';

        // Start a new Socket
        $HttpSocket = new HttpSocket();
        
        $results = $HttpSocket->get($baseURL . 'api.txt?url=' . $longURL);
        
        if(strlen(trim($results)) > 0){
            return $results;
        }else{
			return false;
        }
    }

    function GoogleUrl($longURL){
	    $baseURL = 'http://goo.gl/api/url';
	    $user = 'toolbar@google.com';

        // Start a new Socket
        $HttpSocket = new HttpSocket();
        
		$results = json_decode($HttpSocket->post($baseURL, array('user' => $user, 'url' => $longURL)), true);  
		
		if(strlen(trim($results['short_url'])) > 0){
			return $results['short_url'];
        }else{
			return false;
        }
    }
}
