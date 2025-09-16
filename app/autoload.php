<?php
/**
 * autoload - Responsável pelo carregamento automático das classes
 */
//a função sql_autoload_register() registra qualquer número de autoloaders, permitindo que as classes e interfces sejam automaticamente carregadas

spl_autoload_register(function($classe){
    //lista de diretórios parabuscar as classes
    $diretorios = [
        'Libraries',
        'Helpers'
    ];

    //percorre os diretórios em busca das classes
    foreach($diretorios as $diretorios):
        //a constante __DIR__ retorna o diretório do arquivo
        //DIRECTORY_SEPARATOR é o separador utilizado para percorrer diretórios.
        $arquivo = (__DIR__. DIRECTORY_SEPARATOR.$diretorios.DIRECTORY_SEPARATOR.$classe.'.php');
        //verifica se o arquivo de classe existe
        if(file_exists($arquivo)):
            //inclui arquivo de classe 
            require_once $arquivo;
        endif;
    endforeach;
});
?>