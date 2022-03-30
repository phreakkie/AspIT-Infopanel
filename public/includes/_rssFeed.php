<?php
include "./includes/_connect.php";

$invalidurl = false;
$numOfFeeds = 5;
// $url = "https://www.dr.dk/nyheder/service/feeds/regionale/nord";
$url = "https://www.computerworld.dk//rss/tag/teknologi";
if(@simplexml_load_file($url)){
    $feeds = simplexml_load_file($url);
}else{
    $invalidurl = true;
    echo "<h2 class='text-center text-2xl'>Invalid RSS feed URL</h2>";
}

$i = 0;
if(!empty($feeds)){
    $site = $feeds->channel->title;
    $sitelink = $feeds->channel->link;

    // echo "<h1>".$site."</h1>";

    foreach($feeds->channel->item as $item){
        $title = $item->title;
        $link = $item->link;
        $desc = $item->description;
        $postDate = $item->pubDate;
        $pubDate = date("D, d M Y", strtotime($postDate));

        if($i >= $numOfFeeds){
            break;
        }
        ?>
            <div class="glide__slide">
            <h2 class="text-4xl mx-16 h-52"><?=$title?></h2>
            <p class="text-xl mx-16 text-center"><?=$pubDate?></p>
            </div>

        <?php
        $i++;
    }
}else{
    if(!$invalidurl){
        echo "<h2>Ingen nyheder fundet</h2>";
    }
}
?>
