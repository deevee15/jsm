<?
    include_once("bd.php");
    $songer=$_POST['songer'];
    $song=$_POST['song'];
    $bg=$_POST['bg'];
    $link=$_POST['link'];
    //$query = mysql_query("INSERT INTO music (songer, song, bg, link) VALUES('$songer', '$song','$bg','$link')");
    $query = "INSERT INTO music (songer, song, bg, link) VALUES ('$songer', '$song', '$bg', '$link')";
    $result = mysql_query($query) or die(mysql_error());;
    echo "<meta http-equiv='Refresh' content='0; URL=index.php'>";
?>