<?php
class Dica {
    private $pdo;

    public function __construct($conexao) {
        $this->pdo = $conexao;
    }

    private function dicasSimulados() {
        return [
            'dinheiro' => [
                'titulo' => 'a regra dos dez reais',
                'conteudo' => 'Se o custo total para trabalhar em paz (MEI + Licença) é de R$ 150 por mês, guarde R$ 10,00 por dia. Separe os primeiros R$ 10 que ganhar e esqueça que eles existem. No fim do mês, a conta fecha sem desespero e sobra 70 reais guardados.',
            ],
            'prefeitura' => [
                'titulo' => 'MEI aberto: já posso colocar meu carrinho na rua ? ',
                'conteudo' => 'Atenção: O MEI protege a sua saúde (INSS), mas NÃO impede a fiscalização de derrubar e levar suas mercadorias. Para proteger suas mercadorias na rua, você precisa do papel da prefeitura (TPU/Licença). Vá à Subprefeitura do seu bairro e pergunte se há vaga para a rua desejada antes de pagar qualquer coisa.',
            ],
            'espaço' => [
                'titulo' => 'Como lidar com a falta de espaço na calçada ?',
                'conteudo' => 'Use a verticalização. Em vez de espalhar mesas no chão, cresça seu carrinho para cima com prateleiras e ganchos. Tenha um estoque invisível perto e deixe no carrinho apenas o que vai vender nas próximas horas.',
            ]
        ];
    }


    public function buscarTodas() {
        return $this->dicasSimulados(); 
    }
        public function buscarDica($dor) {
            $todas = $this->dicasSimulados();
            return $todas[$dor] ?? null;
        } 
}
?>