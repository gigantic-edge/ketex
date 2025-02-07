<?php

//include 'pdo-debug.php';

class order {

    private $conn;
    private $category = 'product_category';
    private $attributemaster = 'attribute_master';
    private $attributedetails = 'attribute_details';
    private $tagtable = 'product_tag';
    private $producttable = 'product_master';
    private $productimgtable = 'product_image';
    private $productattrtable = 'product_attribute_details';
    private $schemetable = 'scheme_master';
    private $userschemetable = 'user_scheme';
    private $usertable = 'user_master';
    private $quotationmaster = 'quotation_master';
    private $quotationdetails = 'quotation_details';
    private $enquiry = 'enquiry_master';
    public $sm_id;
    public $sm_um_id;
    public $sm_project;
    public $sm_qty;
    public $sm_note;
    public $sm_status;
    public $sm_date;
    public $us_id;
    public $us_um_id;
    public $us_sm_id;
    public $us_pm_id;
    public $us_quantity;
    public $us_date;
    public $um_id;
    public $pm_id;
    public $qm_id;
    public $qm_um_id;
    public $qm_sm_id;
    public $qm_status;
    public $qm_added_date;
    public $qm_response_date;
    public $qd_id;
    public $qd_qm_id;
    public $qd_us_id;
    public $qd_pm_id;
    public $qd_quantity;
    public $qd_unit_price;
    public $qd_total_price;
    public $qd_quotation_unit_price;
    public $qd_quotation_total_price;
   // public $pi_pm_id;
   // public $pi_image;
    public function __construct($db) {
        $this->conn = $db;
        $this->conn->query("SET @@SESSION.sql_mode = '';");
    }

    public function listScheme() {
        $list = [];
        $query = "select sm.*,um.um_name,um.um_company,"
                . "qm.qm_quotation_number,qm.qm_id,qm.qm_response_date from "
                . $this->schemetable . " sm, "
                . $this->usertable . " um, "
                . $this->quotationmaster . " qm "
                . "where sm.sm_um_id = um.um_id "
                . "and sm.sm_id = qm.qm_sm_id "
                . "and sm.sm_status not in (0,1)"
                . "order by sm.sm_id desc";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($rowpat = $stmt->fetch()) {
            $list[] = array(
                'qm_id' => $rowpat['qm_id'],
                'qm_quotation_number' => $rowpat['qm_quotation_number'],
                'qm_response_date' => $rowpat['qm_response_date'],
                'um_name' => $rowpat['um_name'],
                'um_company' => $rowpat['um_company'],
                'sm_id' => $rowpat['sm_id'],
                'sm_um_id' => $rowpat['sm_um_id'],
                'sm_project' => $rowpat['sm_project'],
                'sm_qty' => $rowpat['sm_qty'],
                'sm_note' => $rowpat['sm_note'],
                'sm_status' => $rowpat['sm_status'],
                'sm_date' => $rowpat['sm_date']
            );
        }
        return $list;
    }
    
    
    public function listSchemeUser() {
        $list = [];
        $query = "select sm.*,um.um_name,um.um_company,"
                . "qm.qm_quotation_number,qm.qm_id,qm.qm_response_date from "
                . $this->schemetable . " sm, "
                . $this->usertable . " um, "
                . $this->quotationmaster . " qm "
                . "where sm.sm_um_id = um.um_id "
                . "and sm.sm_id = qm.qm_sm_id "
                . "and sm.sm_status not in (0,1) "
                . "and um.um_id = '".$this->um_id."' "
                . "order by sm.sm_id desc";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($rowpat = $stmt->fetch()) {
            $list[] = array(
                'qm_id' => $rowpat['qm_id'],
                'qm_quotation_number' => $rowpat['qm_quotation_number'],
                'qm_response_date' => $rowpat['qm_response_date'],
                'um_name' => $rowpat['um_name'],
                'um_company' => $rowpat['um_company'],
                'sm_id' => $rowpat['sm_id'],
                'sm_um_id' => $rowpat['sm_um_id'],
                'sm_project' => $rowpat['sm_project'],
                'sm_qty' => $rowpat['sm_qty'],
                'sm_note' => $rowpat['sm_note'],
                'sm_status' => $rowpat['sm_status'],
                'sm_date' => $rowpat['sm_date']
            );
        }
        return $list;
    }

    public function quotationDetails() {
        $list = [];
        $query = "select qd.*,pm.*,pc.pc_name from "
                . $this->quotationdetails . " qd, "
                . $this->producttable . " pm, "
                . $this->category . " pc 
where 
qd.qd_pm_id = pm.pm_id 
and pm.pm_pc_id = pc.pc_id
and qd.qd_qm_id = '" . $this->qd_qm_id . "'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($rowpat = $stmt->fetch()) {
            $list[] = array(
                'qd_id' => $rowpat['qd_id'],
                'qd_quantity' => $rowpat['qd_quantity'],
                'qd_unit_price' => $rowpat['qd_unit_price'],
                'qd_total_price' => $rowpat['qd_total_price'],
                'qd_quotation_unit_price' => $rowpat['qd_quotation_unit_price'],
                'qd_quotation_total_price' => $rowpat['qd_quotation_total_price'],
                'pm_id' => $rowpat['pm_id'],
                'pm_name' => $rowpat['pm_name'],
                'pm_slug' => $rowpat['pm_slug'],
                'pm_pc_id' => $rowpat['pm_pc_id'],
                'pm_pb_id' => $rowpat['pm_pb_id'],
                'pm_display_type' => $rowpat['pm_display_type'],
                'pm_short_description' => $rowpat['pm_short_description'],
                'pm_description' => $rowpat['pm_description'],
                'pm_sku' => $rowpat['pm_sku'],
                'pm_mrp' => $rowpat['pm_mrp'],
                'pm_weight' => $rowpat['pm_weight'],
                'pm_added_modified' => $rowpat['pm_added_modified'],
                'pm_status' => $rowpat['pm_status'],
                'pc_name' => $rowpat['pc_name']
            );
        }
        return $list;
    }

    public function quotationscheme() {

        $query = "select um.um_name,sm.sm_id,sm.sm_project,sm.sm_qty,sm.sm_status,qm.qm_id,
qm.qm_quotation_number,qm.qm_um_id,qm.qm_status,qm.qm_version from "
                . $this->schemetable . " sm, "
                . $this->quotationmaster . " qm, "
                . $this->usertable . " um  
where 
qm.qm_sm_id = sm.sm_id 
and qm.qm_um_id = um.um_id 
and qm.qm_id = '" . $this->qd_qm_id . "'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateQuantityProductScheme() {

        $query = "update " . $this->quotationdetails . " set qd_quotation_unit_price=:qd_quotation_unit_price, "
                . "qd_quotation_total_price=:qd_quotation_total_price "
                . "where qd_id = :qd_id";


        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $bind = array(':qd_quotation_unit_price' => $this->qd_quotation_unit_price,
            ':qd_quotation_total_price' => $this->qd_quotation_total_price, ':qd_id' => $this->qd_id);

        //return PdoDebugger::show($query, $bind);

        if ($stmt->execute($bind)) {
            return true;
        } else {
            return false;
        }
    }
    

    public function updateSchemeStatus() {

        $query = "update " . $this->schemetable . " set sm_status=:sm_status where sm_id = :sm_id";


        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $bind = array(':sm_status' => $this->sm_status, ':sm_id' => $this->sm_id);

        //return PdoDebugger::show($query, $bind);

        if ($stmt->execute($bind)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updateQuotationStatus() {

        $query = "update " . $this->quotationmaster . " set qm_status=:qm_status,qm_response_date=:qm_response_date where qm_id = :qm_id";


        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $bind = array(':qm_status' => $this->qm_status,':qm_response_date' => $this->qm_response_date,
            ':qm_id' => $this->qm_id);

        //return PdoDebugger::show($query, $bind);

        if ($stmt->execute($bind)) {
            return true;
        } else {
            return false;
        }
    }


    public function singlescheme() {

        $query = "select * from "
                . $this->schemetable . " "
                . "where sm_id = '" . $this->sm_id . "'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updatesingleschemeversion() {

        $query = "update "
                . $this->quotationmaster . " set qm_version='".$this->qm_version."'"
                . " where qm_id = '" . $this->qm_id . "'";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $bind = array('qm_version' => $this->qm_version);
        return $bind;
        
    }
    
    
    public function singlequotation() {

        $query = "select * from "
                . $this->quotationmaster . " "
                . "where qm_id = '" . $this->qm_id . "'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function singleuser() {

        $query = "select * from "
                . $this->usertable . " "
                . "where um_id = '" . $this->um_id . "'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function quotationcount() {

        $query = "select count(*) qtncnt from "
                . $this->quotationmaster . " "
                . "where qm_status = '0'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function notificationcount() {

        $query = "select count(*) inqrycnt from "
                . $this->enquiry . " "
                . "where em_date >= DATE_SUB(CURDATE(),INTERVAL 5 day)";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function productImage1() {

        $query = "select pi_image from "
                . $this->productimgtable . " where pi_pm_id = '" . $this->pm_id . "' "
                . "order by pi_id limit 1";
            
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
