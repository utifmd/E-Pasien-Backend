<?php
require "../../config/database.php";

/*
* Created by utifmd@gmail.com
* */
class CreateOnly extends MysqlRestApi {
    public function lineQuery(): string {
        $table_first = $this->_table[0];

        return "INSERT INTO $table_first 
            (`".implode("`, `", array_keys($this->_content))."`) VALUES 
            ('".implode("', '", array_values($this->_content))."')"; 

        // return "SELECT * FROM ".$this->_table[0];
    }
}

$create_only = new CreateOnly('{
    "operation":{
        "action" : "post",
        "table" : ["antriloket", "antriapotek"],
        "content": {
            "loket": "7",
            "antrian": "3"
        }
    }
}');

echo $create_only->onOperation();

?>