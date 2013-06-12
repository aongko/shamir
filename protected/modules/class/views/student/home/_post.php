<?php
echo 'Post by <b>' . $data->account->user_name . '</b> on <tt>' . $data->created_date . '</tt><br>';
echo $data->content;
?>
