<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/class/DBController.php');
class Document
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addDocument($loginuser,$type, $image) {
        $query = "INSERT INTO documents (type, image,user_id) VALUES ( ?, ?, ?)";
        $paramType = "ssi";
        $paramValue = array(
            $type,
            $image,
            $loginuser,
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    

    
    function deleteDocument($document_id) {
        $query = "DELETE FROM documents WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $document_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getDocumentById($document_id) {
        $query = "SELECT * FROM documents WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $document_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getAllDocument($userid) {
        $query = "SELECT * FROM documents WHERE user_id = ?";
        $paramType = "i";
        $paramValue = array(
            $userid
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
}
?>
