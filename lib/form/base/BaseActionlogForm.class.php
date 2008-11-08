<?php

/**
 * Actionlog form base class.
 *
 * @package    form
 * @subpackage actionlog
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseActionlogForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'who'   => new sfWidgetFormInput(),
      'what'  => new sfWidgetFormInput(),
      'where' => new sfWidgetFormInput(),
      'why'   => new sfWidgetFormInput(),
      'when'  => new sfWidgetFormDateTime(),
      'from'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorPropelChoice(array('model' => 'Actionlog', 'column' => 'id', 'required' => false)),
      'who'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'what'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'where' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'why'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'when'  => new sfValidatorDateTime(array('required' => false)),
      'from'  => new sfValidatorString(array('max_length' => 32, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('actionlog[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Actionlog';
  }


}
