<?php

/**
 * Subclass for performing query and update operations on the 'tag' table.
 *
 * 
 *
 * @package lib.model
 */ 
class TagPeer extends BaseTagPeer
{
  public function retrieveByName($name)
  {
    $c = new Criteria();
    $c->add(TagPeer::NAME, LocalSettings::capitalize($name));
    return TagPeer::doSelectOne($c);
  }
  public function getOrCreate($name)
  {
    $c = new Criteria();
    $name = LocalSettings::capitalize($name);
    $c->add(TagPeer::NAME, $name);
    $ret = TagPeer::doSelectOne($c);
    if (!$ret) {
      $ret = new Tag();
      $ret->setName($name);
      $ret->save();
    }
    return $ret;
  }
}
