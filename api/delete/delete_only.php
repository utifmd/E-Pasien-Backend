<?php
require "../../config/database.php";

/*
* Created by utifmd@gmail.com
* */
class DeleteOnly extends MysqlRestApi {
    public function lineQuery(): string {
        $table_first = $this->_table[0];
        $content_key_first = array_keys($this->_content)[0];
        $content_val_first = array_values($this->_content)[0];
        
        return "DELETE FROM ".$table_first." 
            WHERE $content_key_first = $content_val_first";
    }
}

$delete_only = new DeleteOnly('{
    "operation":{
        "action" : "delete",
        "table" : ["antriloket", "antriapotek"],
        "content": {
            "antrian": "1"
        }
    }
}');

echo $delete_only->onOperation();

?>