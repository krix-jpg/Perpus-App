<?php

class Buku {

    private $conn;
    private $table_name = "buku";

    public $ID;
    public $ISBN;
    public $Judul;
    public $Pengarang;
    public $Kategori_ID;
    public $Penerbit_ID;
    public $Deskripsi;
    public $Stok;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        // Insert query
        $query = "INSERT INTO " . $this->table_name . " (ISBN, Judul, Pengarang, Kategori_ID, Penerbit_ID, Deskripsi, Stok) VALUES (:ISBN, :Judul, :Pengarang, :Kategori_ID, :Penerbit_ID, :Deskripsi, :Stok)";
        
        // Prepare the query
        $result = $this->conn->prepare($query);

        // Sanitize and assign values
        $this->ISBN = htmlspecialchars(strip_tags($this->ISBN));
        $this->Judul = htmlspecialchars(strip_tags($this->Judul));
        $this->Pengarang = htmlspecialchars(strip_tags($this->Pengarang));
        $this->Kategori_ID = $this->Kategori_ID;
        $this->Penerbit_ID = $this->Penerbit_ID;
        $this->Deskripsi = htmlspecialchars(strip_tags($this->Deskripsi));
        $this->Stok = (int) $this->Stok;
    
        // Bind parameters
        $result->bindParam(":ISBN", $this->ISBN);
        $result->bindParam(":Judul", $this->Judul);
        $result->bindParam(":Pengarang", $this->Pengarang);
        $result->bindParam(":Kategori_ID", $this->Kategori_ID);
        $result->bindParam(":Penerbit_ID", $this->Penerbit_ID);
        $result->bindParam(":Deskripsi", $this->Deskripsi);
        $result->bindParam(":Stok", $this->Stok);
    
        // Execute the query and return true/false based on success
        if ($result->execute()) {
            return true;
        } else {
            // Print error message if execution fails
            printf("Error: %s.\n", $result->error);
            return false;
        }
    }
    
    function readAll() {
        $query = "SELECT buku.ID,
                        buku.ISBN,
                        buku.Judul,
                        buku.Pengarang,
                        buku.Kategori_ID,
                        buku.Penerbit_ID,
                        buku.Deskripsi,
                        buku.Stok,
                        kategori.NamaKategori,
                        penerbit.NamaPenerbit
                        FROM buku 
                        JOIN kategori ON buku.Kategori_ID = kategori.ID
                        JOIN penerbit ON buku.Penerbit_ID = penerbit.ID";
        
        $result = $this->conn->prepare($query);
        $result->execute();
        
        return $result;
    }
    function readOne() {
        //select by ID
        $query = "SELECT * FROM " . $this->table_name . " WHERE ID = ?";
    
        $result = $this->conn->prepare($query);
        $result->bindParam(1 , $this->ID);
        $result->execute();
    
        // Check if the query returns any rows
        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
    
            $this->ISBN = $row["ISBN"];
            $this->Judul = $row["Judul"];
            $this->Pengarang = $row["Pengarang"];
            $this->Kategori_ID = $row["Kategori_ID"];
            $this->Penerbit_ID = $row["Penerbit_ID"];
            $this->Deskripsi = $row["Deskripsi"];
            $this->Stok = $row["Stok"];
        } else {
            // Handle the case when no rows are returned
            // For example, log an error or display an error message
            exit("No book found with ID: " . $this->ID);
        }
    }
    
    
    function update() {
        $query = "UPDATE " . $this->table_name . " SET 
                                                    ISBN = :ISBN, 
                                                    Judul = :Judul, 
                                                    Pengarang = :Pengarang, 
                                                    Kategori_ID = :Kategori_ID,
                                                    Penerbit_ID = :Penerbit_ID,
                                                    Deskripsi = :Deskripsi,
                                                    Stok = :Stok
                                                    WHERE 
                                                    ID = :ID";
                                                    
        $result = $this->conn->prepare($query);
    
        
        $this->ID = (int) $this->ID;
        $this->ISBN = htmlspecialchars(strip_tags($this->ISBN));
        $this->Judul = htmlspecialchars(strip_tags($this->Judul));
        $this->Pengarang = htmlspecialchars(strip_tags($this->Pengarang));
        $this->Kategori_ID = (int) $this->Kategori_ID;
        $this->Penerbit_ID = (int) $this->Penerbit_ID;
        $this->Deskripsi = htmlspecialchars(strip_tags($this->Deskripsi));
        $this->Stok = (int) $this->Stok;
        
        $result->bindParam(":ID", $this->ID);
        $result->bindParam(":ISBN", $this->ISBN);
        $result->bindParam(":Judul", $this->Judul);
        $result->bindParam(":Pengarang", $this->Pengarang);
        $result->bindParam(":Kategori_ID", $this->Kategori_ID);
        $result->bindParam(":Penerbit_ID", $this->Penerbit_ID);
        $result->bindParam(":Deskripsi", $this->Deskripsi);
        $result->bindParam(":Stok", $this->Stok);
        
    
        $result->execute();
    }
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID = ? ";

        $result = $this->conn->prepare($query);
        $result->bindParam(1 , $this->ID);

        $result->execute();
    }
}


?>
