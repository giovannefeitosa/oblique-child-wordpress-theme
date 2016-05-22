<?php

$contentheader_timeago = human_time_diff(get_post_time( 'U' ));

?>
<div class="content-timeago-header">
    <?= $contentheader_timeago; ?>
</div>
