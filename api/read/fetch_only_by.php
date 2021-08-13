<?php
require "../../config/database.php";
require "../../mapper/helper.php";

/*
* Created by utifmd@gmail.com
* */
class FetchOnlyBy extends MysqlRestApi {
    public function lineQuery(): string {
        
        $mapper = Helper::mapToOrString(
            array_keys($this->_content),
            array_values($this->_content)
        );

        return "SELECT * FROM ".$this->_table[0]." WHERE ".$mapper;
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