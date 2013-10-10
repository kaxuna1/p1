<?
function avatarUpForm(){
    ?>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
    <form enctype="multipart/form-data"  method="post" action="upAvatar.php">
    <input class="filestyle" accept="image/jpeg" type="file" name="imgfile" required="true" data-buttonText="browse" />
    <button type="submit" class="btn-primary">upload</button>
    </form>
    <?
}

?>