<?php

/*class Connect
{
    private $host;
    private $user;
    private $bdd;
    private $password;
    private $connect;
    
    public function __construct($bdd)
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->bdd = $bdd;
        $this->passwd = "root";
    }
    
    public function connect()
    {
        $connect = mysqli_connect($this->host , $this->user , $this->passwd, $this->bdd) or die("erreur de connexion");
        return $connect;
    }
    
    public function deconnect()
    {
        mysqli_close($this->co);
    }
}*/

$host = "localhost";
$user = "root";
$bdd = "Livraison";
$passwd = "root";

$connect = mysqli_connect($host , $user , $passwd, $bdd) or die("erreur de connexion");

?>