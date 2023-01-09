<?php
require_once('db_connect.php');
require_once('functions.php');

    if(isset($_GET['char']) && !empty($_GET['char'])){
        $char   =   $_GET['char'];
    }else{
        $char   =   get_first_char();
    }
?>

<!DOCTYPE html>
<html>

<!-- Mirrored from kanjivg.tagaini.net/viewer.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jul 2022 20:04:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>Viewer - KanjiVG</title>
    
    <meta name="author" content="Ulrich Apel"/>
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]>
    <script type="application/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=f0_6J2UdGkGyyrlCojjf0Uad7uZBPlNe2UtIsd0a_wO1NMuS8acmw1rVM3WcA1Y2tYFXQ9bRJD_B0eO2LlTdiA" charset="UTF-8"></script> -->
    <script type="text/javascript" src="js/main.js"></script>

    
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
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/application.css">
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/raphael-min.js"></script>
    <script type="text/javascript" src="js/kanjiviewer.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    
    <!-- header -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/css/A.linearicons.css%2bfont-awesome.min.css%2bbootstrap.css%2bmagnific-popup.css%2cMcc.yJoU4ilZPf.css.pagespeed.cf.YO2lFmrYRe.css" />
    <link rel="stylesheet" href="css/css/jquery-ui.html">
    <link rel="stylesheet" href="css/css/style.css" />
    <link rel="stylesheet" href="css/kanji.css" />
</head>
<body>

<style>
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
<style>
   
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

<?php 
    require_once('header.php'); 

    $cur_url = get_current_url();
    $cur_url = explode('?char=', $cur_url)[0];
    $kid = get_kanji_id($char);
    $prenext_link = get_prev_next_char($kid);
    $prenext_link['prev'] = $cur_url.'?char='.$prenext_link['prev'];
    $prenext_link['next'] = $cur_url.'?char='.$prenext_link['next'];

?>    
<section class="about-banner">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    表示番号指定
                </h1>
                <p class="text-white link-nav"><a href="/casio/">Home </a> 
                <span class="lnr lnr-arrow-right"></span> <a href="#"> 表示番号指定</a></p>
            </div>
        </div>
    </div>
</section>

<div class="container" id="main_section">
    <div class="col-md-12" style="padding-top: 10px;">
        <form id="kanjiViewerParams" action="#" class="form-horizontal">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="kanji">Kanji</label>
                    <div class="controls docs-input-sizes">
                        <input class="span2" type="text" value="<?php echo $char; ?>" id="kanji" placeholder="e.g. 線">
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="strokeWidth">Stroke width</label>
                    <div class="controls docs-input-sizes">
                        <input class="span2" type="text" value="3" id="strokeWidth" placeholder="">
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="fontSize">Font size</label>
                    <div class="controls docs-input-sizes">
                        <input class="span2" type="text" value="5" id="fontSize" placeholder="">
                    </div>
                </div>
    
                <!-- <div class="control-group">
                    <label class="control-label" for="zoomFactor">Zoom percentage</label>
                    <div class="controls docs-input-sizes">
                        <input class="span2" type="text" value="100" id="zoomFactor" placeholder="">
                    </div>
                </div> -->
    
                <div class="control-group" style="display: none;">
                    <label class="control-label" id="optionsCheckboxes">Options</label>
                    <div class="controls" style="">
                        <label class="checkbox">
                            <input type="checkbox" name="displayOrders" id="displayOrders" checked="on">
                            Display stroke order
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="colorGroups" id="colorGroups">
                            Colour groups instead of individual stroke
                        </label>
                        <p class="help-block" style="display: none;">
                            <strong>Note:</strong> Please redraw after changing options.
                        </p>
                    </div>
                </div>
                <div class="form-actions" style="margin-top: 10px;">
                    <input type="submit" class="btn btn-primary" value="Redraw">&nbsp;
                    <!-- <button type="reset" class="btn btn-info">Reset</button> -->
                </div>
            </fieldset>
        </form>
    </div>

    <div class="container-fluid">

    <div class="col-lg-12 col-md-12 " style="
padding-left: 0;
float: left;
border-bottom: 3px solid#ddd;
margin-bottom: 20px;
">
  <div style="float: left;margin-bottom: 10px;padding-left: 0;" class="col-md-4 col-sm-4">
<a href="<?= $prenext_link['prev'] ?>" class="primary-btn text-uppercase">Previous</a>
</div>

 <div style="float: left;margin-bottom: 10px;text-align: center;" class="col-md-4 col-sm-4">
    <a href="#" class="primary-btn text-uppercase" onclick="window.location.reload(true);">Redraw</a>
</div> 

<div style="float: left;margin-bottom: 10px;text-align: right;padding-right: 0;" class="col-md-4 col-sm-4">
<a href="<?= $prenext_link['next'] ?>" class="primary-btn text-uppercase">Next </a>
</div>





</div>

 <div class="row">
  <div class="col-md-3"></div>
  <div class="">
      <div class="tab" role="tabpanel">
          <ul class="nav nav-tabs" role="tablist" style="text-align: center;">
              <li role="presentation" class="active" style="border: 1px solid #ddd;border-radius: 4px 4px 0 0;"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Letter Draw</a></li>
              <li role="presentation" style="border: 1px solid #ddd;border-radius: 4px 4px 0 0;"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Step by Step Letter</a></li>
          </ul>
          <div class="tab-content tabs" style="border: 1px solid #ddd;">
              <div role="tabpanel" class="tab-pane fade in active" id="Section1" style="border: 1px solid #ddd;">
              <div class="col-lg-12 col-md-12 home-about-left">
					<div class="kanji-main11" style="">
						<canvas height="400" id="kanjipaint" width="400"></canvas>
					</div>
				</div>

              </div>
              <div role="tabpanel" class="tab-pane fade" id="Section2" style="border: 1px solid #ddd;">
                  <div class="page-header" style="padding-bottom: 0;margin-bottom: 0;">
                    <h1 style="
                    font-size: 20px;
                    color: #0068b1; text-align: center;
                ">Step by Step Letter </h1>
                </div>
                
                <div class="col-md-12">
                <div id="kanjiViewer" style="border: 0px;"></div>
                </div>
              </div>
            
          </div>
      </div>
  </div>
  <div class="col-md-3"></div>
</div> 

<div class="row-fluid" style="padding-top: 5px;border-top: 2px solid #ccc;margin-top: 30px;">
      
<div class="col-md-6" style="float: left;">








<div class="btnContainer" style="display: none;">
   
    <div class="btnInput">
        <span id="erase" class="button">Erase</span>
    </div>
    
    <div class="btnInput">
        <span id="save" class="button">Save</span>
    </div>        
   
    <div class="btnInput">
        <span id="reset" class="button">Reset</span>
    </div>       
</div>





</div>

<script>
					// Canvasのデータ取得 //
					const c = document.getElementById("kanjipaint");
					const ctx = c.getContext("2d");

					// 背景描画 //
					var image = new Image();
					image.src = "./img/elements/canvas.png";

					image.onload = function () {
					ctx.drawImage(image, 0, 0, 400, 400);
					};

					// ver left = 10;
					ctx.lineWidth = 5;

					// 描画の開始 //
					wStart = function (e) {
					// 画面のスクロールを防止する //
					e.preventDefault();

					// 描画モード //
					w = true;
					ctx.beginPath();
					ctx.lineWidth = 15;

					// スマホ、タブレット以外 //
					if (typeof e.touches == "undefined") {
					ctx.moveTo(e.offsetX, e.offsetY);

					// スマホ、タブレット以外 //
					} else {
					var t = e.touches[0];
					var p = e.target.getBoundingClientRect();

					//描画位置のズレを修正
					ctx.moveTo(t.pageX - p.left, t.pageY - p.top);
					}
					};
					// マウス押下時 //
					c.onmousedown = wStart;
					// タッチ開始時 //
					c.ontouchstart = wStart;

					// ラインを描画 //
					wLine = function (e) {
					// 描画モードの時 //
					if (w) {
					// スマホ、タブレット以外 //
					if (typeof e.touches == "undefined") {
					 if (e.offsetX >= 390 || e.offsetX <= 5 || e.offsetY >= 390 || e.offsetY <= 5) {
					   c.dispatchEvent(new Event('mouseup'));
					   return;
					 }

					 ctx.lineTo(e.offsetX, e.offsetY);

					 // スマホ、タブレット以外 //
					} else {
					 var t = e.touches[0];
					 var p = e.target.getBoundingClientRect();

					 // 描画位置のズレを修正
					 ctx.lineTo(t.pageX - p.left, t.pageY - p.top);
					}
					ctx.stroke();
					}
					};
					// マウス移動時 //
					c.onmousemove = wLine;
					// タッチ移動時 //
					c.ontouchmove = wLine;

					// 描画の終了 //
					var wStop = function () {
					w = false;
					ctx.lineWidth = 5;
					ctx.closePath();
					};
					// マウスボタンを離した時 //
					c.onmouseup = wStop;
					// タッチ終了時 //
					c.ontouchend = wStop;

					// クリアボタン押下時 //
					clear.onclick = function () {
					ctx.clearRect(0, 0, c.width, c.height);

					// 背景描画 //
					var image = new Image();
					image.src = "./img/JS0502.png1";

					image.onload = function () {
					ctx.drawImage(image, 0, 0, 400, 400);
					};
					};

					</script>

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


 

</div>
  <hr>
  
</div>
</div>
<?php require_once('footer.php'); ?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script>
    $(document).bind("contextmenu",function(e){
        return false;
    });
</script>
<script src="js/kanji-script.js"></script>
<script src="js/kanji.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        var canvas = document.getElementById("paint");
        var ctx = canvas.getContext("2d");
        var ctxchar = jQuery('#kanji').val();
        ctx.font = "300px Arial";
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.strokeText(ctxchar, 110, 300);

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
            //canvas fill text
            ctxchar = jQuery('#kanji').val();
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.strokeText(ctxchar, 110, 300);
            KanjiViewer.setFontSize(jQuery('#fontSize').val());
            KanjiViewer.setZoom(jQuery('#zoomFactor').val());
            KanjiViewer.setStrokeWidth(jQuery('#strokeWidth').val());
            KanjiViewer.setStrokeOrdersVisible(jQuery('#displayOrders:checked').val());
            KanjiViewer.setColorGroups(jQuery('#colorGroups:checked').val());
            KanjiViewer.setKanji(jQuery('#kanji').val());
            KanjiViewer.refreshKanji();
            return false;
        });

        canvas.addEventListener("touchstart", mouseDown, false);
        canvas.addEventListener("touchmove", mouseXY, true);
        canvas.addEventListener("touchend", mouseUp, false);
        document.body.addEventListener("touchcancel", mouseUp, false);
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
                url:"kanjicharlist.php",
                method:"POST",      
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
</body>

<!-- Mirrored from kanjivg.tagaini.net/viewer.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jul 2022 20:04:36 GMT -->
</html>

