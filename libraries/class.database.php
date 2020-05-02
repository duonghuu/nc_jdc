<?php if(!defined('_lib')) die("Error");
/*
	$config['servername'] = 'localhost';
	$config['username'] = 'root';
	$config['password'] = 'admin';
	$config['database'] = 'cafechoi';

	$d = new database($config);
	#$d->init($config);
	#$d->connect();
	
	// insert
	$data['ten'] = 'Danh mục 1';
	$data['mota'] = 'Mô tả cho Danh mục 1';
	$data['active'] = '0';

	if(!$d->insert($data)){
		$d->showError();
		$d->debug();
	}
	
	// update
	$data['active'] = '1';
	$d->setWhere("id",3);
	
	if(!$d->update($data)){
		$d->showError();
		$d->debug();
	}

	// select
	$d->setTable("pro_cat");
	$d->setWhere("id",3);
	$d->setOrder("id desc");
	$d->setLimit("0,3");
	
	if(!$d->select()){
		$d->showError();
		$d->debug();
	}else{
		var_dump($d->result_array());
	}

	// delete
	$d->setTable("pro_cat");
	$d->setWhere("id",3);
	$d->delete();
	
*/	
class database{
	public $detect;

	var $db;
	var $result;
	var $insert_id;
	var $sql = "";
	var $refix = "";

	var $servername;
	var $username;
	var $password;
	var $database;
	
	var $table = "";
	var $where = "";
	var $order = "";
	var $limit = "";
	
	var $error = array();

	function database($config = array()){
		if(!empty($config)){
			$this->init($config);
			$this->connect();
		}
	}

	function init($config = array()){
		foreach($config as $k=>$v)
			$this->$k = $v;
	}
	
	function connect(){
		$this->db = @mysql_connect($this->servername, $this->username, $this->password);
		
		if( !$this->db){
			die('Could not connect: ' . mysql_error());
		}
		
		if( !mysql_select_db($this->database, $this->db)){
			die(mysql_errno($this->db) . ": " . mysql_error($this->db));
			return false;
		}
		
		mysql_query('SET NAMES "utf8"',$this->db);
	}
	
	function query($sql=""){
		if($sql)
			$this->sql = str_replace('#_', $this->refix, $sql);
		$this->result = mysql_query($this->sql,$this->db);
		if(!$this->result){
			#die(mysql_errno($this->db) . ": " . mysql_error($this->db));
			die("syntax error: ".$this->sql);
		}
		return $this->result;	
	}
	
	function insert($data = array()){
		$key = "";
		$value = "";
		foreach($data as $k => $v){
			$key .= "," . $k;
			$value .= ",'" . $v  ."'";
		}
		if($key{0} == ",") $key{0} = "(";
		$key .= ")";
		if($value{0} == ",") $value{0} = "(";
		$value .= ")";
		$this->sql = "insert into ".$this->refix.$this->table.$key." values ".$value;
		$this->query();
		$this->insert_id = mysql_insert_id();
		return $this->result;
	}
	
	function update($data = array()){
		$values = "";
		foreach($data as $k => $v){
			$values .= ", " . $k . " = '" . $v  ."' ";
		}
		if($values{0} == ",") $values{0} = " ";
		$this->sql = "update " . $this->refix . $this->table . " set " . $values;
		$this->sql .= $this->where;
		return $this->query();
	}
	
	function delete(){
		$this->sql = "delete from " . $this->refix . $this->table . $this->where;
		return $this->query();
	}
	
	function select($str = "*"){
		$this->sql = "select " . $str;
		$this->sql .= " from " . $this->refix .$this->table;
		$this->sql .=  $this->where;
		$this->sql .=  $this->order;
		$this->sql .=  $this->limit;
		return $this->query();
	}
	
	function num_rows(){
		return mysql_num_rows($this->result);
	}
	 function num_fields ($query_id)
  	{   
	    return mysql_num_fields($query_id);
  	}
  
	function fetch_array(){
		return mysql_fetch_assoc($this->result);
	}
	
	function result_array(){
		$arr = array();
		while ($row = mysql_fetch_assoc($this->result)) 
			$arr[] = $row;
		return $arr;
	}
	
	function setTable($str){
		$this->table = $str;
	}
	
	function setWhere($key, $value=""){
		if($value!=""){
			if($this->where == "")
				$this->where = " where " . $key . " = '" . $value . "'";
			else
				$this->where .= " and " . $key . " = '" . $value ."'";
		}
		else{
			if($this->where == "")
				$this->where = " where " . $key ;
			else
				$this->where .= " and " . $key ;
		}
	}
	
	function setWhereOr($key, $value){
		if($value!=""){
			if($this->where == "")
				$this->where = " where " . $key . " = '" . $value."'";
			else
				$this->where .= " or " . $key . " = '" . $value."'";
		}
		else{
			if($this->where == "")
				$this->where = " where " . $key ;
			else
				$this->where .= " or " . $key ;
		}
	}
	
	function setOrder($str){
		$this->order = " order by " . $str;
	}
	
	function setLimit($str){
		$this->limit = " limit " . $str;
	}
	
	function setError($msg){
		$this->error[] = $msg;
	}
	
	function showError(){
		foreach($this->error as $value)
			echo '<br>'.$value;
	}
	
	function reset(){
		$this->sql = "";
		$this->result = "";
		$this->where = "";
		$this->order = "";
		$this->limit = "";
		$this->table = "";
	}
	
	function debug(){
		echo "<br> servername: ".$this->servername;
		echo "<br> username: ".$this->username;
		echo "<br> password: ".$this->password;
		echo "<br> database: ".$this->database;
		echo "<br> ".$this->sql;
	}
	
	/**
	 * Escape String
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function escape_str($str)	
	{	
		if (is_array($str))
    	{
    		foreach($str as $key => $val)
    		{
    			$str[$key] = $this->escape_str($val);
    		}
    		
    		return $str;
    	}
	
		if (function_exists('mysql_real_escape_string') AND is_resource($this->db))
		{
			return mysql_real_escape_string($str, $this->db);
		}
		elseif (function_exists('mysql_escape_string'))
		{
			return mysql_escape_string($str);
		}
		else
		{
			return addslashes($str);
		}
	}
	
	function xssClean($str){
		#$str = htmlentities($str, ENT_QUOTES, "UTF-8");
		$str = str_replace("'", '&#039;', $str);
		$str = str_replace('"', '&quot;', $str);
		$str = str_replace('<', '&lt;', $str);
		$str = str_replace('>', '&gt;', $str);
		#$str = addslashes($str);
		return $str;
	}

	function get_ip(){
		if (isset($_SERVER['HTTP_CLIENT_IP']))
	    {
	        $real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
	    }

	    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	    {
	        $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else
	    {
	        $real_ip_adress = $_SERVER['REMOTE_ADDR'];
	    }

	    return $cip = $real_ip_adress;
	}

	function get_nation(){

		$ip = $this->get_ip();
		$iptolocation = 'http://ipinfo.io/'.$ip.'/country';
		if($_SERVER['SERVER_NAME']!='localhost'){
			return $creatorlocation = file_get_contents($iptolocation);
		}

	}

	function get_browser_name()
    {
    	$user_agent = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
        elseif (strpos($user_agent, 'Edge')) return 'Edge';
        elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
        elseif (strpos($user_agent, 'Safari')) return 'Safari';
        elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
        elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
        return 'Other';
    }

    function get_fromto(){
		$form = $_SERVER['HTTP_REFERER'];
		$form = explode('//',$form);
		$form = explode('/',$form[1]);
		$domain = $_SERVER["SERVER_NAME"];
		if($form[0]!=$domain){
			return $form[0];
		} else {
			return '';
		}
	}

	function get_web(){
		$web = $this->get_fromto();
		if($web){
			$catchuoi = explode('.',$web);
			if($catchuoi[0]=='m' || $catchuoi[0]=='www'){
					return $catchuoi[1];
			} else {
					return $catchuoi[0];
			}
		}
	}

	function get_device(){
		$detect = new Mobile_Detect;
		if($detect->isMobile())
	    {
	        if ($detect->isTablet())
	        {
	            return "Tablet";
	        }
	        else
	        {
	        	return "Phone";    
	        }  
	    }
	    else
	    {
	        return "Computer";
	    }
	}

	function get_hdh(){
		    $result = 'Other';
		    $os = array(
		        '/windows nt 10.0/i' => 'Windows 10',
		        '/windows nt 6.3/i' => 'Windows 8.1',
		        '/windows nt 6.2/i' => 'Windows 8',
		        '/windows nt 6.1/i' => 'Windows 7',
		        '/windows nt 6.0/i' => 'Windows Vista',
		        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
		        '/windows nt 5.1/i' => 'Windows XP',
		        '/windows xp/i' => 'Windows XP',
		        '/windows nt 5.0/i' => 'Windows 2000',
		        '/windows me/i' => 'Windows ME',
		        '/win98/i' => 'Windows 98',
		        '/win95/i' => 'Windows 95',
		        '/win16/i' => 'Windows 3.11',
		        '/macintosh|mac os x/i' => 'Mac OS X',
		        '/mac_powerpc/i' => 'Mac OS 9',
		        '/linux/i' => 'Linux',
		        '/ubuntu/i' => 'Ubuntu',
		        '/iphone/i' => 'iPhone',
		        '/ipod/i' => 'iPod',
		        '/ipad/i' => 'iPad',
		        '/android/i' => 'Android',
		        '/blackberry/i' => 'BlackBerry',
		        '/webos/i' => 'Mobile'
		    );
		    $user_agent = $_SERVER['HTTP_USER_AGENT'];
		    foreach($os as $regex => $value) {
		        if(preg_match($regex, $user_agent)) {
		            $result = $value;
		            break;
		        }
		    }
		    return $result;
	}

	function get_hdh2(){
		    $result = 'Other';
		    $os = array(
		        '/windows nt 10.0/i' => 'Windows',
		        '/windows nt 6.3/i' => 'Windows',
		        '/windows nt 6.2/i' => 'Windows',
		        '/windows nt 6.1/i' => 'Windows',
		        '/windows nt 6.0/i' => 'Windows',
		        '/windows nt 5.2/i' => 'Windows',
		        '/windows nt 5.1/i' => 'Windows',
		        '/windows xp/i' => 'Windows',
		        '/windows nt 5.0/i' => 'Windows',
		        '/windows me/i' => 'Windows',
		        '/win98/i' => 'Windows',
		        '/win95/i' => 'Windows',
		        '/win16/i' => 'Windows',
		        '/macintosh|mac os x/i' => 'Mac OS',
		        '/mac_powerpc/i' => 'Mac OS',
		        '/linux/i' => 'Linux',
		        '/ubuntu/i' => 'Linux',
		        '/iphone/i' => 'IOS',
		        '/ipod/i' => 'IOS',
		        '/ipad/i' => 'IOS',
		        '/android/i' => 'Android',
		        '/blackberry/i' => 'BlackBerry',
		        '/webos/i' => 'Mobile'
		    );
		    $user_agent = $_SERVER['HTTP_USER_AGENT'];
		    foreach($os as $regex => $value) {
		        if(preg_match($regex, $user_agent)) {
		            $result = $value;
		            break;
		        }
		    }
		    return $result;
	}

}
?>