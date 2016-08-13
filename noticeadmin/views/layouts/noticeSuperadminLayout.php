<?php /* @var $this Controller */ ?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
	<div class="span3">
			
	<?php
	
	$this->widget('bootstrap.widgets.TbMenu', array(
            'type'=>'list',
             'items'=>$this->getSteps()));
       
?>
	</div>
	<div id="content" class="well span9">
		
		<?php echo $content; ?>
		
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>