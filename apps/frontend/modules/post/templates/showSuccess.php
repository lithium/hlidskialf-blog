
<h1 class="post-title"><?=$post->getTitle()?></h1>
<div class="post-byline">
  <span class="post-date"><?=$post->getPostedAt()?></span>
  <span class="post-author"><?=$post->getByline()?></span>
</div>
<div class="post-tags"><?=$post->GetTagHrefString()?></div>
<div class="post-holder">
<div class="post-body"><?=$post->getBody()?></div>
</div>

