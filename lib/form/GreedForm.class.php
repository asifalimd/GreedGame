<?php 

class GreedForm extends BaseForm
{
	public function configure()
	{
		$this->setWidgets(array(
				'throws'    => new sfWidgetFormInputText(),
		));
		
		$this->setValidator('throws', new sfValidatorNumber() );
		
		$this->widgetSchema['throws']->setLabel('Enter Dice to throw');		
		$this->widgetSchema->setNameFormat('greed[%s]');
	}
	
}