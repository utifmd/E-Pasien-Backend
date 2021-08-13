<?php

class Helper {
    function mapToString($keys, $values) {
        $a = 0; $b = 0; $idx = 0;
        $pop = array();
        $result = array();
    
        while($a < count($keys) && $b < count($values)){
            $result[$idx++] = $keys[$a++]."` = '";
            $result[$idx++] = $values[$b++]."', `";
        }
    
        return rtrim(("`".implode("", $result)), ", `");
    }
    
    function mapToOrString($keys, $values) {
        $a = 0; $b = 0; $idx = 0;
        $pop = array();
        $result = array();
    
        while($a < count($keys) && $b < count($values)){
            $result[$idx++] = $keys[$a++]."` = '";
            $result[$idx++] = $values[$b++]."' OR `";
        }
    
        return rtrim(("`".implode("", $result)), " OR `");
    }
    
    function mapToAndString($keys, $values) {
        $a = 0; $b = 0; $idx = 0;
        $pop = array();
        $result = array();
    
        while($a < count($keys) && $b < count($values)){
            $result[$idx++] = $keys[$a++]."` = '";
            $result[$idx++] = $values[$b++]."' AND `";
        }
    
        return rtrim(("`".implode("", $result)), " AND `");
    }
}
?>