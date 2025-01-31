<?php
require_once __DIR__ . "/BaseModel.php";

class Usuario extends BaseModel
{
    public function verificarCredenciales($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            return false; // Usuario no encontrado
        }

        if (!password_verify($password, $usuario['password'])) {
            return false; // Contraseña incorrecta
        }

        return $usuario;
    }





    public function registrarUsuario($nombre, $email, $password)
    {
        // Verificar si el email ya está registrado
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return false; // Usuario ya existe
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $email, $hashedPassword]);
    }
}
