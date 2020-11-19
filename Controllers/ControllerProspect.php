<?php
namespace controller;

$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'].$separador;
require_once($root .'DAO/DAOProspect.php');

use DAO\DAOProspect;

/**
 * Esta classe serve para tratar as regras de neg�cio pertinentes �
 * classe Prospect
 * Seu escopo limita-se �s fun��es de entidade Prospect
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
       *@return TRUE|Exception TRUE para inclus�o bem sucedida ou Exdeption para a inclus�o mal sucedida
       */

      public function salvarProspect($nome, $email, $celular, $facebook, $whatsapp){
          $DAOProspect = new DAOProspect();
          try{
              $DAOProspect->incluirProspect($nome, $email, $celular, $facebook, $whatsapp);
            }catch(\Excepion $e){
                throw new \Exception($e->getMessage());
            }
      }
 }

?>
