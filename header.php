
<header class="header_area">
        <div class="main_header_area animated">
            <!-- <div style="background-color: #66b8fd;float: left;width: 100%;">
                <div class="container">
                    <div class="thumbnail1 col-md3" style="float: right;margin-top: 10px;">
                        <figure class="text-center11">
                            <figcaption>
                                <p style="float: left;margin-right: 16px;color: #fff;font-weight: 600;font-size: 16px;">Download and install the driver</p>
                                <p style="float: left;">
                                    <a href="https://www.wacom.com/services/wacom/get-download-url.aspx?plat=win&amp;dver=6.3.13w3&amp;dt=drivers&amp;redirect=true" style="color: black;font-size: 14px;">
                                        Windows&nbsp;
                                    </a>|
                                    <a href="https://www.wacom.com/services/wacom/get-download-url.aspx?plat=mac&amp;dver=6.3.13w3&amp;dt=drivers&amp;redirect=true" style="color: black;font-size: 14px;">&nbsp;Mac</a>
                                </p>
                            </figcaption>
                        </figure>
                    </div> 
                </div>
            </div> -->
            <div class="container">
                <nav id="navigation1" class="navigation">
                <!-- Logo Area Start -->
                <div class="nav-heade col-md-5" style="float: left;">
                    <a href="<?= $domain; ?>" class="nav-brand col-md-3"><img class="logo-w" alt="" title="" src="https://1000logos.net/wp-content/uploads/2018/02/Casio-logo.jpg" ></a>
                    <div class="nav-toggle"></div>
                </div>

                    <form action="" method="post" name="kanjimenuform" id="kanjimenuform">
                    
                    <!-- Search panel Start -->
                    <div class="nav-search" style="padding-top: 40px;">
                        <a id="submit_button"><span style="text-align: center;"> <i class="fa fa-arrow-right" style="padding-left: 15px;padding-right: 15px;padding-top: 12px;background-color: #fbfcfd;width: 50px;height: 40px;border: 1px solid #efefef;"></i></span></a>
                        
                    </div>
                    <!-- Main Menus Wrapper -->
                    <div class="nav-menus-wrapper">
                        <ul class="nav-menu align-to-right" style="padding-top: 20px;">
                        <li><a href="/" >Home</a></li>
                        
                            <li><a href="#">表示番号指定</a>
                                <ul class="nav-dropdown">
                                    <li><a href="#"><input type="radio" name="kanjinumber[]" id="kanjinumber-1" value="0001-0080" checked> <label for="kanjinumber-1"> 0001-0080 </label></a></li>
                                    <li><a href="#"><input type="radio" name="kanjinumber[]" id="kanjinumber-2" value="0081-0160"> <label for="kanjinumber-2"> 0081-0160 </label></a></li>
                                    <li><a href="#"><input type="radio" name="kanjinumber[]" id="kanjinumber-3" value="0161-0240" > <label for="kanjinumber-3"> 0161-0240  </label></a></li>
                                    <li><a href="#"><input type="radio" name="kanjinumber[]" id="kanjinumber-4" value="0241-0320" > <label for="kanjinumber-4"> 0241-0320  </label></a></li>
                                    <li><a href="#"><input type="radio" name="kanjinumber[]" id="kanjinumber-5" value="0321-0400" > <label for="kanjinumber-5">  0321-0400  </label></a></li>
                                    <li><a href="#"><input type="radio" name="kanjinumber[]" id="kanjinumber-6" value="0401-0480" > <label for="kanjinumber-6"> 0401-0480  </label></a></li>
                                </ul>
                            </li>
                            <li><a href="#">常用漢字</a>
                                <ul class="nav-dropdown">
                                    <li><a href="#"><input type="checkbox" name="joyo[]" id="joyo-1" value="常用漢字" checked> <label for="joyo-1">  常用漢字  </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="joyo[]" id="joyo-2" value="非常用漢字" checked> <label for="joyo-2">  非常用漢字  </label></a></li>
                                   <!--  <li><a href="#"><input type="checkbox" name="joyo[]" id="joyo-3" value="その他"> <label for="joyo-3">   その他   </label></a></li> -->
                                </ul>
                            </li>
                            
                            <li><a href="#">日本の義務教育</a>
                                <ul class="nav-dropdown">
                                    <li><a href="#"><input type="checkbox" name="edukanji[]" id="edukanji-1" value="小学1年生" checked> <label for="edukanji-1"> 小学1年生  </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="edukanji[]" id="edukanji-1" value="小学1年生" checked> <label for="edukanji-1"> 小学1年生  </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="edukanji[]" id="edukanji-2" value="小学2年生" checked> <label for="edukanji-2"> 小学2年生  </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="edukanji[]" id="edukanji-3" value="小学3年生" checked> <label for="edukanji-3">   小学3年生   </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="edukanji[]" id="edukanji-4" value="小学4年生" checked> <label for="edukanji-4">  小学4年生  </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="edukanji[]" id="edukanji-5" value="小学5年生" checked> <label for="edukanji-5">  小学5年生  </label></a></li> 
                                    <li><a href="#"><input type="checkbox" name="edukanji[]" id="edukanji-6" value="小学6年生" checked> <label for="edukanji-6"> 小学6年生 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="edukanji[]" id="edukanji-7" value="中学1年生" checked> <label for="edukanji-7"> 中学1年生 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="edukanji[]" id="edukanji-8" value="中学2年生" checked> <label for="edukanji-8"> 中学2年生 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="edukanji[]" id="edukanji-9" value="中学3年生" checked> <label for="edukanji-9"> 中学3年生 </label></a></li>
                                </ul>
                            </li>
                            <li><a href="#">漢検</a>
                                <ul class="nav-dropdown">
                                    <li><a href="#"><input type="checkbox" name="kanjiexam[]" id="kanjiexam-1" value="1級" checked> <label for="kanjiexam-1"> 1級 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="kanjiexam[]" id="kanjiexam-2" value="2級" checked> <label for="kanjiexam-2"> 2級 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="kanjiexam[]" id="kanjiexam-3" value="準2級" checked> <label for="kanjiexam-3"> 準2級 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="kanjiexam[]" id="kanjiexam-4" value="3級" checked> <label for="kanjiexam-4"> 3級 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="kanjiexam[]" id="kanjiexam-5" value="4級" checked> <label for="kanjiexam-5"> 4級 </label></a></li> 
                                    <li><a href="#"><input type="checkbox" name="kanjiexam[]" id="kanjiexam-6" value="5級" checked> <label for="kanjiexam-6"> 5級 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="kanjiexam[]" id="kanjiexam-7" value="6級" checked> <label for="kanjiexam-7"> 6級 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="kanjiexam[]" id="kanjiexam-8" value="7級" checked> <label for="kanjiexam-8"> 7級 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="kanjiexam[]" id="kanjiexam-9" value="8級" checked> <label for="kanjiexam-9"> 8級 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="kanjiexam[]" id="kanjiexam-10" value="9級" checked> <label for="kanjiexam-10"> 9級 </label></a></li>
                                    <li><a href="#"><input type="checkbox" name="kanjiexam[]" id="kanjiexam-11" value="10級" checked> <label for="kanjiexam-11"> 10級 </label></a></li>
                                </ul>
                            </li>
                            <li><a href="#">JLPT試験</a>
                                <ul class="nav-dropdown">
                                    <li><a href="#"><input type="checkbox" name="jlpt[]" id="jlpt-1" value="N1" checked> <label for="jlpt-1"> N1</label></a></li>
                                    <li><a href="#"><input type="checkbox" name="jlpt[]" id="jlpt-2" value="N2" checked> <label for="jlpt-2"> N2</label></a></li>
                                    <li><a href="#"><input type="checkbox" name="jlpt[]" id="jlpt-3" value="N3" checked> <label for="jlpt-3"> N3</label></a></li>
                                    <li><a href="#"><input type="checkbox" name="jlpt[]" id="jlpt-4" value="N4" checked> <label for="jlpt-4"> N4</label></a></li>
                                    <li><a href="#"><input type="checkbox" name="jlpt[]" id="jlpt-5" value="N5" checked> <label for="jlpt-5"> N5</label></a></li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                    </form>
                </nav>
            </div>
        </div>
      </header>
      <!-- <script>
        jQuery('input[type="checkbox"]').change(function(){
            var nameAttr = jQuery(this).attr('name');
            var isChecked = jQuery(this).is(':checked');
            if(isChecked){
                $('input[name="'+nameAttr+'"]').not(':checked').prop('disabled', isChecked ? true : false);
            }else{
                $('input[name="'+nameAttr+'"]').prop('disabled', false);
            }
        });
      </script> -->