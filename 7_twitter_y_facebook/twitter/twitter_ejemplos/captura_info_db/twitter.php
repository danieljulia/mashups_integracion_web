<?php


class twitterDB {
	private $conn;
	private $db;
	
	//crea la conexión con la base de datos
	public function  __construct($server,$user,$password,$db){
			$this->conn=mysql_connect($server, $user,$password) or die(mysql_error());
			$this->db=$db;
		
	}
	
	//borra todos los datos
	public function purge(){
		mysql_select_db($this->db, $this->conn);
		$result = mysql_query("delete  FROM `twitter`");

	}
	
	//mira si ya está guardado el twitt
	public function twittExiste($id){
		mysql_select_db($this->db, $this->conn);
		$result = mysql_query("SELECT * FROM twitts where twid='".$id."'");
		$row = mysql_fetch_array($result);

		if(isset($row['twid'])) return true;
		return false;
		
	}
	
	//guarda el twitt
	//es importante codificar los caracteres para evitar problemas con las comillas
	public function twittInsert($twid,$text,$from_user,$profile_image_url){
		mysql_select_db($this->db, $this->conn);
		$result = mysql_query("insert into twitts (twid,text,from_user,profile_image_url) values ('$twid','".urlencode($text)."','$from_user','$profile_image_url')");
		//mysql_close($this->conn);
		
		print mysql_error($this->conn);
	}
	
	//devuelve twitts de la base de datos
	public function twittGet($num=20){
		mysql_select_db($this->db, $this->conn);
		$result = mysql_query("SELECT * from twitts order by updated desc limit $num");
		$res=array();
	
		while ($row = mysql_fetch_array($result)) {
			$row['text']=urldecode($row['text']);
			$res[]=$row;
		}

		return $res;
	
	}
	
	
	
	
}