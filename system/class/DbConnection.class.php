<?php

class DbConnection {

    //[pt-br]Define os dados para conexão. [en-us]Set Database Connection Info.
    private $host = "localhost";
    private $database = "uifercalhas";
    private $user = "root";
    private $pass = null;
    private $charset = "utf8";

    //[pt-br]Conecta com o Banco de dados. [en-us]Do the connection with the Database.
    public function connDB() {

        $link = mysqli_connect($this->host, $this->user, $this->pass, $this->database) or die(mysqli_connect_error());
        mysqli_set_charset($link, $this->charset) or die(mysqli_error($link));

        return $link;
    }

    //[pt-br]Fecha a Conexão. [en-us]Close Connection.
    public function closeDB($link) {
        mysqli_close($link);
    }

}
