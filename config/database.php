<?php

/*
* Created by utifmd@gmail.com
* */
abstract class MysqlRestApi {
    private static function config(): string {
        return '{
            "host": "mysql", 
            "user": "root", 
            "pswd": "9809poiiop", 
            "dbse": "sik", 
            "port": "3306"
        }';
    }

    protected abstract function lineQuery(): string;
    
    public function __construct($passed_operation){
        $this->_config = json_decode($this::config(), true); // ['config'];
        $this->_operation = json_decode($passed_operation, true)['operation'];
        
        $this::onCreateProps();

        $this->_mysqli = new mysqli(
            $this->_config["host"],
            $this->_config["user"],
            $this->_config["pswd"],
            $this->_config["dbse"],
            $this->_config["port"]);

        header('Content-Type: application/json');
        error_reporting(0);
    }

    private function onCreateProps(){
        $this->_action = $this->_operation['action'];
        $this->_table = $this->_operation['table'];
        $this->_content = $this->_operation['content'];
        $this->_select = $this->_operation['select'];
        $this->_on = $this->_operation['on'];
        $this->_where = $this->_operation['where'];
        $this->_or = $this->_operation['or'];
        $this->_order_by = $this->_operation['order_by'];
    }

    function onDatabase($line_query){
        $this->_query = $this->_mysqli->query($line_query);
        
        if(mysqli_connect_errno()){
            echo $this->onComplete(null, mysqli_connect_error());
            exit();
        } else if(!$this->_query) 
            echo $this->onComplete(null, $this->_mysqli->error);
    }

    function onOperation(){
        $this->onDatabase($this->lineQuery());
    
        switch ($this->_action) {
            case 'get':
                while($row = $this->_query->fetch_assoc()){
                    $rows[] = $row;
                }
                echo $this->onComplete($rows, "success");
                break;

            case 'post':
                if($this->_query) echo $this->onComplete("successfully added", "success");
                else echo $this->onComplete("failed while adding the data", "failed");
                break;

            case 'update':
                if($this->_query) echo $this->onComplete("successfully updated", "success");
                else echo $this->onComplete("failed while updating the data", "failed");
                break;

            case 'delete':
                if($this->_query) echo $this->onComplete("successfully deleted", "success");
                else echo $this->onComplete("failed to remove the data", "failed");
                break;
            
            case 'check':
                if($this->_query) {
                    while($row = $this->_query->fetch_assoc())
                        $length = (int)$row['length'];
                    
                    echo $this->onComplete($length, $length != 0 ? "success" : "failed");
                } else echo $this->onComplete("failed while checking the data", "failed");
                break;

            default: echo $this->onComplete("invalid operation", "error");
                break;
        }
    }

    function onComplete($data, $throwable){
        switch ($throwable) {
            case 'success':
                $status = http_response_code(); break;
            case 'failed':
                $status = 401; break;
            default:
                $status = 404; break;
        }

        $result = array(
            "status" => $status, 
            "message" => $throwable, 
            "data" => $data
        );

        return json_encode($result, JSON_PRETTY_PRINT);
    }
}
?>