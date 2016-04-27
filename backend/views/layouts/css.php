<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="<?= Yii::$app->params['backend_url'] ?>/admin-lte/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="<?= Yii::$app->params['backend_url'] ?>/font-awesome-4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
<link rel="stylesheet" href="<?= Yii::$app->params['backend_url'] ?>/ionicons-2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= Yii::$app->params['backend_url'] ?>/admin-lte/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?= Yii::$app->params['backend_url'] ?>/admin-lte/dist/css/skins/_all-skins.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/iCheck/flat/blue.css">
<!-- Morris chart -->
<link rel="stylesheet" href="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/morris/morris.css">
<!-- jvectormap -->
<link rel="stylesheet" href="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<!-- Date Picker -->
<link rel="stylesheet" href="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/datepicker/datepicker3.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?= Yii::$app->params['backend_url'] ?>/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?= Yii::$app->params['backend_url'] ?>/favicon.ico">

<style>
/* Picture Cut Fix */
*:focus {outline:none !important}
.ui-widget-overlay.ui-front {
    position: fixed !important;
}
#JtuyoshiCrop {
    padding: 0 !important;
    box-sizing: content-box !important;
    margin: 0 auto !important;
    height: auto !important;
    width: auto !important;
    overflow-x: scroll !important;
    overflow-y: hidden !important;    
}
.ui-dialog.ui-widget.ui-widget-content.ui-corner-all.ui-front.ui-draggable {
    position: fixed !important;
    box-sizing: border-box !important;
    max-height: calc(99vh) !important;
    max-width: calc(95vw) !important;
    margin: auto !important;
    border-radius: 0 !important;
    border: none !important;
    overflow-y: scroll !important;
    overflow-x: hidden !important;
}
#JtuyoshiCrop #Principal {
    border: none !important;
    margin: 0 auto !important;
}
#JtuyoshiCrop #Painel {
    padding-bottom: 0 !important;
}
#JtuyoshiCrop .row {
    padding: 0.5em 0 !important;
    margin: 0 0.5em !important;
    width: 80% !important;
    display: table !important;
}
#JtuyoshiCrop .row > div:first-child {
    width: 0 !important;
    padding: 0 !important;
    height: 0 !important;
    visibility: hidden;
}
#JtuyoshiCrop .row > div {
    width: 50% !important;
    padding: 0 2px !important;
}
#JtuyoshiCrop .row select, #JtuyoshiCrop .row button{
    height: 30px !important;
    border-radius: 0 !important;
}
#JtuyoshiCrop .row select {
    padding: 0 !important;
}
#JtuyoshiCrop #SelecaoRecorte {
    border: none !important;
/*    background: #e06055 !important;*/
    background: #eee !important;
    opacity: 0.5 !important;
}
#JtuyoshiCrop #SelecaoRecorte .ui-resizable-handle.ui-resizable-s,
#JtuyoshiCrop #SelecaoRecorte .ui-resizable-handle.ui-resizable-e {
    /*background: #9c8 !important;*/
    background: #e00 !important;
}
#JtuyoshiCrop #SelecaoRecorte .ui-resizable-handle.ui-resizable-s {
    height: 2px !important;
    width: 100% !important;
    bottom: 0px !important;
    left: 0 !important;
}
#JtuyoshiCrop #SelecaoRecorte .ui-resizable-handle.ui-resizable-e {
    width: 2px !important;
    right: 0px !important;
    top: 0 !important;
    height: 100% !important;
}
#JtuyoshiCrop #SelecaoRecorte .ui-resizable-handle.ui-resizable-se.ui-icon.ui-icon-gripsmall-diagonal-se {
    background: #e00 !important;
    height: 20px !important;
    width: 20px !important;
    bottom: 0 !important;
    right: 0 !important;
}
.ui-dialog-titlebar.ui-widget-header.ui-corner-all.ui-helper-clearfix.ui-draggable-handle {
    padding: 0 !important;
    margin: 0 !important;
    position: absolute;
    top: 0 !important;
    right: 0 !important;
    background: #eee;
    height: 20px !important;
    width: 18% !important;
    max-width: 6em !important;
    z-index: 999999999  !important;
    border: none !important;
    border-radius: 0 !important;
}
.ui-dialog-titlebar.ui-widget-header.ui-corner-all.ui-helper-clearfix.ui-draggable-handle > span {
    display: none !important;
}
.ui-dialog-titlebar.ui-widget-header.ui-corner-all.ui-helper-clearfix.ui-draggable-handle .ui-dialog-titlebar-close {
    background: #e06055 !important;
    opacity: 1 !important;
    top: 0 !important;
    right: 0 !important;
    margin: 0 !important;
    padding: 0 !important;
    height: 20px !important;
    width: 50% !important;
    border: none !important;
    border-radius: 0 !important;
}
.picturecut_image_container.picture-element-principal {
    background-repeat: no-repeat;
    background-size: contain;
    margin-bottom: 0.25em;
}
/* END -- Picture Cut Fix */

.form-group.required label:after {
    content: " *";
    color: red;
    font-weight: normal;
}
code:empty {
    background-color: transparent;
}
code {
    color: blue;
    margin-left: 0.34em;
    background-color: #f2f2f2;
}
.help-block {
    font-size: 0.9em;
    height: 0;
    margin: 0;
    width: 100%;
    text-align: center;
    font-style: italic;
    /*font-family: Sans-serif;*/
}

/*.help-block.help-block-error {
    color: #999;
}*/
.form-group.has-error .help-block {
    color: #999;
}
.form-group.has-error .help-block:before {
    content: "";
}
.form-group.has-error .help-block:after {
    content: "";
}
.box-solid {
    margin-bottom: 0 !important;
}
/*body {
    min-height: 100% !important;
    background-color: rgb(<?= rand(150, 240) ?>, <?= rand(150, 240) ?>, <?= rand(150, 240) ?>) !important;
    background-image: url("<?= Yii::$app->params['backend_url'] ?>/images/bg/<?= rand(1, 6) ?>.jpg") !important;
    background-repeat: repeat !important;
    background-size: cover !important;
    background-attachment: fixed !important;
    background-position: center !important; 
    z-index: 800 !important;
}*/
.content-wrapper, .right-side {
    background: none !important;
}
/*.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
    background-color: #222d32;
}*/
body {
    background: #222d32 !important;
}
</style>