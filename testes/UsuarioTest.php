<?php
namespace tests;

require_once('../uteis/vendor/autoload.php');
require_once('../models/usuarios.php');
require_once('../DAO/DAOUsuarios.php');

use PHPUnit\Framework\TestCase;
use models\usuarios;
use dao\DAOUsuarios;

class UsuarioTest extends TestCase{

   /** @test */
   public function testIncluirUsuario(){
      $daoUsuarios = new DAOUsuarios();
      try{
         $this->assertEquals(
            TRUE,
            $daoUsuarios->incluirUsuario("Isadora Skibinski", "isadora@gmail.com", "(49)98855-1122", "isadora", "789")
         );
         unset($daoUsuarios);
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }

   /** @test */
   public function testLogar(){
      $daoUsuarios = new DAOUsuarios();
      $usuario = new usuarios();
      try{
         $usuario->addUsuario("isadora", "Isadora Skibinski", "isadora@gmail.com", "(49)98855-1122", TRUE);
         $this->assertEquals(
            $usuario,
            $daoUsuarios->logar('isadora', '789')
         );
      }
      catch(\Exception $e){
         $this->fail($e->getMessage());
      }
      unset($usuario);
      unset($daoUsuarios);
   }
}
?>
