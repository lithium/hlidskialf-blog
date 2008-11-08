<?php

/**
 * Tag form base class.
 *
 * @package    form
 * @subpackage tag
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseTagForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'created_at'  => new sfWidgetFormDateTime(),
      'name'        => new sfWidgetFormInput(),
      'description' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Tag', 'column' => 'id', 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'description' => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tag', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tag';
  }


}
