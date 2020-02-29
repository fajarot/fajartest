<?php


do
{
    echo "\nMasukkan Username : ";
    $userName = trim(fgets(STDIN));
}while(!CheckUsername($userName));

do
{
    echo "Masukkan Password : ";
    $password = trim(fgets(STDIN));
}while(!CheckPassword($password));

echo "\nUsername Anda : ".$userName." ";
echo "\nPassword Anda : ".$password." " ;


function CheckUsername($data)
{
    $firstChar = substr($data,0,1);

        if (is_int($firstChar))
        {
            $regex = "/^($firstChar)[0-9a-z]*(\g1)$/m";
            if ((strlen($data) <9)&& (strlen($data) >4))
            {
                if (preg_match($regex, $data))
                {
                    echo "Username Anda Cocok\n";
                    return true;
                }
                echo "Username Salah\n";
                return false;

            }
            echo "Username Harus 5-8 Karakter\n";
            return false;
        }
        else {
            echo "Username Salah\n";
            return false;
        }
}

function CheckPassword($data)
{
    $regex= "/[\-]/";

        if ((strlen($data) <=11)&& (strlen($data) >=7)) {
            if (MatchUserPass($data)) {
                if (preg_match($regex, $data)) {
                    echo "Password Anda Sangat Kuat\n";
                    return true;
                }
            }
            echo "Password Anda Salah\n";
            return false;
        }
        echo "Password Anda Harus 5-8 Karakter\n";
        return false;

}

function MatchUserPass($data)
{
    preg_match_all('![a-z]*!', $data, $matches);
    $hasilStr = implode('',$matches[0]);

    preg_match_all('![0-9]*!', $data, $matches);
    $hasilInt = implode('',$matches[0]);

    if (strlen($hasilStr) == strlen($hasilInt))
    {
        return true;
    }
    else
    {
        return false;
    }
}

