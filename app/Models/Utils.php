<?php

namespace App\Models;

class Utils
{
    public function getFullName($fullname) {
        if (strpos($fullname, '.') == true) {
            $t = ucwords(strtolower(substr($fullname, strpos($fullname, '.') + 2)));
        }
        else {
            $t = ucwords(strtolower($fullname));
        }
        return explode(' ', $t);
    }

    public function getFullNameWithGrade($fullname) {
        if (strpos($fullname, '.') == true) {
            $t = substr($fullname, 0, strpos($fullname, '.') + 1) . ' ' . ucwords(strtolower(substr($fullname, strpos($fullname, '.') + 2)));
        }
        else {
            $t = ucwords(strtolower($fullname));
        }
        return $t;
    }
}
