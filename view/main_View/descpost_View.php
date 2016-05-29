<div class= "header"><h2>Talkingfish/Говорящая рыба</h2></div>
<div class="row">
	<div class="content">
	<? foreach ($data['posts'] as $key => $value) : ?>
		<div class="post-one">
			<h2><?= $value['title']; ?></h2><hr>
			<div class="description"><?= $value['description']; ?></div>
		</div>
		<div class = "gotomain">  <p><a href="/main">На главную</a></p></div>
		<div class="description"><?= $value['dayadd']; ?></div>
	<? endforeach ?>
	</div><hr>

	<div class="coment" id="coment">

	<label>Имя</label><br>
	<input type="text" id="nameUser"><br><br>
	<label>Коментарий</label><br>
	<textarea id="text" cols="90"></textarea><br><br>
	<button id="submit">Добавить коментарий</button><hr>
		<? foreach ($data['coments'] as $key => $value) :?>
			<p class="name-user"><?= $value['user']?></p>
			<p class="data-add"><?= $value['data_add']?></p><br>
			<div class="text"><?= $value['texts']?></div>
			<hr>
		<? endforeach ?>
	</div>
</div>


<script type="text/javascript">

	submit.onclick = function() {
		queryPost('main/addcoments'+<?= $_GET['check']; ?>, {nameUser: document.getElementById('nameUser').value, texts: document.getElementById('text').value});
	}

	function queryPost(url, data) {
		var date = new Date();

        $.ajax({
            url:  '/' + url,
            type: 'POST',
            data: data,
            cache: false,
            success: function(html){
               coment.innerHTML += '<p class="name-user">' + document.getElementById('nameUser').value + '</p><p class="data-add">' + date.getFullYear() + '.' + (date.getMonth() + 1) + '.' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + '</p><br><div class="text">'+document.getElementById('text').value+'</div>';
            }
        });
	}
</script>