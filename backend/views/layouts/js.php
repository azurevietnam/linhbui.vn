<?php

use yii\helpers\Url;
use yii\web\View;

?>
<!-- jQuery 2.1.4 -->

<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>-->
<script src="<?= Yii::$app->params['backend_url'] ?>/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!--    <script>
  $.widget.bridge('uibutton', $.ui.button);
</script>-->
<!-- Bootstrap 3.3.5 -->
<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/morris/morris.min.js"></script>-->
<!-- Sparkline -->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/sparkline/jquery.sparkline.min.js"></script>-->
<!-- jvectormap -->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>-->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- jQuery Knob Chart -->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/knob/jquery.knob.js"></script>-->
<!-- daterangepicker -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>-->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- datepicker -->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>-->
<!-- Bootstrap WYSIHTML5 -->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
<!-- Slimscroll -->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>-->
<!-- FastClick -->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/fastclick/fastclick.min.js"></script>-->
<!-- AdminLTE App -->
<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/dist/js/demo.js"></script>-->

<!----------------------------------------------------
-- Picture Cut: http://picturecut.tuyoshi.com.br/ ----
----------------------------------------------------->

<!-- jQuery UI 1.11.4 -->
<!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>-->
<script src="<?= Yii::$app->params['backend_url'] ?>/picture-cut/src/jquery.picture.cut.js"></script>
<script>
<?php $this->beginBlock('JS_END') ?>
    
    // Picture Cut plugin
   //////////////////////
    $(".picturecut_image_container").each(function(){
        var picturecut_image_container = $(this);
        var InputName = picturecut_image_container.siblings("input").attr("id");
        picturecut_image_container.PictureCut({
            Extensions                  : ["jpg","jpeg","png","gif"],
            InputOfImageDirectory       : InputName,
            PluginFolderOnServer        : "<?= Url::home() ?>picture-cut/",
            FolderOnServer              : "<?= Yii::$app->params['relative_backend_folder'] ?>/uploads/",
            EnableCrop                  : true,
            CropWindowStyle             : "Bootstrap",
            ImageNameRandom             : false,
            MinimumWidthToResize        : 4096,
            MinimumHeightToResize       : 4096,
//            MaximumSize                 : 2048,
            EnableMaximumSize           : false,
            UploadedCallback            : function(data){
                picturecut_image_container.siblings("input").val(data["currentFileName"]);
                textCount(picturecut_image_container.siblings("input"), false);
            }
        });
    });

    $(".picturecut_image_container.picture-element-principal").each(function(){
        $(this).width('auto').height('auto').css('text-align', 'center').css('border', 'none');
        $(this).children('form').children('input').width('100%').height('100%');
        $(this).children('form').children('img').height('100%');
    });
    
    $(document).bind('DOMNodeInserted', function(e) {
        // console.log(e.target, ' was inserted');
        <?php
            $arr_ip = Yii::$app->params['wph_ratios'];
            $arr_op = [];
            foreach ($arr_ip as $label => &$val) {
                $val = number_format($val, 3, '.', ',');
                $arr_op[$val] = isset($arr_op[$val]) ? $arr_op[$val] . ", $label" : "$val = $label";
            }
            ksort($arr_op);
            $new_select = '<select id=new_select><option value=free selected=selected></option>';
            foreach ($arr_op as $val => $desc) {
                $new_select .= "<option value=$val>$desc</option>";
            }
            $new_select .= '</select>';
        ?>
        if (e.target.id === "SelectOrientacao") {
            var new_select = $("<?= $new_select ?>");
            var default_select = $("#SelectProporcao");
            var crop_box = $("#SelecaoRecorte");
            new_select.insertAfter(default_select);
            new_select.css({
                "width":"100%",
                "height":default_select.height() + "px",
                "border":default_select.css("border")
            });
            default_select.css({
                "width":"0px",
                "height":"0px",
                "border":"none",
                "position":"absolute",
                "visibility":"hidden"
            });
            default_select.html(default_select.children("option[value=livre]")); // important !!!
            default_select.prop("disabled",true);
            var x = 2; // x > 1
            new_select.change(function(){
                var r = new_select.val();
                if ($.isNumeric(r)) {
                    crop_box.unbind("resize");
                    var p = crop_box.parent();
                    crop_box.css("max-width", p.width());
                    crop_box.css("max-height", p.height());
                    if (p.width() / p.height() <= x * r) {
                        crop_box.css("width", "calc(" + String(100 * (1 / x)) + "%)");
                        crop_box.css("height", crop_box.width() / r + "px");
                    } else {
                        crop_box.css("height", "calc(" + String(100 * (1 / x)) + "%)");
                        crop_box.css("width", crop_box.height() * r + "px");
                    }
                    crop_box.resize(function(){
                        var height = (crop_box.width() / r) + "px";
                        var width = (crop_box.height() * r) + "px";
                        crop_box.height(height);
                        crop_box.width(width);
                        if (parseInt(crop_box.css("top")) + parseInt(crop_box.height()) > parseInt(p.height()) ) {
                            crop_box.css("top", parseInt(p.height()) - parseInt(crop_box.height()) + "px");
                        }
                        if (parseInt(crop_box.css("left")) + parseInt(crop_box.width()) > parseInt(p.width()) ) {
                            crop_box.css("left", parseInt(p.width()) - parseInt(crop_box.width()) + "px");
                        }
                    });
                } else {
                    crop_box.unbind("resize");
                }
            });
        }
    });
    
    // Auto generate value for some inputs
   ///////////////////////////////////////
    $("input:text, textarea").each(function(){
        var ip = $(this);
        if (ip.attr('name').indexOf('[name]') != -1
        || ip.attr('name').indexOf('[page_title]') != -1
        || ip.attr('name').indexOf('[h1]') != -1
        || ip.attr('name').indexOf('[meta_title]') != -1
        ) {
            ip.change(function(){
                $("input:text, textarea").each(function(){
                    var item = $(this);
                    if (item.val() == "") { 
                        if (item.attr('name').indexOf('[name]') != -1
                        || item.attr('name').indexOf('[page_title]') != -1
                        || item.attr('name').indexOf('[h1]') != -1
                        || item.attr('name').indexOf('[meta_title]') != -1
                        ) {
                            item.val(ip.val());
                            textCount(item, false);
                        } else if (item.attr('name').indexOf('[meta_keywords]') != -1) {
                            item.val(get_keywords(ip.val()));
                            textCount(item, false);
                        } else if (item.attr('name').indexOf('[slug]') != -1) {
                            item.val(special_chars_filter(vi_str_filter(ip.val())));
                            textCount(item, false);
                        }
                    }
                });
//                $("select").children("option").each(function(){
//                    var item = $(this);
//                    if (item.parent("select").val() == "") {
//                        if (ip.val().indexOf(item.html()) != -1) {
//                            item.parent("select").val(item.val());
//                            item.parent("select").parent(".form-group").toggleClass("has-warning");
//                            return false;
//                        }
//                    }
//                });
            });
        }
        
        if (ip.attr('name').indexOf('[description]') != -1
        || ip.attr('name').indexOf('[meta_description]') != -1
        ) {
            ip.change(function(){
                $("input:text, textarea").each(function(){
                    var item = $(this);
                    if (item.val() == "") { 
                        if (item.attr('name').indexOf('[description]') != -1
                        || item.attr('name').indexOf('[meta_description]') != -1
                        ) {
                            item.val(ip.val());
                            textCount(item, false);
                        }
                    }
                });
            });
        }
        
        if (ip.attr('name').indexOf('[meta_keywords]') != -1) {
            var meta_keywords_selected = false;
            ip.click(function(){
                if (!meta_keywords_selected) {
                    $(this).select();
                    meta_keywords_selected = true;
                }
            });
        }
    });
    
    $("input:text, textarea").each(function(){
        textCount($(this));
    });
    
    $("select").click(function(){
        $(this).parent(".form-group").removeClass("has-warning");
    });
    
    function textCount(ip, onevent){
        onevent = typeof onevent !== "undefined" ? onevent : true;
        
        var label = ip.siblings("label");
        if (!label.next().is("code")) {
            $("<code></code>").insertAfter(label);
        }
        var counter = label.next("code");
        if (onevent) {
            ip.bind("change paste keydown keyup keypress mousemove click select", function(){
                var len = ip.val().length;
                if (len > 0) {
                    counter.html(" " + len);
                } else {
                    counter.html("");
                }
            });
        } else {
            var len = ip.val().length;
            if (len > 0) {
                counter.html(" " + len);
            } else {
                counter.html("");
            }
        }
    }
    
    function vi_str_filter(str) {
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        return str;
    }
    
    function special_chars_filter(str) {
        
        var special_chars = [];
        
        for (var i = 0; i < str.length; i++) {
            if (!/^[a-zA-Z0-9- ]*$/.test(str[i])) {
                has = false;
                if (!/^[/_.,]*$/.test(str[i])) {
                    for (var j = 0; j < special_chars.length; j++) {
                        if (special_chars[j].char == str[i]) {
                            special_chars[j].count += 1;
                            has = true;
                            break;
                        }
                    }
                    if (!has) {
                        special_chars.push({char:str[i], count:1});
                    }
                }
                str = str.substr(0, i) + " " + str.substr(i + 1);
            }
        }
        
        if (special_chars.length > 0) {
            var msg = "Phát hiện ký tự đặc biệt: \n";
            for (var i = 0; i < special_chars.length; i++) {
                msg += "\n     " + special_chars[i].char + "     (" + special_chars[i].count + " lần)";
            }
            msg += "\n\n Vui lòng kiểm tra Slug.";
            
            alert(msg);
        }
        
        str = str.trim();
        str = str.replace(/ /g, "-");
        while (str.indexOf("--") !== -1) {
            str = str.replace(/--/g, "-");
        }
        
        return str;
    }
    
    function get_keywords(str) {
//        str = str.replace(/ (tại|bởi|với|vào|về sau|về|xung quanh|xuống|theo như|như|đến|ở)/g, ", "); // Giới từ: https://vi.wiktionary.org/wiki/Th%E1%BB%83_lo%E1%BA%A1i:Gi%E1%BB%9Bi_t%E1%BB%AB_ti%E1%BA%BFng_Vi%E1%BB%87t
////        str = str.replace(/ ([năm]|[tháng]|[ngày])/g, ", $1");
//        
//        var words_arr = str.split(/ (?=[A-Z])/);
//        var result = words_arr[0];
//        for (var i = 1; i < words_arr.length; i++) {
//            if(words_arr[i][0].toUpperCase() === words_arr[i][0]) {
//                var prev_word_arr = words_arr[i - 1].split(/ /);
//                if (prev_word_arr[prev_word_arr.length - 1][0].toUpperCase() === prev_word_arr[prev_word_arr.length - 1][0]) {
//                    result += " ";
//                } else {
//                    result += ", ";
//                }
//            }
//            result += words_arr[i];
//        }
//        
//        var keywords_arr = result.split(/, /);
//        for (var i = 0; i < keywords_arr.length; i++) {
//            if (keywords_arr[i] !== vi_str_filter(keywords_arr[i])) {
//                result += ", " + vi_str_filter(keywords_arr[i]);
//            }
//        }
//        
//        return result;
        if (vi_str_filter(str) === str) {
            return str;
        } else {
            return str + ", " + vi_str_filter(str);
        }
    }
    
    // Add submit button 2
   ///////////////////////
//    var form_ = $(".form-group:has(button:submit)");
//    var submit_bt = form_.children("button:submit:last-child");
//    var submit_bt2 = submit_bt.clone();
//    submit_bt.attr("id", "submit_bt");
//    submit_bt2.removeClass().removeAttr();
//    submit_bt2.css("background-color", submit_bt.css("background-color")).css("color", submit_bt.css("color"));
//    submit_bt2.attr("id", "submit_bt2");
//    $(form_).append(submit_bt2);
//    
//    $(submit_bt2).click(function(event){
//        var time = 0.5;
//        var color = "transparent";
//        var color2 = $(this).css("background-color");
//        var h = 10;
//        var h2 = 100;
//        var w = 10;
//        var w2 = 100;
//        var x = event.pageX;
//        var y = event.pageY;
//        $.when(fn1()).then(fn2());
//        function fn1() {
//            var ele = "<div id=\"mouse_point\" style=\"left:" + (x - w/2) + "px;top:" + (y - h/2) + "px;border-radius:100%;height:" + h + "px;width:" + w + "px;background:" + color + ";position:absolute;transition:all " + time + "s;\"></div>";
//            $("html").append(ele);
//        }
//        function fn2() {
//            fn21();
//            setTimeout(function(){
//                fn22();
//            }, 1000 * time);
//        }
//        function fn21() {
//            $("#mouse_point").width(w2 + "px").height(h2 + "px");
//            $("#mouse_point").css("margin-top", (h - h2)/2 + "px").css("margin-left", (w - w2)/2 + "px");
//            $("#mouse_point").css("border", (h2 - h)/7 + "px solid " + color2);
//            $("#mouse_point").css("opacity", 0);
//        }
//        function fn22() {
//            $("#mouse_point").remove();
//        }
//    });
    
<?php $this->endBlock(); ?>    
</script>
<?php  
$this->registerJs($this->blocks['JS_END'], View::POS_END);
