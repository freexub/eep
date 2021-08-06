<?php

/* @var $this yii\web\View */

$this->title = $pdf;
$this->params['breadcrumbs'][] = $this->title;
?>
<p style="text-align:center">
    <iframe width="60%" height="660" src="/web/certificates/<?= $pdf ?>#view=fit"></iframe>
</p>