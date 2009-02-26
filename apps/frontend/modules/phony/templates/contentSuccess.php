<?
try { include_partial('global/content/'.$path); }
catch (Exception $e) { 
  try { include_partial('global/content/'.$path.'/index'); }
  catch (Exception $e) { 
    include_partial('global/content/404');
  }
}
