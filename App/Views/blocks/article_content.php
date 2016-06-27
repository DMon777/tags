<div id="main_content">


    <? if($article): ?>

            <h3> <?=$article['title']?> </h3>
            <p> <?=$article['full_article']?> </p>

        <?foreach($tags as $key => $val):?>

            <a href = "http://<?=SITE_NAME;?>/tags/title/<?=$val['href']?>"><?=$val['title'];?></a>


            <?endforeach;?>

    <? else: ?>

        <p>Такой статьи нет!!!</p>

    <? endif; ?>



</div> <!-- end div main_contnet -->
<div class="clear"></div>
</div><!-- end div wrapper -->