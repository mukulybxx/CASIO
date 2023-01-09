<?php
    $http_var = 'http://';
    $domain = $http_var.$_SERVER['HTTP_HOST'].'/casio';

    if(isset($_GET['char']) && !empty($_GET['char'])){
        $char   =   $_GET['char'];
    }else{
        $char   =   get_first_char();
    } 

    $cur_url = get_current_url();
    $cur_url = explode('?char=', $cur_url)[0];
    $kid = get_kanji_id($char);
    $kanji_img = get_kanji_img($kid);
    $prenext_link = get_prev_next_char($kid);
    $prenext_link['prev'] = $cur_url.'?char='.$prenext_link['prev'];
    $prenext_link['next'] = $prenext_link['next'] ? $cur_url.'?char='.$prenext_link['next'] : '';
?>

<div class="container">
    <input type="hidden" id="kanji-img" value="<?= $domain.'/img/kanji_img/'.$kanji_img; ?>">
   
    <div class="container-fluid">
        
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
                                    <canvas id="kanjipaint" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Section2" style="border: 1px solid #ddd;">
                            <div class="page-header" style="padding-bottom: 0;margin-bottom: 0;">
                                <h1 style="font-size: 20px;color: #0068b1; text-align: center;">Step by Step Letter </h1>
                            </div>
                            <div class="col-md-12">
                                <div id="kanjiViewer" style="border: 0px;"></div>
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
            </div>
            <hr>
        </div>
        <div class="col-lg-12 col-md-12 " style="padding-left: 0;float: left;border-bottom: 3px solid#ddd;margin-bottom: 20px;">
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
    </div>
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
</div>
