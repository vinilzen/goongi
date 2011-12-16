﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<div class="breadcrumb">
		<a href="#">Главная</a>
		<span>&rarr;</span>
		<a href="#">Профиль</a>
		<span>&rarr;</span>
		<a href="#">Моё дерево</a>
	</div>
	<div class="float-r">
		<div class="ico home"></div>
		<div class="ico print"></div>
		<div class="ico settings"></div>
	</div>
	<div class="button"><div>Добавить родственника</div></div>
	<div class="button sub"><div>Сохранить дерево</div></div>
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
	<div class="body">
		<div class="name">Александр Константинопольский</div>
		<div class="photo"><img src="images/1.jpg" /></div>
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
		<div class="info"></div>
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

<script id="personal" type="text/html">
	<div class="popup hide">
		<div class="close"></div>
		<div class="header">Редактирова личную информацию</div>
		<div class="body">
			<table>
				<tr>
					<td>
						<div class="field">
							<div class="name">Пол</div>
							<label><input type="radio" name="gender" value="m" <% if (sex === "m") { %> checked="checked" <% } %> /> Мужской</label>
							<label><input type="radio" name="gender" value="w" <% if (sex === "w") { %> checked="checked" <% } %> /> Женский</label>
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
				<input type="text" name="username" value="<%= Base64.decode(username) %>" />
			</div>
			<div class="field">
				<div class="name">Мать/Отец</div>
				<select><option></option></select>
			</div>
			<table>
				<tr>
					<td>
						<div class="field">
							<div class="name">Дата рождения</div>
							<table>
								<tr>
									<td width="40">
										<select>
											<% _.each(Number().range(1, 31), function(val) { %>
												<option><%= val %></option>
											<% }) %>
										</select>
									</td>
									<td width="80" style="padding:0 5px">
										<select>
											<% _.each(["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"], function(val, i) { %>
												<option value="<%= i+1 %>"><%= val %></option>
											<% }) %>
										</select>
									</td>
									<td width="60">
										<select>
											<% _.each(Number().range(1820, 2019), function(val) { %>
												<option><%= val %></option>
											<% }) %>
										</select>
									</td>
								</tr>
							</table>
						</div>
					</td>
					<td class="sep"></td>
					<td>
						<div class="field">
							<label class="name"><input type="checkbox" /> Дата смерти</label>
							<table>
								<tr>
									<td width="40"><select disabled="disabled"><option>&nbsp;</option></select></td>
									<td width="80" style="padding:0 5px"><select disabled="disabled"><option>&nbsp;</option></select></td>
									<td width="60"><select disabled="disabled"><option>&nbsp;</option></select></td>
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
	</div>
</script>

<div id="actions" class="hide">
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

<div id="settings" class="popup hide center">
	<div class="close"></div>
	<div class="header">Настройки дерева</div>
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
</div>
<script type="text/javascript">

	json = {$family}
	
</script>

<script src="/tree/js/gentree.js"></script>

</body>
</html>