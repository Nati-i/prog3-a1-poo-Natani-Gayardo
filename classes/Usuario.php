<?php

/**
 * Classe que representa um usuário da aplicação.
 */
class Usuario {
    private string $nome;
    private string $email;
    private string $senhaHash;

    public function __construct(string $nome, string $email, string $senha) {
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRING);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome(): string {
        return $this->nome;
    }
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Verifica se a senha fornecida corresponde ao hash armazenado.
  
     */
    public function verificarSenha(string $senha): bool {
        return password_verify($senha, $this->senhaHash); 
    }
}
