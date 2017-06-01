<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index() {
     	$ip = request()->ip();
		$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));

		// $ch = curl_init(); 
  //       curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.amadeus.com/v1.2/location/code?apikey=Zx0rQKOX4tJhDAiwMLLn7ns6cUoK7336"); 

  //       //return the transfer as a string 
  //       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

  //       // $output contains the output string 
  //       $output = curl_exec($ch);

  //       echo $output;

    	return view('index')->with(array('myLocation' => $details));
    }

    function routes() {
    	$input = request()->all();
    	$airports = ['BHX', 'BRS', 'CWL', 'EMA', 'EXT', 'LGW', 'LHR', 'LTN', 'LBA', 'LPL', 'LCY', 'MAN', 'SEN', 'EDI', 'GLA', 'NCL', 'PIK', 'SOU', 'STN'];
    	return view('routes')->with(array('details' => $input, 'airports' => $airports));
    }

    function detail() {
    	return view('detail');
    }
}
