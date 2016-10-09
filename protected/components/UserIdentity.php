<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$conexion = Yii::app()->db;
		
		/*$consulta = "SELECT username, password FROM tbl_user where username='".$this->username."'AND password='".$this->password."'";*/

		$consulta = "SELECT username, password FROM tbl_user ";
		$consulta .= "WHERE username='".$this->username."'AND ";
		$consulta .= "password='".$this->password."'AND activo=1";

		$resultado = $conexion->createCommand($consulta)->query();
		$resultado->bindColumn(1, $this->username);
		$resultado->bindColumn(2, $this->password);		
		while ($resultado->read()!==false) {
			$this->errorCode = self::ERROR_NONE;
			RETURN !$this->errorCode;
		}

		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;*/

	}
}