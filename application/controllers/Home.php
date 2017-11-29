<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                date_default_timezone_set('Asia/Jakarta');
				$date = date('m/d/Y h:i:s a', time());
        }



	public function index()
	{
		$this->load->model('Test_model');
		$key = $this->session->userdata('api_key');
		$secret = $this->session->userdata('secret_key');
		$result = $this->Test_model->btcid_query($key,$secret,'getInfo');
		// echo '<pre>';
		// $arr =  $result['return']['balance'];
		// print_r($arr);
		// echo '</pre>';

		// $btcIDR = $this->getPrice("https://vip.bitcoin.co.id/api/btc_idr/ticker");
		// $btcPrice = $btcIDR["ticker"]["last"];
		// $btcDisplay = round($btcPrice,2);
		// $angka = $btcPrice;
		// $format_angka = number_format($btcPrice, "2",",",".");

		// echo $format_angka;
		$this->load->view('home/index');
	}
	function getPrice($url){
		$decode = file_get_contents($url);
		return json_decode($decode, true);
	}

	public function btcidr_ticker(){
	 	$btcIDR = $this->getPrice("https://vip.bitcoin.co.id/api/btc_idr/ticker");
		$btcPrice = $btcIDR["ticker"];
		$btcDisplay = round($btcPrice,2);
		$btcPrice["last"] = number_format($btcPrice["last"], "0",",",".");
		$btcPrice["unit"] = " IDR";
		$btcPrice["vol_unit"] = " IDR";
		if($btcPrice["vol_idr"] > 1000000000){
			$btcPrice["vol_idr"] = $btcPrice["vol_idr"]/1000000000;
			$btcPrice["vol_unit"] = "bn IDR";
		}
		$btcPrice["server_time"] = date('m/d/Y h:i:s a', $btcPrice["server_time"]);
		$btcPrice["vol_idr"] = number_format($btcPrice["vol_idr"], "1",",",".");
		

		// echo $format_angka;

		echo json_encode($btcPrice);
	}

	public function stridr_ticker(){
	 	$strIDR = $this->getPrice("https://vip.bitcoin.co.id/api/str_idr/ticker");
		$strPrice = $strIDR["ticker"];
		$strDisplay = round($strPrice,2);
		$strPrice["last"] = number_format($strPrice["last"], "0",",",".");
		$strPrice["unit"] = " IDR";
		$strPrice["vol_unit"] = " IDR";
		if($strPrice["vol_idr"] > 1000000000){
			$strPrice["vol_idr"] = $strPrice["vol_idr"]/1000000000;
			$strPrice["vol_unit"] = "bn IDR";
		}
		$strPrice["server_time"] = date('m/d/Y h:i:s a', $strPrice["server_time"]);
		$strPrice["vol_idr"] = number_format($strPrice["vol_idr"], "1",",",".");
		

		// echo $format_angka;

		echo json_encode($strPrice);
	}

}
