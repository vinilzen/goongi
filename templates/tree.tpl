<!doctype html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="description" content="Genealogy Tree">
	<meta name="author" content="Alexander Orlov">
	<link rel="stylesheet" href="/tree/css/default.css">
	<script src="/tree/js/jquery.js"></script>
	<script src="/tree/js/underscore.js"></script>
	<script src="/tree/js/backbone.js"></script>
	<!--[if lte IE 8]><script src="/tree/js/excanvas.js"></script><![endif]-->
	<script src="/tree/js/base64.js"></script>
	<script src="/tree/js/utils.js"></script>
</head>
<body>

<div id="header">
	<div class="caption">Моё дерево</div>
	<div class="float-r">
		<!--div class="ico home"></div-->
		<div class="ico print"></div>
		<div class="ico settings"></div>
	</div>
	<div class="breadcrumb">
		<a href="/" target="_top">Главная</a>
		<span>&rarr;</span>
		<a href="/{$user->user_info.user_username}" target="_top">Профиль</a>
		<span>&rarr;</span>
		<b>Моё дерево</b>
	</div>
	<!--div class="button"><div>Добавить родственника</div></div>
	<div class="button sub"><div>Сохранить дерево</div></div-->
</div>

<div id="user" class="closed">
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
	<div class="body"></div>
	<div class="toggle"></div>
</div>

<script id="user-tmpl" type="text/html">
	<div class="name"><%= Base64.decode(displayname) %></div>
	<div class="photo">
		<a href="/{$user->user_info.user_username}" target="_top">
			<img src="<%= TREE.url.image.format(id, photo) %>" />
		</a>
	</div>
	<div class="birth"><%= (sex === "m" ? "Родился" : "Родилась") + birthday %></div>
	<div class="edit"><a href="/user_editprofile.php" target="_top"><span>Редактировать профиль</span></a></div>
	<!--div class="relations">
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
	</div-->
</script>

<div id="viewpoint"></div>

{literal}

<script id="person-tmpl" type="text/html">
	<div class="person<%= sex === "w" ? " alt" : "" %>" data-id="<%= id %>" data-father-id="<%= father %>" data-mother-id="<%= mother %>">
		<div class="info"></div>
		<div class="relation"><%= id === json.user.id ? "Вы" : "" %></div>
		<div class="photo"><img src="<%= TREE.url.image.format(id, photo) %>" /></div>
		<div class="name"><%= Base64.decode(displayname) %></div>
		<div class="actions closed">
			<ul>
				<li class="edit">Редактировать</li>
				<li class="change">Изменить тип связи</li>
				<li class="remove">Удалить человека</li>
			</ul>
			<div class="toggle"></div>
		</div>
	</div>
</script>

<script id="personal-tmpl" type="text/html">
	<div class="body">
		<input type="hidden" name="id" value="<%= id %>" />
		<table>
			<tr>
				<td>
					<div class="field">
						<div class="name">Пол</div>
						<label><input type="radio" name="sex" value="m" <% if (sex === "m") { %> checked="checked" <% } %> /> Мужской</label>
						<label><input type="radio" name="sex" value="w" <% if (sex === "w") { %> checked="checked" <% } %> /> Женский</label>
					</div>
				</td>
				<td class="sep"></td>
				<td>
					<div class="field">
						<div class="name">Загрузи новый аватар</div>
						<input type="file" />
					</div>
				</td>
			</tr>
		</table>
		<div class="field">
			<div class="name">Имя</div>
			<input type="text" name="fname" value="<%= Base64.decode(fname) %>" />
		</div>
		<div class="field">
			<div class="name">Фамилия</div>
			<input type="text" name="lname" value="<%= Base64.decode(lname) %>" />
		</div>
		<div class="field">
			<div class="name">Прозвище</div>
			<input type="text" name="alias" value="<%= alias %>" />
		</div>
		<!--div class="field">
			<div class="name">Мать/Отец</div>
			<select><option></option></select>
		</div-->
		<table>
			<tr>
				<td>
					<div class="field">
						<div class="name">Дата рождения</div>
						<table>
							<tr>
								<td width="40"><input type="text" maxlength="2" name="birthdate" value="<%= birthday ? new Date(birthday).getDate() : "" %>" /></td>
								<td width="80" style="padding:0 5px">
									<select name="birthmonth">
										<% _.each(["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"], function(month, i) { %>
											<option value="<%= i+1 %>" <% if (new Date(birthday).getMonth() === i) { %> selected="selected" <% } %>><%= month %></option>
										<% }) %>
									</select>
								</td>
								<td width="60"><input type="text" maxlength="4" name="birthyear" value="<%= birthday ? new Date(birthday).getFullYear() : "" %>" /></td>
							</tr>
						</table>
					</div>
				</td>
				<td class="sep"></td>
				<td>
					<div class="field">
						<label class="name"><input type="checkbox" name="dead" <% if (death) { %> checked="checked" <% } %> /> Дата смерти</label>
						<table>
							<tr>
								<td width="40"><input type="text" maxlength="2" name="deathdate" value="<%= death ? new Date(death).getDate() : "" %>" <% if (!death) { %> disabled="disabled" <% } %> /></td>
								<td width="80" style="padding:0 5px">
									<select name="deathmonth" <% if (!death) { %> disabled="disabled" <% } %>>
										<% _.each(["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"], function(month, i) { %>
											<option value="<%= i+1 %>" <% if (new Date(death).getMonth() === i) { %> selected="selected" <% } %>><%= month %></option>
										<% }) %>
									</select>
								</td>
								<td width="60"><input type="text" maxlength="4" name="deathyear" value="<%= death ? new Date(death).getFullYear() : "" %>" <% if (!death) { %> disabled="disabled" <% } %> /></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div class="footer">
		<div class="button save"><div>Сохранить изменения</div></div>
		<div class="cancel">Отмена</div>
	</div>
</script>

<script id="popup-tmpl" type="text/html">
	<div class="popup hide">
		<div class="close"></div>
		<div class="header"><%= header %></div>
		<div class="content"></div>
	</div>
</script>

<script id="info-tmpl" type="text/html">
	<div class="body">
		<table>
			<tr>
				<th>Пол</th>
				<td><%= sex === "m" ? "Мужской" : "Женский" %></td>
			</tr>
			<tr>
				<th>Имя</th>
				<td><%= Base64.decode(fname) %></td>
			</tr>
			<tr>
				<th>Возраст</th>
				<td><%= new Date().getFullYear() - new Date(birthday).getFullYear() %></td>
			</tr>
			<tr>
				<th>День рождения</th>
				<td><%= birthday %></td>
			</tr>
		</table>
	</div>
</script>

<div id="actions" class="hide">
	<div class="parents">
		<div class="add-parent button"><div>Добавить отца</div></div>
		<div class="add-parent button alt"><div>Добавить мать</div></div>
	</div>
	<div class="spouse">
		<div class="inner">
			<div class="add-spouse button"><div>Добавить мужа</div></div>
			<div class="add-spouse button alt"><div>Добавить жену</div></div>
		</div>
	</div>
	<div class="siblings">
		<div class="inner">
			<div class="add-sibling button"><div>Добавить брата</div></div>
			<div class="add-sibling button alt"><div>Добавить сестру</div></div>
		</div>
	</div>
	<div class="children">
		<div class="add-child button"><div>Добавить сына</div></div>
		<div class="add-child button alt"><div>Добавить дочь</div></div>
	</div>
	<div class="person"></div>
	<canvas width="500" height="333"></canvas>
</div>

<script id="settings-tmpl" type="text/html">
	<div class="body">
		<label><input type="radio" name="show" value="all" /> Отображать карточки с фото и именами</label>
		<label><input type="radio" name="show" value="photo" /> Отображать только фотографии</label>
		<label><input type="checkbox" name="round-connections" /> Закругленные углы линий в дереве</label>
		<label><input type="checkbox" name="show-dead" /> Пометить умерших</label>
		<label><input type="checkbox" name="use-background" /> Загрузить фоновое изображение</label>
		<input type="file" name="background" />
	</div>
	<div class="footer">
		<div class="button"><div>Сохранить изменения</div></div>
		<div class="cancel">Отмена</div>
	</div>
</script>

{/literal}

<script type="text/javascript">json = {$family}</script>
<script src="/tree/js/gentree.js"></script>

</body>
</html>
