<?php 
	/**
	 * 
	 */
	class Database
	{
		private $type;
		private $host;
		private $dbname;
		private $user;
		private $password;
		private $charset;

		public function connect()
		{
			$this->type = 'mysql';
			$this->host = 'localhost';
			$this->dbname = 'buorso';
			$this->user = 'root';
			$this->password = '';
			$this->charset = 'utf8';

			try {
				$dsn = "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=".$this->charset;
				
				$pdo = new PDO($dsn, $this->user, $this->password);

				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				return $pdo;

			} catch (PDOException $e) {
				echo "Connection Failed: ".$e->getMessage();
			}

		}
	}
 ?>