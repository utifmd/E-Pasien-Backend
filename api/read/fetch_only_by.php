<?php
require "../../config/database.php";
require "../../mapper/helper.php";

/*
* Created by utifmd@gmail.com
* */
class FetchOnlyBy extends MysqlRestApi {
    public function lineQuery(): string { // echo "SELECT * FROM ".$this->_table[0]." WHERE ".implode(" - ", array_keys($this->_content));
        $mapper = Helper::mapToOrString(
            array_keys($this->_content),
            array_values($this->_content)
        );

        return "SELECT * FROM ".$this->_table[0]." WHERE ".$mapper; // return "SELECT * FROM ".$this->_table[0]." WHERE //     ".array_keys($this->_content)[0]." = //     ".array_values($this->_content)[0]; 
    }
}

$fetch_only_by = new FetchOnlyBy('{
    "operation":{
        "action" : "get",
        "table" : ["antriloket"],
        "content": {
            "antrian": "73",
            "loket": "3"
        }
    }
}');

echo $fetch_only_by->onOperation();
?>