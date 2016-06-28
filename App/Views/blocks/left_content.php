<div id="wrapper">
<div id="left_content">
	
<nav>
	<ul>
		<li> <a href="http://<?=SITE_NAME;?>/index"> Главная </a> </li>
		<li> <a href="http://<?=SITE_NAME;?>/articles"> Статьи </a> </li>
		<li> <a href="http://<?=SITE_NAME;?>/registration"> Регистрация </a> </li>

	</ul>

</nav>

	<script type="text/javascript">


		$.fn.tagcloud.defaults = {
			size: {start: 14, end: 18, unit: 'pt'},
			color: {start: '#cde', end: '#f52'}
		};

		$(function () {
			$('#tag_cloud a').tagcloud();
		});


	</script>

	<div id="tag_cloud">


		<?for($i = 0;$i < count($all_tags);$i++):?>
			<a href="http://<?=SITE_NAME;?>/tags/title/<?=$all_tags[$i]['href'];?>" rel="<?=$i?>"> <?=$all_tags[$i]['title'];?></a>&nbsp;

		<?endfor;?>


		</div>

</div> <!-- end div left_contnet -->