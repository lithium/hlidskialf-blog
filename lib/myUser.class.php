<?php

class myUser extends sfBasicSecurityUser 
{     
  public function authenticate($username,$password)
  { 
    $c = new Criteria();

    $c->add(UserPeer::USERNAME, strtolower($username));
    $c->add(UserPeer::PASSWORD, $password);
    $c->add(UserPeer::ENABLED, true);
    $user = UserPeer::doSelectOne($c);
    if (!$user) return FALSE;     
    $this->signIn($user);
    return TRUE;  
  } 

  public function signIn($user)
  {
    $this->setAttribute('user_id',$user->getId(),'myUser');
    $this->setAuthenticated(true);
    switch($user->getAccess()) {
      case LocalDefines::ACCESS_BACK_ADMIN:
        $this->addCredential('BackAdmin');
        //fallthrough
      case LocalDefines::ACCESS_BACK_USER:
        $this->addCredential('BackUser');
        break;

      case LocalDefines::ACCESS_FRONT_ADMIN:
        $this->addCredential('FrontAdmin');
        //fallthrough
      case LocalDefines::ACCESS_FRONT_USER:
        $this->addCredential('FrontUser');
        break;
    }
  } 

  public function signOut()
  {
    $this->getAttributeHolder()->removeNamespace('myUser');
    $this->setAuthenticated(false);
    $this->clearCredentials();
  } 

  public function getUserId() { return $this->getAttribute('user_id','','myUser'); }
  public function getUser() { return UserPeer::retrieveByPk($this->getUserId()); }
}
