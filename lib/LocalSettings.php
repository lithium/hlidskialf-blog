<?php

class LocalSettings
{

  public static function capitalize($str)
  {
    return trim(ucwords(strtolower($str)));
  }


  static function sendFile($response,$data,$content_type,$filename)
  {
    $response->setContentType($content_type);
    $response->addHttpMeta('content-disposition: ', "attachment; filename=\"{$filename}\"", true);
    $response->setHttpHeader('Pragma','');
    $response->setHttpHeader('Cache-Control','');
    $response->setContent($data);
    return sfView::NONE;
  }

}
