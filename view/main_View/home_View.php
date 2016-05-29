<div class= "header"><h2>Talkingfish/Говорящая рыба</h2></div>
<div class="row">
<a href="/admin/">Добавить заметку</a>
	<div class="content">
	<? foreach ($data['posts'] as $key => $value) : ?>
		<div class="post">
			<a href="/main/descpost/<?= $value['id']; ?>"><h2><?= $value['title']; ?></h2></a><hr>
			<div class="minDesc"><?= $value['minDesc']; ?></div>
			<a href="/main/descpost/<?= $value['id']; ?>">Подробнее ...</a>
			<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small" 
			data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
		</div>
	<? endforeach ?>
	<div class="pagination">
	<? $i=1; while ($i <= $data['pages'][0][0]/3) {?>
		<? if($data['page'][0] == $i){?>
			<div class="page"><?= $i++?></div>
		<?}else{?>
			<a href="/main/index/<?= $i?>" class="page"><?= $i++?></a>
		<?}?>
	<?}?>
	</div>
	</div>
</div>
