# Short Url #

A CakePHP Component

## Requirements ##

* CakePHP 1.2.x, 1.3.x
* PHP 5.2.x, 5.3.x

## Features ##

*

## Documentation ##

Begin by placing the component in your controllers/components/ directory and then adding it to your AppController.

	public $components = array('ShortUrl');

	public function index() {
		echo $this->ShortUrl->GoogleUrl(urldecode('http://www.marcelosiqueira.com.br/'));
		echo $this->ShortUrl->Bitly(urldecode('http://www.marcelosiqueira.com.br/'));
		echo $this->ShortUrl->MigreMe(urldecode('http://www.marcelosiqueira.com.br/'));
	}
