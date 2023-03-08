<?php
    $http_var = 'http://';
    $domain = $http_var.$_SERVER['HTTP_HOST'];

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

    $back_url   =   $domain.'/kanji/?char='.$char;

?>
<style>
  .Wrapper {
  position: relative;
  overflow: hidden;
  height: 400px !important;
  width: 400px !important;
}
    .primary-btn {
        padding-left: 20px !important;
        padding-right: 20px !important;
    }
    canvas { width: 400px; height: 400px;}
    canvas{
        background-color: #fff;
          background-size:cover;
        background-image: url(<?= $domain.'/img/kanji_img/'.$kanji_img; ?>);

        
    }

    .single-footer-widget .footer-social a {
  width: auto !important;
}

.footer-area {
  background-color: #fff !important;
}
.section-gap {
  padding: 20px 0 !important;
}
</style>

 <!-- for paint End -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"
    href="/css/css/A.linearicons.css%2bfont-awesome.min.css%2bbootstrap.css%2bmagnific-popup.css%2cMcc.yJoU4ilZPf.css.pagespeed.cf.YO2lFmrYRe.css" />
  <link rel="stylesheet" href="/css/css/jquery-ui.html">
  <link rel="stylesheet" href="/css/css/style.css" />

  <link rel="stylesheet" type="text/css" href="/styles/styles.css" title="main" />
  <link rel="stylesheet" type="text/css" href="/styles/navigation.css" />

  
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.css"
    integrity="sha512-SWjZLElR5l3FxoO9Bt9Dy3plCWlBi1Mc9/OlojDPwryZxO0ydpZgvXMLhV6jdEyULGNWjKgZWiX/AMzIvZ4JuA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  
  <script src="/node_modules/digital-ink/web-integrator/web-integrator-min.js"></script>
  <script type="text/javascript">DigitalInkWebIntegrator.integrate();</script>

  <!-- dom-transformer event -->
  <link rel="stylesheet" type="text/css" href="/node_modules/dom-transformer/dom-transformer.css" />
  <script type="text/javascript" src="/node_modules/dom-transformer/dom-transformer-min.js"></script>

  <script>
      window.localStorage.setItem("sample", 1)
  </script>

  <script type="text/javascript">
    const {
      version,
      fsx, utils,
      InputDevice, InputListener,
      SensorChannel, InkController,
      Brush2D, BrushPrototype, ShapeFactory,
      BrushGL, URIResolver,
      Intersector, Selector,
      PathPoint, PathPointContext, InkBuilder,
      Path, InkPath2D, Stroke,
      InkModel, SpatialContext,
      InkCodec, RMSEBasedPrecisionCalculator, InkToolCodec,
      Color, Polygon, Rect, Point, Matrix,
      PipelineStage, BlendMode,
      InkCanvas2D, StrokeRenderer2D,
      InkCanvasGL, StrokeRendererGL,
      InkPathProducer, SplitPointsProducer
    } = DigitalInk;

    const { TransformEvent, PinchEvent } = DOMTransformer;

    DigitalInkWebIntegrator.linkWorkers(InkPathProducer, SplitPointsProducer);
  </script>

  <script type="text/javascript" src="/scripts/DataModel.js"></script>
  <script type="text/javascript" src="/scripts/DataRepository.js"></script>
  <script type="text/javascript" src="/scripts/URIBuilder.js"></script>
  <script type="text/javascript" src="/scripts/BrushPalette.js"></script>
  <script type="text/javascript" src="/scripts/ValueTransformer.js"></script>
  <script type="text/javascript" src="/scripts/Config.js"></script>

  <script type="text/javascript" src="/scripts/Lens.js"></script>
  <script type="text/javascript" src="/scripts/InkCanvas.js"></script>
  <script type="text/javascript" src="/scripts/InkCanvasVector.js"></script>
  <script type="text/javascript" src="/scripts/InkCanvasRasterRuntime.js"></script>
  <script type="text/javascript" src="/scripts/InkCanvasRaster.js"></script>
  <script type="text/javascript" src="/scripts/InkStorage.js"></script>

  <script type="text/javascript" src="/scripts/selection/CanvasBubble.js"></script>
  <script type="text/javascript" src="/scripts/selection/CanvasTransformer.js"></script>

  <link rel="stylesheet" type="text/css" href="/styles/selection.css" />

  <script type="text/javascript" src="/scripts/selection/Selection.js"></script>
  <script type="text/javascript" src="/scripts/selection/SelectionVector.js"></script>
  <script type="text/javascript" src="/scripts/selection/SelectionRaster.js"></script>
  <script type="text/javascript" src="/scripts/selection/SelectionListener.js"></script>

  <script type="text/javascript" src="/scripts/layout/DropDown.js"></script>
  <script type="text/javascript" src="/scripts/layout/Layout.js"></script>

  <link rel="stylesheet" type="text/css" href="/styles/preloader.css" />
  <script type="text/javascript" src="/scripts/layout/preloader.js"></script>

  <link rel="stylesheet" type="text/css" href="/styles/protector.css" />
  <script type="text/javascript" src="/scripts/layout/protector.js"></script>

  <script type="text/javascript" src="/scripts/app.js"></script>

  <script src="/main.js"></script>
  <!-- for paint End -->
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

    .nav-tabs>.active>a,
    .nav-tabs>.active>a:hover {
      color: #fff;
      border: 1px solid #8490ff;
      border-bottom-color: rgb(132, 144, 255);
      border-bottom-color: transparent;
      cursor: default;
      background: #8490ff;
    }

    nav {
      margin-top: -20px;
    }
  </style>
  <nav>
    <div>
      <img src="/images/btn_paper_02.jpg" title="Paper" class="Item Paper" onclick="dropDown.toggle('Papers')"
        alt="" />

      <label for="load_file" title="Import ink object"><img src="/images/btn_load.png" title="Load" alt="" /></label>
      <input id="load_file" type="file" class="Button" onchange="app.inkStorage.import(this, 'uim');" />

      <img src="/images/btn_save.png" title="Save" onclick="app.inkStorage.save()" alt="" />

      <span class="ColorBox Delimiter" style="">
        <a href="javascript:void(0)" title="Color" class="Item Color" style="background-color: #4A4A4A;margin: 0;">
          <input type="color" value="#4A4A4A">
        </a>
      </span>

      <img src="/images/btn_clear.png" class="DelimiterRight" title="Clear" onclick="app.inkCanvas.clear()" alt="" />

      <span class="VectorPart">
        <img id="pen" src="/images/btn_tools/btn_pen.png" title="Pen" class="Tool" alt="" />
        <img id="felt" src="/images/btn_tools/btn_feather.png" title="Felt" class="Tool" alt="" />
        <img id="brush" src="/images/btn_tools/btn_brush.png" title="Brush" class="Tool" alt="" />
        <!--  <img id="marker" src="/images/btn_tools/btn_marker.png" title="Marker" class="Tool" alt="" />

        <img id="basic" name="basic" src="/images/btn_tools/btn_basic_brush.png" title="Basic"
          class="Tool PureVector DelimiterLeft" alt="" /> -->
      </span>

      <span class="RasterPart">
        <!-- <img id="pencil" src="/images/btn_tools/btn_pencil.png" title="Pencil" class="Tool" alt="" />
        <img id="waterBrush" src="/images/btn_tools/btn_water_brush.png" title="Water Brush" class="Tool" alt="" />
        <img id="inkBrush" src="/images/btn_tools/btn_feather.png" title="Ink Brush" class="Tool" alt="" /> -->
        <img style="display:none" id="crayon" src="/images/btn_tools/btn_crayon.png" title="Crayon" class="Tool" alt="" />
      </span>

      <img id="eraser" src="/images/btn_tools/eraser.png" class="Tool RasterPart DelimiterLeft" title="Eraser"
        alt="" />

      <span class="VectorPart PureVector DelimiterLeft" style="margin-left: 0px;">
        <img id="eraserStroke" src="/images/btn_tools/eraser_delayed_partial_stroke.png" class="Tool"
          title="Delayed Stroke Eraser" alt="" />
        <img id="eraserWholeStroke" src="/images/btn_tools/eraser_whole_stroke.png" class="Tool"
          title="Whole Stroke Eraser" alt="" />
      </span>

      <img id="selector" src="/images/btn_tools/btn_selector.png" class="Tool DelimiterLeft" title="Selector" alt="" />

      <span class="PureVector">
        <img id="selectorWholeStroke" src="/images/btn_tools/btn_selector_whole_stroke.png" class="Tool VectorPart"
          title="Whole Stroke Selector" alt="" />
      </span>

      <img id="customTool" src="/images/btn_tools/btn_toolconfig_tool.png" title="Custom Tool"
        class="DelimiterLeft Tool Disabled" alt="" />
      <label for="load_tool" title="Import tool"><img src="/images/btn_import_brush.png" alt="" /></label>
      <input id="load_tool" type="file" accept="application/protobuf; proto=WacomInkFormat3.Tool"
        onchange="app.inkStorage.import(this, 'tool')" />

      <div class="BackToMenu" style="display: none;">
        <a href="javascript:void(0)" title="Toggle Pointer prediction" class="Button pointerPrediction"
          onclick="layout.toggleParam('pointerPrediction')">PP</a>
        <a href="javascript:void(0)" title="Toggle downsampling" class="Button downsampling"
          onclick="layout.toggleParam('downsampling')">DS</a>
        <img src="/images/btn_back.png" title="Back to menu" onclick="app.redirect()" style="cursor: pointer" alt="" />
      </div>
    </div>

    <div class="DropDown Papers" style="visibility: hidden;">
      <img src="/images/dropdown_arrow.png" class="Arrow" alt="" />
      <img id="paper_01" src="/images/btn_paper_01.jpg" class="Item Paper" alt="" />
      <img id="paper_02" src="/images/btn_paper_02.jpg" class="Item Paper Selected" alt="" />
      <img id="paper_03" src="/images/btn_paper_03.jpg" class="Item Paper" alt="" />
    </div>
  </nav>
<div class="container" style="padding-top: 30px;">
    <input type="hidden" id="kanji-img" value="<?= $domain.'/img/kanji_img/'.$kanji_img; ?>">
    
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12">
                <div class="tab" role="tabpanel" style="max-width:450px;margin:auto;">
                    <ul class="nav nav-tabs" role="tablist" style="text-align: center;">
                        <li role="presentation" class="active" style="border: 1px solid #ddd;border-radius: 4px 4px 0 0;"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Draw</a></li>
                        <li role="presentation" style="border: 1px solid #ddd;border-radius: 4px 4px 0 0;"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Help</a></li>
                    </ul>
                    <div class="tab-content tabs" style="border: 1px solid #ddd;">
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1" style="border: 1px solid #ddd;">
                        <div class="col-lg-12 col-md-12 home-about-left" style="padding-top: 20px;">



<div>
  <div class="flex-wrapper menu" style="display: none">
    <div>
      <ol>
        <ol>
          <li><a href="javascript: void(0)" id="sample1"></a></li>
        </ol>
        </li>
      </ol>
    </div>
  </div>

  <div class="app" style="display: none">


    <div class="Wrapper">
      <h3 class="title"></h3>
      <h5 class="identity">
        <span id="APPName"></span>
        <span id="APPVersion"></span>,
        powered by digital-ink
        <span id="SDKVersion"></span>
      </h5>

      <canvas class="layer-transforms" style="display: none"
        oncontextmenu="event.preventDefault()"></canvas>

      <canvas id="surface" oncontextmenu="event.preventDefault()"></canvas>
      <canvas id="raster-runtime" style="display: none"
        oncontextmenu="event.preventDefault()"></canvas>

      <div class="selection selection-vector" style="display: none"></div>
      <div class="selection selection-raster" style="display: none"></div>

      <div class="preloader" style="display: none">
        <div class="flex-wrapper">
          <div class="progress flex-wrapper">
            <div class="value"></div>
          </div>
          <div class="message"></div>
        </div>
      </div>
    </div>

    <div class="protector"></div>
  </div>
</div>
</div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Section2" style="border: 1px solid #ddd;">
                            <div class="page-header" style="padding-bottom: 0;margin-bottom: 0;">
                            </div>
                            <div class="col-md-12">
                                <div id="kanjiViewer" style="border: 0px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
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
        <p id="sample"></p>
        <div class="col-lg-12 col-md-12 " style="padding-left: 0;float: left;margin-bottom: 20px;">
            <div style="float: left;margin-bottom: 10px;padding-left: 0;" class="col-md-4 col-sm-4">
                <a href="<?= $prenext_link['prev'] ?>" class="primary-btn text-uppercase ">
                    <span class="lnr lnr-arrow-left" style="padding: 10px;color: #fff;background: #8490ff;"></span>
                </a>
            </div>
            <div style="float: left;margin-bottom: 10px;text-align: center;" class="col-md-4 col-sm-4">
                <a href="<?= $back_url; ?>" class="primary-btn text-uppercase">Back</a>
                <a href="#" class="primary-btn text-uppercase" onclick="window.location.reload(true);">Redraw</a>
            </div>
            <div style="float: left;margin-bottom: 10px;text-align: right;padding-right: 0;" class="col-md-4 col-sm-4">
                <a href="<?= $prenext_link['next'] ?>" class="primary-btn text-uppercase">
                    <span class="lnr lnr-arrow-right" style="/*! background-color: #70aafd; */padding: 10px;color: #fff;background: #8490ff"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="text-align: center;padding-bottom: 20px;">
    
    <a href="#">
    <img src="https://wcm-cdn.wacom.com/-/media/images/logos/app-logos/wacom-for-a-creative-world-logo.png?rev=58082a9ab91c435f97ad78e425890cdc&amp;hash=7AF7EF8ECDE4C096ADE120BF8E436AED">
    </a>
</div>
    <div class="col-md-12" style="padding-top: 10px;display:none;">
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
                        <input class="span2" type="text" value="5" id="strokeWidth" placeholder="">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="fontSize">Font size</label>
                    <div class="controls docs-input-sizes">
                        <input class="span2" type="text" value="10" id="fontSize" placeholder="">
                    </div>
                </div>
        
                <div class="control-group">
                    <label class="control-label" for="zoomFactor">Zoom percentage</label>
                    <div class="controls docs-input-sizes">
                        <input class="span2" type="text" value="100" id="zoomFactor" placeholder="">
                    </div>
                </div>
        
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
                    <button type="reset" class="btn btn-info">Reset</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
