<?php

/* @var $this yii\web\View */

$this->title = $id . '.pdf';
$this->params['breadcrumbs'][] = $this->title;
?>
<p style="text-align:center">
    <iframe width="60%" height="660" src="/web/certificates/<?= $this->title ?>#view=fit"></iframe>
</p>