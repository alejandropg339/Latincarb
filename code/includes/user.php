<?php
include_once('db.php');
class User extends db{

    private $nombre;
    private $username;
    private $rol;

    public function userExists($user, $pass){
        $md5pass = md5($pass);

        //prepare se utiliza para la vaidación de los datos.
        $query = $this->connect()->prepare('SELECT * from usuario WHERE username = :user AND password = :pass');
        //se ejecuta lasenencia y se unen los datos con las variables que se utilizaron
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        //rowCount es una funcion que cuenta el numero dde filas por lo tanto si al ejecutar la sentencia hay alguna fila que 
        //cumpla con la busqueda con la condicion el resultado será true.
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuario where username = :user');
        $query->execute(['user' => $user]);

        foreach($query as $currentUser){
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

}