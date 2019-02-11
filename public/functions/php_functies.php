
<?php

function init_ActiveLinks($arg) {

    $alnk['homepage'] = "";
    $alnk['login'] = "";
    $alnk['plaatsen'] = "";
    $alnk['profiel'] = "";

    $alnk[$arg] = "active";

    return $alnk;
}


    /*  generieke functies */

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function get_verlopendagen($dt) {
    $nu = date_create(date("Y-m-d H:i:s", time()));
    $toen = date_create($dt);
    $fnu = date_format($nu, "z");
    $ftoen = date_format($toen, "z");
    $dif = ($fnu >= $ftoen) ? $fnu - $ftoen : $fnu - $ftoen + 365;

    switch($dif) {
    case 0:
        $dif = "vandaag";
        break;
    case 1:
        $dif = "gister";
        break;
    case 2:
        $dif = "eergister";
        break;
    default:
        $dif = $dif . " dagen geleden";
    }
/*
    $dif = date_diff($toen, $nu);
    $dif = $dif->format("%a");
*/
    return $dif;
}

?>
