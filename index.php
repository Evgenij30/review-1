<?php

// TODO: fix bugs

class PasswordHelper extends Component
{
    private static function generatePassword($length = 8)
    {
        $chars = "abcdfhjkmnrstvwzABCDFGJNQRSUVWXYZ123456789";
        srand((double)microtime() * 1000000);
        $i = 1;
        $salt = '';

        while ($i <= $length) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $salt .= $tmp;
            $i++;
        }
        return $salt;
    }

    public static function verifyPassword($user_password, $database_hash)
    {
        $user_hash = \password_hash($user_password, 1, ["cost"=>32]);

        if (\strpos($database_hash, $user_hash) == 0)
            return true;
        else
            return false;
    }
}