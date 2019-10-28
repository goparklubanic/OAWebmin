<?php

// $users = [
//     hash('sha256','kasira$$$slamet'),
//     hash('sha256','kasiri$$$slamet'),
//     hash('sha256','kasiru$$$slamet'),
//     hash('sha256','dapura$$$begors'),
//     hash('sha256','dapuri$$$begors'),
//     hash('sha256','dapuru$$$begors')
// ];


$passkey = [
    'ebb89eb984bea66b87a93a2874e1295282acb9c3142f221bfbdec96c837666d9',
    '1d9e907e3c9a8cd62f0017be466ee91e54fd178b95adcf4b122790aa7146fbbc',
    '050d1bddab4991d48b73127d16071c2d3bf4f7ca6ffc121baaea38bcecf15fd5',
    '14878e4adb8361213f9e51508b36b48f30d107a6e46c154649ac3703c15896b4',
    '67a235e8bca71f109f805b8d925ccad09eca11fda9e6ffef3b9df5069c68a710',
    'fe21056baf4b631c7e6f91fce8738c25d2743dcb7f215628367cd2dd6e022e08'
];

$users = ['kasir1','kasir2','kasir3','dapur1','dapur2','dapur3'];
$stage = ['kasir','kasir','kasir','dapur','dapur','dapur'];

$data = hash('sha256',$_POST['username']."$$$".$_POST['password']);

$urut = array_search( $data , $passkey , true );

//var_dump($urut);

if( $urut === false ){
    echo "User Tidak ditemukan<br>";
    echo "<a href='./'>Coba lagi</a>";
}else{
    $namauser = $users[$urut]; $posisi = $stage[$urut];
    //echo $namauser .", ".$posisi;
    session_start();
    if($posisi == 'kasir'){
        header("Location:../");
    }else{
        header("Location:../kitchen");
    }
}
