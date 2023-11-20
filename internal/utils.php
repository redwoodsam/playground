<?php

/*
Verifies if a given object is not empty or has not been declared
*/
function isValuePresent($var)
{
    if (!isset($var)) {
        return false;
    }

    if (is_string($var) && strlen($var) === 0) {
        return false;
    }

    if (is_array($var)) {
        $arr = array_filter($var);
        if (count($arr) === 0) {
            return false;
        }
    }

    return true;
}
