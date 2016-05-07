<aside class="col-r">
<?php

//(Yii::$app->getRequest()->getQueryParam('slug'));

 echo $this->render('//widget/index', ['route' => Yii::$app->requestedRoute]);

?>
</aside>
