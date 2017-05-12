<?php

namespace Christianhanggra\Bizzy\Template;

use PDF;
use GuzzleHttp\Client;
use Christianhanggra\Bizzy\Template\Model\User;

class Foo
{
	public function bar($arr)
	{
		return $arr;
	}

	public function users($limit=10)
	{
		return User::take($limit)->get();
	}

	public function getcurl($url)
	{	
		$client = new Client();
		try {
            $content = $client->get($url);
            if (empty($content)) return ['status' => false];
            $arr = json_decode(@$content->getBody(), true);
            return $arr;

        } catch (\Exception $e) {

            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
	}

}