<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(dirname(__FILE__)."/DropboxClient.php");

class Dx {
	public $dropbox;
	function __construct (){
		$this->dropbox = new DropboxClient(array(
			'app_key' => "3td137h4ogmr7vw", 
			'app_secret' => "s4obfh42j0mumgu",
			'app_full_access' => false,
		),'en');
		// first try to load existing access token
		$access_token = $this->load_token("access");
		if(!empty($access_token)) {
			$this->dropbox->SetAccessToken($access_token);
		} elseif(!empty($_GET['auth_callback'])) // are we coming from dropbox's auth page?
		{
			// then load our previosly created request token
			$request_token = $this->load_token($_GET['oauth_token']);
			if(empty($request_token)) die('Request token not found!');
			
			// get & store access token, the request token is not needed anymore
			$access_token = $this->dropbox->GetAccessToken($request_token);	
			$this->store_token($access_token, "access");
			$this->delete_token($_GET['oauth_token']);
		}
		// checks if access token is required
		if(!$this->dropbox->IsAuthorized())
		{
			// redirect user to dropbox auth page
			$return_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?auth_callback=1";
			$auth_url = $this->dropbox->BuildAuthorizeUrl($return_url);
			$request_token = $this->dropbox->GetRequestToken();
			$this->store_token($request_token, $request_token['t']);
			die("Authentication required. <a href='$auth_url'>Click here.</a>");
		}
	}
	public static function store_token($token, $name)
	{
		if(!file_put_contents("tokens/$name.token", serialize($token)))
			die('<br />Could not store token! <b>Make sure that the directory `tokens` exists and is writable!</b>');
	}
	public static function load_token($name)
	{
		if(!file_exists("tokens/$name.token")) return null;
		return @unserialize(@file_get_contents("tokens/$name.token"));
	}
	public static function delete_token($name)
	{
		@unlink("tokens/$name.token");
	}
	// public static function enable_implicit_flush()
	// {
	// 	@apache_setenv('no-gzip', 1);
	// 	@ini_set('zlib.output_compression', 0);
	// 	@ini_set('implicit_flush', 1);
	// 	for ($i = 0; $i < ob_get_level(); $i++) { ob_end_flush(); }
	// 	ob_implicit_flush(1);
	// 	echo "<!-- ".str_repeat(' ', 2000)." -->";
	// }
}
