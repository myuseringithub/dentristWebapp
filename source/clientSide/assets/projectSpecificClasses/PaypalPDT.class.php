<?php

namespace SZN\_Specific; // should be on top.

if ( ! defined( 'ABSPATH' ) ) { exit; } // security measure

class PaypalPDT {

	public function __construct() {
	}

	public static function check_transaction(){

		global $wp_query;
		if (isset($wp_query->query_vars['tx']))
		{
			$tx = $wp_query->query_vars['tx'];
		}

		if(isset($tx) && $tx != 'Canceled')
		{
			 return self::get_paypal_transaction_info($tx);
		} elseif($tx == 'Canceled') {
			return 'Canceled';
		}
	}

	public static function get_paypal_transaction_info($tx) {

		//http://www.geekality.net/2010/10/19/php-tutorial-paypal-payment-data-transfers-pdt/
		// Init cURL
		$request = curl_init();
		$pdt_identity_token = 'A7iPw4nsfeamODFd1N9PEXOKMVSqGflTrh4QCLvBZ4LAb9tcOf3kdJka8TW';

		// Set request options
		curl_setopt_array($request, array
		(
			CURLOPT_URL => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
			CURLOPT_POST => TRUE,
			CURLOPT_POSTFIELDS => http_build_query(array
				(
					'cmd' => '_notify-synch',
					'tx' => $tx,
					'at' => $pdt_identity_token,
				)),
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_HEADER => FALSE,
			// CURLOPT_SSL_VERIFYPEER => TRUE,
			// CURLOPT_CAINFO => 'cacert.pem',
		));

		// Execute request and get response and status code
		$response = curl_exec($request);
		$status   = curl_getinfo($request, CURLINFO_HTTP_CODE);

		// Close connection
		curl_close($request);

		// check success or failure of uncoded response.
		// if($status == 200 AND strpos($response, 'SUCCESS') === 0)
		// {
		// 		// Further processing
		// }
		// else
		// {
		// 		// Log the error, ignore it, whatever
		// }

		$decodedResponse = self::decode_response($response);
		return $decodedResponse;
	}

	public static function decode_response($response) {

		// Remove SUCCESS part (7 characters long)
		$response = substr($response, 7);

		// URL decode
		$response = urldecode($response);

		// Turn into associative array
		preg_match_all('/^([^=\s]++)=(.*+)/m', $response, $m, PREG_PATTERN_ORDER);
		$response = array_combine($m[1], $m[2]);

		// Fix character encoding if different from UTF-8 (in my case)
		if(isset($response['charset']) AND strtoupper($response['charset']) !== 'UTF-8')
		{
			foreach($response as $key => &$value)
			{
				$value = mb_convert_encoding($value, 'UTF-8', $response['charset']);
			}
			$response['charset_original'] = $response['charset'];
			$response['charset'] = 'UTF-8';
		}

		// Sort on keys for readability (handy when debugging)
		ksort($response);

		return $response; // return decoded response
	}


}
