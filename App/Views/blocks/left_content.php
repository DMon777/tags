<div id="wrapper">
<div id="left_content">
	
<nav>
	<ul>
		<li> <a href="http://<?=SITE_NAME;?>/index"> Главная </a> </li>
		<li> <a href="http://<?=SITE_NAME;?>/articles"> Статьи </a> </li>
		<li> <a href="http://<?=SITE_NAME;?>/registration"> Регистрация </a> </li>

	</ul>

</nav>

	<div id="tags">

		<?foreach($all_tags as $key => $val):?>
		<a href="http://<?=SITE_NAME;?>/tags/title/<?=$val['href']?>"> <?=$val['title']?></a>&nbsp;


		<?endforeach;?>


		</div>

</div> <!-- end div left_contnet -->