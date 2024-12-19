<?php
class Buku
{
    protected $conn;
    
    public function __construct()
    {
        $this->connectDB();
    }
    private function connectDB()
    {
        $host = "localhost"; 
        $database = "dbperpus"; 
        $username = "root";
        $password = ""; 

        $this->conn = new mysqli($host, $username, $password, $database);
        
        if ($this->conn->error) {
            die("Connection failed: " . $this->conn->error);
        }
    }
    public function tampilSemuaBuku()
    {
        $data = mysqli_query(
            $this->conn, 
            "SELECT * FROM buku"
        );
        $hasil = []; 

        while ($row = mysqli_fetch_assoc($data)) {
            $hasil[] = $row; 
        }
        return $hasil; 
    }
}
?>
