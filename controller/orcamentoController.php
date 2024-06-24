<?php
namespace App\Controller;

use App\Model\Orcamento;
use App\Template\View\OrcamentoView as OrcamView;
use App\Dal\OrcamentoDao as OrcamDao;
use App\Util\Functions as Util;

use Exception;

class OrcamentoController {

    public static function criar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["nome"]) {
            var_dump($_POST);
            try{
            $orcamento = Orcamento::criarOrcamento(
                nome:  $_POST["nome"],
                email: $_POST["email"],
                telefone: $_POST["telefone"],
                duracao: $_POST["duracao"],
                local: $_POST["local"],
                tipoEvento: $_POST["tipo"],
                impresso: $_POST["impressoes"],
                qtdeFotos: $_POST["qtdeFotos"],
                observacoes: $_POST["observacoes"],      
                );

                OrcamDao::cadastrar($orcamento);
            }catch(Exception $e){
                $_SESSION["mensageErro"] = $e->getMessage();
            }
        }
        header("Location: ./");
    }

    public static function formulario() {
       OrcamView::formulario();
    }

}