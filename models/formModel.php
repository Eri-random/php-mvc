<?php

require_once "conexion.php";

class formModel{

static public function mdlRegistro($table, $datos){

 #statement: declaracion
 $stmt = Conexion::conectar()->prepare("INSERT INTO $table(token,nombre,email,password) VALUES 
 (:token,:nombre, :email, :password)");

  //bindParam() Vincula una variable php a un parametro de sustitucion con nombre 
 //o signo de interrogacion

 $stmt->bindParam(":token",$datos["token"],PDO::PARAM_STR);
 $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
 $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
 $stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);

 if($stmt->execute()){
    return "ok";
 }else{
     
    print_r(Conexion::conectar()->errorInfo());
 }

 $stmt->null;
}

static public function mdlSeleccionarRegistros($tabla,$item,$valor){

if($item == null & $valor == null){

   $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC");

   $stmt->execute();
   
   return $stmt->fetchAll();

}else{

   $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item  ORDER BY id DESC");

   $stmt->bindParam(":".$item , $valor,PDO::PARAM_STR);

   $stmt->execute();
   
   return $stmt->fetch();

}



$stmt = null;

}

static public function mdlUpdateRegistration($table, $datos){

   $stmt = Conexion::conectar()->prepare("UPDATE $table SET nombre =:nombre, email=:email, password=:password WHERE token =:token");
  
   $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
   $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
   $stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);
   $stmt->bindParam(":token",$datos["token"],PDO::PARAM_STR);

  
   if($stmt->execute()){
      return "ok";
   }else{
       
      print_r(Conexion::conectar()->errorInfo());
   }
  
   $stmt->null;
  }


  static public function mdlDeleteRegistration($tabla,$valor){
  
   $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE token = :token");
  
   $stmt->bindParam(":token",$valor,PDO::PARAM_STR);

  
   if($stmt->execute()){
      return "ok";
   }else{
       
      print_r(Conexion::conectar()->errorInfo());
   }
  
   $stmt->null;
  }


  }







?>