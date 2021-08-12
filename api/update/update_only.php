<?php
require "../../config/database.php";
require "../../mapper/helper.php";

/*
* Created by utifmd@gmail.com
* */
class UpdateOnly extends MysqlRestApi {
    public function lineQuery(): string {
        $table_first = $this->_table[0];
        $table_first = $this->_table[0];
        
        $content_key_first = array_keys($this->_content)[0];
        $content_val_first = array_values($this->_content)[0];
        
        $mapper = Helper::mapToString(
            array_keys($this->_content),
            array_values($this->_content)
        ); // return "SELECT * FROM antriloket"; // echo "UPDATE $table_first SET $mapper WHERE $content_key_first = $content_val_first"; //"INSERT INTO $_table_next_1 (`$str_col_next_1`) VALUES ('$str_row_next_1')";

        return "UPDATE $table_first SET $mapper 
            WHERE $content_key_first = $content_val_first";
    }
}

$update_only = new UpdateOnly('{
    "operation":{
        "action" : "update",
        "table" : ["antriloket", "antriapotek"],
        "content": {
            "loket": "7",
            "antrian": "73"
        }
    }
}');

echo $update_only->onOperation();

?>