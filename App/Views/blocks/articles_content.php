<div id="main_content">
	<h2>Статьи</h2>

	<? if($articles): ?>

		<? foreach ($articles as $key => $value) :?>

			<h3> <?=$value['title']?> </h3>


			<? for($i = 0;$i < count($value['tags']);$i++): ?>

				<?if($i + 1 < count($value['tags'])):?>
					<a href="http://<?=SITE_NAME;?>/tags/title/<?=$value['tags'][$i]['href'];?>"> <?=$value['tags'][$i]['title']?> </a>,

					<?else: ?>

					<a href="http://<?=SITE_NAME;?>/tags/title/<?=$value['tags'][$i]['href'];?>"> <?=$value['tags'][$i]['title']?> </a>
				<?endif;?>

			<?endfor;?>

			<p> <?=$value['small_article']?> </p>
			<a href="http://<?=SITE_NAME;?>/article/id/<?=$value['id']?>">  Читать далее ...  </a>

		<? endforeach; ?>

	<? else: ?>

		<p> Статей нет!!! </p>

	<? endif; ?>


	<?if($navigation):?>

		<div id="navigation">


			<? if($navigation['first']):?>
				<a href="http://<?=SITE_NAME;?>/<?=$href;?>/page/<?=$navigation['first'];?>">первая</a>
			<?endif;?>
			<? if($navigation['arrow_back']):?>
				<a href="http://<?=SITE_NAME;?>/<?=$href;?>/page/<?=$navigation['arrow_back'];?>"> <<< </a>
			<?endif;?>
			<? if($navigation['previous']):?>
				<? foreach($navigation['previous'] as $val):?>

					<a href="http://<?=SITE_NAME;?>/<?=$href;?>/page/<?=$val;?>"><?=$val;?></a>
				<? endforeach;?>
			<? endif;?>
			<? if($navigation['current']):?>
				<a href="#" class="current_link"><?=$navigation['current']?></a>
			<? endif;?>

			<? if($navigation['next']):?>
				<? foreach($navigation['next'] as $val):?>
					<a href="http://<?=SITE_NAME;?>/<?=$href;?>/page/<?=$val;?>"><?=$val;?></a>
				<? endforeach;?>
			<? endif;?>

			<? if($navigation['arrow_forward']):?>
				<a href = "http://<?=SITE_NAME;?>/<?=$href;?>/page/<?=$navigation['arrow_forward'];?>"> >>>> </a>
			<? endif;?>

			<? if($navigation['last_page']):?>
				<a href = "http://<?=SITE_NAME;?>/<?=$href;?>/page/<?=$navigation['last_page'];?>"> последняя </a>
			<? endif;?>

		</div>


	<?endif;?>

</div> <!-- end div main_contnet -->
<div class="clear"></div>
</div><!-- end div wrapper -->