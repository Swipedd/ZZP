<?php
class DBConnectie{
    public $dbh;

// Connectie met de database ZZP 
    public function __construct($db = "zzp", $user = "root", $pass = "", $host = "localhost"){
        try{
            $this->dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        }
        catch(Exception $e){
            echo"Database connection failed." ;
            // . $e->getMessage();
        }

    }

// Registratie 
    public function Registeer($voornaam,$tussenvoegsels,$achternaam,$leeftijd,$geslacht,$email,$telefoonnummer,$wachtwoord,$bedrijfsnaam,$btwnummer,$kvknummer){
        $query = "INSERT INTO accounts(id_gebruiker,voornaam,tussenvoegsels,achternaam,leeftijd,geslacht,email,telefoonnummer,wachtwoord,bedrijfsnaam,btwnummer,kvknummer) 
                  VALUES (:id_gebruiker,:voornaam,:tussenvoegsels,:achternaam,:leeftijd,:geslacht,:email,:telefoonnummer,:wachtwoord,:bedrijfsnaam,:btwnummer,:kvknummer)";
        $statement = $this->dbh->prepare($query);
        $statement->execute([':id_gebruiker' => '',':voornaam' => $voornaam,':tussenvoegsels' => $tussenvoegsels,':achternaam' => $achternaam,':leeftijd' => $leeftijd,':geslacht' => $geslacht, ':email' => $email,':telefoonnummer' => $telefoonnummer,':wachtwoord' => $wachtwoord,':bedrijfsnaam' => $bedrijfsnaam,':btwnummer' => $btwnummer,':kvknummer' => $kvknummer]);
        return true;
    }

// Account check
    public function emailCheck($email) {
    $query = "SELECT COUNT(*) FROM accounts WHERE email = :email";
    $statement = $this->dbh->prepare($query);
    $statement->execute([':email' => $email,]);
    $count = $statement->fetchColumn();
    return $count > 0;
    }

// Inlog
    public function Login($email,$wachtwoord){
        $query = "SELECT * FROM accounts WHERE email = :email";
        $statement = $this->dbh->prepare($query);
        $statement->execute([":email" => $email]);
        $info = $statement->fetch();

        if($info && password_verify($wachtwoord,$info['wachtwoord'])){
            return $info;
        }else{
            return false;
        }

    }

// Boeking
    public function Boeking($voornaam,$tussenvoegsels,$achternaam, $email, $datum, $tijd, $klus){
        $query = "INSERT INTO boekingen(voornaam,tussenvoegsels,achternaam,email,datum,tijd,klus)
                  VALUES (:voornaam,:tussenvoegsels,:achternaam,:email,:datum,:tijd,:klus,)";
        $statement = $this->dbh->prepare($query);
        $statement->execute([':id_gebruiker' => '',':voornaam' => $voornaam, ':tussenvoegsels' => $tussenvoegsels,':achternaam' => $achternaam,':email' => $email,':datum' => $datum, ':tijd' => $tijd,':klus' => $klus]);
        return true;
    }

// Contact
public function Contact($voornaam, $email, $bericht){
    $query = "INSERT INTO contact(voornaam, email, bericht)
              VALUES (:voornaam, :email, :bericht)";
    $statement = $this->dbh->prepare($query);
    $statement->execute([':voornaam' => $voornaam, ':email' => $email, ':bericht' => $bericht]);
    return true;
}
// Toevoeg
    public function addProject($name, $descriptie,$tijd) {
        $query = "INSERT INTO projecten (naam, descriptie,tijd) 
               VALUES (:naam, :descriptie, :tijd)";
        $statement = $this->dbh->prepare($query);
        $statement->execute(["naam"=>$name, "descriptie"=>$descriptie, "tijd"=>$tijd]);
        return true;
        }


// Beheer
public function selectBoeking(){
    $stmt = $this->dbh->query("SELECT * FROM boeking");
    $result = $stmt->fetchAll();
    return $result;
}

// Bestellingen
public function selectBestellingen(){
        
}
}
?>