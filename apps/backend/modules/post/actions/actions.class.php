<?php

/**
 * post actions.
 *
 * @package    catalotag
 * @subpackage post
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class postActions extends autopostActions
{
  protected function savePost($post)
  {
    parent::savePost($post);
    $tag_string = $this->getRequestParameter('tags');
    foreach(explode(',',$tag_string) as $tag_name) {
      $tag = $post->addTag( TagPeer::getOrCreate($tag_name) );
    }
  }
}
