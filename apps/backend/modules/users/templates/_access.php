<?=select_tag('user[access]',options_for_select(LocalDefines::getAccess(),$user->getAccess()))?>
