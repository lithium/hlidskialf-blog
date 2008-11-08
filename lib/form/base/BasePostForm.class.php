<?php

/**
 * Post form base class.
 *
 * @package    form
 * @subpackage post
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BasePostForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'created_at' => new sfWidgetFormDateTime(),
      'slug'       => new sfWidgetFormInput(),
      'title'      => new sfWidgetFormInput(),
      'byline'     => new sfWidgetFormInput(),
      'posted_at'  => new sfWidgetFormDateTime(),
      'body'       => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Post', 'column' => 'id', 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'byline'     => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'posted_at'  => new sfValidatorDateTime(array('required' => false)),
      'body'       => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Post', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Post';
  }


}
