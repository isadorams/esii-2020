<?php
namespace controller;

$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'].$separador;
require_once($root .'DAO/DAOProspect.php');

use DAO\DAOProspect;

/**
 * Esta classe serve para tratar as regras de negócio pertinentes à
 * classe Prospect
 * Seu escopo limita-se às funções de entidade Prospect
 * @author Isadora M. Skibinski
 */
 class ControllerProspect{

      /**
       * Recebe e trata os dados do prospect e envia para o DAO
       * gravar no banco de dados
       * @param string $nome Nome do prospect
       * @param string $email email do prospect
       * @param string $celular celular do prospect
       * @param string $facebook facebook do prospect
       * @param string $whatsapp whatsapp do prospect
       *@return TRUE|Exception TRUE para inclusão bem sucedida ou Exdeption para a inclusão mal sucedida
       */

      public function salvarProspect($nome, $email, $celular, $facebook, $whatsapp){
          $DAOProspect = new DAOProspect();
         

          if($prospect->codigo === null){
             try{
                $daoProspect->incluirProspect($prospect->nome, $prospect->email, $prospect->celular, $prospect->facebook,
                                           $prospect->whatsapp);
                return TRUE;
             }catch(\Exception $e){
                throw new \Exception($e->getMessage());
             }
          }else{
             try{
                $daoProspect->atualizarProspect($prospect->nome, $prospect->email, $prospect->celular, $prospect->facebook,
                                                $prospect->whatsapp, $prospect->codigo);
                unset($daoProspect);
                return TRUE;
             }catch(\Exception $e){
                throw new \Exception($e);
             }
          }
       }
       /**
        * Recebe um objeto do tipo Prospect e envia para a DAO concluir a exclusão
        *
        * @param Prospect $prospect Objeto Prospect informando o código do prospect a ser excluído
        * @return TRUE|Exception Retorna TRUE caso a inclusão tenha sido bem sucedida
        * ou uma Exception caso não tenha.
        */
       public function excluirProspect($prospect){
          $daoProspect = new DAOProspect();
          try{
             $daoProspect->excluirProspect($prospect->codigo);
             unset($daoProspect);
             return TRUE;
          }catch(\Exception $e){
             throw new \Exception($e->getMessage());
          }
       }
       public function buscarProspects($email=null){
         $daoProspect = new DAOProspect();
         $prospects = array();
    
         if($email === null){
            $prospects = $daoProspect->buscarProspects();
            return $prospects;
         }else{
            $prospects = $daoProspect->buscarProspects($email);
            return $prospects;
         }
       }


 }

?>
