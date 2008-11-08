<?php

/**
 * PostTag form base class.
 *
 * @package    form
 * @subpackage post_tag
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BasePostTagForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'post_id' => new sfWidgetFormPropelSelect(array('model' => 'Post', 'add_empty' => true)),
      'tag_id'  => new sfWidgetFormPropelSelect(array('model' => 'Tag', 'add_empty' => true)),
      'id'      => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'post_id' => new sfValidatorPropelChoice(array('model' => 'Post', 'column' => 'id', 'required' => false)),
      'tag_id'  => new sfValidatorPropelChoice(array('model' => 'Tag', 'column' => 'id', 'required' => false)),
      'id'      => new sfValidatorPropelChoice(array('model' => 'PostTag', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'PostTag', 'column' => array('post_id', 'tag_id')))
    );

    $this->widgetSchema->setNameFormat('post_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PostTag';
  }


}
