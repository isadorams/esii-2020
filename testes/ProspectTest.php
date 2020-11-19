<?php
namespace tests;

require_once('../uteis/vendor/autoload.php');
require_once('../models/prospects.php');
require_once('../DAO/DAOProspect.php');

use PHPUnit\Framework\TestCase;
use models\prospects;
use dao\DAOProspect;

class ProspectTest extends TestCase{

   /** @test */
   public function testincluirProspect(){
      $daoProspect = new DAOProspect();
      try{
         $this->assertEquals(
            TRUE,    
            $daoProspect->incluirProspect("999" "joao silva", "silva@gmail.com", "(49)98855-1222", "joao Silva", "(49)98855-1222")
         );
         unset($usuarios);
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }

   /** @test */
   public function testatualizarProspect(){
      $daoProspect = new DAOProspect();
         $this->assertEquals(
            TRUE, 
            $daoProspect->atualizarProspect("joao silva", "silva@gmail.com", "(49)98855-1222", "joao Silva", "(49)98855-1222",999)
         );
         unset($daoProspect);
      }
      
    
       /** @test */
   public function testexcluirProspect(){
    $daoProspect = new DAOProspect();
       $this->assertEquals(
          TRUE,
          $daoProspect->excluirProspect(999)
       );
       unset($daoProspect);
    }
    

     /** @test */
   public function testbuscarProspect(){
    $daoProspect = new DAOProspect();
    $arrayComparar = array();
    $conn = new \mysqli('localhost', 'root', '', 'bd_prospects');
      $sqlBusca = $conn->prepare("select cod_prospect, nome, email, celular,
                                          facebook, whatsapp
                                          from prospect");
      $sqlBusca->execute();
      $result = $sqlBusca->get_result();
      if($result->num_rows !== 0){
         while($linha = $result->fetch_assoc()) {
            $linhaComparar = new Prospect();
            $linhaComparar->addProspect($linha['cod_prospect'], $linha['nome'], $linha['email'], $linha['celular'],
                                   $linha['facebook'], $linha['whatsapp']);
            $arrayComparar[] = $linhaComparar;
         }
      }

      $this->assertEquals(
         $arrayComparar,
         $daoProspect->buscarProspects()
      );
      unset($daoProspect);
      unset($linhaComparar);
      $sqlBusca->close();
      $conn->close();
   }
/** @test */
public function buscarProspectPorEmailTest(){
   $daoProspect = new DAOProspect();
   $arrayComparar = array();
   $emailProspect = 'gernunes@hotmail.com';

   $conn = new \mysqli('localhost', 'root', '', 'bd_prospects');
   $sqlBusca = $conn->prepare("select cod_prospect, nome, email, celular,
                                       facebook, whatsapp
                                       from prospect
                                       where
                                       email = '$emailProspect'");
   $sqlBusca->execute();
   $result = $sqlBusca->get_result();
   if($result->num_rows !== 0){
     while($linha = $result->fetch_assoc()) {
         $linhaComparar = new Prospect();
         $linhaComparar->addProspect($linha['cod_prospect'], $linha['nome'], $linha['email'], $linha['celular'],
                                $linha['facebook'], $linha['whatsapp']);
         $arrayComparar[] = $linhaComparar;
      }
   }
}

   }

?>
