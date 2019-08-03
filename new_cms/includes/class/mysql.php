<?php

class MySQL{

    public $connect;

    public function __construct($db_name=DB_NAME, $db_host=DB_HOST, $db_user=DB_USER, $db_password=DB_PASSWORD){
        $polaczenie = @new mysqli($db_host, $db_user, $db_password, $db_name);
        if (mysqli_connect_errno() != 0){
            echo '<p>Wystąpił błąd połączenia: ' . mysqli_connect_error() . '</p>';
        }
        else {
            $this->connect = $polaczenie;
        }
    }

    public function query($zapytanie){
        $wynik = $this->connect -> query($zapytanie);
        $result = array();
        while($row = $wynik->fetch_assoc()){
            array_push($result, $row);
        }

        return $result;
    }

    public function __destruct()
    {
        $this->connect->close();
    }

}

?>