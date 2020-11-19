<?php
namespace models;


/**
 * Classe Model do Prospect
 * @author Isadora M. Skibinski 
 */

 class prospect{
    /**
    * Código do Prospect
    * @var int
    */
    public $codigo;

       /**
      * nome do prospect
      * @var string 
      */
      public $nome;

       /**
      * email do prospect
      * @var string 
      */
      public $email;

       /**
      * celular do prospect
      * @var string 
      */
      public $celular;


       /**
      * Identifica se o prospect está facebook ou não
      * @var boolean 
      */
      public $facebook;

       /**
      * Identifica se o prospect está whatsapp ou não
      * @var boolean 
      */
      public $whatsapp;


      /**
       * Carrega os atributos da classe prospect
       * @param string $codigo Código do Prospect
       * @param string $nome nome do prospect
       * @param string $email email do prospect
       * @param string $celular celular do prospect
       * @param string $facebook identifica se o prospect está no facebook ou não
       * @param string $$whatsapp identifica se o prospect está no whatsapp ou não
       */

      public function addProspect($codProspect, ,$nome,$email,$celular,$facebook, $whatsapp ){
        $this->codigo = $codProspect;
        $this-> $nome = $nome;
        $this-> $email = $email;
        $this-> $celular = $celular;
        $this-> $facebook = $facebook;
        $this-> $whatsapp = $whatsapp;

      }
 }
?>
