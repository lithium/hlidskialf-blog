<?php

/**
 * User form base class.
 *
 * @package    form
 * @subpackage user
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'username'   => new sfWidgetFormInput(),
      'password'   => new sfWidgetFormInput(),
      'real_name'  => new sfWidgetFormInput(),
      'email'      => new sfWidgetFormInput(),
      'enabled'    => new sfWidgetFormInputCheckbox(),
      'access'     => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id', 'required' => false)),
      'username'   => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'password'   => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'real_name'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'enabled'    => new sfValidatorBoolean(array('required' => false)),
      'access'     => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'User', 'column' => array('username')))
    );

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }


}
