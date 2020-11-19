<?php
namespace controller;

$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'].$separador;
require_once($root .'DAO/DAOUsuarios.php');

use DAO\DAOUsuarios;

/**
 * Esta classe serve para tratar as regras de neg�cio pertinentes �
 * classe Usu�rio
 * Seu escopo limita-se �s fun��es de entidade Usu�rio
 * @author Isadora M. Skibinski
 */
 class ControllerUsuario{
     /**
      * Recebe os dados do login,faz o devido tratamento e envia para o DAO executar
      * no banco de dados
      *@param string $login login do usu�rio
      *@param string $senha senha do usu�rio
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
       * Recebe e trata os dados do usu�rio e envia para o DAO
       * gravar no banco de dados
       * @param string $nome Nome do usu�rio
       * @param string $email email do usu�rio
       * @param string $celular celular do usu�rio
       * @param string $login Login do usu�rio
       * @param string $senha senha do usuario
       *@return TRUE|Exception TRUE para inclus�o bem sucedida ou Exdeption para a inclus�o mal sucedida
       */

      public function salvarUsuario($nome,$email,$celular,$login,$senha){
          $daoUsuarios = new DAOUsuarios();
          try{
              $daoUsuario->incluirUsuario($nome,$email,$celular,$login,$senha);
            }catch(\Excepion $e){
                throw new \Exception($e->getMessage());
            }
      }
 }

?>
