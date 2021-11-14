<?php 

class Login
{
	public static function isLoggedIn(){
		if(isset($_COOKIE['BUIDT'])){
			$token = new Queries('sessions');
			// BUIDT = Buorso User ID Token
			if($results = $token->select('user_id', 'token', hash('sha256', $_COOKIE['BUIDT']))){
				$data = $results->fetch();
				return $data['user_id'];
			}
		}
		return false;
	}
}

?>