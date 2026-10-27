<?php
// ETAPA 4: criar métodos para listar, buscar, inserir, atualizar e excluir produtos.
class ProdutoRepository {
    private PDO $pdo;
    public function __construct(PDO $pdo) { $this->pdo = $pdo; }
    public function all(): array {
        // TODO: SELECT * FROM produtos ORDER BY ProdutoID DESC
        return [];
    }
    public function create(array $data): int {
        // TODO: INSERT com prepared statement
        return 0;
    }
}
