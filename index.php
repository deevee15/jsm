<?
    //deevee_projects_jsm
include_once("bd.php");?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>just streaming music</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.2.4.js"></script>
    <script type="text/javascript" src="js/burger.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no">
</head>
<body>
    <script type="text/javascript">
        if (window.devicePixelRatio !== 1) { 	
  var dpt = window.devicePixelRatio;
  var widthM = window.screen.width * dpt;
  var widthH = window.screen.height * dpt;
  document.write('<meta name="viewport" content="width=' + widthM+ ', height=' + widthH + ',user-scalable=no">');
}
    </script>
    <div id="header">
        <div class="header_burger">
            <span class="header_burger_line l1"></span>
            <span class="header_burger_line l2"></span>
            <span class="header_burger_line l3"></span>
        </div>
        <div class="header_title">just streaming music</div>
        <div class="header_author">created by <a href="http://sitesocial.net.ru/deevee" style=" text-decoration:none;">DeeVee (Danil Vikulov)</a>, 2021</div>
    </div>
    <div id="menu">
        <ul>
            <li>add a new track</li>
            <li>report track</li>
            <li>suggest new background</li>
        </ul>
    </div>
    <div id="player">
        <div class="player_1">
            <div class="player_songer" id="songer">MORGENSHTERN</div>
            <div class="player_button">
                <div class="player_button_icon" onclick="playOrPauseSong()">
                    <svg width="251" height="251" viewBox="0 0 251 251" fill="none" xmlns="http://www.w3.org/2000/svg" class="pb_play">
    <path d="M125.5 0C194.67 0 251 56.3025 251 125.573C251 194.698 194.67 251 125.5 251C56.3296 251 0 194.698 0 125.573C0 56.3025 56.3296 0 125.5 0ZM111.206 75.6753C108.541 75.6753 105.997 76.2808 103.574 77.4916C100.545 79.1867 98.1226 81.8505 96.7901 84.9986C95.9421 87.178 94.6096 93.7164 94.6096 93.8374C93.277 100.981 92.5502 112.605 92.5502 125.439C92.5502 137.681 93.277 148.808 94.3673 156.073C94.4884 156.194 95.8209 164.306 97.2746 167.091C99.9397 172.177 105.149 175.325 110.721 175.325H111.206C114.84 175.204 122.472 172.055 122.472 171.934C135.312 166.607 160.63 150.019 170.806 139L171.533 138.274C172.865 136.942 174.561 134.884 174.925 134.399C176.863 131.857 177.832 128.709 177.832 125.573C177.832 122.049 176.742 118.78 174.682 116.116C174.198 115.632 172.381 113.574 170.685 111.878C160.751 101.223 134.828 83.7878 121.26 78.4602C119.201 77.6247 113.992 75.7964 111.206 75.6753Z"/>
    </svg>
                    <svg width="251" height="251" viewBox="0 0 251 251" fill="none" xmlns="http://www.w3.org/2000/svg" class="pb_pause">
    <path d="M125.5 0C56.3 0 0 56.3 0 125.5C0 194.7 56.3 251 125.5 251C194.7 251 251 194.7 251 125.5C251 56.3 194.7 0 125.5 0ZM106.192 164.115C106.192 166.676 105.175 169.131 103.365 170.942C101.554 172.752 99.0988 173.769 96.5385 173.769C93.9781 173.769 91.5226 172.752 89.7122 170.942C87.9017 169.131 86.8846 166.676 86.8846 164.115V86.8846C86.8846 84.3243 87.9017 81.8688 89.7122 80.0583C91.5226 78.2479 93.9781 77.2308 96.5385 77.2308C99.0988 77.2308 101.554 78.2479 103.365 80.0583C105.175 81.8688 106.192 84.3243 106.192 86.8846V164.115ZM164.115 164.115C164.115 166.676 163.098 169.131 161.288 170.942C159.477 172.752 157.022 173.769 154.462 173.769C151.901 173.769 149.446 172.752 147.635 170.942C145.825 169.131 144.808 166.676 144.808 164.115V86.8846C144.808 84.3243 145.825 81.8688 147.635 80.0583C149.446 78.2479 151.901 77.2308 154.462 77.2308C157.022 77.2308 159.477 78.2479 161.288 80.0583C163.098 81.8688 164.115 84.3243 164.115 86.8846V164.115Z"/>
    </svg>
                </div>
                <div class="player_button_song" id="song">CADILLAC</div>
            </div>
            <div class="player_line">
                <div id="line"></div>
            </div>
        </div>
    </div>
    <div id="card">
        <div class="card_list">
            <?
                    $result = mysql_query("SELECT * FROM `music` ORDER BY id ASC");
                    while($row = mysql_fetch_array($result)) {
                        $id=$row['id'];
                        $songer=$row['songer'];
                        $song=$row['song'];
                        $bg=$row['bg'];
                        $link=$row['link'];
            ?>
            <div class="card_list_card" style="background: linear-gradient(0deg, rgba(227, 32, 173, 0.3), rgba(227, 32, 173, 0.3)), url(http://ajax/examples/jsm/<?echo$bg;?>) 100% 100% no-repeat;background-size: cover;" data-tracksonger="<?echo$songer;?>" data-tracksong="<?echo$song;?>" data-trackbg="<?echo$bg;?>" data-tracklink="<?echo$link;?>">
                <div class="card_songer" id="csgr<?echo$id;?>"><?echo$songer;?></div>
                <div class="card_song" id="cs<?echo$id;?>"><?echo$song;?></div>
                <div class="card_button">
                    <svg width="63" height="63" viewBox="0 0 251 251" fill="white" xmlns="http://www.w3.org/2000/svg">
<path d="M125.5 0C194.67 0 251 56.3025 251 125.573C251 194.698 194.67 251 125.5 251C56.3296 251 0 194.698 0 125.573C0 56.3025 56.3296 0 125.5 0ZM111.206 75.6753C108.541 75.6753 105.997 76.2808 103.574 77.4916C100.545 79.1867 98.1226 81.8505 96.7901 84.9986C95.9421 87.178 94.6096 93.7164 94.6096 93.8374C93.277 100.981 92.5502 112.605 92.5502 125.439C92.5502 137.681 93.277 148.808 94.3673 156.073C94.4884 156.194 95.8209 164.306 97.2746 167.091C99.9397 172.177 105.149 175.325 110.721 175.325H111.206C114.84 175.204 122.472 172.055 122.472 171.934C135.312 166.607 160.63 150.019 170.806 139L171.533 138.274C172.865 136.942 174.561 134.884 174.925 134.399C176.863 131.857 177.832 128.709 177.832 125.573C177.832 122.049 176.742 118.78 174.682 116.116C174.198 115.632 172.381 113.574 170.685 111.878C160.751 101.223 134.828 83.7878 121.26 78.4602C119.201 77.6247 113.992 75.7964 111.206 75.6753Z"/>
</svg>
                </div>
                <span data-link="" class="card_link_container"></span>
            </div><?}?>
        </div>
    </div>
    <div id="blur"></div>
    <div id="list">
        <div class="list_stripe_1"><div class="list_stripe"></div></div>
        <div class="list_music">
            <?
                    $result = mysql_query("SELECT * FROM `music` ORDER BY id ASC");
                    while($row = mysql_fetch_array($result)) {
                        $id=$row['id'];
                        $songer=$row['songer'];
                        $song=$row['song'];
                        $bg=$row['bg'];
                        $link=$row['link'];
            ?>
            <div class="list_music_card" style="background: linear-gradient(0deg, rgba(227, 32, 173, 0.3), rgba(227, 32, 173, 0.3)), url(http://ajax/examples/jsm/<?echo$bg;?>) 100% 100% no-repeat; background-size: cover;">
                <div class="list_music_card_songer"><?echo$songer;?></div>
                <div class="list_music_card_song"><?echo$song;?></div>
                <div class="list_music_card_time">2:39</div>
            </div><?}?>
        </div>
    </div>
    <div class="slide_left"> &#60;	 </div>
    <div class="slide_right">  &#62;	</div>
    <?
        $query=mysql_query("SELECT COUNT(id) FROM music");
        $result = mysql_fetch_row($query)[0];
    ?>
    <span data-count="<?echo$result;?>" class="getdata"></span>
    <span data-finallink="" id="get_flink"></span>
</body>
<script type="text/javascript">
        var getlink, songs;
        setInterval( function() { 
            getlink=$('#get_flink').attr("data-finallink"); 
            if(getlink!=''){ songs = getlink;}
            else{ songs = ["c1.mp3","c2.mp3","c3.mp3"];}
            //$('#get_flink').html(songs);
        } , 100);
        //var getlink=$('#get_flink').attr("data-finallink");
        //var poster = ["Poster1.jpg","Poster2.jpg","Poster3.jpg"];
        
        var songTitle = document.getElementById("songer");
        var fillBar = document.getElementById("line");
    
        
        var song = new Audio();
        var currentSong = 0;    
        
        window.onload = playSong;   
        
        function playSong(){
            song.muted=true;
            song.play();    
            song.muted=false;
            if(getlink!=''){song.src=songs;}
            else{song.src = songs[currentSong];}
            
            //songTitle.textContent = songs[currentSong]; 
            
            song.play();    
        }
        function playOrPauseSong(){
            
            if(song.paused){
                song.play();
                //$("#play img").attr("src","Pause.png");
            }
            else{
                song.pause();
                //$("#play img").attr("src","Play.png");
            }
        }
        
        song.addEventListener('timeupdate',function(){ 
            
            var position = song.currentTime / song.duration;
            
            fillBar.style.width = position * 100 +'%';
        });
</script>
<script type="text/javascript">
    var getwidth = $(window).width();
    if(getwidth>1250){$('#menu').hide();}
    var showed=true;
        $('.header_burger').click(function(){
            if(getwidth<=1250){
                $('.header_title').toggleClass('menu');
                $('body').toggleClass('slided');
                $('#blur').toggleClass('showed');
            }
            else{
                $('.header_burger_line').toggleClass('active');
                $('.header_title').toggleClass('menu');
                if(showed){
                $('#menu').show(200);
                showed=false;}
                else{
                    $('#menu').hide(200);
                    showed=true;
                }
            }
        });
</script>