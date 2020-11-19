<?php
namespace model;


/**
 * Classe Model do Usuário
 * @author Isadora M. Skibinski 
 */

 class usuarios{
     /**
      * login do usuario
      * @var string 
      */
      public $login;

       /**
      * nome do usuario
      * @var string 
      */
      public $nome;

       /**
      * email do usuario
      * @var string 
      */
      public $email;

       /**
      * celular do usuario
      * @var string 
      */
      public $celular;


       /**
      * Identifica se o usuario está logado ou não
      * @var boolean 
      */
      public $logado;

      /**
       * Carrega os atributos da classe usuário
       * @param string $login Login do usuário
       * @param string $nome nome do usuário 
       * @param string $email email do usuário
       * @param string $celular celular do usuário
       * @param string $logado identifica se o usuário está logado ou não
       */

      public function addUsuario($login,$nome,$email,$celular, $logado ){
        $this-> $login = $login;
        $this-> $nome = $nome;
        $this-> $email = $email;
        $this-> $celular = $celular;
        $this-> $logado = $logado;

      }
 }
?>
