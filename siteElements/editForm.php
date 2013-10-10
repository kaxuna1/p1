<?

function editForm(){
    ?><div id="mydiv">
    <form class="well" enctype="multipart/form-data" method="post" action="./functions/edit_finish.php"><br />
    edit password:<input type="password" name="password" /><br /><br />
    edit email:<input type="email" name="email" /><br /><br />
    edit your profile picuture!!!<br /><br />
    <input type="file" accept="image/jpeg" name="avatar" /><br />
    <input type="submit" value="edit" />
    </form></div>
    <?
}

?>