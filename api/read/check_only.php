<?php
require "../../config/database.php";
require "../../mapper/helper.php";

/*
* Created by utifmd@gmail.com
* */
class CheckOnly extends MysqlRestApi {
    public function lineQuery(): string {
        $mapper = Helper::mapToAndString(
            array_keys($this->_content),
            array_values($this->_content)
        );

        return "SELECT COUNT(1) as length 
            FROM ".$this->_table[0]." 
            WHERE ".$mapper;
    }
}

$check_only = new CheckOnly('{
    "operation": {
        "action": "check",
        "table": ["login_backend"],
        "content": {
            "username": "utifmd",
            "password": "121212"
        }
    }
}');

echo $check_only->onOperation();
?>