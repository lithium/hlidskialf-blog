<?php

class postActions extends sfActions
{
  public function executeIndex($request)
  {
    $c = new Criteria();
    $c->addDescendingOrderByColumn(PostPeer::POSTED_AT);
    $c->add(PostPeer::POSTED_AT, null, Criteria::ISNOTNULL);
    $this->pager = new sfPropelPager('Post',4);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page',1));
    $this->pager->init();
  }

  public function executeShow($request)
  {
    $this->post = PostPeer::retrieveBySlug($this->getRequestParameter('slug'));
    $this->forward404Unless($this->post);
    $title = sfConfig::get('sf_app_title','sitename');
    $this->getResponse()->setTitle($this->post->getTitle().' | '.$title);
  }

  public function executeView($request)
  {
    $this->setTemplate('show');
    return $this->executeShow();
  }

}
