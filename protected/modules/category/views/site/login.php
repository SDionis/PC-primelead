<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
	<div class="container">

			<div class="row">

				<div class="span4">
					
				</div><!--end span4-->


				<div class="span5">
					<div class="titleHeader clearfix">
						<h3>Авторизация пользователя</h3>
					</div><!--end titleHeader-->

					
        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
						<div class="controls">					
		<?php echo $form->labelEx($model,'username'); ?> 
		<?php echo $form->textField($model,'username', array('placeholder'=>'username','class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'username'); ?>
                        
                        </div>
						<div class="controls">
									<?php echo $form->labelEx($model,'password'); ?>
                                    <?php echo $form->passwordField($model,'password', array('placeholder'=>'**************','class'=>'input-block-level')); ?>
		                              <?php echo $form->error($model,'password'); ?>
                            
                            <small><a href="#forget-pass" role="button" data-toggle="modal">Have you forget your password?</a></small>
						</div>

						<div class="controls">
								<?php $a= $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,"$a".' rememberMe', array('class'=>'checkbox')); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
                            <?php echo CHtml::submitButton('Авторизироваться',array('class'=>'btn btn-primary')); ?>
						</div>
					</form><!--end form-->
				</div><!--end span5-->

				<div id="forget-pass" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
					<div class="modal-body">
						<form method="post" action="page" class="form-inline">
							<input type="text" name="" class="span4" placeholder="Put your E-Mail...">

							<button type="submit" class="btn btn-primary">Recieve My PAssword</button>

							<button type="button" class="btn btn-small" data-dismiss="modal" aria-hidden="true">Cancel</button>
					<?php $this->endWidget(); ?>
					</div><!--end modal-body-->
				</div><!--end modal-->


				<div class="span3">
				
				</div><!--end span3-->

			</div><!--end row-->

		</div><!--end conatiner-->