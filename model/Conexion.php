
<?php
class Conexion {
    private $host = 'localhost';
    private $db = 'f_saltos';
    private $user = 'root';
    private $pass = '';

    public function conectar() {
        try {
            $conexion = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            return null;
        }
    }

    public function ejecutar($sql, $params = []) {
        $conexion = $this->conectar();
        if ($conexion) {
            $stmt = $conexion->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        }
        return null;
    }
}
?>