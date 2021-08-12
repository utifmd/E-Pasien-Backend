<?php
// require_once "./config/database.php";

/*
* Created by utifmd@gmail.com
* */

/*$restApi = new MysqlRestApi('{
    "config":{
        "host":"mysql", 
        "user": "root", 
        "pswd": "9809poiiop", 
        "dbse": "sik", 
        "port": "3306"}
    }', '{
        "operation":{
            "name" : "fetch_only",
            "table": ["bangsal"]
        }
    }');*/

/*
if($_SERVER['REQUEST_METHOD'] == 'GET')
    echo $restApi->onOperation();
else 
    echo $restApi->onComplete(null, "Access forbidden.");
*/

    /* '{
        "operation":{
            "name" : "fetch_join_double_complete",
            "table": ["bangsal", "kamar"],
            "select": [
                "kamar.kd_kamar",
                "bangsal.nm_bangsal",
                "kamar.kelas",
                "kamar.trf_kamar",
                "kamar.status"
            ],
            "on": "kd_bangsal",
            "where": "kamar.statusdata=\'1\' ",
            "or": [
                "kamar.kd_kamar like \'%anggrek%\'",
                "bangsal.nm_bangsal like \'%anggrek%\'",
                "kamar.kelas like \'%anggrek%\'",
                "kamar.status like \'%anggrek%\'"
            ],
            "order_by": "kamar.kelas"
        }
    }' */
?>

<?php
// require_once "../api/fetch_only.php";

/*
* Created by utifmd@gmail.com
* */
// class MysqlRestApi {
//     public function __construct($passed_object, $passed_operation){
//         $this->_config = json_decode($passed_object, true)['config'];
//         $this->_operator = json_decode($passed_operation, true)['operation'];

//         $this->_mysqli = new mysqli(
//             $this->_config["host"],
//             $this->_config["user"],
//             $this->_config["pswd"],
//             $this->_config["dbse"],
//             $this->_config["port"]);

//         header('Content-Type: application/json');
//         error_reporting(0);
//     }

//     function onDatabase($line_query){
//         $this->_query = $this->_mysqli->query($line_query);
        
//         /*
//         * HANDLE ERROR
//         * */
//         if(mysqli_connect_errno())
//             echo $this->onComplete(null, mysqli_connect_error());
//         else if(!$this->_query) 
//             echo $this->onComplete(null, $this->_mysqli->error);
//     }

//     function onOperation(){
//         $_table = $this->_operator['table'];
//         $_select = $this->_operator['select'];
//         $_on = $this->_operator['on'];
//         $_where = $this->_operator['where'];
//         $_or = $this->_operator['or'];
//         $_order_by = $this->_operator['order_by'];
        
//         $table_first = $_table[0];
//         $table_secnd = $_table[1];
//         $table_third = $_table[3];

//         switch ($this->_operator['name']) {
//             case "fetch_only":
//                 $this->onDatabase("SELECT * FROM ". $table_first .""); /* INNER JOIN $_table_next_1 ON $_table_next_1.`$str_col_1_container` = $this->table.`$str_col_1_container` WHERE $this->table.`$str_col_1_container` = '$str_row_1_container'"); */
//                 while($row = $this->_query->fetch_assoc()){
//                     $rows[] = $row;
//                 }
//                 echo $this->onComplete($rows, "success");
//                 break;
            
//             case "fetch_join_double_complete":
//                 $this->onDatabase("select ".implode(",", $_select)."
//                     from ".$table_first."
//                     inner join ".$table_secnd." 
//                     on $table_secnd.`$_on` = $table_first.`$_on` 
//                     where $_where and (".implode(" or ", $_or).")
//                     order by $_order_by");
                        
//                 while($row = $this->_query->fetch_assoc()){
//                     $rows[] = $row;
//                 }
                
//                 echo $this->onComplete($rows, "success");
//                 break;

//             default:
//                 echo $this->onComplete(null, "failed operation"); // $default = "SELECT '$this->_config['host'] $this->_config['user'] $this->_config['pswd'] $this->_config['dbase'] $this->_config['port']' as passed";
//                 break;
//         }
//     }

//     function onComplete($data, $throwable){
//         if($data != null) 
//             $status = http_response_code();
//         else $status = 404;

//         $result = array(
//             "status" => $status, 
//             "message" => $throwable, 
//             "data" => $data
//         );

//         return json_encode($result, JSON_PRETTY_PRINT);
//     }
// }

?>