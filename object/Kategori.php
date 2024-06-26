<?php

class Kategori {
    // koneksi database dan nama tabel
    private $conn;
    private $table_name = "kategori";
    // property object anggota
    public $ID;
    public $NamaKategori;
    
    public function __construct($db) {
        $this->conn = $db;
    }
     function create() {
    //insert
        $query = "INSERT INTO " . $this->table_name . " (ID, NamaKategori)" .
                            " VALUES (:ID, :NamaKategori)";

        $result = $this->conn->prepare($query);

        $this->NamaKategori = htmlspecialchars(strip_tags($this->NamaKategori));
    
        $result->bindParam(":ID", $this->ID);
        $result->bindParam(":NamaKategori", $this->NamaKategori);

        if($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function readAll() {
        // select
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }

    function readOne() {
        //select by ID
        $query = "SELECT * FROM " . $this->table_name . " WHERE ID = ?";

        $result = $this->conn->prepare($query); 
        $result->bindParam(1, $this->ID);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $this->NamaKategori = $row["NamaKategori"];
    }

    function update() {
        // Prepare the SQL query for updating a record
        $query = "UPDATE " . $this->table_name . " 
                  SET NamaKategori = :NamaKategori 
                  WHERE ID = :ID";
    
        // Prepare the SQL statement
        $statement = $this->conn->prepare($query);
    
        // Clean and sanitize the NamaKategori value
        $this->NamaKategori = htmlspecialchars(strip_tags($this->NamaKategori));
    
        // Bind parameters with values
        $statement->bindParam(":NamaKategori", $this->NamaKategori);
        $statement->bindParam(":ID", $this->ID);
    
        // Execute the update statement
        if ($statement->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }
    

    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";

        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);

        $result->execute();
    }
}
?>
</body>
</html>