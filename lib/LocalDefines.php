<?php

class LocalDefines
{
  const ACCESS_BACK_ADMIN=1;
  const ACCESS_BACK_USER=2;
  const ACCESS_FRONT_ADMIN=11;
  const ACCESS_FRONT_USER=12;
  public static function getAccess($q=null)
  {
    return self::do_value_get($q, array(
      self::ACCESS_BACK_ADMIN=>"Backend Admin",
      self::ACCESS_BACK_USER=>"Backend User",
      self::ACCESS_FRONT_ADMIN=>"Frontend Admin",
      self::ACCESS_FRONT_USER=>"Frontend User",
    ));
  }

  private static function do_value_get($q,$vals)
  {
    if (is_null($q)) return $vals;
    if (is_array($q)) return array_merge($vals, $q);
    if (isset($vals[$q])) return $vals[$q];
    return false;
  }
}
