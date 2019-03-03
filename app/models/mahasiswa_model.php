<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM '. $this->table.' WHERE id=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa
                    VALUES
                ('', :nama,:nrp, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function editDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa
                    SET
               nama = :nama,
               nrp = :nrp,
               email = :email,
               jurusan = :jurusan
               WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();

    }


    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}

   /* private $dbh; //database handler
    private $stmt;

    public function __construct()
    {
        //data source name
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    } */

   /*  private $mhs = [
         [
             "nama" => "Maharani",
             "nrp" => "000234555099",
             "email" => "animaharani455@gmail.com",
             "jurusan" => "Multimedia"
         ],
         [
             "nama" => "Kevin",
             "nrp" => "000234555098",
             "email" => "kevinsanjaya@gmail.com",
             "jurusan" => "Teknik Informatika"
         ],
             [ 
             "nama" => "Chengkai",
             "nrp" => "000234555097",
             "email" => "hanchengkai@gmail.com",
             "jurusan" => "Teknik Industri"
             ]
     ]; */

   /* public function getAllMahasiswa()
    {
        $this->stmt = $this->dbh->prepare('SELECT*FROM mahasiswa');
        //mahasiswa = nama tabel di database
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $this->mhs;
    }
}*/
