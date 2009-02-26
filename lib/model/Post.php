<?php

/**
 * Subclass for representing a row from the 'post' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Post extends BasePost
{
  public function getPostedAt($fmt='M d Y') { return parent::getPostedAt($fmt); }
  public function getUrl() { return '/rant/'.$this->getSlug(); }
  public function getHref() { return sprintf('<a href="%s">%s</a>',$this->getUrl(),$this->getTitle()); }

  public function addTag($tag)
  {
    try {
    $pt = new PostTag();
    $pt->setPostId($this->getId());
    $pt->setTagId($tag->getId());
    $pt->save();
    } catch (PropelException $pe) { return false; }
    return true;
  }

  public function getTags()
  {
    $c = new Criteria();
    $c->add(PostTagPeer::POST_ID, $this->getId());
    $c->addJoin(PostTagPeer::TAG_ID, TagPeer::ID);
    return TagPeer::doSelect($c);
  }

  public function getTagString()
  {
    $t = array();
    foreach ($this->getTags() as $tag) $t[] = $tag->getName();
    return join(', ', $t);
  }
  public function getTagHrefString()
  {
    $t = array();
    foreach ($this->getTags() as $tag) {
      $n = $tag->getName();
      $t[] = sprintf('<a href="/tag/%s">%s</a>',strtolower($n),$n);
    }
    return join(', ', $t);
  }

  public function getShortBody($max=-1,$cut_str='<!--cut-->')
  {
    $body = $this->getBody();
    if ($max < 1) {
      $idx = strpos($body,$cut_str);
      if ($idx !== FALSE) return substr($body,0,$cut_str);
      $max = 128;
    }
    return preg_replace('/ \w*$/','', substr($body,0,$max)).(strlen($body) > $max ? '...' : '');
  }

  public function setSlug($slug)
  {
    if(!$slug) $slug = $this->getTitle();
    $slug = preg_replace('/[^a-zA-Z0-9 ]/','',$slug);
    $slug = preg_replace('/\s+/','-',$slug);
    return parent::setSlug(strtolower($slug));
  }
}
