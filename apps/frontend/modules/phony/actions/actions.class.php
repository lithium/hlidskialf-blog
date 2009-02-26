<?php

class phonyActions extends sfActions
{
  public function executeContent($request)
  {
    $url = parse_url($request->getUri());
    $this->path = $request->hasParameter('page') ? $request->getParameter('page') : $url['path'];
  }
}
