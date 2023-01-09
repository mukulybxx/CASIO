<?php
// Include router class
include('Route.php');
require_once('db_connect.php');
require_once('functions.php');

$request_uri = $_SERVER['REQUEST_URI'];
$http_var = 'http://';
$domain = $http_var.$_SERVER['HTTP_HOST'];

$cur_url = get_current_url();

?>

<!DOCTYPE html>
<html>

<!-- Mirrored from kanjivg.tagaini.net/viewer.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jul 2022 20:04:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Viewer - KanjiVG</title>
    
    <meta name="author" content="Ulrich Apel"/>
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--[if lt IE 9]>
    <script type="application/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= $domain; ?>/css/bootstrap.min.css" />
    <!-- <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=f0_6J2UdGkGyyrlCojjf0Uad7uZBPlNe2UtIsd0a_wO1NMuS8acmw1rVM3WcA1Y2tYFXQ9bRJD_B0eO2LlTdiA" charset="UTF-8"></script> -->
    <script type="text/javascript" src="<?= $domain; ?>/js/main.js"></script>

    
    <style type="text/css">
        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
            border: 1px solid #0068b1 !important;
            background: #0068b1 !important;
            url("images/ui-bg_highlight-hard_15_459e00_1x100.png") 50% 50% repeat-x: ;
            font-weight: bold;
            color: #ffffff;
        }

                .btnInput {
            margin-top: 15px !important;
        }
                .sidebar-nav {
                    padding: 9px 0;
                }
                input, textarea, select, .uneditable-input {
            display: inline-block;
            width: 210px;
            height: 32px;
        }
        #kanjiViewer {
            border: 1px solid #dcdcdc;
            height: auto !important;
        }

        .page-header {
            padding-bottom: 17px;
            margin: 18px 0;
            border-bottom: 0px solid #eeeeee;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="<?= $domain; ?>/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= $domain; ?>/css/application.css" />
    <script type="text/javascript" src="<?= $domain; ?>/js/jquery-1.7.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script type="text/javascript" src="<?= $domain; ?>/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.js"
    integrity="sha512-kvg/Lknti7OoAw0GqMBP8B+7cGHvp4M9O9V6nAYG91FZVDMW3Xkkq5qrdMhrXiawahqU7IZ5CNsY/wWy1PpGTQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.ui.position.min.js"
    integrity="sha512-878jmOO2JNhN+hi1+jVWRBv1yNB7sVFanp2gA1bG++XFKNj4camtC1IyNi/VQEhM2tIbne9tpXD4xaPC4i4Wtg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="<?= $domain; ?>/js/raphael-min.js"></script>
    <script type="text/javascript" src="<?= $domain; ?>/js/kanjiviewer.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= $domain; ?>/css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="<?= $domain; ?>/css/style.css" />
    
    <!-- header -->
    <!-- <link type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
     <link rel="stylesheet" type="text/css" href="<?= $domain;  ?>/css/css/A.linearicons.css%2bfont-awesome.min.css%2bbootstrap.css%2bmagnific-popup.css%2cMcc.yJoU4ilZPf.css.pagespeed.cf.YO2lFmrYRe.css" /> 
    <!-- <link rel="stylesheet" href="/css/css/jquery-ui.html"> -->
    <link rel="stylesheet" type="text/css" href="<?= $domain; ?>/css/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?= $domain; ?>/css/kanji.css" />
</head>
<body>

<style type="text/css">
    .form-horizontal .control-group {
        margin-bottom: 18px;
        float: left !important;
        margin-right: 10px;
    }
    .form-horizontal .control-label {
        float: left !important;
        width: 136px !important;
        padding-top: 5px;
        text-align: left;
    }
    .form-horizontal .controls {
        margin-left: 0px !important;
    }
    .form-actions {
        background-color: #ffffff !important;
        border-top: 1px solid #fff !important;
    }
    form {
        margin: 0 0 0px;
    }
</style>
<style type="text/css">
   
    .latter-padding{
        float: left;
        padding: 70px;
        font-size: 90px;
        border: 1px solid #ddd;
        color: #000;
        margin-bottom: 0;
    }
    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #ddd;
    }

    .pagination a.active {
        background-color: #6bb3fd;
        color: white;
        border: 1px solid #6bb3fd;
    }

    .pagination a:hover:not(.active) {background-color: #ddd;}

    .pagination a:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .pagination a:last-child {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }
</style>

<?php require_once('header.php');?>

<?php if(!strpos($cur_url, 'draw-kanji')){ ?>

<section class="about-banner" id="nav-section">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    表示番号指定
                </h1>
                <p class="text-white link-nav"><a href="<?= $domain; ?>">Home </a> 
                <span class="lnr lnr-arrow-right"></span> <a href="#"> 表示番号指定</a></p>
            </div>
        </div>
    </div>
</section>
<?php } else{ ?>
    <hr style="border:2px solid #ddd;">
<?php } ?>

<section class="body-area" id="main_section">
<?php


// Add base route (startpage)
Route::add('/',function(){
    include_once('main-home.php');
});

Route::add('/kanji/',function(){
    include_once('home.php');
});

Route::add('/draw-kanji/',function(){
    include_once('drawkanji.php');
});

Route::run('/');

?>
</section>

<?php require_once('footer.php'); ?>
<!-- <script src="<?= $domain; ?>/js/jquery.min.js"></script>-->
<script src="<?= $domain; ?>/js/jquery-ui.min.js"></script> 
<script>
    $(document).bind("contextmenu",function(e){
        return false;
    });
</script>
<script>
    function submitform(){
            var kanjinumberCheckboxes = new Array();
            $('input[name="kanjinumber[]"]:checked').each(function() {
                kanjinumberCheckboxes.push($(this).val());
            });

            var joyoCheckboxes = new Array();
            $('input[name="joyo[]"]:checked').each(function() {
                joyoCheckboxes.push($(this).val());
            });

            var edukanjiCheckboxes = new Array();
            $('input[name="edukanji[]"]:checked').each(function() {
                edukanjiCheckboxes.push($(this).val());
            });

            var kanjiexamCheckboxes = new Array();
            $('input[name="kanjiexam[]"]:checked').each(function() {
                kanjiexamCheckboxes.push($(this).val());
            });

            var jlptCheckboxes = new Array();
            $('input[name="jlpt[]"]:checked').each(function() {
                jlptCheckboxes.push($(this).val());
            });

            var pageNum = jQuery('#page').val();
            if(pageNum == undefined){
                pageNum = '';
            }

            var formData = {
                kanjinumber : kanjinumberCheckboxes,
                joyo        : joyoCheckboxes,
                edukanji    : edukanjiCheckboxes,
                kanjiexam   : kanjiexamCheckboxes,
                jlpt        : jlptCheckboxes,
                page        : pageNum
            };

            jQuery.ajax({
                url:"<?= $domain; ?>/kanjicharlist.php",
                type: "GET",      
                data: formData,
                success:function(responseData){
                    jQuery('#main_section').html('');
                    jQuery('#main_section').html(responseData);
                }
            });
    }

    function pagination(page){
        jQuery('#page').val(page);
        submitform();
    }

    $(document).ready(function () {
        
        $("#submit_button").click(function () {
            submitform();
            event.preventDefault();
        });
    });
</script>
<script src="<?= $domain; ?>/js/kanji.js"></script>
<!-- <script src="<?= $domain; ?>/js/kanji-script.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="<?= $domain; ?>/js/sketchpad.js"></script>
<script>
    var sketchpad = new Sketchpad({
    element: '#sketchpad',
    width: 400,
    height: 400,
  });
  function recover(event) {
          var settings = sketchpad.toObject();
          settings.element = '#sketchpad2';
          var otherSketchpad = new Sketchpad(settings);
          $('#recover-button').hide();
        }
  </script> -->



<script type="text/javascript">
    jQuery(document).ready(function () {
        function urldecode(str) {
            return decodeURIComponent((str + '').replace(/\+/g, '%20'));
        }

        function getUrlVars() {
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for (var i = 0; i < hashes.length; i++) {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = urldecode(hash[1]);
            }
            return vars;
        }

        var kanji = getUrlVars()["kanji"];
        if (kanji == null) {
            kanji = jQuery('#kanji').val();
        } else {
            jQuery('#kanji').val(kanji);
        }
        KanjiViewer.initialize(
            "kanjiViewer",
            jQuery('#strokeWidth').val(),
            jQuery('#fontSize').val(),
            jQuery('#zoomFactor').val(),
            jQuery('#displayOrders:checked').val(),
            jQuery('#colorGroups:checked').val(),
            kanji
        );
        jQuery('#kanjiViewerParams').submit(function () {
            KanjiViewer.setFontSize(jQuery('#fontSize').val());
            KanjiViewer.setZoom(jQuery('#zoomFactor').val());
            KanjiViewer.setStrokeWidth(jQuery('#strokeWidth').val());
            KanjiViewer.setStrokeOrdersVisible(jQuery('#displayOrders:checked').val());
            KanjiViewer.setColorGroups(jQuery('#colorGroups:checked').val());
            KanjiViewer.setKanji(jQuery('#kanji').val());
            KanjiViewer.refreshKanji();
            return false;
        });
    });
</script>

</body>

<!-- Mirrored from kanjivg.tagaini.net/viewer.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jul 2022 20:04:36 GMT -->
</html>