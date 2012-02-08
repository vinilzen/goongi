{literal}
<script type='text/javascript'>
function file_send() {
  sendForm("my_form", "/ajax_upload.php", callback);
  return false;
}
function sendForm(form, url, callfunc) {
  if (!document.createElement) return;
  if (typeof(form)=="string") form=document.getElementById(form);
  var frame=createIFrame();
  var act = form.getAttribute('action');
  frame.onSendComplete = function() {callfunc(form,act,getIFrameXML(frame));};
  form.setAttribute('target', frame.id);
  form.setAttribute('action', url);
  form.submit();
}

function createIFrame() {
  var id = 'f' + Math.floor(Math.random() * 99999);
  var div = document.createElement('div');
  div.innerHTML = "<iframe style=\"display:none\" src=\"about:blank\" id=\""+id+"\" name=\""+id+"\" onload=\"sendComplete('"+id+"')\"></iframe>";
  document.body.appendChild(div);
  return document.getElementById(id);
}

function sendComplete(id) {
  var iframe=document.getElementById(id);
  if (iframe.onSendComplete &&
  typeof(iframe.onSendComplete) == 'function')  iframe.onSendComplete();
}

function getIFrameXML(iframe) {
  var doc=iframe.contentDocument;
  if (!doc && iframe.contentWindow) doc=iframe.contentWindow.document;
  if (!doc) doc=window.frames[iframe.id].document;
  if (!doc) return null;
  if (doc.location=="about:blank") return null;
  if (doc.XMLDocument) doc=doc.XMLDocument;
  return doc;
}

function callback(form,act,doc) {
  form.setAttribute('action', act);
  form.removeAttribute('target');
  alert(doc.body.innerHTML);
}
</script>
{/literal}

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

<!--div id="header">
	<div class="caption">Моё дерево</div>
	<div class="float-r">
		<div class="ico home"></div>
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
	div class="button"><div>Добавить родственника</div></div>
	<div class="button sub"><div>Сохранить дерево</div></div>
</div-->

{literal}

<div id="user" class="closed">
	<div class="print"></div>
	<div class="body"></div>
	<div class="toggle"><div></div></div>
</div>

<script id="user-tmpl" type="text/html">
	<div class="name"><a href="/user_editprofile.php" target="_top"><%= Base64.decode(displayname) %></a></div>
	<div class="photo">
		<a href="/{$user->user_info.user_username}" target="_top">
                    <% if ( photo)  { %>
                        <img src="<%= TREE.url.image(id, photo) %>" />
                    <% } %>
                    <% if ( !photo)  { %>
                         <img src="images/no_photo.gif" />
                   <% } %>

			
		</a>
	</div>
	<div class="birth">
<% d = new Date(birthday).getDate()%>
<% y = new Date(birthday).getFullYear()%>
<% m = new Date(birthday).getMonth()+1 %>
<% data =d+'.'+m+'.'+y %>

       <%= birthday ? (sex === "m" ? "Родился " : "Родилась ") + data: "" %>
         <% if ( !birthday ) { %>
                Дата рождения не известна 
         <% } %>
        </div>
		<table class="family">
                    <% if (json.users[mother] || json.users[father]) { %>
				<tr>
					<th>Родители:</th>
                                        <td><b>
					<% if (json.users[mother]){ %> <%= Base64.decode(json.users[mother].displayname) %><% } %>
                                        <% if ( json.users[father] && json.users[mother]) { %>,<% } %> <% if (json.users[father]){ %><%= Base64.decode(json.users[father].displayname) %><% } %>
                                 </b></td>
				</tr>
			<% } %>
			<% if (json.users[spouse]) { %>
				<tr>
					<th><%= json.users[spouse].sex === "m" ? "Муж" : "Жена" %></th>
					<td><b><%= Base64.decode(json.users[spouse].displayname) %></b></td>
				</tr>
			<% } %>
			<% if (children) { %>
			<tr>
					<th>Дети</th>
					<td>
						<% _.each(children, function(id, i) { %>
							<b><%= Base64.decode(json.users[id].displayname) %></b>
							<% if (children.length !== i + 1) { %>, <% } %>
						<% }) %>
					</td>
				</tr>
			<% } %>
		</table>
</script>

<div id="viewpoint"></div>

<script id="person-tmpl" type="text/html">
	<div class="person <%= sex === "w" ? "alt" : "" %>" data-id="<%= id %>" data-father-id="<%= father %>" data-mother-id="<%= mother %>">
		<div class="info"></div>
            
		<div class="relation">
                
               <%= id == {/literal}{$user->user_info.user_id}{literal} ? "Ты" : "" %>
                </div>
		<div class="photo loading">
			<img src="<%= TREE.url.image(id, photo) %>" />
			<% if (death || death_bool==1) { %> <div class="ribbon"></div> <% } %>
		</div>
		<div class="name"><%= Base64.decode(displayname) %></div>
		<div class="actions closed">
			<ul>
				<li class="edit">Редактировать</li>
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
					<% if (Base64.decode(fname) !== "") { %>
						<div class="field">
							<div class="name">Загрузи новый аватар</div>
							<form id="my_form" method="post" action="" enctype="multipart/form-data" onsubmit="file_send()">
								<input type="file" name="photo" />
								<input type = "hidden" name = "u_id" value = "<%= id %>">
								<input type="submit" value="отправить">
							</form>
						</div>
					<% } %>
				</td>
			</tr>
		</table>

		<div class="field">
			<div class="name">Имя</div>
			<input type="text" name="fname" value="<%= Base64.decode(fname) %>" />
		</div>
		<div class="field">
			<div class="name">Фамилия</div>
			<input type="text" name="lname" <% if (Base64.decode(lname) === "") { %> value="<%= Base64.decode(json.users[id].lname) %>" <% } %> value="<%= Base64.decode(lname) %>" />
		</div>
		<div class="field">
			<div class="name">Прозвище</div>
			<input type="text" name="alias" value="<%= alias %>" />
		</div>
		<div class="field">
			<label class="name"><input type="checkbox" name="invite" /> Пригласить</label>
			<input type="text" name="email"  value="<%= invite %>" />
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
						<label class="name"><input type="checkbox" name="dead" <% if (death || death_bool==1) { %> checked="checked" <% } %> /> Дата смерти</label>
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
                           <% if (birthday) { %>
                                <% d = new Date(birthday).getDate()%>
                                <% y = new Date(birthday).getFullYear()%>
                                <% m = new Date(birthday).getMonth()+1 %>
                                <% data =d+'.'+m+'.'+y %>
				<td><%= data %></td>
                            <% } %>

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
<script type="text/javascript">json = {$family};</script>
<script src="/tree/js/gentree.js"></script>

</body>
</html>
