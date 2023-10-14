<?php 

  class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $conn;
    public function __construct()
    {
      $this->host = '127.0.0.1:3307';
      $this->db = 'pwci_pia';
      $this->user = 'root';
      $this->password = '';
      $this->charset = 'utf8mb4';
    }

    function connectDB(){

      try{
        $conn = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
        $options = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => false
        ];
        $pdo = new PDO($conn, $this->user, $this->password);

        return $pdo;

      }catch(PDOException $e){
        print_r('Error de conexion: ' . $e->getMessage());
      }
    }

    function closeConnection()
    {
      try
      {
        $conn->close();
        $conn->die();
        if (isset($_SESSION['usuario'])) {
                 unset($_SESSION['usuario']); // Esto vaciará la variable de sesión 'usuario'
              }
      }
      catch(PDOException $e){
        print_r('Error de conexion: ' . $e->getMessage());
      }
    }
  }

?>