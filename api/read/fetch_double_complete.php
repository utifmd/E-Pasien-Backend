<?php
require_once "../../config/database.php";

/*
* Created by utifmd@gmail.com
* */
class FetchDoubleComplete extends MysqlRestApi {
    public function lineQuery(): string {
        $table_first = $this->_table[0];
        $table_secnd = $this->_table[1];
        
        return "SELECT ".implode(",", $this->_select)."
            FROM ".$table_first."
            INNER JOIN ".$table_secnd." 
            ON $table_secnd.`$this->_on` = $table_first.`$this->_on` 
            WHERE $this->_where AND (".implode(" or ", $this->_or).")
            ORDER BY $this->_order_by";
    }
}

$fetch_complete = new FetchDoubleComplete('{
    "operation":{
        "action": "get",
        "table" : ["kamar", "bangsal"],
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
}');

echo $fetch_complete->onOperation();

?>