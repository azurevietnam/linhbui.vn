
<?php
if (!$this->context->is_mobile || $this->context->is_tablet) {
$this->registerCss('
    .form-search,#___gcse_0{max-width:280px}
    .gsc-input-box,.gsc-search-box,.gsc-control-cse,#___gcse_0,.form-search{border-radius:12px;}
    .gsc-search-box-tools .gsc-search-box .gsc-input{border-radius:12px}   
');
}
$this->registerCss('
.gsib_a{padding:0px!important}
.gsib_b{display:none}
.search.relative.clearfix{/*margin-top:0px*/;z-index:100}
.gsc-input-box{border:none!important;height:26px!important}
.gsc-search-box-tools .gsc-search-box .gsc-input{font-size:1.1em;/*background:none!important;*/padding:1px!important;height:26px!important}   
.cse .gsc-control-cse,.gsc-control-cse{padding:0!important}
form.gsc-search-box,table.gsc-search-box{margin-bottom:0}
.gsc-search-button,.gsc-search-button-v2{display:none}
.form-search,#___gcse_0{color:#999;width:calc(100vw);float:right}
.gsc-control-cse{border:1px solid #eee !important;height:30px;}
/*Search Result*/
.gsc-selected-option-container{min-width:100px;width:100px!important}
.gsc-orderby-container{display:none}
.gsc-results-wrapper-overlay{padding:0!important;height:96%!important;width:96%!important;top:2%!important;left:2%!important}
');
?>