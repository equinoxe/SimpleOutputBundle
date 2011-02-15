<?php
echo '<?xml version="1.0" encoding="UTF-8"?><content>' . simpleArrayToXml($response) . '</content>';

function simpleArrayToXml($arr, $numericName = 'item')
{
    $str = '';
    foreach ($arr as $key => $val) {
        if (is_numeric($key)) {
            $key = $numericName;
        }
        $str .= "<$key>";
        if (is_array($val)) {
            $str .= simpleArrayToXml($val, $numericName);
        } else {
            $str .= cleanStringForXml((string) $val);
        }
        $str .= "</$key>";
    }
    return $str;
}

function cleanStringForXml($string)
{
    $strout = null;
    for ($i = 0; $i < strlen($string); $i++) {
        $ord = ord($string[$i]);

        if (($ord > 0 && $ord < 32) || ($ord >= 127)) {
            $strout .= "&amp;#{$ord};";
        } else {
            switch ($string[$i]) {
                case '<':
                    $strout .= '&lt;';
                    break;
                case '>':
                    $strout .= '&gt;';
                    break;
                case '&':
                    $strout .= '&amp;';
                    break;
                case '"':
                    $strout .= '&quot;';
                    break;
                default:
                    $strout .= $string[$i];
            }
        }
    }
    return $strout;
}