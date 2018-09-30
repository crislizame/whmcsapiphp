<?php 
/**
 * Author Cristopher Lizame 2018 28 09 :/ grieta.net
 */
class Whmcslib
{
	private $curl;
	public $options;
	public $funtionname;
	private $url;
	private $username;
    private $password;
    private $email;//correo de un administrador no necesario
    private $password2;//password de un administrador no necesario

	function __construct()
	{
		$this->curl = curl_init();
		$this->url = 'https://webdetuwhmcs/includes/api.php';
		$this->username = 'privatekeydelapiwhmcs';
		$this->password = 'publickeydelapiwhmcs';
		$this->email = 'correo@correo.com';
		$this->password2 = 'contraseña';
	}
	public function getclients($limitstart = '0',$limitnum = '25',$sorting = 'ASC',$search = '')
	{
		curl_setopt($this->curl, CURLOPT_URL, $this->url);
		curl_setopt($this->curl, CURLOPT_POST, 1);
		curl_setopt(
    				$this->curl,
   				 	CURLOPT_POSTFIELDS,
    				http_build_query(
        			array(
				            'action' => 'GetClients',
				            'username' => $this->username,
				            'password' => $this->password,
				            'email' => $this->email,
				            'password2' => $this->password2,
				            'limitstart' => $limitstart,
				            'limitnum' => $limitnum,
				            'sorting' => $sorting,
				            'search' => $search,
				            'responsetype' => 'json',
				        )
				    )
					);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($this->curl);
		return json_decode($response);
	}
			public function crearfunction($functionname,$array = array(''))
	{
		$array['action']=$functionname;
		$array['username']=$this->username;
		$array['password']=$this->password;
		$array['responsetype']='json';
		curl_setopt($this->curl, CURLOPT_URL, $this->url);
		curl_setopt($this->curl, CURLOPT_POST, 1);
		curl_setopt(
    				$this->curl,
   				 	CURLOPT_POSTFIELDS,
    				http_build_query(
        			$array
				    )
					);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($this->curl);
		return json_decode($response);
	}
		public function getclientpassword($userid = '',$email = '')
	{
		curl_setopt($this->curl, CURLOPT_URL, $this->url);
		curl_setopt($this->curl, CURLOPT_POST, 1);
		curl_setopt(
    				$this->curl,
   				 	CURLOPT_POSTFIELDS,
    				http_build_query(
        			array(
				            'action' => 'GetClientPassword',
				            'username' => $this->username,
				            'password' => $this->password,
				            'email' => $email,
				            'userid' => $userid,
				            'responsetype' => 'json',
				        )
				    )
					);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($this->curl);
		return json_decode($response);
	}
}