<?php
class Usuarios extends Controllers{
    public function cadastrar(){
          $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if(isset($formulario)):
            $dados = [
                'nome'=>trim($formulario['nome']),
                'email'=>trim($formulario['email']),
                'senha'=>trim($formulario['senha']),
                'confirma_senha'=>trim($formulario['confirma_senha']),
            ];
            
            if(in_array("", $formulario)):
                if(empty($formulario['nome'])):
                $dados['nome_erro'] = "Preencha o campo nome";
                endif;
                if(empty($formulario['email'])):
                $dados['email_erro'] = "Preencha o campo email";
                endif;
                if(empty($formulario['senha'])):
                    $dados['senha_erro']= "Preencha o campo senha";
                    elseif(strlen($formulario['senha']) < 6 ):
                        $dados['senha_erro'] = "A senha deve ter no minimo 7 caracteres";
                endif;
                if(empty($formulario['confirma_senha'])):
                    $dados['confirma_senha_erro']= "Preencha o campo confirma senha";
                else:
                    if($formulario['senha'] != $formulario['confirma_senha']):
                        $dados['confirma_senha_erro'] = "Senhas diferentes";
                    else:
                        echo 'Pode Realizar o cadastro';
                    endif;
                endif;
            endif;
            var_dump($formulario);
        else:
            $dados=[
                'nome'=>'',
                'email'=>'',
                'senha'=>'',
                'confirma_senha'=>'',
            ];
        endif;
        $this->view('usuarios/cadastrar', $dados);
        
    }//fim da função cadastrar
}//fim da class