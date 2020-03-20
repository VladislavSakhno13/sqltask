<?php
$inputJSON = file_get_contents('php://input');
 $input = json_decode($inputJSON, TRUE);

 $conect = new mysqli('127.0.0.1','root','','doctors');
 if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
        $data = array();
        $sql = $conect->query("SELECT C.`FULL_NAME`, C.`SPEC`, o.`sumorders` FROM doctors C INNER JOIN ( SELECT DOC_ID, SUM(SUMM) AS sumorders FROM transactions where DATE LIKE '%2019' group by doc_id HAVING SUM(summ) > 2500 )O ON C.id = O.doc_id");
        while ($d = $sql->fetch_assoc()) {
            $data[] = $d;   
    }
    exit(json_encode($data));
}
