<?php

!empty($type) or $type = 'auto';
!empty($class) or $class = '';
?>
<div class="txt-center">
<?php if ($type == 'square') { ?>
<ins class="adsbygoogle hdc-csi_square <?= $class ?>" data-ad-client="ca-pub-3084353470359421" data-ad-slot="3977062995"></ins>
<?php } else if ($type == 'square_mobile') { ?>
<ins class="adsbygoogle hdc-csi_square <?= $class ?>" data-ad-client="ca-pub-3084353470359421" data-ad-slot="3977062995"></ins>
<?php } else if ($type == 'square_desktop') { ?>
<ins class="adsbygoogle hdc-csi_square <?= $class ?>" data-ad-client="ca-pub-3084353470359421" data-ad-slot="3977062995"></ins>
<?php } else if ($type == 'auto') { ?>
<ins class="adsbygoogle _dsp_block <?= $class ?>" data-ad-client="ca-pub-3084353470359421" data-ad-slot="5878072997" data-ad-format="auto"></ins>
<?php } else if ($type == 'overlay') { ?>
<div class ="hdc-csi_overlay">
<ins class="adsbygoogle hdc-csi_overlay _dsp_block <?= $class ?>" data-ad-client="ca-pub-3084353470359421" data-ad-slot="5878072997" ></ins>
</div>
<?php } ?>
<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
</div>
<?php
$this->registerCss('
/*adsense*/
@media(max-width:499px){.hdc-csi_square_mobile{width:320px;height:50px}.hdc-csi_square_desktop{display:none}.hdc-csi_overlay{width:320px;height:50px;color:#FFF;width:100%;bottom:0;position:fixed;z-index:100;opacity:1}}
@media(min-width:500px){.hdc-csi_square_mobile{display:none}.hdc-csi_square_desktop{width:320px;height:50px}.hdc-csi_overlay{display:none}}
.hdc-csi_square{display:inline-block;width:300px;height:250px;max-width:calc(100%)}    
._dsp_block{display:block}
');