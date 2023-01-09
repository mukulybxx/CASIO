<?php
$conn = new mysqli('localhost', 'root', '', 'casio');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo $query_new = "update kanji2022 set kanji='茨' where kanji_number=1704;";
//     if(mysqli_query($conn,$query_new)){
//         echo "<br>Inserted successfully";
//     } 

// $path = 'c:/wamp64/www/casio/img/kanji_img/';
// $files = scandir($path);
// foreach($files as $val){
//     if($val != '.')
//         $file_name[] = $val;
// }
// // print_r($file_name);
// // echo "Connected successfully";
// for($i=1;$i<count($file_name);$i++){
//     // $format_num = sprintf('%04d' , $i);
//     $format_num = explode('_gray', $file_name[$i])[0];
//     echo $query_new = "update kanji2022 set kanji_img='".$file_name[$i]."' where kanji_number='".$format_num."';";
//     // if(mysqli_query($conn,$query_new)){
//     //     echo "<br>Inserted successfully";
//     // } 
//     echo "<br>"; 
// }


?>