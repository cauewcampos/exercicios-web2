<?php
class Aluno {
    public $nome;
    public $nascimento;
    public $matricula;
    public $curso;

    public function __construct($nome, $nascimento, $matricula, $curso) {
        $this->nome = $nome;
        $this->nascimento = $nascimento;
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    public function idade() {
        $dataNasc = new DateTime($this->nascimento);
        $hoje = new DateTime();
        return $hoje->diff($dataNasc)->y;
    }
}
?>
