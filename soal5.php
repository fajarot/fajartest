<?php

//// INPUT MANUAL
echo "Masukkan input angka : ";
$input = trim(fgets(STDIN));

//// AUTO INPUT
//$input = rand(3,8);

echo "Input Anda : ". intval($input) ."\n";
for ($i=$input ; $i>0 ; $i--)
{
    for ($j=1; $j<$i ;$j++)
    {
        echo " ";
    }
    for ($k=$i; $k<=$input; $k++)
    {
        echo"*";
    }
    echo "\n";
}