<?php
namespace controller;

$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'].$separador;
require_once($root .'DAO/DAOUsuarios.php');

use DAO\DAOUsuarios;

/**
 * Esta classe serve para tratar as regras de negócio pertinentes à
 * classe Usuário
 * Seu escopo limita-se às funções de entidade Usuário
 * @author Isadora M. Skibinski
 */
 class ControllerUsuario{
     /**
      * Recebe os dados do login,faz o devido tratamento e envia para o DAO executar
      * no banco de dados
      *@param string $login login do usuário
      *@param string $senha senha do usuário
      *@return Usuario
      */

      public function fazerLogin($login,$senha){
          $daousuarios = new DAOUsuarios();

          try{
            $usuario = $s=daoUsuarios->logar($logar,$senha);
          }catch(\Excepion $e){
              throw new \Exception($e->getMessage());
          }
          unset($daoUsuarios);
          return $usuarios;
      }

      /**
       * Recebe e trata os dados do usuário e envia para o DAO
       * gravar no banco de dados
       * @param string $nome Nome do usuário
       * @param string $email email do usuário
       * @param string $celular celular do usuário
       * @param string $login Login do usuário
       * @param string $senha senha do usuario
       *@return TRUE|Exception TRUE para inclusão bem sucedida ou Exdeption para a inclusão mal sucedida
       */

      public function salvarUsuario($nome,$email,$celular,$login,$senha){
          $daoUsuarios = new DAOUsuarios();
          try{
              $daoUsuario->incluirUsuario($nome,$email,$celular,$login,$senha);
            }catch(\Excepion $e){
                throw new \Exception($e->getMessage());
            }
            return $retorno;
      }
 }

?>
