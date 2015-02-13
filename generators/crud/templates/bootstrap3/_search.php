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

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
'action'=>Yii::app()->createUrl(\$this->route),
'method'=>'get',
'id'=>'search-form',
)); ?>\n"; ?>
	<div class="input-group">
		<span class="input-group-btn">
            <button class="btn btn-default" type="submit">Search</button>
		</span>
		<?php echo "<?php echo \$form->textField(\$model,'searchText', array('class'=>'form-control')); ?>\n"; ?>
	</div>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
