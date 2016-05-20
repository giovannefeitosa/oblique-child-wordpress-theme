<?php

$contentheader_timeago = human_time_diff(strtotime(explode(' ', $post->post_date)[0]));

// <article class="hentry hentry-header" style="width:350px;height:259px;margin-bottom:30px;">
?>
<div class="content-timeago-header">
    <?= $contentheader_timeago; ?>
</div>
