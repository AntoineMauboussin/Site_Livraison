<?php 

class Membre
{
    private $connect;
    private $identifiant;
    private $mdp;
    
    public function __construct()
    {
        $nbParam=func_num_args();
        $args=func_get_args();
        if($nbParam == 3)
        {
            $this->connect = $args[0];
            $this->identifiant = $args[1];
            $this->mdp = $args[2];
        }
        else if($nbParam == 5)
        {
            $this->connect = $args[0];
            $this->identifiant = $args[1];
            $this->mdp = $args[2];
            
            $sql = "Insert into Client (identifiant, mdp, adresse, quartier) values ('args[1]','args[2]','args[3]','args[4]')";
            mysqli_query($connect, $sql);
        }
    }
    
    public function connexion()
    {
        session_start();
        $_SESSION['identifiant'] = $this->identifiant;
        $select = "Select estProducteur from Client where identifiant = '".$this->identifiant."'";
        $result = mysqli_query($this->connect, $select);
        $row = $result->fetch_assoc();
        $_SESSION["estProducteur"] = $row["estProducteur"];
    }
}

?>