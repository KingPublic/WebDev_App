<?php  

    include 'variables.php';


    class arrayfun extends Variables{

    }

    $siswa1 = $user1->name;
    $siswa2 = $user2->name;
    $siswa3 = $user3->name;
    $siswa4 = $user4->name;
    $siswa5 = $user5->name;

    $students = [$siswa1,$siswa2,$siswa3,$siswa4,$siswa5];

    // $name = "";
    // echo greet($name);

    function greet($nama){
        $menyapa = "Hello, $nama";
        return  $menyapa;
    }

    foreach($students as $semuastudent){
        echo "<br>". greet($semuastudent) . "<br>";
    }


?>