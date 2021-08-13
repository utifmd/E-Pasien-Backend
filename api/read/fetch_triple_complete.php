<?php
require "../../config/database.php";

/*
* Created by utifmd@gmail.com
* */
class FetchTripleComplete extends MysqlRestApi {
    public function lineQuery(): string { // for($i = 0; $i < count($this->_table); $i++){ }
        $table_first = $this->_table[0];
        $table_secnd = $this->_table[1];
        $table_third = $this->_table[2];
        
        return "SELECT ".implode(",", $this->_select)."
            FROM ".$table_first."
            INNER JOIN ".$table_secnd." 
            ON $table_secnd.`$this->_on` = $table_first.`$this->_on`
            
            INNER JOIN ".$table_third." 
            ON $table_third.`$this->_on` = $table_first.`$this->_on`

            WHERE $this->_where AND (".implode(" or ", $this->_or).")
            ORDER BY $this->_order_by";
    }
}

/*
$fetch_triple = new FetchTripleComplete('{
    "operation":{
        "action": "get",
        "table" : ["tb_one", "tb_two", "tb_three"],
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

$fetch_triple->onOperation();
*/
?>