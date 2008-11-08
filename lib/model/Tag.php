<?php

/**
 * Subclass for representing a row from the 'tag' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Tag extends BaseTag
{
  public function getPosts()
  {
    $c = new Criteria();
    $c->add(PostTagPeer::TAG_ID, $this->getId());
    $c->addJoin(PostTagPeer::POST_ID, PostPeer::ID);
    return PostPeer::doSelect($c);
  }
}
