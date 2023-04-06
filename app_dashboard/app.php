<?php

class Dashboard{
    public $data_inicio;
    public $data_fim;
    public $numeroVendas;
    public $totalVendas;
    public $clientes_ativos;
    public $clientes_inativos;
    public $reclamacoes;
    public $elogios;
    public $sugestoes;
    public $despesas;

    public function __get($attr){
        return $this->$attr;
    }
    public function __set($attr, $valor){
        return $this->$attr = $valor;
    }
}

class Conexao{
    private $host = 'localhost';
    private $dbname = 'dashboard';
    private $user = 'root';
    private $pass = '';

    public function conectar(){
        try{
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            //diminuir a chance de imcompatibilidade de entrada
            // $conexao->exec('set charset set utf8');

            return $conexao;
        } catch(PDOException $e){
            echo '<p>' . $e->getMessage() . '</p>';
        }
    }
}

class Bd{
    private $conexao;
    private $dashboard;

    public function __construct(Conexao $conexao, Dashboard $dashboard){
        $this->conexao = $conexao->conectar();
        $this->dashboard = $dashboard;
    }

    public function getNumeroVendas(){
        $query = '
        select 
            count(*) as numero_vendas
        from tb_vendas 
            where data_venda between :data_inicio and :data_fim';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
        $stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
    }
    public function totalVendas(){
        $query = '
        select
            SUM(total) as total_vendas 
        from tb_vendas 
            where data_venda between :data_inicio and :data_fim';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
        $stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
    }
    public function tipoContatos(){
        $query = '
        SELECT 
            tipo_contato, COUNT(*) as total 
        FROM tb_contatos 
            GROUP BY tipo_contato;';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function clientes(){
        $query = '
        SELECT
            cliente_ativo, COUNT(*) as total
        FROM tb_clientes
            GROUP by cliente_ativo;';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function despesas(){
        $query = '
        SELECT
            SUM(total) as total
        FROM tb_despesas
            where data_despesa between :data_inicio and :data_fim';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
        $stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

$dashboard = new Dashboard();

$conexao = new Conexao();

$competencia = explode('-', $_GET['competencia']);
$ano = $competencia[0];
$mes = $competencia[1];
$dias_do_mes = cal_days_in_month(CAL_GREGORIAN,$mes,$ano);

$dashboard->__set('data_inicio', $ano.'-'.$mes.'-01');
$dashboard->__set('data_fim', $ano.'-'.$mes.'-'.$dias_do_mes);

$bd = new Bd($conexao, $dashboard);

$dashboard->__set('numeroVendas', $bd->getNumeroVendas());
$dashboard->__set('totalVendas', $bd->totalVendas());
$dashboard->__set('despesas', $bd->despesas()[0]->total);


$array_contatos = $bd->tipoContatos();
$array_clientes = $bd->clientes();


foreach($array_contatos as $indice => $array){
    switch($indice){
        case 0:
            $dashboard->__set('reclamacoes', $array->total);
            break;
        case 1:
            $dashboard->__set('sugestoes', $array->total);
            break;
        case 2:
            $dashboard->__set('elogios', $array->total);
            break;
    }
} 

foreach($array_clientes as $indices => $array){
    if($indices == 0)
        $dashboard->__set('clientes_inativos', $array->total);
    else 
        $dashboard->__set('clientes_ativos', $array->total);
}

// echo json_encode($dashboard);
echo json_encode($dashboard);

?>