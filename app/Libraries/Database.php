<?php
class Database {
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'framework';
    private $porta = '3307';
    private $dbh;

    public function _construct(){
        //fonte de dados ou DNS contém as informações necessárias para conectar ao banco de dados
        $dbh = 'mysql:host='.$this->host.';port='.$this->porta.';dbnome='.$this->banco;
        $opcoes = [
            //armazena em cache a conexão para ser reutilizada, evita a sobrecarga de uma nova conexão, resultando em um aplicativo mais rápido
            PDO::ATTR_PERSISTENR => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

            try {
                //cria a instancapo do pdo
                $this->$dbh = new PDO($dbh,$this->usuario, $this->senha,$opcoes);
            } catch (PDOException $e) {
                print "Error!: ".$e->getMenssage()."<br/>";
                die();
            }//fim do catch
        ];
    }//fim do construtor

    //prepare Statements com query
    public function query($sql){
        //prepare uma consulta sql
        $this->stmt = $this->dbh->prepare($sql);
    }//fim da função query

    //vincula um valor ao parametro
    public function bind($parametro, $valor, $tipo = null){
        if(is_null($tipo)){
            switch(true){
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo - PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
            }//fim do switch
        }//fim da função bind
        endif;
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }//fim da funcao bind

    //executa prepared statement
    public function executa(){
        return $this->stmt->executa()
    }//fim da função executa



}
?>