<?php
    $http_var = 'http://';
    $domain = $http_var.$_SERVER['HTTP_HOST'];
    if(isset($_GET['char']) && !empty($_GET['char'])){
        $char   =   $_GET['char'];
    }else{
        $char   =   get_first_char();
    }
    $kid        =   get_kanji_id($char);
    $prenext_link = get_prev_next_char($kid);

    $kanji_ob       =   new kanji_Details($kid);
    $data = $kanji_ob->get_kanji_details();

    $draw_link = $domain.'/draw-kanji/?char='.$char;

?>
<div class="container">
    <div class="container-fluid">
        <div class="row-fluid" style="padding-top: 5px;margin-top: 12px;">  
            <div class="col-md-6" style="float: left;">
                <div class="col-md-12" style="float: left;padding-left: 0;">
                    <div class="row" style="display:block;">
                        <div style="float: left;" class="col-md-6">
                            <a href="#" class="primary-btn text-uppercase" style=""><?= $kanji_ob->kanji_number; ?></a>
                        </div>
                        <?php if($prenext_link){?>
                        <div class="col-md-6" style="float: left;margin-bottom: 10px;">
                            <div class="owl-controls" style="margin-bottom: 10px;margin-top: 10px;">
                                <div class="owl-nav">
                                    <div class="owl-prev" style="text-align: right;">
                                    <?php if($prenext_link['prev']){ ?>
                                        <a href="?char=<?= $prenext_link['prev']; ?>"><span class="lnr lnr-arrow-left" style="padding: 10px;color: #fff;background: #8490ff;"></span></a>
                                    <?php } ?>
                                    <?php if($prenext_link['next']){ ?>
                                        <a href="?char=<?= $prenext_link['next']; ?>"><span class="lnr lnr-arrow-right" style="/*! background-color: #70aafd; */padding: 10px;color: #fff;background: #8490ff;"></span></a>
                                    <?php } ?>
                                    </div>
                                </div>
                                <div style="" class="owl-dots">
                                    <div class="owl-dot active">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- <div class="col-md-4" style="float: left;margin-bottom: 10px;text-align: right;padding-right: 0;">
                            <a href="#" class="primary-btn text-uppercase">クリア</a>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-12" style="float: left;">
                    <div class="row">
                        <div style="float: left;border: 4px solid #ddd;border-radius: 8px;" class="col-lg-5 col-md-5">
                            <a href="<?= $draw_link ?>">
                                <img style="width: 100%;" src="<?= $domain; ?>/img/kanji_img/<?= $kanji_ob->kanji_img; ?>" alt="<?= $kanji_ob->kanji_img? $kanji_ob->kanji_img: 'no image'; ?>">
                            </a>
                        </div>
                        <div style="padding-top: 20px;float: left;/*! border-top: 1px solid #ddd; */" class="col-lg-7 col-md-7 home-about-right">
                            <h6 style="margin-bottom: 10px;">部首: <?= $kanji_ob->kanji; ?></h6>
                            <h6>総画数: <?= $kanji_ob->number_of_strikes; ?></h6>
                            <div class="">
                                <div class="widget-wrap">
                                    <div class="single-sidebar-widget tag-cloud-widget" style="padding-bottom: 10px;margin-left: 0;margin-right: 0px;">
                                        <ul>
                                            <li><a href="#"><?= $kanji_ob->joyo_common_use; ?></a></li>
                                            <li><a href="#"><?= $kanji_ob->education_kanji; ?></a></li>
                                            <li><a href="#"><?= $kanji_ob->jlpt; ?></a></li>
                                            <li><a href="#"><?= $kanji_ob->kanji_examination; ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="float: left;">
                    <div class="row">
                        <div class="col-md-12" style="padding-right: 0;padding-left: 0;margin-top: 5px;">
                            <img class="img-fluid" src="/img/elements/<?= $kanji_ob->kanji_and_stroke_order; ?>" alt="" style="border: 4px solid #ddd;width: 100%;padding: 30px;border-radius: 8px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="float: left;">
                <div class="col-md-12" style="/*! margin-top: 31px; */">
                    <div style="border: 2px solid #ddd;padding: 10px;border-radius: 5px;">
                        <div style="margin-bottom: 20px;margin-top: 10px;">
                            <span class="" style="border: 2px solid #8490ff;padding-left: 10px;padding-right: 10px;padding-top: 3px;padding-bottom: 3px;font-weight: 900;color: #000;border-radius: 7px;float:left;margin-right:10px;">音</span>
                            <span style="color: #000;"> <?= implode(', &nbsp;', array_filter($kanji_ob->on_reading)); ?> </span>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <span style="border: 2px solid #8490ff;padding-left: 10px;padding-right: 10px;padding-top: 3px;padding-bottom: 3px;font-weight: 900;color: #000;border-radius: 7px;float:left;margin-right:10px;">訓</span>
                            <span style="color: #000;"><?= implode(', &nbsp;', array_filter($kanji_ob->kun_reading)); ?></span>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <span style="border: 2px solid #8490ff;padding-left: 10px;padding-right: 10px;padding-top: 3px;padding-bottom: 3px;font-weight: 900;color: #000;border-radius: 7px;float:left;margin-right:10px;">意味</span>
                            <span style="color: #000;"><?= $kanji_ob->meaning; ?></span>
                        </div>
                    </div>
                    <div style="border: 2px solid #ddd;padding: 10px;border-radius: 5px;margin-top: 20px;">
                        <?php
                            for($w=0; $w<3; $w++){
                                if($kanji_ob->words[$w] != ''){
                                    echo '<p>'.$kanji_ob->words[$w].'&nbsp;&nbsp;'.$kanji_ob->words_reading_eng[$w].'  <span style="color: #0068b1;font-weight: 600;">'.$kanji_ob->words_in_english[$w].'</span> &nbsp;'.$kanji_ob->words_meaning[$w].'</p>';
                                }
                            }
                        ?>
                    </div>
                    <div class="col-md-12">
                        <div class="widget-wrap" style="margin-top: 20px;">
                            <div class="row">
                                <div style="float: left;margin-right: 20px;" class="col-md-4">
                                    <p style="color: #000;margin-bottom: 5px;float:left;margin-right:15px;">明朝体</p>
                                    <p style="color: #000;margin-bottom: 5px;">ゴシック体</p>
                                    <img alt="" style="" src="/img/elements/<?= $kanji_ob->mincho_and_gothic_fonts; ?>">
                                </div>
                                <!-- <div style="float: left;" class="col-md-2">
                                    <p style="color: #000;margin-bottom: 0px;">ゴシック体</p>
                                    <img alt="" style="" src="img/elements/0502_right_1.jpg">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>