<!doctype html>
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="Genealogy Tree">
  <meta name="author" content="Alexander Orlov">
  <link rel="stylesheet" href="/css/default.css">
  <script src="/js/jquery.js"></script>
  <script src="/js/underscore.js"></script>
	<!--[if lte IE 8]><script src="/js/excanvas.js"></script><![endif]-->
  <script src="/js/base64.js"></script>
  <script src="/js/utils.js"></script>
</head>
<body>

<div class="user closed">
	<div class="settings closed">
		<div class="toggle"></div>
		<div class="title">Параметры</div>
		<ul>
			<li>Добавить родственников</li>
			<li>Посмотреть ветвь</li>
			<li>Присоединить</li>
			<li>Удалить связь</li>
			<li>Удалить этого человека</li>
		</ul>
	</div>
	<div class="body">
		<div class="name">Александр Константинопольский</div>
		<div class="photo"><img src="/img/user.jpg" /></div>
		<div class="birth">Родился 1986 г. 46 февраля</div>
		<div class="status">Дед</div>
		<div class="edit"><span>Редактировать профиль<span></div>
		<div class="relations">
			<table>
				<tr>
					<td>Жена</td>
					<td><span>Дарья Марчук</span></td>
				</tr>
				<tr>
					<td>Дети</td>
					<td>
						<span>Олег Марчук</span>,
						<span>Юлия Марчук</span>,
						<span>Андрей Марчук</span>
					</td>
				</tr>
				<tr>
					<td>Внуки</td>
					<td>
						<span>Олег Марчук</span>,
						<span>Юлия Марчук</span>
					</td>
				</tr>
				<tr>
					<td>Друзья</td>
					<td>
						<span>Олег Марчук</span>,
						<span>Юлия Марчук</span>,
						<span>Андрей Марчук</span>,
						<span>Олег Марчук</span>,
						<span>Юлия Марчук</span>,
						<span>Андрей Марчук</span>,
						<span>Олег Марчук</span>,
						<span>Юлия Марчук</span>,
						<span>Андрей Марчук</span>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="toggle"></div>
</div>

<div id="viewpoint"></div>

<script id="person" type="text/html">
	<div class="person<%= sex === "w" ? " alt" : "" %>" data-id="<%= id %>" data-father-id="<%= father %>" data-mother-id="<%= mother %>">
		<div class="tools">
			<div class="info"></div>
			<div class="print"></div>
		</div>
		<div class="relation"><%= id %></div>
		<div class="photo"><img src="<%= TREE.url.image.format(id, photo) %>" /></div>
		<div class="name"><%= Base64.decode(displayname) %></div>
		<div class="actions closed">
			<ul>
				<li class="edit">Редактировать</li>
				<li class="view">Посмотреть ветвь</li>
				<li class="join">Присоединить</li>
				<li class="remove">Удалить связь</li>
				<li class="change">Изменить тип связи</li>
				<li class="wipe">Удалить человека</li>
			</ul>
			<div class="toggle"></div>
		</div>
	</div>
</script>

<div class="dialog actions hide">
	<div class="parents">
		<div class="button"><div>Добавить отца</div></div>
		<div class="button alt"><div>Добавить мать</div></div>
	</div>
	<div class="siblings">
		<div class="inner">
			<div class="button sub"><div>Добавить друга</div></div>
			<div class="button"><div>Добавить брата</div></div>
			<div class="button alt"><div>Добавить сестру</div></div>
		</div>
	</div>
	<div class="children">
		<div class="button"><div>Добавить сына</div></div>
		<div class="button alt"><div>Добавить дочь</div></div>
	</div>
	<div class="person"></div>
	<canvas width="500" height="333"></canvas>
</div>

 <script src="/js/gentree.js"></script>

</body>
</html>
