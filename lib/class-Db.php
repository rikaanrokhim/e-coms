<?php
class Db {
	var $db = null; //deklarasi public $db . var => modifier sbg public 
	public function __construct() // construc sbg dasar. otomatis kepanggil 
	{ // konsepnya (try,cacth) ketikan salah satu error, maka yang lain masih bisa jalan .
		try { // coba .. seperti if, else
			$this->db = new PDO("mysql:host=localhost;dbname=ecoms","root","");
			$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
			// atribut pdo error exception, jadi kalo ada error langsung ditangkep
		} catch (PDOException $e) {
			die("Connection Error :".$e->getMessage());
		}
	}
	//keluaran
	function query($q) { // ini adalah pacuannya
		$query = $this->db->prepare($q);
		$query->execute();
		return $query;
	}
	//menampilakn semuanya (*)
	function select($t, $f="*") {
		$query = $this->db->prepare("select $f from $t");
		$query->execute();
		return $query;
	}
	//insert data
	function insert($t, $f) {
		$query = $this->db->prepare("insert into $t values($f)");
		$query->execute();
	}
	function update($t, $f) {
		$query = $this->db->prepare("update $t set $f");
		$query->execute();
	}
	function delete($t) {
		$query = $this->db->prepare("delete from $t");
		$query->execute();
	}
	function nur($q) { // number of rows
		return $data=$q->rowCount();
	}
	function paging($q, $L, $p) { // paginasi
		$of = ($p-1)*$L;
		$query = $this->query("$q limit $of,$L");
		$jumlah = ceil($this->nur($this->query($q))/$L);
		$paging = array("query"=>$query,"jumlah"=>$jumlah,"no"=>$of);
		return $paging;
	}
	function nav($url,$j,$p){ // sepaket dengan paging, yang menmapilakn angka
		echo "<div class=pagination>";
		for ($i = 1; $i <= $j; $i++){
			if ($i == $p)echo "<a href=# class=active> <span >$i</span></a>";
			else echo "<a href='$url&page=$i'>$i</a>";
		}
		echo "</div>";
}
function sant($type) {//sanitize, untuk keamanan, unutk memfilter ada hacker atau tidak
	$data = filter_input_array($type,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	return $data;
}
}
	$odb = new Db(); // ketika new Db, otomatis si construc	akan kepanggil

?>