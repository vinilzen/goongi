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
				if (res.error === "Ошибка" ) {
					alert(res.result);
				} else {
					window.location.replace(window.location.href.split('#')[0] + '#' + $(document).scrollLeft() + ',' + $(document).scrollTop());
					window.location.reload();
				}
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

	url: {
		image: function(id, photo) {
			return 'http://' + window.location.host + '/uploads_user/{0}/{1}/{2}'.format(Math.floor(id / 1000) * 1000 + 1000, id, photo)
		}
	},

	viewpoint: $('#viewpoint'),

	initialize: function() {

		this.tmpl.user(json.user).appendTo('#user .body');

		$('#user .toggle').click(this.toggleUserInfo);
		$('#user .print').click(this.print);

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

		$('img').load(function(e) {
			$(this).closest('.photo').removeClass('loading');
		});

	},

	render: function(options) {
		this.viewpoint.empty();
		var bw = this.renderFamilyBackward(json.user.id, this.viewpoint);
		var fw = this.renderFamilyForward(json.user.id, this.viewpoint).addClass('forward');
		this.viewpoint.width(_.max([bw.width(), fw.width()]));

		var merge = $('.person').filter(function() {
			return $(this).data('id') == json.user.id
		})

		if (merge.eq(0).offset().left > merge.eq(1).offset().left) {
			fw.css({
				left: merge.eq(0).offset().left - merge.eq(1).offset().left
			})
		} else {
			bw.css({
				left: merge.eq(1).offset().left - merge.eq(0).offset().left
			})
		}
		fw.css({
			top: merge.eq(0).offset().top - merge.eq(1).offset().top
		});
		merge.eq(1).css({
			visibility: 'hidden'
		});


		this.renderPathBackward();
		this.renderPathForward();
		if (window.location.hash) {
			var scroll = window.location.hash.replace('#', '').split(',');
			setTimeout(function() {
				$(document).scrollLeft(scroll[0]).scrollTop(scroll[1]);
			}, 100);
		} else {
			options && options.centering && this.centerView();
		}
	},

	renderFamilyForward: function(parentId, node) {
		var family = $('<span class="family" />').appendTo(node),
			parents = $('<div class="parents" />').appendTo(family),
			children = $('<div class="children" />').appendTo(family);
		this.tmpl.person(json.users[parentId]).appendTo(parents);
		this.tmpl.person(json.users[json.users[parentId].spouse]).appendTo(parents);

		_(json.users).chain().filter(function(user) {
			return user.father === parentId || user.mother === parentId
		}).each(function(child) {
			this.renderFamilyForward(child.id, children);
		}, this);
		return family
	},

	renderFamilyBackward: function(childId, node) {
		var family = $('<span class="family" />').appendTo(node),
			parents = $('<div class="parents" />').appendTo(family),
			children = $('<div class="children" />').appendTo(family);
		this.tmpl.person(json.users[childId]).appendTo(children);

		_(json.users).chain().filter(function(user) {
			return user.id === json.users[childId].father || user.id === json.users[childId].mother
		}).sortBy(function(user) {
			return user.id !== json.users[childId].father
		}).each(function(parent) {
			parent && this.renderFamilyBackward(parent.id, parents);
		}, this);
		return family
	},

	renderPathForward: function() {
		this.viewpoint.children('.family').eq(1).find('.family').andSelf().each(function() {

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

	renderPathBackward: function() {
		this.viewpoint.children('.family').eq(0).find('.family').andSelf().each(function() {

			var family = $(this),
				ctx = $('<canvas />').attr({
					width: family.width(),
					height: 478
				}).prependTo(family),
				children = family.children('.children').children(),

				parents = family.find('.person').filter(function() {
					return $(this).data('id') === children.data('father-id') || $(this).data('id') === children.data('mother-id')
				});

			ctx = ctx.getContext();
			ctx.strokeStyle = '#999';
			ctx.beginPath();

			var x, y, parentLink;

			if (parents.length) {
				switch (parents.length) {
				case 1:
					x = (family.outerWidth() / 2).toHalf();
					y = parents.outerHeight();
					ctx.moveTo(x, y);
					ctx.lineTo(x, y + 30.5);
					parentLink = [x, y + 30.5];
					break;
				case 2:
					x = [parents.eq(0).offset().left + parents.eq(0).width() - family.offset().left, parents.eq(1).offset().left - family.offset().left];
					y = parents.eq(0).outerHeight();
					ctx.moveTo(x[0], y / 2);
					ctx.lineTo(x[1], y / 2);
					parentLink = [((x[1] - x[0]) / 2 + x[0]).toHalf(), y / 2];
					break;
				}

				children.each(function() {
					x = $(this).offset().left - family.closest('.family').offset().left + $(this).outerWidth() / 2 + .5;
					y = $(this).offset().top;
					ctx.moveTo(x, parentLink[1]);
					ctx.lineTo(x, parentLink[1] + $(this).offset().top - family.closest('.family').offset().top);
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

	print: function() {
		var print = $('#print_tree_w', top.document);
		$('#popup', top.document).height(print.height() + top.src() + 100).css('opacity','0.6').show();
		print.css("top", top.src() + 50 + 'px').fadeIn();
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
			personClone.find('.photo').toggleClass('loading', person.find('.photo').hasClass('loading'));
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
						death_bool: null,
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
						death_bool: null,
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
						death_bool: null,
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
						death_bool: null,
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
			this.el.on('change', '[name=invite]', $.proxy(this, 'toggleInvite'));
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
				death_b: inp.filter('[name=dead]').is(':checked') ? 1 : null,
				email: inp.filter('[name=email]').val()
				//file: $("#file").val()
			}
		},

		save: function() {
			var invite = this.$('[name=email]').val();
			if (!invite || /^\w.+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(invite)) {
				!this.$('.save').hasClass('sub') && TREE.api.updatePerson(this.serialize());
				this.$('.save').addClass('sub');
			} else {
				alert('Неверный e-mail');
			}
		},

		toggleDead: function(e) {
			$(e.target).is(':checked') ? $('#deathmonth, #deathyear, #deathdate').removeAttr('disabled') : $('#deathmonth, #deathyear, #deathdate').attr('disabled', 'disabled');
		},

		toggleInvite: function(e) {
			$(e.target).is(':checked') ? $('#email').removeAttr('disabled') : $('#email').attr('disabled', 'disabled');
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