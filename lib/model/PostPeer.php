<?php

/**
 * Subclass for performing query and update operations on the 'post' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PostPeer extends BasePostPeer
{
  public static function retrieveBySlug($slug)
  {
    $c = new Criteria();
    $c->add(PostPeer::SLUG, $slug);
    return PostPeer::doSelectOne($c);
  }
}
