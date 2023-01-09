<?php
require_once('db_connect.php');
$html = '';
if(isset($_GET)){
    $html .= '<div class="container">';
        // print_r($_GET);
        $kanji_query = '';
        if(isset($_GET['kanjinumber'])){
            $kanjinumbers = !empty($_GET['kanjinumber']) ? $_GET['kanjinumber'] : '';
            $kanji_query .= " and (";
            foreach($kanjinumbers as $k){
                $knum[] = $k;
                $explodenum = explode('-', $k);
                $fnum = $explodenum[0];
                $lnum = $explodenum[1];
                if(count($knum) == 1){
                    $kanji_query .= " (kanji_number between ".$fnum." and ".$lnum.")";
                }else{
                    $kanji_query .= " or (kanji_number between ".$fnum." and ".$lnum.")";
                }
                unset($explodenum);
            }
            $kanji_query .= ")";
            // echo $kanji_query;
        }
        if(isset($_GET['joyo']) || isset($_GET['edukanji']) || isset($_GET['kanjiexam']) || isset($_GET['jlpt'])){
            $kanji_query .= "and (";
            if(isset($_GET['joyo'])){
                $joyos = !empty($_GET['joyo']) ? $_GET['joyo'] : '';
                $joyos_list = implode("','", $joyos);
                $kanji_query .= " joyo_common_use in ('".$joyos_list."')";
            }
            if(isset($_GET['edukanji'])){
                $edukanjis = !empty($_GET['edukanji']) ? $_GET['edukanji'] : '';
                $edukanjis_list = implode("','", $edukanjis);
                if(isset($_GET['joyo'])){
                    $kanji_query .= " or ";
                }
                $kanji_query .= " education_kanji in ('".$edukanjis_list."')";
            }
            if(isset($_GET['kanjiexam'])){
                $kanjiexams = !empty($_GET['kanjiexam']) ? $_GET['kanjiexam'] : '';
                $kanjiexams_list = implode("','", $kanjiexams);
                if(isset($_GET['joyo']) || isset($_GET['edukanji'])){
                    $kanji_query .= " or ";
                }
                $kanji_query .= " kanji_examination in ('".$kanjiexams_list."')";
            }
            if(isset($_GET['jlpt'])){
                $jlpts = !empty($_GET['jlpt']) ? $_GET['jlpt'] : '';
                $jlpt_list = implode("','", $jlpts);
                if(isset($_GET['joyo']) || isset($_GET['edukanji']) || isset($_GET['kanjiexam'])){
                    $kanji_query .= " or ";
                }
                $kanji_query .= " jlpt in ('".$jlpt_list."')";
            }
            $kanji_query .= " )";

        }


        function insertPagination($cur_page, $number_of_pages, $prev_next=false) {
             $ends_count = 1;  //how many items at the ends (before and after [...])
             $middle_count = 1;  //how many items before and after current page
             $dots = false;
             $result = '';
             // echo '<ul class="pagination">';
             if ($prev_next && $cur_page && 1 < $cur_page) {  //print previous button?
                  // echo '<li class="prev"><a href="'.$base_url.'?page='.$cur_page-1.'">&laquo; Previous</a></li>';
                  $result.='<a onclick="pagination('.($cur_page-1).');">  Prev </a>'; 
             }
             for ($i = 1; $i <= $number_of_pages; $i++) {
                  if ($i == $cur_page) {
                       // echo '<li class="active"><a>'.$i.'</a></li>';
                            $result.='<a class = "active">'.$i.' </a>';
                       $dots = true;
                  } else {
                       if ($i <= $ends_count || ($cur_page && $i >= $cur_page - $middle_count && $i <= $cur_page + $middle_count) || $i > $number_of_pages - $ends_count) { 
                           $result.='<a onclick="pagination('.($i).');">'.$i.'</a>';
                            $dots = true;
                       } elseif ($dots) {
                            $result.='<a>&hellip;</a>';
                            $dots = false;
                       }
                  }
             }
             if ($prev_next && $cur_page && ($cur_page < $number_of_pages || -1 == $number_of_pages)) { //print next button?
                  $result.='<a onclick="pagination('.($cur_page+1).');">  Next </a>';
             }
             return $result;
        }

        $limit = 20;
        $getQuery = "select kanji from kanji2022 where kanji != '' "; 
        if($kanji_query != ''){
            $getQuery .= $kanji_query;
        }
        $result = mysqli_query($link, $getQuery);  
        $total_rows = mysqli_num_rows($result); 

        $total_pages = ceil ($total_rows / $limit); 

        if (!isset($_GET['page']) || empty($_GET['page'])) {  
            $page_number = 1;  
        } else {  
            $page_number = $_GET['page'];  
        }

        $initial_page = ($page_number-1) * $limit; 

        $getQuery .= " LIMIT " . $initial_page . ',' . $limit;  
        $resultQuery = mysqli_query($link, $getQuery);
        $numResultQuery = mysqli_num_rows($resultQuery); 
        // die();
    
        if($numResultQuery>0){
            $html .= '<input id="page" type="hidden" value"'.$page_number.'">';
            $html .= '<div class="container-fluid">
                        <div class="row-fluid">
                            <div class="col-lg-12 col-md-12 col-sm-12" id="list_container"> 
                                <section >
                                    <div class="col-md-12" style=" float: left;">
                                        <h3 style=" padding-top: 30px;">'.($initial_page + 1).' - '.($initial_page + $limit) .'</h3>';

                                    while($row = mysqli_fetch_row($resultQuery)){
                                        $html .= '<a href="/kanji/?char='.$row[0].'"><p class="latter-padding">'.$row[0].'</p></a>';
                                    }

            $html .= '              </div>
                                </section>
                                <div class="col-md-12" style="text-align: center;margin-top: 25px;margin-bottom: 35px;float: left;">
                                    <div class="pagination">
                     ';    
                            $html.= insertPagination($page_number, $total_pages, true);
                                    // $pageURL = "";             

                                    // if($page_number>=2){   
                                    //     $html .= '<a onclick="pagination('.($page_number-1).');">  Prev </a>';   
                                    // }                          

                                    // for ($i=1; $i<=$total_pages; $i++) {   
                                    //     if ($i == $page_number) {   
                                    //             $pageURL .= '<a class = "active" onclick="pagination('.($page_number-1).');">'.$i.' </a>';   
                                    //     }else{   
                                    //             $pageURL .= '<a onclick="pagination('.($i).');">'.$i.' </a>';     
                                    //     }   
                                    // };     

                                    // $html .= $pageURL;    
                                    // if($page_number<$total_pages){   
                                    //     $html .= '<a onclick="pagination('.($page_number+1).');">  Next </a>'; 
                                        
                                    // }     
            $html .= '                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';


        }else{
            $html .= '<h2 style="text-align:center;padding:50px;">No Results Found !</h2>';
        }

        $html .= '</div>';

echo $html;

}
?>