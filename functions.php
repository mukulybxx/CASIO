<?php

function get_current_url(){
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
    $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
    return $CurPageURL;
}

function get_kanji_id($kanji){
    global $link;
    $getkid = mysqli_query($link, "select id from kanji2022 where kanji='$kanji' limit 1");
    if($getkid){
        if($row = mysqli_fetch_row($getkid)){
            return $row[0];
        }
    }
}

function get_prev_next_char($kid){
    global $link;
    $pn_link[] = [];
    $pn_query = "SELECT kanji,(SELECT kanji FROM kanji2022 e2 WHERE e2.id < e1.id ORDER BY id DESC LIMIT 1) as previous_value,
                (SELECT kanji FROM kanji2022 e3 WHERE e3.id > e1.id ORDER BY id ASC LIMIT 1) as next_value FROM kanji2022 e1 WHERE id = $kid";
    $getResult = mysqli_query($link, $pn_query);
    if($getResult){
        if($row = mysqli_fetch_row($getResult)){
            $pn_link['prev'] = $row[1];
            $pn_link['next'] = $row[2];
            return $pn_link;
        }
    }
    
}

function get_first_char(){
    global $link;
    $getFirstChar = mysqli_query($link, "select kanji from kanji2022 order by kanji_number limit 1");
    if($getFirstChar){
        if($row = mysqli_fetch_row($getFirstChar)){
           return $row[0];
        }
    }
}

function get_kanji_img($kid){
    global $link;
    $getimg = mysqli_query($link, "select kanji_img from kanji2022 WHERE id = $kid limit 1");
    if($getimg){
        if($row = mysqli_fetch_row($getimg)){
           return $row[0];
        }
    }
}

class kanji_Details{
    public $id;

    function __construct( $arg ) {
        $this->id = $arg;
    }

    function get_kanji_details(){
        global $link;
        $getkanjidetails = mysqli_query($link, "select * from kanji2022 where id=$this->id limit 1");
        if($getkanjidetails){
            if($krow = mysqli_fetch_assoc($getkanjidetails)){
                $this->kanji_number = $krow['kanji_number'] ? $krow['kanji_number'] : '';
                $this->kanji = $krow['kanji'] ? $krow['kanji'] : '';
                $this->kanji_img = $krow['kanji_img'] ? $krow['kanji_img'] : '';
                $this->kanji_and_stroke_order = $krow['kanji_and_stroke_order'] ? $krow['kanji_and_stroke_order'] : '';
                $this->mincho_and_gothic_fonts = $krow['mincho_and_gothic_fonts'] ? $krow['mincho_and_gothic_fonts'] : '';
                $this->radical = $krow['radical'] ? $krow['radical'] : '';
                $this->number_of_strikes = $krow['number_of_strikes'] ? $krow['number_of_strikes'] : '';
                $this->joyo_common_use = $krow['joyo_common_use'] ? $krow['joyo_common_use'] : '';
                $this->education_kanji = $krow['education_kanji'] ? $krow['education_kanji'] : '';
                $this->jlpt = $krow['jlpt'] ? $krow['jlpt'] : '';
                $this->kanji_examination = $krow['kanji_examination'] ? $krow['kanji_examination'] : '';
                $this->personal_name = $krow['personal_name'] ? $krow['personal_name'] : '';
    
                $this->on_reading[0] = $krow['on_reading_1'] ? $krow['on_reading_1'] : '';
                $this->on_reading_eng[0] = $krow['on_reading_1_eng'] ? $krow['on_reading_1_eng'] : '';
                $this->on_reading[1] = $krow['on_reading_2'] ? $krow['on_reading_2'] : '';
                $this->on_reading_eng[1] = $krow['on_reading_2_eng'] ? $krow['on_reading_2_eng'] : '';
                $this->on_reading[2] = $krow['on_reading_3'] ? $krow['on_reading_3'] : '';
                $this->on_reading_eng[2] = $krow['on_reading_3_eng'] ? $krow['on_reading_3_eng'] : '';
                $this->on_reading[3] = $krow['on_reading_4'] ? $krow['on_reading_4'] : '';
                $this->on_reading_eng[3] = $krow['on_reading_4_eng'] ? $krow['on_reading_4_eng'] : '';
                $this->on_reading[4] = $krow['on_reading_5'] ? $krow['on_reading_5'] : '';
                $this->on_reading_eng[4] = $krow['on_reading_5_eng'] ? $krow['on_reading_5_eng'] : '';
    
                $this->kun_reading[0] = $krow['kun_reading_1'] ? $krow['kun_reading_1'] : '';
                $this->kun_reading_eng[0] = $krow['kun_reading_1_eng'] ? $krow['kun_reading_1_eng'] : '';
                $this->kun_reading[1] = $krow['kun_reading_2'] ? $krow['kun_reading_2'] : '';
                $this->kun_reading_eng[1] = $krow['kun_reading_2_eng'] ? $krow['kun_reading_2_eng'] : '';
                $this->kun_reading[2] = $krow['kun_reading_3'] ? $krow['kun_reading_3'] : '';
                $this->kun_reading_eng[2] = $krow['kun_reading_3_eng'] ? $krow['kun_reading_3_eng'] : '';
                $this->kun_reading[3] = $krow['kun_reading_4'] ? $krow['kun_reading_4'] : '';
                $this->kun_reading_eng[3] = $krow['kun_reading_4_eng'] ? $krow['kun_reading_4_eng'] : '';
                $this->kun_reading[4] = $krow['kun_reading_5'] ? $krow['kun_reading_5'] : '';
                $this->kun_reading_eng[4] = $krow['kun_reading_5_eng'] ? $krow['kun_reading_5_eng'] : '';
                $this->kun_reading[5] = $krow['kun_reading_6'] ? $krow['kun_reading_6'] : '';
                $this->kun_reading_eng[5] = $krow['kun_reading_6_eng'] ? $krow['kun_reading_6_eng'] : '';
                $this->kun_reading[6] = $krow['kun_reading_7'] ? $krow['kun_reading_7'] : '';
                $this->kun_reading_eng[6] = $krow['kun_reading_7_eng'] ? $krow['kun_reading_7_eng'] : '';
                $this->kun_reading[7] = $krow['kun_reading_8'] ? $krow['kun_reading_8'] : '';
                $this->kun_reading_eng[7] = $krow['kun_reading_8_eng'] ? $krow['kun_reading_8_eng'] : '';
                $this->kun_reading[8] = $krow['kun_reading_9'] ? $krow['kun_reading_9'] : '';
                $this->kun_reading_eng[8] = $krow['kun_reading_9_eng'] ? $krow['kun_reading_9_eng'] : '';
                $this->kun_reading[9] = $krow['kun_reading_10'] ? $krow['kun_reading_10'] : '';
                $this->kun_reading_eng[9] = $krow['kun_reading_10_eng'] ? $krow['kun_reading_10_eng'] : '';
    
                $this->meaning = $krow['meaning'] ? $krow['meaning'] : '';
                $this->words[0] = $krow['words_1'] ? $krow['words_1'] : '';
                $this->words_reading[0] = $krow['words_1_reading'] ? $krow['words_1_reading'] : '';
                $this->words_reading_eng[0] = $krow['words_1_reading_eng'] ? $krow['words_1_reading_eng'] : '';
                $this->words_in_english[0] = $krow['words_1_in_english'] ? $krow['words_1_in_english'] : '';
                $this->words_meaning[0] = $krow['words_1_meaning'] ? $krow['words_1_meaning'] : '';
                $this->words[1] = $krow['words_2'] ? $krow['words_2'] : '';
                $this->words_reading[1] = $krow['words_2_reading'] ? $krow['words_2_reading'] : '';
                $this->words_reading_eng[1] = $krow['words_2_reading_eng'] ? $krow['words_2_reading_eng'] : '';
                $this->words_in_english[1] = $krow['words_2_in_english'] ? $krow['words_2_in_english'] : '';
                $this->words_meaning[1] = $krow['words_2_meaning'] ? $krow['words_2_meaning'] : '';
                $this->words[2] = $krow['words_3'] ? $krow['words_3'] : '';
                $this->words_reading[2] = $krow['words_3_reading'] ? $krow['words_3_reading'] : '';
                $this->words_reading_eng[2] = $krow['words_3_reading_eng'] ? $krow['words_3_reading_eng'] : '';
                $this->words_in_english[2] = $krow['words_3_in_english'] ? $krow['words_3_in_english'] : '';
                $this->words_meaning[2] = $krow['words_3_meaning'] ? $krow['words_3_meaning'] : '';
                $this->words[3] = $krow['words_4'] ? $krow['words_4'] : '';
                $this->words_reading[3] = $krow['words_4_reading'] ? $krow['words_4_reading'] : '';
                $this->words[4] = $krow['words_5'] ? $krow['words_5'] : '';
                $this->words_reading[4] = $krow['words_5_reading'] ? $krow['words_5_reading'] : '';
                $this->words[5] = $krow['words_6'] ? $krow['words_6'] : '';
                $this->words_reading[5] = $krow['words_6_reading'] ? $krow['words_6_reading'] : '';
                $this->words[6] = $krow['words_7'] ? $krow['words_7'] : '';
                $this->words_reading[6] = $krow['words_7_reading'] ? $krow['words_7_reading'] : '';
                $this->words[7] = $krow['words_8'] ? $krow['words_8'] : '';
                $this->words_reading[7] = $krow['words_8_reading'] ? $krow['words_8_reading'] : '';
                
    
            }
        }
    }
}

?>