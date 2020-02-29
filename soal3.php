<?php

//// INPUT MANUAL
echo "Masukkan input angka : ";
$input = trim(fgets(STDIN));

//// AUTO INPUT
//$input = rand(3,20);


echo "input anda : ". $input."\n";

if (intval($input))
{
    if ($input >0)
    {
    $i = $input;
    $count =$i;
    $hasil =array($i);

        do {
            if (($i%2)==0)
            {
                $i /= 2;
            }
            else if (($i%2)==1)
            {
                $i =$i*3+1;
            }
            $count+=$i;
            array_push($hasil,$i);
        }while($i>1);
    }else
    {
        $hasil = "Masukkan bilangan positive";
    }
}
else
{
    $hasil ="Bukan Type INT";
}
print_r($hasil);
echo $jumlah = is_array($hasil)?"\nCount : ".$count:"\n";


