<?php
function __get_salt() {
     $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
     $randStringLen = 64;
     $randString = "";
     for ($i = 0; $i < $randStringLen; $i++) $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
     return $randString;
}
