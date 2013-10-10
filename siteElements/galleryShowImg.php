<?
function galleryShowImg($username,$imgId,$dbc)
{
    $query2="SELECT * FROM  `photo_$username` where id=$imgId";
    $result2=mysqli_query($dbc,$query2);
    $image=mysqli_fetch_array($result2);
    $content2=$image['image'];
    $query3="SELECT id FROM  `photo_$username`";
    $result4=mysqli_query($dbc,$query3);
        $sizeOfGallery=(int)mysqli_num_rows($result4);
        $previousId=(int)$imgId-1;
        $nextid=(int)$imgId+1;
        if($nextid>$sizeOfGallery){
            $nextid=1;
            $previousId=$sizeOfGallery;
        }
        ?>
        <div class="wrapper"><a href="gallery.php?user=<? echo $username;?>"><h2>beck to gallery</h2></a></div>
        <div class="wrapper" >
        <a href="gallery.php?user=<? echo $username;?>&&image=<?  echo $previousId;?>"><button><-previous</button></a>
        <a href="gallery.php?user=<? echo $username;?>&&image=<?  echo $nextid;?>"><button >next -></button></a>
        </div>
        <div class="wrapper"><a href="gallery.php?user=<? echo $username;?>&&image=<?  echo $nextid;?>"><img src="data:image/jpeg;base64,<?echo base64_encode($content2);?>" /></a>
        </div>
        <?
}


?>