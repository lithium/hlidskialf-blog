<?php

class tagActions extends sfActions
{
  public function executeIndex($request)
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(TagPeer::NAME);
    $this->tags = TagPeer::doSelect($c);
  }

  public function executeShow($request)
  {
    $this->tag = TagPeer::retrieveByName($request->getParameter('tag'));
    $this->forward404Unless($this->tag);

  }
}
