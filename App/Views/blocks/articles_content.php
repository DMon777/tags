<div id="main_content">
	<h2>Статьи</h2>

	<? if($articles): ?>

		<? foreach ($articles as $key => $value) :?>

			<h3> <?=$value['title']?> </h3>


			<? for($i = 0;$i < count($value['tags']);$i++): ?>

				<?if($i + 1 < count($value['tags'])):?>
					<a href="http://<?=SITE_NAME;?>/tags/<?=$value['tags'][$i]['href'];?>"> <?=$value['tags'][$i]['title']?> </a>,

					<?else: ?>

					<a href="http://<?=SITE_NAME;?>/tags/<?=$value['tags'][$i]['href'];?>"> <?=$value['tags'][$i]['title']?> </a>
				<?endif;?>

			<?endfor;?>

			<p> <?=$value['text']?> </p>
			<a href="http://<?=SITE_NAME;?>/article/id/<?=$value['id']?>">  Читать далее ...  </a>

		<? endforeach; ?>

	<? else: ?>

		<p> Статей нет!!! </p>

	<? endif; ?>

</div> <!-- end div main_contnet -->
<div class="clear"></div>
</div><!-- end div wrapper -->