<?php
class LokerBuku extends Buku
{
    public function tampilDataBuku($loker_buku)
    {
        $data = mysqli_query(
            $this->conn,
            "SELECT * FROM buku
             WHERE loker_buku='" . $loker_buku . "'" 
        );
        $hasil = []; 
        
        while ($row = mysqli_fetch_assoc($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
}
