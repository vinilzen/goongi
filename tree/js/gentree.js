"use strict";

json.users[json.user.id] = json.user;

$(function() {
	TREE.initialize();
	TREE.popups.initialize();
});

var TREE = {

	api: {

		getUnions: function() {
			return $.ajax({
				type: 'GET',
				url: '/user_unions.php'
			})
		},

		updatePerson: function(person) {
			console.log('POSTing: ', perosn);
			return $.ajax({
				type: 'POST',
				url: '/tree_build.php',
				data: JSON.stringify(person)
			})
		}

	},

	tmpl: {
		user: function(data) {
			return $(data && _.template($('#user-tmpl').html(), data))
		},
		person: function(data) {
			return $(data && _.template($('#person-tmpl').html(), data))
		},
		popup: function(data) {
			return $(data && _.template($('#popup-tmpl').html(), data))
		}
	},

	// drawn: [],
	url: {
		image: 'http://' + window.location.host + '/uploads_user/1000/{0}/{1}'
	},

	utils: {
		month: function(selected) {
			return _.map(["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"], function(name, i) {
				i++;
				return '<option value="' + i + '"' + (selected === i ? 'selected="selected"' : '') + '>' + name + '</option>'
			}).join('')
		}
	},

	viewpoint: $('#viewpoint'),

	initialize: function() {

		this.tmpl.user(json.user).appendTo('#user .body');

		$('#user > .toggle').click(this.toggleUserInfo);
		$('#user .settings > .toggle').click(this.toggleSettings);

		this.viewpoint.on('click', '.person .toggle', function() {
			TREE.popups.collection.actions.render($(this).closest('.person'));
		});

		this.viewpoint.on('click', '.person .info', function() {
			var person = $(this).closest('.person'),
				offset = person.offset();
			TREE.popups.collection.info.render({
				person: json.users[person.data('id')],
				offset: [offset.left + person.outerWidth() + 10, offset.top]
			});
		});

		$('#header').on('click', '.settings', function() {
			TREE.popups.collection.settings.render();
		});

		(function initDrag() {
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

			this.viewpoint.on({
				mousedown: startDrag,
				mouseup: stopDrag,
				mouseleave: stopDrag,
				mousemove: doDrag
			});
		}).apply(this);

		this.render();

	},
/*
	render: function() {
		this.renderPerson(json.user, $('<div class="generation" />').appendTo(this.viewpoint));
		this.renderAdjust();
		this.centerView();
		console.log(_.isEqual(_.keys(json.users).sort(), TREE.drawn.sort()) ? 'GREAT SUCCESS' : 'EPIC FAIL');
	},

	renderPerson: function(person, $generation) {
		if (!person || _.include(this.drawn, person.id)) {
			return false;
		}

		var father = json.users[person.father],
			mother = json.users[person.mother],
			$parents = $generation.prev('.generation').length ? $generation.prev('.generation') : $('<div class="generation" />').insertBefore($generation),
			$children = $generation.next('.generation').length ? $generation.next('.generation') : $('<div class="generation" />').insertAfter($generation);

		this.tmpl.person(person, $generation).appendTo($generation);
		this.drawn.push(person.id);

		this.renderPerson(father, $parents);
		this.renderPerson(mother, $parents);

		_(person.children).chain().map(function(childId) {
			return json.users[childId]
		}).each(function(child) {
			this.renderPerson(child, $children);
		}, this);

	},

	renderAdjust: function() {
		_.each(json.users, function(person) {
			var spouse = json.users[person.spouse];
			if (!spouse) {
				return false
			}
			var $marriage = $('.person').filter(function() {
				return $(this).data('id') == person.id || $(this).data('id') == spouse.id
			});
			!$marriage.parent('.marriage').length && $marriage.wrapAll('<div class="marriage" />');
		});
	},
*/
	render: function() {
		var father = json.users[json.user.father];
		while (json.users[father.father]) {
			father = json.users[father.father];
		}
		this.renderFamily(father.id).appendTo(this.viewpoint);
		this.renderPath();
		this.centerView();
	},

	renderFamily: function(parentId) {
		var family = $('<div class="family" />'),
			parents = $('<div class="parents" />'),
			children = $('<div class="children" />');
		this.tmpl.person(json.users[parentId]).appendTo(parents);
		this.tmpl.person(json.users[json.users[parentId].spouse]).appendTo(parents);

		_(json.users).chain().filter(function(user) {
			return user.father === parentId || user.mother === parentId
		}).each(function(child) {
			this.renderFamily(child.id).appendTo(children);
		}, this);

		parents.appendTo(family);
		children.appendTo(family);

		return family;

	},

	renderPath: function() {
		$('.family').each(function() {

			var family = $(this),
				ctx = $('<canvas />').attr({
					width: family.width(),
					height: family.height()
				}).prependTo(family),
				parents = family.children('.parents').children(),
				parentsId = _.map(parents, function(x) {
					return $(x).data('id')
				}),

				children = family.find('.person').filter(function() {
					return _.include(parentsId, $(this).data('father-id')) || _.include(parentsId, $(this).data('mother-id'))
				});

			ctx = ctx.getContext();
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

			children.each(function() {

				x = $(this).offset().left - family.closest('.family').offset().left + $(this).outerWidth() / 2 + .5;
				y = $(this).offset().top;

				ctx.moveTo(parentLink[0], parentLink[1]);
				ctx.lineTo(x, parentLink[1]);
				ctx.lineTo(x, parentLink[1] + 30);

			});

			ctx.stroke();

		});
	},

	centerView: function() {
		var user = $('.person').filter(function() {
			return $(this).data('id') == json.user.id
		}),
			scroll = [user.offset().left - $(window).width() / 2 + user.outerWidth() / 2, user.offset().top - $(window).height() / 2 + user.outerHeight() / 2];

		// prevent chrome to restore scroll
		setTimeout(function() {
			$(document).scrollLeft(scroll[0]).scrollTop(scroll[1]);
		}, 100);
	},

	toggleUserInfo: function() {
		$(this).closest('#user').toggleClass('closed');
	},

	toggleSettings: function() {
		$(this).closest('.settings').toggleClass('closed');
	}

};

TREE.popups = {

	el: $('<div class="fader hide" />').appendTo('body'),

	initialize: function() {

		this.el.bind('click', $.proxy(this, 'hideAll'));

		_.each(this.collection, function(inst, i) {
			this.collection[i] = new inst;
		}, this);
	},

	hideAll: function() {
		_.each(this.collection, function(inst, i) {
			this.collection[i].hide();
		}, this);
	}

};

TREE.popups.view = Backbone.View.extend({

	events: {
		'click .close': 'hide',
		'click .cancel': 'hide'
	},

	fader: TREE.popups.el,

	show: function() {
		this.el.removeClass('hide');
		this.fader.removeClass('hide');

		this.el.hasClass('center') && this.el.css({
			'margin-left': -Math.round(this.el.outerWidth() / 2),
			'margin-top': -Math.round(this.el.outerHeight() / 2)
		});
	},

	hide: function(e) {
		if (!_.isFunction(this.el)) {
			this.el.addClass('hide');
			this.fader.addClass('hide');
		}
	}

});

TREE.popups.collection = {

	settings: TREE.popups.view.extend({

		el: TREE.tmpl.popup({
			header: 'Настройки дерева'
		}).addClass('center').appendTo('body'),

		tmpl: _.template($('#settings-tmpl').html()),

		render: function(options) {
			this.$('.content').html(this.tmpl({}));
			this.show();
		}

	}),

	actions: TREE.popups.view.extend({

		el: $('#actions'),

		initialize: function() {
			this.el.on('click', '.toggle', $.proxy(this, 'hide'));
			this.el.on('click', '.edit', function() {
				var person = $(this).closest('.person'),
					offset = person.offset();
				TREE.popups.collection.personal.render({
					person: json.users[person.data('id')],
					offset: [offset.left + person.outerWidth() + 10, offset.top]
				});
			});
		},

		render: function(person) {

			var personClone = TREE.tmpl.person(json.users[person.data('id')]).css({
				left: 91,
				top: 45
			});
			personClone.find('.actions').removeClass('closed');

			this.show();

			var personHeight, personWidth, x, y, personOffset = person.offset();

			this.el.find('.person').replaceWith(personClone);
			personHeight = personClone.outerHeight();
			personWidth = personClone.outerWidth();

			this.el.find('.siblings').css({
				height: personHeight
			}).children('.inner').css({
				'margin-top': (personHeight - this.el.find('.inner').height()) / 2
			});

			x = (this.el.find('.parents').width() / 2).toHalf();
			y = this.el.height();

			this.el.css({
				left: personOffset.left + personWidth / 2,
				top: personOffset.top + personHeight / 2,
				'margin-top': 0 - y / 2
			});

			var ctx = this.el.find('canvas').attr({
				width: this.el.find('.parents').width(),
				height: this.el.height()
			});
			ctx = ctx.getContext();
			ctx.strokeStyle = 'white';
			ctx.beginPath();

			ctx.moveTo(x - 40, 13.5);
			ctx.lineTo(x + 40, 13.5);
			ctx.moveTo(x, 13);
			ctx.lineTo(x, 36);

			ctx.moveTo(x - 40, y - 13.5);
			ctx.lineTo(x + 40, y - 13.5);
			ctx.moveTo(x, y - 13);
			ctx.lineTo(x, y - 36);

			y = (y / 2).toHalf() * 2;
			ctx.moveTo(x + 90, y / 2);
			ctx.lineTo(x + 140, y / 2);
			ctx.moveTo(x + 140, y / 2 - 42);
			ctx.lineTo(x + 110, y / 2 - 42);
			ctx.lineTo(x + 110, y / 2 + 42);
			ctx.lineTo(x + 140, y / 2 + 42);

			ctx.stroke();

		}

	}),

	personal: TREE.popups.view.extend({

		el: TREE.tmpl.popup({
			header: 'Редактирова личную информацию'
		}).appendTo('body'),

		tmpl: _.template($('#personal-tmpl').html()),

		initialize: function() {
			this.el.on('click', '.save', $.proxy(this, 'save'));
		},

		render: function(options) {
			this.el.css({
				left: options.offset[0],
				top: options.offset[1]
			});
			this.$('.content').html(this.tmpl(options.person));
			this.show();
		},

		show: function() {
			var actions = TREE.popups.collection.actions.el.addClass('closed'),
				person = actions.children('.person');
			this.el.removeClass('hide');
		},

		hide: function() {
			TREE.popups.collection.actions.el.removeClass('closed');
			this.el.addClass('hide');
		},

		serialize: function() {
			var inp = this.el.find('input, select');
			return {
				type_request: 'edit',
				user_id: inp.filter('[name=id]').val(),
				sex: inp.filter('[name=sex]:checked').val(),
				fname: Base64.encode(inp.filter('[name=fname]').val()),
				lname: Base64.encode(inp.filter('[name=lname]').val()),
				alias: Base64.encode(inp.filter('[name=alias]').val()),
				birthday: inp.filter('[name=birthyear]').val() + '-' + inp.filter('[name=birthmonth]').val() + '-' + inp.filter('[name=birthdate]').val()
			}
		},

		save: function() {
			TREE.api.updatePerson(this.serialize());
			this.hide();
		}

	}),

	info: TREE.popups.view.extend({

		el: TREE.tmpl.popup({
			header: 'Краткая информация'
		}).appendTo('body'),

		tmpl: _.template($('#info-tmpl').html()),

		render: function(options) {
			this.el.css({
				left: options.offset[0],
				top: options.offset[1]
			});
			this.$('.content').html(this.tmpl(options.person));
			this.show();
		}

	})

}