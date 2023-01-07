<?php

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

function enc($data = null) {
    $encrypted = Crypt::encryptString($data);
    // $decrypted = Crypt::decryptString($encrypted);

    return ($encrypted);
}

function desc($data = null) {
    $decrypted = Crypt::decryptString($data);

    return ($decrypted);
}

function dmyToymd($date) {
    return Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d');
}

function ymdTodmy($date) {
    return Carbon::createFromFormat('Y-m-d', $date)->format('d-m-Y');
}