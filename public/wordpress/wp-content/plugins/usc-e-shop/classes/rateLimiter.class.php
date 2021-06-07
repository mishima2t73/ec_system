<?php

class RateLimiter {

	var $folder_log_path;
	var $login_failed_log_path;
	var $ip_blocked_path;
	var $monitoring; // minutes
	var $num_of_errors;
	var $rejection_time; //minutes
	var $status;

	function __construct()
	{

		$this->folder_log_path = USCES_WP_CONTENT_DIR .'/uploads/usces_logs/';
		$this->login_failed_log_path = $this->folder_log_path . 'member_login_failed.log';
		$this->ip_blocked_path = $this->folder_log_path . 'ip_addresses_blocked.log';

		//get brute force config
		$options = get_option( 'usces_ex' );
		$this->monitoring = ( !isset( $options['system']['brute_force']['monitoring_span'] ) ) ? 5 : (int)$options['system']['brute_force']['monitoring_span'];
		$this->num_of_errors = ( !isset( $options['system']['brute_force']['num_of_errors'] ) ) ? 3 : (int)$options['system']['brute_force']['num_of_errors'];
		$this->rejection_time = ( !isset( $options['system']['brute_force']['rejection_time'] ) ) ? 10 : (int)$options['system']['brute_force']['rejection_time'];
		$this->status = ( !isset( $options['system']['brute_force']['status'] ) ) ? 0 : (int)$options['system']['brute_force']['status'];

		if($this->status){
			$this->initLogsFolder();
		}
	}

	function checkBlockIP(){
		if($this->status){
			try{
				$ip = $_SERVER['REMOTE_ADDR'];
				$data = $this->getLoginFailedDataByIP($ip);
				$ip_blocked = $this->getIpAddressesBlocked();

				if(isset($ip_blocked[$ip]) && (strtotime("-{$this->rejection_time} minutes") < $ip_blocked[$ip])){
					$this->saveLoginFailed();
					return true;
				}

				if(count($data)){
					$count = 0;
					foreach ($data as $key => $value){
						if(strtotime("-{$this->monitoring} minutes") < $key){
							$count += $value;
						}
					}
					if($count >=  $this->num_of_errors){
						$ip_blocked[$ip] = strtotime('now');
						file_put_contents($this->ip_blocked_path, json_encode($ip_blocked));
						return true;
					}
				}
			}
			catch (Throwable $exception){

			}
		}
		return false;
	}

	public  function saveLoginFailed(){
		try{
			if($this->status){
				$ip = $_SERVER['REMOTE_ADDR'];

				$content = $this->getLoginFailedData();
				$row = $this->getLoginFailedDataByIP($ip);

				$row[strtotime("now")] = (isset($row[strtotime("now")])) ? ($row[strtotime("now")] + 1) : 1;

				if(count($row) > $this->num_of_errors){
					unset($row[array_key_first($row)]);
				}
				$content[$ip] = $row;
				file_put_contents($this->login_failed_log_path,json_encode($content));
			}
		}
		catch (Throwable $exception){

		}
	}

	function getLoginFailedData(){
		return (file_exists($this->login_failed_log_path)) ? json_decode(file_get_contents($this->login_failed_log_path), true) : [];
	}

	function getLoginFailedDataByIP($ip){
		$content = $this->getLoginFailedData();
		return (isset($content[$ip])) ? $content[$ip] : [];
	}
	function getIpAddressesBlocked(){
		return (file_exists($this->ip_blocked_path)) ? json_decode(file_get_contents($this->ip_blocked_path), true) : [];
	}

	function initLogsFolder(){
		if(!is_dir($this->folder_log_path)){
			mkdir($this->folder_log_path,0775);
		}
	}
}
