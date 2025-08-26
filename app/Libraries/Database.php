<?php
class Database {
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'framework';
    private $dbh;


    public function _construct(){
        //fonte de dados ou DNS contém as informações necessárias para conectar ao banco de dados
        $dbh = 'mysql:host='.$this->host.';port='.$this->porta.';dbnome='.$this->banco;
        $opcoes = [
            //armazena em cache a conexão para ser reutilizada, evita a sobrecarga de uma nova conexão, resultando em um aplicativo mais rápido
            PDO::ATTR_PERSISTENR => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

            try {
                $this->$dbh = new PDO($dbh,$this->usuario, $this->senha,$opcoes);
            } catch (PDOException $e) {
                print "Error!: ".$e->getMenssage()."<br/>";
                die();
            }//fim do catch
        ];
    }//fim do construtor
}
?>