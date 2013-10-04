<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

			

				<aside class="span3">

					<div class="categories">
						<div class="titleHeader clearfix">
							<h3>Категории купонов</h3>
						</div><!--end titleHeader-->
                       <?php $this->beginWidget('zii.widgets.CPortlet'); 
                        $this->widget('zii.widgets.CMenu', array( 
						'encodeLabel'=>false,
                        'items'=>$this->getMenuTree(),
                        'htmlOptions'=>array('class'=>'unstyled' ), )); $this->endWidget();
						?>
						
					</div><!--end categories-->




				


				

				</aside><!--end aside-->


			
		

	


		<?php echo $content; ?>


<?php $this->endContent(); ?>