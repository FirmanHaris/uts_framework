<?php

function jnskel($data)
{
    $jk = $data == 'l' ? 'Laki-Laki' : 'Perempuan';
    return $jk;
}
function getlevel($bg)
{

    $dt_bg = null;

    if ($bg->level == "low") {
        $dt_bg = '<span class="badge rounded-pill bg-success-transparent">' . $bg->level . '</span>';
    } elseif ($bg->level == "urgent") {
        $dt_bg = '<span class="badge rounded-pill bg-danger-transparent">' . $bg->level . '</span>';
    } else {
        $dt_bg = '<span class="badge rounded-pill bg-warning-transparent">' . $bg->level . '</span>';
    }

    echo $dt_bg;
}
