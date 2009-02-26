
<div class="post-index">
<?foreach($pager->getResults() as $post):?>
<div class="post-holder">
  <div class="post-title"><?=link_to($post->getTitle(),$post->getUrl())?></div>
  <div class="post-byline">
    <span class="post-date"><?=$post->getPostedAt()?></span>
    <span class="post-author"><?=$post->getByline()?></span>
  </div>
  <div class="post-tags"><?=$post->GetTagHrefString()?></div>
  <div class="post-body"><?=$post->getShortBody()?></div>
</div>


<?endforeach?>
</div>
