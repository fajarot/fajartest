<?php

//// INPUT MANUAL
echo "Masukkan input angka : ";
$input = trim(fgets(STDIN));

//// AUTO INPUT
//$input = rand(3,8);

echo "Input Anda : ". intval($input) ."\n";

$count = 0;
$hasil = array();

for ($i=0 ; $i<$input ; $i++)
{
    $radomAngka = rand(1,30);
    $count  +=$radomAngka;
    array_push($hasil,$radomAngka);
}

print_r($hasil);
echo "Count : ". $count;


