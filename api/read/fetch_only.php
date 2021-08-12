<?php
require "../../config/database.php";

/*
* Created by utifmd@gmail.com
* */
class FetchOnly extends MysqlRestApi {
    public function lineQuery(): string {
        return "SELECT * FROM ".$this->_table[0];
    }
}

$fetch_only = new FetchOnly('{
    "operation":{
        "action" : "get",
        "table" : ["antriloket"]
    }
}');

echo $fetch_only->onOperation();

?>