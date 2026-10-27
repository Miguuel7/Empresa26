<?php
// ETAPA 2: classe abstrata para representar entidades do banco.
abstract class Entidade {
    protected array $dados = [];
    public function __construct(array $dados = []) { $this->dados = $dados; }
    public function get(string $campo) { return $this->dados[$campo] ?? null; }
    public function set(string $campo, $valor): void { $this->dados[$campo] = $valor; }
    abstract public function resumo(): string;
}
