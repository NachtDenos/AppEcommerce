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
      $this->host = '127.0.0.1:4306'; //Localhost::3306 // 4306 EDSON |   3307  Isaac
      $this->db = 'pia_pwci'; //Base de datos
      $this->user = 'root'; //root
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
      }
      catch(PDOException $e){
        print_r('Error de conexion: ' . $e->getMessage());
      }
    }
  }

?>