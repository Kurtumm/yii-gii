<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->menu=array(
array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('#search-form').submit(function(){
$('#<?php echo $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<div class="panel panel-default">
	<div class="panel-heading">
		Manage <?php echo $this->pluralize($this->class2name($this->modelClass))."\n"; ?>
		<div class="pull-right">
			<?php echo "<?php echo CHtml::link('<i class=\"icon-plus-sign\"></i> Create', \$this->createUrl('create'), array('class'=>'btn btn-xs btn-primary'));?>\n"; ?>
		</div>
	</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-12">
				<?php echo "<?php \$this->renderPartial('_search',array(
					'model'=>\$model,
				)); ?>\n"; ?>
			</div>
		</div>
	</div>

		<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'itemsCssClass'=>'table table-striped table-bordered table-hover',
			'columns'=>array(
				array('class'=>'IndexColumn'),
<?php
	$count = 0;
	foreach($this->tableSchema->columns as $column)
	{
	if(++$count == 7)
		echo "\t\t\t\t/*\n";
		echo "\t\t\t\t'" . $column->name . "',\n";
	}
	if($count >= 7)
		echo "\t\t\t\t*/\n";
?>
				array(
					'class'=>'CButtonColumn',
				),
			),
		)); ?>

	</div>


