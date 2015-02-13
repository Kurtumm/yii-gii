<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
		//'enctype' => 'multipart/form-data',
	),
)); ?>\n"; ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo "<?php echo \$form->errorSummary(\$model, '', '', array('class'=>'alert alert-danger')); ?>\n"; ?>

<?php
	foreach($this->tableSchema->columns as $column)
	{
		if($column->autoIncrement || $column->name == 'updateDateTime' || $column->name == 'createDateTime')
			continue;
?>
	<div class="form-group">
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column, 'col-sm-2 control-label')."; ?>\n"; ?>
		<div class="col-sm-10">
<?php if (stripos($column->name, 'image') !== false):?>
			<?php echo "<?php if(\$this->action->id=='update') echo CHtml::image(Yii::app()->baseUrl.\$model->{$column->name}, '', array('style'=>'width:150px;'));?>\n";?>
<?php elseif (stripos($column->name, 'file') !== false):?>
			<?php echo "<?php if(\$this->action->id=='update') echo CHtml::link('Show File', Yii::app()->baseUrl.\$model->{$column->name});?>\n";?>
<?php endif;?>
<?php if(stripos($column->dbType,'text')===false):?>
			<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column, 'form-control')."; ?>\n"; ?>
<?php else:?>
			<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column, 'form-control')."; ?>\n"; ?>
<?php endif;?>
			<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
		</div>
	</div>
<?php
}
?>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-9">
			<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>\n"; ?>
		</div>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->