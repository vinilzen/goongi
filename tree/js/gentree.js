"use strict";

json.users[json.user.id] = json.user;

$(function() {
	TREE.initialize();
	TREE.popups.initialize();
});

var TREE = {

	debug: true,

	api: {

		getUnions: function() {
			return $.ajax({
				type: 'GET',
				url: '/user_unions.php'
			})
		},

		updatePerson: function(person) {
			TREE.debug && console.log('tree_build.php: ', person);
			return $.ajax({
				type: 'POST',
				url: '/tree_build.php',
				dataType: 'json',
				data: person
			}).success(function(res) {
				TREE.debug && console.log(res.error, ': ', res.result);
				window.location.replace(window.location.href.split('#')[0] + '#' + $(document).scrollLeft() + ',' + $(document).scrollTop());
				window.location.reload();
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

		this.render({
			centering: true
		});

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
	render: function(options) {
		var parent = json.users[json.user.father] || json.users[json.user.mother] || json.user;
		while (json.users[parent.father] || json.users[parent.mother]) {
			parent = json.users[parent.father] || json.users[parent.mother];
		}
		this.viewpoint.empty();
		this.renderFamily(parent.id, this.viewpoint);
		this.viewpoint.width(this.viewpoint.children().width());

		this.renderPath();
		if (window.location.hash) {
			var scroll = window.location.hash.replace('#', '').split(',');
			setTimeout(function() {
				$(document).scrollLeft(scroll[0]).scrollTop(scroll[1]);
			}, 100);
		} else {
			options && options.centering && this.centerView();
		}
	},

	renderFamily: function(parentId, node) {
		var family = $('<div class="family" />').appendTo(node),
			parents = $('<div class="parents" />').appendTo(family),
			children = $('<div class="children" />').appendTo(family);
		this.tmpl.person(json.users[parentId]).appendTo(parents);
		this.tmpl.person(json.users[json.users[parentId].spouse]).appendTo(parents);

		_(json.users).chain().filter(function(user) {
			return user.father === parentId || user.mother === parentId
		}).each(function(child) {
			this.renderFamily(child.id, children);
		}, this);
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

			var x, y, parentLink;

			if (!children.length) {
				switch (parents.length) {
				case 2:
					x = parents.eq(1).offset().left - family.offset().left;
					y = parents.eq(0).outerHeight();
					ctx.moveTo(x, y / 2);
					ctx.lineTo(x - 60.5, y / 2);
					break;
				}
			} else {
				switch (parents.length) {
				case 1:
					x = (parents.offset().left - family.offset().left + parents.outerWidth() / 2).toHalf();
					y = parents.outerHeight();
					ctx.moveTo(x, y);
					ctx.lineTo(x, y + 30.5);
					parentLink = [x, y + 30.5];
					break;
				case 2:
					x = parents.eq(1).offset().left - family.offset().left;
					y = parents.eq(0).outerHeight();
					ctx.moveTo(x, y / 2);
					ctx.lineTo(x - 60.5, y / 2);
					ctx.moveTo(x - 30.5, y / 2);
					ctx.lineTo(x - 30.5, y + 30.5);
					parentLink = [x - 30.5, y + 30.5];
					break;
				}

				children.each(function() {

					x = $(this).offset().left - family.closest('.family').offset().left + $(this).outerWidth() / 2 + .5;
					y = $(this).offset().top;

					ctx.moveTo(parentLink[0], parentLink[1]);
					ctx.lineTo(x, parentLink[1]);
					ctx.lineTo(x, parentLink[1] + 30);

				});
			}

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
			this.el.on('click', '.button', $.proxy(this, 'add'));
			this.el.on('click', '.toggle', $.proxy(this, 'hide'));
			this.el.on('click', '.edit', $.proxy(this, 'edit'));
			this.el.on('click', '.remove', $.proxy(this, 'remove'));
		},

		render: function(person) {

			var personHeight, personWidth, x, y, personOffset = person.offset(),
				id = person.data('id'),
				hasFather = json.users[id].father ? true : false,
				hasMother = json.users[id].mother ? true : false,
				spouse = json.users[json.users[id].spouse],
				personClone = TREE.tmpl.person(json.users[id]).css({
					left: 91,
					top: 45
				});
			personClone.find('.actions').removeClass('closed');

			this.show();

			this.el.find('.person').replaceWith(personClone);
			personWidth = personClone.outerWidth();
			personHeight = personClone.outerHeight();

			this.el.children('.parents').children().eq(0).toggleClass('hide', hasFather).next().toggleClass('hide', hasMother);

			this.el.find('.add-spouse').eq(0).toggleClass('hide', json.users[id].sex === 'm' || spouse ? true : false);
			this.el.find('.add-spouse').eq(1).toggleClass('hide', json.users[id].sex === 'w' || spouse ? true : false);

			this.el.find('.siblings, .spouse').css({
				height: personHeight
			}).children('.inner').each(function() {
				$(this).css({
					'margin-top': (personHeight - $(this).height()) / 2
				})
			});

			x = (this.el.find('.parents').width() / 2).toHalf();
			y = this.el.height();
			y = (y / 2).toHalf() * 2;

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

			if (!hasFather || !hasMother) {
				ctx.moveTo(x, 36);
				ctx.lineTo(x, 13.5);
				!hasFather && ctx.lineTo(x - 40, 13.5);
				ctx.moveTo(x, 13.5);
				!hasMother && ctx.lineTo(x + 40, 13.5);
			}

			if (!spouse) {
				ctx.moveTo(x - 90, y / 2);
				ctx.lineTo(x - 140, y / 2);
			}

			ctx.moveTo(x - 40, y - 13.5);
			ctx.lineTo(x + 40, y - 13.5);
			ctx.moveTo(x, y - 13);
			ctx.lineTo(x, y - 36);

			ctx.moveTo(x + 90, y / 2);
			ctx.lineTo(x + 110, y / 2);
			ctx.moveTo(x + 140, y / 2 - 22);
			ctx.lineTo(x + 110, y / 2 - 22);
			ctx.lineTo(x + 110, y / 2 + 22);
			ctx.lineTo(x + 140, y / 2 + 22);

			ctx.stroke();

			$('body').animate({
				scrollLeft: personOffset.left + personWidth / 2 - $(window).width() / 2,
				scrollTop: personOffset.top + personHeight / 2 - $(window).height() / 2
			});
			TREE.debug && console.log(personOffset.top, personHeight);

		},

		edit: function(e) {
			var person = $(e.currentTarget).closest('.person'),
				offset = person.offset();
			TREE.popups.collection.personal.render({
				type: 'edit',
				person: json.users[person.data('id')],
				offset: [offset.left + person.outerWidth() + 10, offset.top]
			});
		},

		add: function(e) {
			var tar = $(e.currentTarget),
				person = this.el.children('.person'),
				offset = person.offset();
			if (tar.hasClass('add-parent')) {
				TREE.popups.collection.personal.render({
					type: 'add',
					role: 'parent',
					header: 'Добавить родителя',
					person: {
						id: person.data('id'),
						sex: tar.hasClass('alt') ? 'w' : 'm',
						fname: '',
						lname: '',
						alias: '',
						invite: '',
						birthday: null,
						death: null,
						send_invite: null,
						email: ''
					},
					offset: [offset.left + person.outerWidth() + 10, offset.top]
				});
			} else if (tar.hasClass('add-child')) {
				TREE.popups.collection.personal.render({
					type: 'add',
					role: 'child',
					header: 'Добавить ребёнка',
					person: {
						id: person.data('id'),
						sex: tar.hasClass('alt') ? 'w' : 'm',
						fname: '',
						lname: '',
						alias: '',
						invite: '',
						birthday: null,
						death: null,
						send_invite: null,
						email: ''
					},
					offset: [offset.left + person.outerWidth() + 10, offset.top]
				});
			} else if (tar.hasClass('add-spouse')) {
				TREE.popups.collection.personal.render({
					type: 'add',
					role: 'spouse',
					header: 'Добавить супруга(у)',
					person: {
						id: person.data('id'),
						sex: tar.hasClass('alt') ? 'w' : 'm',
						fname: '',
						lname: '',
						alias: '',
						invite: '',
						birthday: null,
						death: null,
						send_invite: null,
						email: ''
					},
					offset: [offset.left + person.outerWidth() + 10, offset.top]
				});
			} else if (tar.hasClass('add-sibling')) {
				TREE.popups.collection.personal.render({
					type: 'add',
					role: 'sibling',
					header: 'Добавить сиблинга',
					person: {
						id: person.data('id'),
						sex: tar.hasClass('alt') ? 'w' : 'm',
						fname: '',
						lname: '',
						alias: '',
						invite: '',
						birthday: null,
						death: null,
						send_invite: null,
						email: ''
					},
					offset: [offset.left + person.outerWidth() + 10, offset.top]
				});
			}
		},

		hide: function(e) {
			TREE.popups.collection.personal.hide();
			TREE.popups.view.prototype.hide.call(this, e);
		},

		remove: function(e) {
			var person = $(e.currentTarget).closest('.person');
			if (confirm('Вы уверены, что хотите удалить человека из дерева?')) {
				TREE.api.updatePerson({
					'type_request': 'del',
					'user_id': person.data('id')
				});
			}

		}

	}),

	personal: TREE.popups.view.extend({

		el: TREE.tmpl.popup({
			header: 'Редактирова личную информацию'
		}).appendTo('body'),

		tmpl: _.template($('#personal-tmpl').html()),

		initialize: function() {
			this.el.on('click', '.save', $.proxy(this, 'save'));
			this.el.on('change', '[name=dead]', $.proxy(this, 'toggleDead'));
		},

		render: function(options) {
			options.header && this.el.children('.header').text(options.header);
			this.el.css({
				left: options.offset[0],
				top: options.offset[1]
			});
			this.$('.content').html(this.tmpl(options.person));
			this.show();
			this.type = options.type;
			this.role = options.role;
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
			if (this.role === 'parent') this.role = inp.filter('[name=sex]:checked').val() === 'm' ? 'father' : 'mother';
			if (this.role === 'spouse') this.role = inp.filter('[name=sex]:checked').val() === 'm' ? 'husband' : 'wife';
			if (this.role === 'sibling') this.role = inp.filter('[name=sex]:checked').val() === 'm' ? 'brother' : 'sister';
			return {
				type_request: this.type,
				role: this.role || '',
				user_id: inp.filter('[name=id]').val(),
				sex: inp.filter('[name=sex]:checked').val(),
				fname: inp.filter('[name=fname]').val(),
				lname: inp.filter('[name=lname]').val(),
				alias: inp.filter('[name=alias]').val(),
				birthday: inp.filter('[name=birthyear]').val() + '-' + inp.filter('[name=birthmonth]').val() + '-' + inp.filter('[name=birthdate]').val(),
				death: inp.filter('[name=dead]').is(':checked') ? inp.filter('[name=deathyear]').val() + '-' + inp.filter('[name=deathmonth]').val() + '-' + inp.filter('[name=deathdate]').val() : null,
				send_invite: inp.filter('[name=invite]').is(':checked') ? '1' : null,
				email: inp.filter('[name=email]').val()
				//file: $("#file").val()
			}
		},

		save: function() {
			!this.$('.save').hasClass('sub') && TREE.api.updatePerson(this.serialize());
			this.$('.save').addClass('sub');
		},

		toggleDead: function(e) {
			var field = $(e.target).closest('.field'),
				inp = field.find('[type=text], select');
			$(e.target).is(':checked') ? inp.removeAttr('disabled') : inp.attr('disabled', 'disabled');
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