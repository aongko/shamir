<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
<br>
Back to <?php echo CHtml::link('Previous page', Yii::app()->request->urlReferrer)?>, or go back to <?php echo CHtml::link('Home', CHtml::normalizeUrl(array('/site/index')))?>.
</div>
