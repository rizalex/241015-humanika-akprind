<?php

include_once 'koneksi.php';

class UserController {

    private $koneksi;

    public function __construct() {
        $this->koneksi = Database::connect();
    }

    
    public function DaftarLevel() {
        try {
            $sst = $this->koneksi->prepare("select * from admin_level");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function TambahLevel($level) {
        try {
            $sst = $this->koneksi->prepare("INSERT INTO admin_level(
            level)
    VALUES (?);");        
            $sst->bindparam(1, $level);;
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function HapusLevel($key) {
        try {
            $sst = $this->koneksi->prepare("DELETE from admin_level where id_level='$key'");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function TampilEditLevel($key) {
        try {
            $sst = $this->koneksi->prepare("select * from admin_level where id_level='$key'");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function EditLevel($idlevel, $level) {
        try {
            $sst = $this->koneksi->prepare("UPDATE admin_level  SET level=? WHERE id_level='$idlevel';");
            $sst->bindparam(1, $level);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarUser() {
        try {
            $sst = $this->koneksi->prepare("select admin_user.username, admin_level.level, admin_user.password, admin_user.nama  from admin_user left join admin_level on admin_user.id_level=admin_level.id_level");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function TambahUser($user, $pass, $nama, $idlevel) {
        try {
            $sst = $this->koneksi->prepare("INSERT INTO admin_user(
            username, password, nama, id_level)
    VALUES (?,?,?,?);");        
            $sst->bindparam(1, $user);
			$sst->bindparam(2, $pass);
			$sst->bindparam(3, $nama);
			$sst->bindparam(4, $idlevel);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function HapusUser($key) {
        try {
            $sst = $this->koneksi->prepare("DELETE from admin_user where username='$key'");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function TampilEditUser($key) {
        try {
            $sst = $this->koneksi->prepare("select admin_user.username, admin_user.id_level, admin_level.level, admin_user.password, admin_user.nama  from admin_user inner join admin_level using(id_level) where username='$key' ");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function EditUser($key, $newuser, $passbar, $nama, $level) {
        try {
            $sst = $this->koneksi->prepare("UPDATE admin_user  SET username=?, password=?, nama=?, id_level=? WHERE username='$key';");
            $sst->bindparam(1, $newuser);
			$sst->bindparam(2, $passbar);
			$sst->bindparam(3, $nama);
			$sst->bindparam(4, $level);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }



}
?>