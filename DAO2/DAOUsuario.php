<?php

namespace DAO;
/**
 * Classe DAO do Usuário
 *  Esta classe é responsável por fazer a comunicação com o banco de dados
 *  promovendo as funções de logar e incluir novos usuários
 * @author Isadora M. Skibinski 
 */

 mysqli_report(MYSQLI_REPORT_STRICT);
 $ds = DIRECTORY_SEPARATOR;
$base_dir = dirname(__FILE__).$ds;

require($base_dir.'../models/Usuario.php');
 use model\usuarios;
 class DAOUsuario{
     /**
      * Loga um novo usuário no banco de dados 
      *@param string $nome Nome do usuário
      *@param string $email email do usuario
      *@param string $login login do usuario
      *@param string $senha senha do usuario
      *@return TRUE|Exception TRUE para inclusão bem sucedida ou Exdeption para a inclusão mal sucedida
      */
    public function logar($logar,$senha){
        try{
            $connDB = $this->conectarBanco();
        }catch(\Exception $e){
            die($e->getMessage());
        }

        $usuario = new usuarios();
        $sql = $connDB->prepare('select login,nome,email,celular from usuarios where login = ? and senha = ?');
        $sql->bind_param('ss',$login,$senha);
        $sql->execute();
        if(!$sql->error){
            $resultado = $sql->get_result();
            if($resultado->num_rows === 0){
                $usuario->addUsuario(null,null,null,FALSE);
                throw new \Exception("Login e senha inválidos!");
            }else{
                while($linha = $resultado->fetch_assoc()){
                    $usuario->addUsuario($login['login'],$nome['nome'],$email['email'],$celular['celular'], TRUE);
                }
                return $usuario;
            }
        }else{
            throw new \Exception('Erro ao executar busca com os dados fornecidos');
        }

        
        $sql->close();
        $connDB->close();
    }

    /**
      * Inclui um novo usuário no banco de dados 
      *@param usuarios $usuario objeto do tipo usuario que deverá ser cadastrado
      *@return TRUE|Exception TRUE para inclusão bem sucedida ou Exdeption para a inclusão mal sucedida
      */
      public function incluirUsuario($nome,$email,$login,$senha){
        try{
            $connDB = $this->conectarBanco();
        }catch(\Exception $e){
            die($e->getMessage());
        }

        $sqlInsert = $connDB->conectarBanco('insert into usuario nome,email,login,senha,values(?,?,?,?)');
        $$sqlInsert->execute();
        if(!$sqlInsert->error){
           $retorno = TRUE;
        }else{
            throw new \Exception('Erro ao incluir novo usuário');
        }
        $sqlInsert->close();
        $connDB->close();
        return $retorno;
    }
    
    public function conectarBanco(){
        $ds = DIRECTORY_SEPARATOR;
        $base_dir = dirname(_FILE_).ds);

        require(base_dir.'bd_config.php');

        try{
            $conn = new \MySQLi($dbhost,$user,$password,$db);
            return $conn;
        }catch(mysqli_sql_exception $e){
            throw new \Exception($e);
            die;
        }
    }
 }
?>
