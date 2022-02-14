<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$id= filter_input(INPUT_POST,'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);

if($id && $name && $email){
    $usuario=$usuarioDao->findById($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);
    
    $usuarioDao->update();

    $sql=$pdo->prepare("UPDATE usuarios SET nome=:name, email= :email WHERE id = :id");
    $sql->bindValue(':name',$name);
    $sql->bindValue(':id',$id);
    $sql->execute();

    header("location: index.php");
    exit;
}else{
    header("Location: adicionar.php?id=".$id); 
    exit;
}
