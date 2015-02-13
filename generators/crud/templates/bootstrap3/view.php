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
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'Update <?php echo $this->modelClass; ?>', 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Delete <?php echo $this->modelClass; ?>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>

<?php
/*
<div class="row">
	<div class="col-sm-9 col-md-9 col-lg-9">
		<h1>View <?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>
	</div>
	<div class="col-sm-3 col-md-3 col-lg-3">
		<div class="pull-right">
			<?php echo "<?php echo CHtml::link('<i class=\"icon-plus-sign\"></i> Create', \$this->createUrl('create'), array('class'=>'btn btn-sm btn-primary'));?>\n";?>
		</div>
	</div>
</div>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped table-hover'),
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
*/
?>

<div class="panel panel-default">
	<div class="panel-heading">
		View <?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?>
		<div class="pull-right">
			<?php echo "<?php echo CHtml::link('<i class=\"icon-plus-sign\"></i> Create', \$this->createUrl('create'), array('class'=>'btn btn-xs btn-primary'));?>\n";?>
		</div>
	</div>
	<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'htmlOptions'=>array('class'=>'table table-bordered table-striped table-hover'),
		'attributes'=>array(
	<?php
	foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
	?>
		),
	)); ?>
</div>
