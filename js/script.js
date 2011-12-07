$(document).ready(function(){

	$('.profil_mn .p_link').toggle(function(e){
		e.preventDefault();
		$(this).addClass('active');
		$(this).parent().find('div.p_mn').slideDown();
	},function(e){
		e.preventDefault();
		$(this).removeClass('active');
		$(this).parent().find('div.p_mn').slideUp();
	});
	
	$('.head .menu li:last').addClass('last');
	$('.head .menu li:last').prev().addClass('lang');
	$('.steps li:last').css({'margin-right':'0','padding-right':'0','background':'none'});
	$('.friends_list li:last').css({'border':'0'});
	$('.step li:last').css({'margin-bottom':'0','padding-bottom':'0','border':'0'});
	$('.comments li div.comment_text:first').css({'padding-top':'0','border':'0'});
	$('.buttons select:last').css({'margin-right':'0'});
	
	//WINDOW
	$('#reg').click(function(e){
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('#no_reg_w').css("top", scrOfY + 50 + 'px').fadeIn();
		e.preventDefault();
	});
	$('.window .close').click(function(e){
		$('#popup').fadeOut(300);
		$('.window').hide();
		e.preventDefault();
	});
	$('#add_group_link').click(function(e){
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('#add_group').css("top", scrOfY + 50 + 'px').fadeIn();
		e.preventDefault();
	});
	$('#edit_group_link').click(function(e){
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('#edit_group').css("top", scrOfY + 50 + 'px').fadeIn();
		e.preventDefault();
	});
	$('.msg_list li').click(function(e){
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('#add_user_w').css("top", scrOfY + 50 + 'px').fadeIn();
		e.preventDefault();
	});
	$('#add_msg, #add_msg_l').click(function(e){
		$('#ajaxframe').attr('src','user_messages_new.php');
		$('#add_msg_b').html('');
		//v = $('').html();
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('#add_msg_w').css("top", scrOfY + 50 + 'px').fadeIn();
		$('#ajaxframe').load(function() {
			$('#add_msg_b').html($("#ajaxframe").contents().find("#form_div").html());
			//$('#add_msg_w').css("top", scrOfY + 50 + 'px').fadeIn();
			e.preventDefault();
		});
		return false;
	});	
	$('#add_event').click(function(e){
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('#add_event_w').css("top", scrOfY + 50 + 'px').fadeIn();
		e.preventDefault();
	});
	$('#save_tree').click(function(e){
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('#add_meropriatie_w').css("top", scrOfY + 50 + 'px').fadeIn();
		e.preventDefault();
	});
	$('#print').click(function(e){
		var hO = $('#print_tree_w').height();
		var scrOfY = src();
		$('#popup').height(hO + scrOfY + 100).css('opacity','0.6').show();
		$('#print_tree_w').css("top", scrOfY + 50 + 'px').fadeIn();
		e.preventDefault();
	});
	$('#send_gift').click(function(e){
		var scrOfY = src();
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		$('#send_gift_w').css("top", scrOfY + 50 + 'px').fadeIn();
		e.preventDefault();
	});
	
	function src(){
        scrOfY = 0;
       if( typeof( window.pageYOffset ) == 'number' ) {
               //Netscape compliant
               scrOfY = window.pageYOffset;
       } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
               //DOM compliant
               scrOfY = document.body.scrollTop;
       } else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
               //IE6 Strict
               scrOfY = document.documentElement.scrollTop;
       }
	   return scrOfY;
	}
	
	$('.friend_list_w li').toggle(function(){
		$(this).addClass('check');
	},function(){
		$(this).removeClass('check');
	});
	
	// FORMS
	if ($('#death label input').attr('checked')==true){
		$(this).parent().parent().children('select').removeAttr('disabled');
	}else{
		$(this).parent().parent().children('select').attr('disabled','disabled');
	}
	$('#death label input').click(function(){
		if ($(this).attr('checked')==true){
			$(this).parent().parent().children('select').removeAttr('disabled');
		}else{
			$(this).parent().parent().children('select').attr('disabled','disabled');
		}
	});
	$('.input input, .input textarea').focus(function(){
		$(this).css('color','#000000');
	});
	$('.input input, .input textarea').blur(function(){
		$(this).css('color','#7f7f7f');
	});
	
	// friend_list
	$('.friend_list li').each(function(i){
		if(i%4==3)$(this).css('margin-right','0');
	});
	
	//CALENDAR
	$('.calendar .days div.day').each(function(i){
		if(i%7==6){
			$(this).css('width','97px');
			if($(this).children('span').text().length > 0){
				$(this).addClass('hol');
			}
		}
		if(i%7==0 && $(this).children('span').text().length > 0){
			$(this).addClass('hol');
		}
	});
	$('.calendar .week span').each(function(i){
		if(i%7==6)$(this).css('width','99px');
	});
	
	// GALLERY
	$('.step li.st:first').height(300);
	$('.plan_big #p1').slideDown(400);
	$('.plan_sm a:not(.plan_sm a:first)').css('opacity','0.5');
	$('.plan_sm a').click(function(e){
		$('.plan_sm a').css('opacity','0.5');
		var id = $(this).attr('id').replace(/sm/,'');
		$(this).css('opacity','1');
		$('.plan_big .plan_c').slideUp(400);
		$('.plan_big #p'+id).slideDown(400);
		e.preventDefault();
		$('.plan_sm a').removeClass('active');
		$(this).addClass('active');
	});

	$(".plan_sm a").hover(function(){
		if($(this).attr('class')!='active'){
			$(this).stop().fadeTo('normal',"1");
		}
	},function(){
		if($(this).attr('class')!='active'){
			$(this).stop().fadeTo('normal',"0.5");
		}
	});
	
	$('.visitka_list li').each(function(i){
		if(i%4==3)$(this).css('padding-right','0');
	});
	/////////////////////////
	
	$('.head .top li:last,.action li:last').css({'margin-right':'0','padding-right':'0','background':'none'});
	$('.mn_block .menu li:first').addClass('first');
	$('.mn_block .menu li:last').addClass('last');
	$('.mn_block .menu li:first').next().children('a').css('padding-left','0');
	$('.list_news li:odd').css('margin-right','0');
	$('#footer ul li:last').css('margin-right','0');
	
	// GALLERY
	$('.photo .small a:not(.photo .small a:first)').css('opacity','0.5');
	$('.photo .small a').click(function(e){
		$('.photo .small a').css('opacity','0.5');
		$(this).css('opacity','1');
		var src = $(this).attr('href');
		//$('.photo .big img').hide();
		//$('.photo .big img').fadeTo(0.5);
		//$('.photo .big img').css({'opacity':'0.5'},200);
		$('.photo .big img').attr('src',src);
		$('.photo .big img').load(function(){
			$('.photo .big img').animate({'opacity':'1'},200);
		});
		src = '';
		e.preventDefault();
		$('.photo .small a').removeClass('active');
		$(this).addClass('active');
	});

	$(".photo .small a").hover(function(){
		if($(this).attr('class')!='active'){
			$(this).stop().fadeTo('normal',"1");
		}
	},function(){
		if($(this).attr('class')!='active'){
			$(this).stop().fadeTo('normal',"0.5");
		}
	});
	
	//select color
	var backg = '';
	$("#color option").each(function(i){
		if ($(this).attr('selected')==true){
			backg = $(this).attr('style');
		}
	});
	$('#color').attr('style',backg);
	$("#color").change(function(){
		var backg = '';
		$("#color option").each(function(i){
			if ($(this).attr('selected')==true){
				backg = $(this).attr('style');
			}
		});
		$(this).attr('style',backg);
	});
	
	// KARUSEL MAIN
	var indexLi = $('.jscroller2_left .onePart');
	var indexLiLeft = $('.jscroller2_left_endless .onePart');
	var widthIndex = 0;
	var widthIndexL = 0;
	for(var i=0;i<indexLi.length; i++){
		var widthIndex = widthIndex + $(indexLi[i]).width();
	}
	for(var i=0;i<indexLiLeft.length; i++){
		var widthIndexL = widthIndexL + $(indexLiLeft[i]).width();
	}
	$('.jscroller2_left').css('width',widthIndex+'px');
	$('.jscroller2_left_endless').css('width',widthIndexL+'px');
	
	$('.mn_block .menu li a').hover(function(){
		$(this).parent().addClass('hover');	
	},function(){
		$(this).parent().removeClass('hover');	
	});

	// FAQ	
	$('.list_faq li a.q').toggle(function(e){
		e.preventDefault();
		$(this).parent().addClass('active');	
		$(this).parent().children('div.resp').slideDown(400);	
	},function(e){
		e.preventDefault();
		$(this).parent().removeClass('active');	
		$(this).parent().children('div.resp').slideUp(400);	
	});
	
	// KORZINA
	$('.col a.min').click(function(e){
		e.preventDefault();
		var val = parseInt($(this).parent().children('input').val());
		if(val>0){
			val = val-1;
			$(this).parent().children('input').val(val);
		}
	});
	$('.col a.add').click(function(e){
		e.preventDefault();
		var val = parseInt($(this).parent().children('input').val());
		val = val+1;
		$(this).parent().children('input').val(val);
	});
	
	$('.catalog ul li').each(function(i){
		if(i%3==2)$(this).css('padding-right','0');
	});
	
	
	// send requst frendship
	
	$('#add_to_fr').click(function(e){
		var username = $(this).attr('rel');
		var task_type = $(this).attr('rev');
		ajax_post('user_friends_manage.php', { task: task_type, user: username, ajax:1 }, 'add_to_fr_li');
		return false;
	});
	
	$('#lname').blur(function() {

		var fname = $('#fname').val();
		var lname = $('#lname').val();
		if (fname != '' || lname != '') {
			$('#prldr').html('<img src="/images/142.gif" border="0" />');
			existence_man(fname, lname);
		} else {
			
			$('#fuser').hide();
			
		}
	});
	
	$('#fname').blur(function() {

		var fname = $('#fname').val();
		var lname = $('#lname').val();
		if (fname != '' || lname != '') {
			$('#prldr').html('<img src="/images/142.gif" border="0" />');
			existence_man(fname, lname);
		} else {
			
			$('#fuser').hide();
			
		}
	});
	
	
	$('.friends_list .cancel').click(function() {
		var username = $(this).attr('rev');
		var r=confirm("you want to delete a user " + username);
		if (r==true) {
			
			var id = $(this).attr('rel');
			if ( username != '' ) {
				//alert('tut - ' + username);
				$.post( 'user_friends_manage.php',
						{task: 'cancel_do', user: username, ajax:1},
						function(data) {
							if (data.success == 1 && data.status == "remove" ) {
								alert(data.result);
								$('#frend_' + id).fadeOut();
							} else {
								alert('error');	
							}
						},
						'json'
				);
			}
		}
		return false;
	});
	
	$('.friends_list .del').click(function() {
		var username = $(this).attr('rev');
		var r=confirm("you want to delete a user " + username);
		if (r==true) {
			
			var id = $(this).attr('rel');
			if ( username != '' ) {
				//alert('tut - ' + username);
				$.post( 'user_friends_manage.php',
						{task: 'remove_do', user: username, ajax:1},
						function(data) {
							if (data.success == 1 && data.status == "add" ) {
								alert(data.result);
								$('#frend_' + id).fadeOut();
							} else {
								alert('error');	
							}
						},
						'json'
				);
			}
		}
		return false;
	});
	$('.friends_list .reject').click(function() {
		var username = $(this).attr('rev');
		var r=confirm("you want to reject a user " + username);
		if (r==true) {
			
			var id = $(this).attr('rel');
			if ( username != '' ) {
				//alert('tut - ' + username);
				$.post( 'user_friends_manage.php',
						{task: 'reject_do', user: username, ajax:1},
						function(data) {
							if (data.success == 1 && data.status == "remove" ) {
								alert(data.result);
								$('#frend_' + id).fadeOut();
							} else {
								alert('error');	
							}
						},
						'json'
				);
			}
		}
		return false;
	});
	
	$('.friends_list .add').click(function() {
		var username = $(this).attr('rev');
		var r=confirm("you want to add a user " + username);
		if (r==true) {
			
			var id = $(this).attr('rel');
			if ( username != '' ) {
				//alert('tut - ' + username);
				$.post( 'user_friends_manage.php',
						{task: 'add_do', user: username, ajax:1},
						function(data) {
							if (data.success == 1 && data.status == "remove" ) {
								alert(data.result);
								$('#frend_' + id).fadeOut();
							} else {
								alert('error');	
							}
						},
						'json'
				);
			}
		}
		return false;
	});
	
	$('#check_email').click(function() {
		var email = $('#email').val();
		email = $.trim(email);
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(email)) {
			alert('Please provide a valid email address');
		} else {
			$('#prldremail').html('<img src="/images/142.gif" border="0" />');
			existence_mail(email);
		}
		return false;
	});
});

	function existence_mail(email) {
		$('#email_u_msg').html('');
		$('#fuser_email').html('');
		$.post(	'unions_manager.php',
				{'mail': email, 'existence_mail':1},
				function(data) {
					if (data.success == 1) {
						$('#fuser_email').show();
						$('#email_u_msg').html(data.msg);
						$.each(data.users, function(key, value) {
						  $('#fuser_email').append('<option value="' + key + '">' + value + '</option>'); 
						});
					} else {
						$('#fuser_email').hide();
						$('#email_u_msg').html(data.msg);
					}
					$('#prldremail').html('&nbsp;');
				},
				'json');
	}	


	function existence_man(fname, lname) {
		$('#find_u_msg').html('');
		$('#fuser').html('');
		$.post(	'unions_manager.php',
				{'fname': fname, 'lname': lname, 'existence_man':1},
				function(data) {
					if (data.success == 1) {
						
						$('#fuser').show();
						$('#find_u_msg').html(data.msg);
						 $('#fuser').append('<option value="0">Это не те, добавить нового пользователя.</option>');
						$.each(data.users, function(key, value) {
						  $('#fuser').append('<option value="' + key + '">' + value + '</option>'); 
						});
						var c = $('#fuser option').size() - 1;
						$('#find_u_msg').append(' ('+ c + '):<br />');
					} else {
						$('#fuser').hide();
						$('#find_u_msg').html(data.msg);
					}
					$('#prldr').html('&nbsp;');
				} ,
				'json');
	}

	function ajax_post( url, param, id) {
		var r = false;
		$('#prel').html('<img src="/images/142.gif" border="0" />');
		//send with param to url
		$.post(
			url,
			param,
			function(data) {
				// if send requet -> ability recall
				// if frend > ability remove frend
				// if no frend && no send request -> ability send request
				// if you hav request -> ability confirm request or no confirm(to refuse) 
			
				if (data.success == 1) {
					$('#' + id + ' a').html(data.button);
					$('#prel').html(data.result);
					$('#add_to_fr').attr('rev', data.task);
					if (data.task == 'remove_do') {
						$('#preli').hide();
					}
					r = true;
				} else {
					$('#' + id).append('error');
				}
			} , 'json');
		return r;
	}
	
	function comment_post(user_name, owner_id, user_id, type_com, iden_com, tab_com, col_com) {
		var bat = 0
		if (bat == 0) {
			bat = 1;
			var txt = $('#comment_msg').val();
   			$.post( 'misc_js.php',
				       {task:'comment_post',
					type:''+type_com+'',
					iden:''+iden_com+'',
					value: ''+owner_id+'',
					tab:''+tab_com+'',
					col:''+col_com+'',
					user: '' + user_name + '',
					comment_body: '' + txt + ''},
					function(data) {
                                            
						if (data != null) {
							if (data.is_error == null) {
                                                            
								$('#comment_msg').val('');
								$('#comments_list').fadeOut();
								$('#comments_list').html('');
								comment_get('' + user_name + '', owner_id, user_id , type_com, iden_com, tab_com, col_com);
								$('#comments_list').fadeIn();
							} else {
								alert('error');
							}
						} else {
							alert('Неизвестная ошибка =()');
						}
					} ,
					'json');
			bat = 0
		}
	}

        	
	function comment_get (user_username, owner_id, user_id, type_com, iden_com, tab_com, col_com) {
		$.post( 'misc_js.php',
				{	task:'comment_get',
					user:''+user_username+'',
					object_owner:'',
					object_owner_id:'',
					type:''+type_com+'',
					iden:''+iden_com+'',
					value: ''+owner_id+'', 
					cpp:10, 
					p:1},
				function(data) {
					if (data != null) { 
						if (data.total_comments > 0 ) {
							//alert(data.comments);
							var str = '';
							$.each(data.comments, function(i, val) {
								//alert(i);
								var displayname = this.comment_authoruser_displayname;
								var url = this.comment_authoruser_url;
								var photo = this.comment_authoruser_photo;
								var author_id = this.comment_authoruser_id;
								var username = this.comment_authoruser_username;
								var msg = this.comment_body;
								var date = this.comment_date;
								str = str + '<li id="comment_li_'+i+'"><div class="comment_text"><a href="' + url + '">';
								str = str + '<img src="' + photo + '" alt="" /></a>';
								str = str + '<div class="inf"><a href="' + url + '" class="name">' + i + ' - ' + displayname + '[' + author_id + ']</a>';
								str = str + '<p id="comment_msg_'+i+'">' + msg + '</p>';
								str = str + '<div class="date">';
								if ( user_id == owner_id || author_id == user_id )
									str = str + '<a href="#" onclick="comment_del(\'' + user_username + '\', ' + i + ' , ' + author_id + ', '+ owner_id +', '+ user_id  +', \''+ type_com +'\',\''+ iden_com +'\',\''+ tab_com +'\',\''+ col_com +'\'); return false;" class="del">Удалить</a>';
								str = str + date;
								//str = str + '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">Комментировать</a>';
								str = str + '</div></div></div></li>';
								
							});
                                                       
							$('#comments_list').append(str);
                                                       
						}
                                               
                                                $('#comments_count').html('');
                                                 $('#comments_count').append(data.total_comments);
					} else {
						alert('Неизвестная ошибка =(');
					}
				},
				'json'
				);
	}
	
	function comment_del(author_username, com_id, author_id, owner_id, user_id, type_com, iden_com, tab_com, col_com) {
		var r=confirm("you want delete comment \r\n" + $('#comment_msg_'+com_id).html().trim());
		if (r==true) {

			$.post( 'misc_js.php',
					{	task:'comment_delete',
						user:''+author_username+'',
						comment_id: ''+com_id+'',
						type:type_com,
						iden:iden_com,
						value: ''+owner_id+'', 
						tab:tab_com,
						col:col_com},
					function(data) {
							if (data != null) { 
								if (data.is_error == false) {
									$('#comment_msg').val('');
									$('#comments_list').fadeOut();
									$('#comments_list').html('');
									comment_get('' + author_username + '', owner_id, user_id, type_com, iden_com,tab_com, col_com);
									$('#comments_list').fadeIn();
								} else {
									alert('error');
								}
							} else {
								alert('Ошибка доступа =(');
							}
						} ,
					'json')
		}
	}


    function delete_blog(task_blog,blogentry_id_b) {
		var r=confirm("Вы уверены, что хотите удалить эту запись ?  \r\n");
		if (r==true) {
			$.post( 'blog_ajax.php',
					{task:''+task_blog+'', blogentry_id:''+blogentry_id_b+''},
					function(data) {
						if (data != null) {
							if (data.result == 'success') {
								$('#blog_msg' + blogentry_id_b).fadeOut();
							} else {
								alert('error');
							}
						} else {
							alert('Ошибка доступа =(');
						}
					} ,
					'json')
		}
	}
	
	function delete_blog_link(){
		var r=confirm("Вы уверены, что хотите удалить эту запись ?  \r\n");
		return r;
	}
	
