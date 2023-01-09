<?php
$conn = new mysqli('localhost', 'root', '', 'casio');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

$file = 'sample_kanji2200_2022v_ENG_20220929.csv';
$file_open = fopen($file,"r");
$sel = mysqli_query($conn, "desc kanji2022");
$sel_num = mysqli_num_rows($sel);
while($row = mysqli_fetch_row($sel)) {
    if($row[0]!='kanji_img'){
        $mil_row[]=$row[0];
    }
    // echo "<br>".$row[0];
}
while(($csv = fgetcsv($file_open)) !== false)
{
    echo "<br>".count($csv).'-'.count($mil_row);
    $query_new = "INSERT INTO kanji2022(";
    for($i=1;$i<count($mil_row);$i++){
        echo "<br>".$mil_row[$i].' - '.$csv[$i-1];
        if($i != (count($mil_row)-1)){
            $query_new .= $mil_row[$i].",";
        }else{
            $query_new .= $mil_row[$i];
        }
    }
    $query_new .= ") VALUES (";
    for($i=0;$i<count($csv);$i++){
        // echo "<br>".count($csv);
        if($i != (count($csv)-1)){
            $query_new .= "'".$csv[$i]."',";
        }else{
            $query_new .= "'".$csv[$i]."'";
        }
    }
    $query_new .= ");";
    echo "<br><br><br>".$query_new;
    // die;
//  if(mysqli_query($conn,$query_new)){
//     echo "<br>Inserted successfully";
//  }else{
    
//     echo "<br>".mysqli_error($conn)."<br>";
//     print_r($csv);
//     echo "<br><br>";
//  }
//  die();
}
?>