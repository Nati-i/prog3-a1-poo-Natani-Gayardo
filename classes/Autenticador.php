<?php

/**
 * Classe responsável pela autenticação e registro de usuários.
 */
class Autenticador {
    private array $usuarios = [];

    public function __construct() {
        $this->registrar(new Usuario("Natani Gayardo", "natiigabriella@gmail.com", "senha897"));
        $this->registrar(new Usuario("Dorival Junior", "dorijunior@gmail.com", "tecnico"));
    }

    /**
     * guarda um novo usuário na estrutura de dados simulada.
     */
    public function registrar(Usuario $usuario): void {
        $this->usuarios[$usuario->getEmail()] = $usuario;
    }

    /**
     * faz a tentativa de login de um usuário.
     */
    public function login(string $email, string $senha): ?Usuario {
        if (isset($this->usuarios[$email]) && $this->usuarios[$email]->verificarSenha($senha)) {
            return $this->usuarios[$email];
        }
        return null;
    }
}
