<?php

class userActions extends sfActions
{
  public function executeIndex($request) { }
  public function executeLogin($request)
  {
    if ($request->isMethod('post')) {
      $login = $this->getRequestParameter('login');
      $pass = $this->getRequestparameter('password');
      if ($login && $pass && $this->getUser()->authenticate($login,$pass))
        return $this->redirect($request->getParameter('referer','@homepage'));
    }
  }
  public function executeLogout($request)
  {
    $sf_user = $this->getUser();
    $sf_user->signOut();
    return $this->redirect('@homepage');
  }
}
