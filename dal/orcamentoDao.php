<?php
namespace App\Dal;

use App\Model\Orcamento;
use App\Dal\Conn;

use \PDOException;
use \Exception;

class OrcamentoDao {

    public static function cadastrar(Orcamento $orcamento) {
        try {

            return $pdo->lastInsertId();
        }catch (PDOException $e) {
            throw new Exception("Erro ao salvar no banco de dados ". $e->getMessage());
        }catch (Exception $e) {
            throw new Exception("Ecorreu um erro inesperado ". $e->getMessage());
        }
    }
}