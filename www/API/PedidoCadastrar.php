<?php
namespace LOJA\API;
use LOJA\Model\Cliente;
use LOJA\Model\Pedido;
use LOJA\Model\Carrinho;
use LOJA\DAO\DAOPedido;


class PedidoCadastrar{

    public $msg;

        function __construct($url){
            
            if(isset($_SESSION['clienteid'])){
                $this->efetuarPedido();
                header("location: ".$url."/pedido/pagamento/");
                
            }else{
                $_SESSION['url'] = $url."/pedido/finalizar/";
                header("location: ".$url."/login/cliente/");
                 }
            }
    
        function efetuarPedido(){
            
            try{
                $frete = $_SESSION['frete'];
                $obj = new Pedido();
                $obj->setData(date('d-m-y'));
                $obj->setFrete($frete->getValor());
                $obj->setDias($frete->getPrazoEntrega());
        
                $DAO = new DAOPedido();
                $this->msg = $DAO->cadastrar($obj, $_SESSION['carrinho']);


                if(isset($_SESSION['url'])){
                    $url2 = $_SESSION['url'];
                }

                
            }catch(Exception $e){

            }
            }
        

        }
        ?>