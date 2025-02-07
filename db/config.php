<?php



class Database {



    //DB Params

    private $host = 'localhost';

    private $db_name = 'ketexcom_ketex_new';

    private $username = 'root';

    private $password = '';

    private $conn;

    // public $base_url = "https://ketex.com/";

    public $base_url = "http://localhost/ketex/";
    

    public $document_path_site_image = "/upload/profile_image/";

    public $document_path_recruiters = "/upload/logo/Amritsar Logo Final PNG/";

    // public $document_path_logo = "/upload/logo/";

    public $document_path_product = "/upload/product/";

    public $document_path_page = "upload/page/";

    public $document_path_signature = "upload/signature/";

    public $document_path_site_career = "/upload/Carrier_img/";

    public $document_path_site_inlogo = "/upload/in_logo_img/";

    public $document_path_site_outlogo = "/upload/out_logo_img/";

    public $document_path_site_logofinal = "/upload/Logo_Final/";



    //db Connect

     public function connect() {

        $this->conn = null;

        try {

            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE); // there are other ways to set attributes. this is one

        } catch (Exception $e) {

            echo 'Connection Error: ' . $e->getMessage();

        }

        return $this->conn;

    }





   

    

    

    

}

