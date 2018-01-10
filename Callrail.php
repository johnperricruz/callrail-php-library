<?php

/**
 * Author : John Perri Cruz
 * Desc : PHP Library for CallRail
 *
 */
 
	class Callrail{
		
		/**
		 * API URL
		 */
		protected $base_url = "https://api.callrail.com";
		protected $companies =  '/v1/companies.json';
		protected $calls =  '/v1/calls.json';
		protected $details ='/v1/calls/';
		
		protected $api_key = '';
		
		/**
		 * Set API Key from Callrail account
		 */
		function setApiKey($key){
			$this->api_key = $key;
		}
		
		/**
		 * Get API Key (For Debugging)
		 */		
		function getApiKey(){
			return $this->api_key;
		}		
		
		/**
		 * Curl Request
		 */
		function curlRequest($type,$params=""){
			$ch = '';
			
			//Company
			if($type == 'company'){
				$ch = curl_init($this->base_url.''.$this->companies.$params);
			}
			//Calls
			else if($type == 'calls'){
				$ch = curl_init($this->base_url.''.$this->calls.$params);
			}
			//Call Details
			else if($type == 'details'){
				$ch = curl_init($this->base_url.''.$this->details.$params.'.json');
			}
			
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Token token=\"{$this->api_key}\""));
			$json_data = curl_exec($ch);
			$parsed_data = json_decode($json_data);
			curl_close($ch);
			
			return $parsed_data;				 
		}
		
		/**
		 * Get Companies
		 */
		function getCompanies(){
			try{
				return $this->curlRequest("company")->companies;			
			}catch(Exception $e){
				return $e;
			}
		}		
		
		/**
		 * Get Calls
		 */
		function getCalls($params){
			try{
				return $this->curlRequest("calls",$params);				
			}catch(Exception $e){
				return $e;
			}
		}
		  
		/**
		 * Get Detailed Calls
		 */
		function getDetailedCalls($call_id){
			try{
				return $this->curlRequest("details",$call_id);				
			}catch(Exception $e){
				return $e;
			}
		}
		
	}
	
?>