<h2>Posts with <?=$tag->getName()?></h2>
<div class="post-index">
<div class="post-holder">
<ul>
<?foreach($tag->getPosts() as $post):?>
<li><?=$post->getHref()?>
  <div class="post-byline">
    <span class="post-date"><?=$post->getPostedAt()?></span>
    <span class="post-author"><?=$post->getByline()?></span>
  </div>
</li>
<?endforeach?>
</ul>
</div>
</div>
