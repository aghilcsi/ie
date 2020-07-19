<?php

if (!function_exists("encode_me")) {
    function encode_me($id)
    {
        $id = strval($id);
        $res = "";
        for ($i = 0; $i < strlen($id); $i++) {
            $char = $id[$i];
            switch ($char) {
                case '0':
                    $res .= 'jeqc';
                    break;
                case '1':
                    $res .= 'ndcv';
                    break;
                case '2':
                    $res .= 'pwwa';
                    break;
                case '3':
                    $res .= 'mnvb';
                    break;
                case '4':
                    $res .= 'uyff';
                    break;
                case '5':
                    $res .= 'oidd';
                    break;
                case '6':
                    $res .= 'vdqp';
                    break;
                case '7':
                    $res .= 'nbqq';
                    break;
                case '8':
                    $res .= 'llos';
                    break;
                case '9':
                    $res .= 'cxzo';
                    break;
                default:
                    break;
            }

        }
        return $res;
    }
}

if (!function_exists('decode_me')) {
    function decode_me($res)
    {
        $id = "";
        for ($i = 0; $i < strlen($res) - 1; $i += 4) {
            try {
                $char = $res[$i] . $res[$i + 1] . $res[$i + 2] . $res[$i + 3];
                switch ($char) {
                    case 'jeqc':
                        $id .= '0';
                        break;
                    case 'ndcv':
                        $id .= '1';
                        break;
                    case 'pwwa':
                        $id .= '2';
                        break;
                    case 'mnvb':
                        $id .= '3';
                        break;
                    case 'uyff':
                        $id .= '4';
                        break;
                    case 'oidd':
                        $id .= '5';
                        break;
                    case 'vdqp':
                        $id .= '6';
                        break;
                    case 'nbqq':
                        $id .= '7';
                        break;
                    case 'llos':
                        $id .= '8';
                        break;
                    case 'cxzo':
                        $id .= '9';
                        break;
                    default:
                        break;
                }
            } catch (Exception $e) {
                return 0;
            }
        }

        return intval($id);
    }
}

if (!function_exists('price_format')) {
    function price_format($num)
    {
        $num = strval($num);
        $ln = strlen($num);
        if ($ln == 1 || $ln == 2 || $ln == 3)
            return $num;
        $res = "";
        $itr = 0;
        for ($i = strlen($num) - 1; $i >= 0; $i--) {
            $res = $num[$i] . $res;
            $itr++;
            if ($itr % 3 == 0) {
                $res = ',' . $res;
            }
        }
        if (strpos($res, ',') === 0) {
            $res = substr($res, 1);
        }
        return $res;
    }

}