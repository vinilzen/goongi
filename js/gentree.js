"use strict";

window.json = $.parseJSON('{"user":{"id":"5","email":"marchuknatasha@nineseven.ru","fname":"0J3QsNGC0LDRiNCw","lname":"0JzQsNGA0YfRg9C6","username":"bWFyY2h1a25hdGFzaGE=","displayname":"0J3QsNGC0LDRiNCwINCc0LDRgNGH0YPQug==","photo":"0_4745.jpg","signupdate":"1317826119","lastlogindate":"1322172234","lastactive":"1322172234","sex":"w","father":"7","mother":"6","spouse":"3","children":["1","4"]},"users":{"1":{"id":"1","email":"marchukilya@gmail.com","fname":"0JjQu9GM0Y8=","lname":"0JzQsNGA0YfRg9C6","username":"bWFyY2h1a2lseWE=","displayname":"0JjQu9GM0Y8g0JzQsNGA0YfRg9C6","photo":"0_3901.jpg","signupdate":"1317736821","lastlogindate":"1322157383","lastactive":"1322172212","sex":"m","father":"3","mother":"5","spouse":null,"children":null},"3":{"id":"3","email":"marchukyura@nineseven.ru","fname":"0K7RgNCw","lname":"0JzQsNGA0YfRg9C6","username":"bWFyY2h1a3l1cmE=","displayname":"0K7RgNCwINCc0LDRgNGH0YPQug==","photo":"0_3016.jpg","signupdate":"1317825385","lastlogindate":"1322158639","lastactive":"1322158639","sex":"m","father":"9","mother":null,"spouse":"5","children":["1","4"]},"4":{"id":"4","email":"marchukvalera@tut.by","fname":"0JLQsNC70LXRgNCw","lname":"0JzQsNGA0YfRg9C6","username":"bWFyY2h1a3ZhbGVyYQ==","displayname":"0JLQsNC70LXRgNCwINCc0LDRgNGH0YPQug==","photo":"0_7921.jpg","signupdate":"1317826091","lastlogindate":"1322132844","lastactive":"1322132992","sex":"m","father":"3","mother":"5","spouse":null,"children":null},"6":{"id":"6","email":"budkevichvera@mail.ru","fname":"0JLQtdGA0LA=","lname":"0JHRg9C00LrQtdCy0LjRhw==","username":"YnVka2V2aWNodmVyYQ==","displayname":"0JLQtdGA0LAg0JHRg9C00LrQtdCy0LjRhw==","photo":"0_9764.jpg","signupdate":"1317826127","lastlogindate":"1322061661","lastactive":"1322066564","sex":"m","father":null,"mother":null,"spouse":"7","children":["5","10"]},"7":{"id":"7","email":"budkevichpavel@ya.ru","fname":"0J\/QsNGI0LA=","lname":"0JHRg9C00LrQtdCy0LjRhw==","username":"YnVka2V2aWNocGF2ZWw=","displayname":"0J\/QsNGI0LAg0JHRg9C00LrQtdCy0LjRhw==","photo":"0_3062.jpg","signupdate":"1317826183","lastlogindate":"1322066577","lastactive":"1322132742","sex":"m","father":null,"mother":null,"spouse":"6","children":["5","10"]},"10":{"id":"10","email":"tribulevaalena@mail.ru","fname":"0JDQu9C10L3QsA==","lname":"0KLRgNC40LHRg9C70LXQstCw","username":"dHJpYnVsZXZhYWxlbmE=","displayname":"0JDQu9C10L3QsCDQotGA0LjQsdGD0LvQtdCy0LA=","photo":"0_5111.jpg","signupdate":"1320156557","lastlogindate":"1322060897","lastactive":"1322159301","sex":"w","father":"7","mother":"6","spouse":"11","children":["13"]},"9":{"id":"9","email":"marchukartem@ya.ru","fname" : "0J\/QsNGI0LA=","lname" : "0JHRg9C00LrQtdCy0LjRhw==","username":"YnVka2V2aWNocGF2ZWw=","displayname": "0J\/QsNGI0LAg0JHRg9C00LrQtdCy0LjRhw==","photo" : "0_3062.jpg","signupdate" : "1317826183","lastlogindate" : "1322066577",		"lastactive" : "1322132742","sex" : "m","father" : null,"mother" : null,"spouse" : "111","children" : ["3"]}}}');

json.users[json.user.id] = json.user;

$(function () {
	TREE.initialize();
});

var TREE = {

	tmpl : {
		person : function (data) {
			return $(data && _.template($('#person').html(), data))
		}
	},

	url : {
		image : 'http://goongi.nineseven.by/uploads_user/1000/{0}/{1}'
	},

	viewpoint : function () {

		var start;

		function startDrag(e) {
			if (!$(e.target).closest('.person').length) {
				$(this).addClass('drag');
				e.preventDefault();
				start = [e.pageX, e.pageY];
			}
		}

		function stopDrag(e) {
			$(this).removeClass('drag');
		}

		function doDrag(e) {
			if ($(this).hasClass('drag')) {
				$(document).scrollLeft($(document).scrollLeft() + start[0] - e.pageX);
				$(document).scrollTop($(document).scrollTop() + start[1] - e.pageY);
			}
		}

		return $('#viewpoint').on({
			mousedown : startDrag,
			mouseup : stopDrag,
			mousemove : doDrag
		})
	},

	initialize : function () {

		$('.user > .toggle').click(this.toggleUserInfo);
		$('.settings > .toggle').click(this.toggleSettings);

		$(document).on('click', '.person .toggle', function () {
			TREE.Dialogs.Actions.show(this);
		});

		this.render();

	},

	render : function () {
		var father = json.users[json.user.father];
		while (json.users[father.father]) {
			father = json.users[father.father];
		}
		this.renderFamily(father.id).appendTo(this.viewpoint());
		this.renderPath();
		this.centerView();
	},

	renderFamily : function (parentId) {
		var family = $('<div class="family" />'),
		parents = $('<div class="parents" />'),
		children = $('<div class="children" />');
		this.tmpl.person(json.users[parentId]).appendTo(parents);
		this.tmpl.person(json.users[json.users[parentId].spouse]).appendTo(parents);

		_(json.users).chain().filter(function (user) {
			return user.father === parentId || user.mother === parentId
		}).each(function (child) {
			this.renderFamily(child.id).appendTo(children);
		}, this);

		parents.appendTo(family);
		children.appendTo(family);

		return family;

	},

	renderPath : function () {
		$('.family').each(function () {

			var family = $(this),
			ctx = $('<canvas />').attr({
					width : family.width(),
					height : family.height()
				}).prependTo(family).get(0),
			parents = family.children('.parents').children(),
			parentsId = _.map(parents, function (x) {
					return $(x).data('id')
				}),

			children = family.find('.person').filter(function () {
					return _.include(parentsId, $(this).data('father-id')) || _.include(parentsId, $(this).data('mother-id'))
				});

			window.G_vmlCanvasManager && G_vmlCanvasManager.initElement(ctx);
			ctx = ctx.getContext('2d');
			ctx.strokeStyle = '#999';
			ctx.beginPath();

			if (parents.length > 1) {
				var x = parents.eq(1).offset().left - family.offset().left,
				y = parents.eq(0).outerHeight();
				ctx.moveTo(x, y / 2);
				ctx.lineTo(x - 60.5, y / 2);
				ctx.moveTo(x - 30.5, y / 2);
				ctx.lineTo(x - 30.5, y + 30.5);

				var parentLink = [x - 30.5, y + 30.5];

			}

			children.each(function () {

				x = $(this).offset().left - family.closest('.family').offset().left + $(this).outerWidth() / 2 + .5;
				y = $(this).offset().top;

				ctx.moveTo(parentLink[0], parentLink[1]);
				ctx.lineTo(x, parentLink[1]);
				ctx.lineTo(x, parentLink[1] + 30);

			});

			ctx.stroke();

		});
	},

	centerView : function () {
		var user = $('.person').filter(function () {
				return $(this).data('id') == json.user.id
			}),
		scroll = [user.offset().left - $(window).width() / 2 + user.outerWidth() / 2, user.offset().top - $(window).height() / 2 + user.outerHeight() / 2];

		// prevent chrome to restore scroll
		setTimeout(function () {
			$(document).scrollLeft(scroll[0]).scrollTop(scroll[1]);
		}, 100);
	},

	toggleUserInfo : function () {
		$(this).closest('.user').toggleClass('closed');
	},

	toggleSettings : function () {
		$(this).closest('.settings').toggleClass('closed');
	}

}

TREE.Dialogs = {

	fader : $('<div class="fader hide" />').appendTo('body'),

	Actions : {
		el : $('.dialog.actions'),
		show : function (target) {
			var person = $(target).closest('.person'),
			personeClone = person.clone().css({
				left: 91,
				top: 45
			}).children('.actions').removeClass('closed').end(),
			personOffset = person.offset(),
			personHeight, personWidth,
			w, h;

			this.el.removeClass('hide');
			TREE.Dialogs.fader.removeClass('hide');

			this.el.find('.person').replaceWith(personeClone);
			personHeight = personeClone.outerHeight();
			personWidth = personeClone.outerWidth();

			this.el.find('.siblings').css({
				height : personHeight
			}).children('.inner').css({
				'margin-top' : (personHeight - this.el.find('.inner').height()) / 2
			});

			w = this.el.find('.parents').width(),
			h = this.el.height();
			this.el.css({
				left : personOffset.left + personWidth / 2,
				top : personOffset.top + personHeight / 2,
				'margin-top' : 0 - h / 2
			});

			var ctx = this.el.find('canvas').attr({
					width : w,
					height : h
				}).get(0);
			window.G_vmlCanvasManager && G_vmlCanvasManager.initElement(ctx);
			ctx = ctx.getContext('2d');
			ctx.strokeStyle = 'white';
			ctx.beginPath();

			ctx.moveTo(w / 2 - 40, 13.5);
			ctx.lineTo(w / 2 + 40, 13.5);
			ctx.moveTo(w / 2 + .5, 13);
			ctx.lineTo(w / 2 + .5, 36);

			ctx.moveTo(w / 2 - 40, h - 13.5);
			ctx.lineTo(w / 2 + 40, h - 13.5);
			ctx.moveTo(w / 2 + .5, h - 13);
			ctx.lineTo(w / 2 + .5, h - 36);

			ctx.moveTo(w / 2 + 90, h / 2);
			ctx.lineTo(w / 2 + 140, h / 2);
			ctx.moveTo(w / 2 + 140.5, h / 2 - 42);
			ctx.lineTo(w / 2 + 110.5, h / 2 - 42);
			ctx.lineTo(w / 2 + 110.5, h / 2 + 42);
			ctx.lineTo(w / 2 + 140.5, h / 2 + 42);

			ctx.stroke();
		},
		hide : function () {
			this.el.addClass('hide');
			TREE.Dialogs.fader.addClass('hide');
		}
	}

}
