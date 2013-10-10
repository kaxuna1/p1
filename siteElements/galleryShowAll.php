
<?
function galleryShowAll($username,$dbc)
{
    $query="SELECT * FROM  `photo_$username` ORDER BY  `id` DESC";
    $result=mysqli_query($dbc,$query);
    $count=0;
    while($row=mysqli_fetch_array($result)){
    $content=$row['image'];
    $count++;
    ?>
    
    <a href="gallery.php?user=<? echo $username;?>&&image=<?echo $row['id'];?>">
    <img height="30%" width="15%"  src="data:image/jpeg;base64,<?echo base64_encode($content);?>" class="img-polaroid" />
    </a>
    <?
    if ($count==6){
        echo "<br/>";
        $count=0;
    }
}
    
}


?>