<?php

echo "Masukkan Nama : ";
$inputNama = trim(fgets(STDIN));

echo "Masukkan Umur : ";
$inputUmur = trim(fgets(STDIN));

print_r(SetData($inputNama, intval($inputUmur)));

function SetData($inputNama="Fajar Rahmadyanto" , $inputUmur=22)
{
    $nama = $inputNama;
    $age = $inputUmur;
    $addr = "Perum Plandi Permai Blok O-9";
    $hobby = array("Game", "Coding","Repeat");
    $is_married = false;
    $list_school = array("SD" => array("SDN 3 Jombang",2006), "SMP" => "SMP 3 Jombang","SMA" => "SMA 3 Jombang");
    $skills = array("Coding" => "Beginner","Game"=>"Intermediate");
    $interest_in_coding = true;

    $convertArray=array("name"=>$nama,"age"=>$age,"address"=>$addr,"hobbies"=>$hobby,"is_married"=>$is_married,"list_school"=>$list_school,"skills"=>$skills,"interest_in_coding"=>$interest_in_coding);
    $hasilJSON = json_encode($convertArray);
    return $hasilJSON;
}
