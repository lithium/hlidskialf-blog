<?php

/**
 * Subclass for representing a row from the 'user' table.
 *
 * 
 *
 * @package lib.model
 */ 
class User extends BaseUser
{
  public function __toString() { return $this->getAuthInfo(); }
  public function getAuthInfo() { 
    $rn = $this->getRealName();
    return sprintf("%s&lt;%s> (%s)",$rn ? $rn.' ' : '',$this->getUsername(),$this->getAccessName());
  }
  public function getAccessName() { return LocalDefines::getAccess($this->getAccess()); }
}
