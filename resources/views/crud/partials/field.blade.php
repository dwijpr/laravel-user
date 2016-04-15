<?php
    $return = $object->$field;
    if (!is_numeric($key)) {
        $return = "-";
        if (count($object->$key) > 0) {
            $return = "";
            foreach ($object->$key as $_object) {
                $return .= "<div>";
                $return .= $_object->$field;
                $return .= "</div>";
            }
        }
        echo $return;
    } else {
        echo e($return);
    }
?>
