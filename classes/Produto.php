<?php
require_once __DIR__ . '/Entidade.php';
// ETAPA 3: Produto herda de Entidade e implementa resumo().
class Produto extends Entidade {
    public function resumo(): string {
        // TODO: retornar o nome e o preço formatado do produto.
        return 'Produto em construção';
    }
}
