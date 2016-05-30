<?php
echo $this->render('//modules/slideshow', [
    'data' => $slideshow,
    'options' => [
        'time_slide' => 600,
        'time_out' => 3000,
        'auto_run' => true,
        'pause_on_hover' => true
    ]
]);
?>