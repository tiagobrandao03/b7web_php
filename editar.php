<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao= new UsuarioMysql($pdo);

$usuario=false;
$id = filter_input(INPUT_GET,'id');

if($id){
    $usuario = $usuarioDao->findById($id);
}
if($usuario === false){
    header("location:index.php");
    exit;
}
?>
<h1>editar usuario</h1>

<form method="POST" action="editar_action.php?id=2">
    <input type="text" name="id" value="<?=$usuario->getId( );?>"/>
    <label >
        Nome: </br>
        <input type="text" name="name" value="<?=$usuario->getNome( );?>"/>
    </label><br/><br/>

    <label >
        Email: </br>
        <input type="email" name="email" value="<?=$usuario->getEmail( );?>"/>
    </label><br/><br/>

    <input type="submit" value="Salvar"/>
</form>
