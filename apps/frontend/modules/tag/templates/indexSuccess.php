
<?foreach($tags as $tag):?>
<a href="/tag/<?=strtolower($tag->getName())?>"><?=$tag->getName()?></a><br/>
<?endforeach?>
