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

 $(document).ready(function(){

	$(function() {
		$( "#event_date_start, #event_date_end" ).datepicker();
		$( "#event_date_start, #event_date_end" ).datepicker( "option", "dateFormat", 'dd.m.yy' );
		$( "#event_date_start, #event_date_end" ).datepicker( "option", "dayNamesMin", ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'] );
		$( "#event_date_start, #event_date_end" ).datepicker( "option", "dayNames", ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'] );
		$( "#event_date_start, #event_date_end" ).datepicker( "option", "monthNames", ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь']);
	});

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
	
        $('.b_bg').height($('#content').height()).css('opacity','0.95').show();
	//WINDOW
	$('#reg').click(function(e){
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('#no_reg_w').css("top", scrOfY + 50 + 'px').fadeIn();
		e.preventDefault();
	});
	$(".window .close").live("click", function (e) {
		$('#popup').fadeOut(300);
		$('.window').hide();
		e.preventDefault();
	});
	$(".window #cancel").live("click", function (e) {
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

        $('.d_inf .golosa label a').click(function(e){
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('#svecha_list').css("top", scrOfY + 50 + 'px').fadeIn();
		e.preventDefault();
	});
        
	
	$('#add_event').click(function(e){
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('.only_mer').hide();
		$('#add_meropriatie_w h1').html($('#add_event input').val());
		$('#event_eventcat_id').val(1);
		$('#add_meropriatie_w').css("top", scrOfY + 50 + 'px').fadeIn();
		e.preventDefault();
	});
	
	$('#add_action').click(function(e){
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('.only_mer').show();
		$('#event_eventcat_id').val(2);
		$('#add_meropriatie_w h1').html($('#add_action input').val());
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
	
	$('.friend_list_w li').live('click', function() {
		if ($(this).attr('class') == 'check')
			$(this).removeClass('check');
		else
			$(this).addClass('check');
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
		ajax_post('user_friends_manage.php', {task: task_type, user: username, ajax:1}, 'add_to_fr_li');
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
		//var r=confirm("you want to add a user " + username);
                var r=confirm("Вы хотите добавить пользователя " + username + "?");
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
	
	
	$('.memb_cancel').click(function() {
		var id = $(this).attr('rel');
		var event_id = $('#edit_event').attr('rel');
		var r=confirm("Вы действительно хотите отозвать приглашение?");
		if (r==true) {
			
			$.post( 'event_ajax.php',
					{'task': 'eventmembercancel','event_id': event_id	,'user_id':id},
					function  (data){
						if (data.result == true){
							alert('Приглашение отклонено.');
							location.href='user_event_edit_members.php?event_id='+event_id;
						} else {
							alert(data.error);
						}
					},
					'json'
			);
		} else {
			return false;
		}
	})
	
	$('.memb_del').click(function() {
		var id = $(this).attr('rel');
		var event_id = $('#edit_event').attr('rel');
		var r=confirm("Вы действительно хотите удалить пользователя из этого мероприятия?");
		if (r==true) {
			
			$.post( 'event_ajax.php',
					{'task': 'eventmemberdelete','event_id': event_id	,'user_id':id},
					function  (data){
						if (data.result == true){
							alert('Пользователь успешно удалено.');
							location.href='user_event_edit_members.php?event_id='+event_id;
						} else {
							alert(data.error);
						}
					},
					'json'
			);
		} else {
			return false;
		}
	})
	
	$('#event_del').click(function() {
		var id = $(this).attr('rel');
		var r=confirm("Вы действительно хотите удалить это событие?");
		if (r==true) {
			
			$.post( 'event_ajax.php',
					{'task': 'eventdelete',
						'event_id': id},
					function  (data){
						if (data.result == true){
							alert('Событие успешно удалено.');
							location.href='user_event.php';
						} else {
							alert(data.error);
						}
					},
					'json'
			);
		} else {
			return false;
		}
	})
	
	$('#add_event_submit').click(function() {
		var event_title = $('#event_title').val();
		var event_desc = $('#event_desc').val();
		var event_host = $('#event_host').val();
		var event_location = '';
		
		var event_date_start = $('#event_date_start').val();
		var event_time_start = $('#event_time_start').val();
		var event_date_end = $('#event_date_end').val();
		var event_time_end = $('#event_time_end').val();
		
		var event_eventcat_id = $('#event_eventcat_id').val();
		var event_eventsubcat_id = 0;
		var event_invite = $('#event_invite').val();
		var event_inviteonly = $('#event_inviteonly').val();
		var event_search = $('#event_search').val();
		var event_privacy = $('#event_privacy').val();
		var event_comments = $('#event_comments').val();
		var event_upload = $('#event_upload').val();
		var event_tag = '';
		$.post( 'user_event_add.php',
				{'task': 'doadd',
					'event_title': event_title,
					'event_desc': event_desc,
					'event_host': event_host,  // где
					
					'event_date_start' : event_date_start,
					'event_time_start' : event_time_start,
					'event_date_end' : event_date_end,
					'event_time_end' : event_time_end,					
					
					'event_eventcat_id': event_eventcat_id,  // событие или мероприятие
					'event_eventsubcat_id': event_eventsubcat_id,
					'event_invite': event_invite,
					'event_inviteonly': event_inviteonly,
					'event_search':event_search,
					'event_privacy':event_privacy,
					'event_comments':event_comments,
					'event_upload':event_upload,
					'event_tag':event_tag,
					'ajax':1},
				function(data) {
					if (data.error == 0) {
						alert(data.result);
						$('#popup').fadeOut(300);
						$('.window').hide();
						location.href='user_event.php';
					} else {
						alert('error ' + data.result);
					}
				},
				'json'
		);
	
	})
	
	$(".cancel_edit_group").live("click", function (e) {
		$('#popup').fadeOut(300);
		$('.window').hide();
		e.preventDefault();
	})


 $('a.add_gif').live("click", function () {
            var id_value ='';
            id_value = $(this).attr('id');
             var options;
             var vars = {}, hash;
            var hashes = decodeURIComponent(window.location.href).slice(window.location.href.indexOf('?') + 1).split('&');

            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars[hash[0]] = hash[1];
            }
         
           if ((vars['displayname'] == '') || (!vars['displayname']))
           vars['displayname'] ='Введите имя и фамилию';
           
         
             $('#popup').height($('#content').height()).show();
              var scrOfY = src();
            $('body').append( '<div class="window rezina" id="add_msg_w_g">'+
                      '<div class="close"></div>'+
                      '<div class="w_t" id = "w_t">'+
                      '<h1>Отправить подарок</h1>'+
                      '</div>'+
                      '<div class="w_c">'+
                      '<div class="form add_w_g" id="add_msg_b_g">'+
                      '</div>'+
                      '</div>'+
                      '<div class="w_b"></div>'+
                '</div>');
                $('#add_msg_b_g').html('');
                $.post( 'mf_gifts_send_message.php',
                           {'task': 'show_gif'},
                            function(data) {
                    if ( data.is_error == '0') {

                         $('#add_msg_w_g').show();
                          $('#add_msg_b_g').append(
                                          '<div style="float:left;width:144px; margin-right:6px; overflow:hidden;">'+
                                          '<div id= "picture_gif"></div>'+
                                          '</div>'+
                                          '<div class="input gif"><label>Получатель<!-- {lang_print id=790} кому --></label>'+
                                           '<div class="gif"><input onfocus="if (this.value == \'Введите имя и фамилию\') this.value =\'\'; if (this.value == \'Введите имя и фамилию\')  this.style.color=\'#000\';"  onblur="if (this.value == \'\') this.value=\'Введите имя и фамилию\'; if (this.value == \'\')  this.style.color=\'#7f7f7f\';" value="'+vars['displayname']+'"  type="text" name="to_display" id="to_display" />'+
                                           ' </div></div>'+
                                    '<div class="clear"></div>'+
                                    '<div class="input">'+
                                    '<textarea onfocus="if (this.value == \'Пожалуйста, напишите сообщение\') this.value =\'\'; if (this.value == \'Пожалуйста, напишите сообщение\') this.style.color=\'#000\';" onblur="if (this.value == \'\') this.value=\'Пожалуйста, напишите сообщение\'; if (this.value == \'\') this.style.color=\'#7f7f7f\';"   rows=\'3\' cols=\'10\' id="message" name="message">Пожалуйста, напишите сообщение</textarea></div>'+
                                    '<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input onClick = "my_sender_gif(); return false;"  type="submit" class="button" value="Отправить" /></span><span class="r">&nbsp;</span></span></div>'
	                                                );
                       
                          options = {serviceUrl:'users.php'};
                          $('#to_display').autocomplete(options);
                          $("#picture_gif").html('<img  src=\'mf_gifts/'+id_value+'.\' ><iput type = "hidden" id = "id_g" value ='+id_value+' >');
                      }
                   if (data.error == '1') {
                           alert( data.result);
                    }

            },
            'json');
             return false;
  })
     
        $('#add_msg, #add_msg_l').live("click", function () {
            var options;
        var hoverText = $(this).attr("title");
        if (hoverText == '' || (!hoverText))
           hoverText="Введите имя и фамилию";
             $('#popup').height($('#content').height()).show();
              var scrOfY = src();
            $('body').append( '<div class="window rezina" id="add_msg_w">'+
                      '<div class="close"></div>'+
                      '<div class="w_t" id = "w_t">'+
                      '<h1>Написать сообщение</h1>'+
                      '</div>'+
                      '<div class="w_c">'+
                      '<div class="form add_w" id="add_msg_b">'+
                      '</div>'+
                      '</div>'+
                      '<div class="w_b"></div>'+
                '</div>');
                $('#add_msg_b').html('');
                $.post( 'user_messages_new.php',
                           {'task': 'show_f'},
                            function(data) {
                    if ( data.is_error == '0') {
                          $('#add_msg_w').show();
                          $('#add_msg_b').append(
                                           '<div class="input"><label>Имя и фамилия<!-- {lang_print id=790} кому --></label>'+
                                               '<input onfocus="if (this.value == \'Введите имя и фамилию\') this.value =\'\'; if (this.value == \'Введите имя и фамилию\')  this.style.color=\'#000\';"  onblur="if (this.value == \'\') this.value=\'Введите имя и фамилию\'; if (this.value == \'\')  this.style.color=\'#7f7f7f\';" value="'+hoverText+'";type="text" name="to_display" id="to_display" />'+
                                           ' </div>'+
                                   
                                       '<div class="clear"></div>'+
                                    '<div class="input">'+
'                                   <textarea onfocus="if (this.value == \'Пожалуйста, напишите сообщение\') this.value =\'\'; if (this.value == \'Пожалуйста, напишите сообщение\') this.style.color=\'#000\';" onblur="if (this.value == \'\') this.value=\'Пожалуйста, напишите сообщение\'; if (this.value == \'\') this.style.color=\'#7f7f7f\';"   rows=\'3\' cols=\'10\' id="message" name="message">Пожалуйста, напишите сообщение</textarea></div>'+
                                    '<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input onClick = "my_sender(); return false;"  type="submit" class="button" value="Отправить" /></span><span class="r">&nbsp;</span></span></div>'
	                                                );
                          options = {serviceUrl:'users.php'};
                          $('#to_display').autocomplete(options);
                       
                      }
                   if (data.error == '1') {
                           alert( data.result);
                    }

            },
            'json');
             return false;
  })
	
        
         $('#invite').live("click", function () {
            $('#popup').height($('#content').height()).show();
            var scrOfY = src();
            $('body').append( '<div class="window rezina" id="invite_show">'+
                      '<div class="close"></div>'+
                      '<div class="w_t">'+
                      '<h1>Пригласите ваших друзей</h1>'+
                      '</div>'+
                      '<div class="w_c">'+
                      '<div class="form invite_show" id="invite_show_b">'+
                      '</div>'+
                      '</div>'+
                      '<div class="w_b"></div>'+
                '</div>');
            $('#invite_show_b').html('');
			$.post( 'invite.php',
				{'json': 1},
				function(data) {
                    if ( data.error == '0') {
                         $('#invite_show').show();
                          $('#invite_show_b').append('<div id="form_auth">'+
                                                     '<div class="input">'+
                                                     '<label>Получатель</label>'+
                                                     '<input type = "text" name="invite_emails" id="invite_emails" rows=\'2\' cols=\'45\'  onfocus="if (this.value == \'Введите электронную почту\') this.value =\'\';this.style.color=\'#7f7f7f\';" onblur="if (this.value == \'\') this.value=\'Введите электронную почту\';this.style.color=\'#7f7f7f\';"  value = "Введите электронную почту" color=\'#7f7f7f\';>'+
                                                     '</div>'+
                                                    '<div class="input">'+
                                                    '<textarea rows="3" cols="10" name="invite_message" id="invite_message" onfocus="if (this.value == \'Введите ваше сообщение\') this.value =\'\';this.style.color=\'#7f7f7f\';" onblur="if (this.value == \'\') this.value=\'Введите ваше сообщение\';this.style.color=\'#7f7f7f\';" >Введите ваше сообщение</textarea>'+
                                                     '</div>'+
                                                    '<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">'+
                                                     '<input type="submit" onClick = "my_invite(); return false;" value="Пригласить" name="send"  />'+
                                                      '</span><span class="r">&nbsp;</span></span>'+
                                                    '</div>'+
                                                      '<input type="hidden" name="task" value="doinvite">'
                                                );
                    }
					if (data.error == '1') {
                           alert( data.result);
                    }
            },
            'json');
             return false;
  })


    
	$("#edit_group_b").live("click", function () {
		$('#edit_group').remove();
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('body').append(	'<div class="window" id="edit_group"><div class="close"></div><div class="w_c">'+
							'<h1 id="title_edit_gr">редактировать группу </h1><p><strong>Выберите друзей</strong></p>'+
							'<ul class="friend_list_w"></ul>'+
							'<div class="buttons_w"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input type="submit" value="Сохранить" name="creat" id="save_group" /></span><span class="r">&nbsp;</span></span>'+
							'<span class="button3"><span class="l">&nbsp;</span><span class="c"><input type="submit" value="Отменить" name="cancel_edit_group" class="cancel_edit_group" id="del_group" /></span><span class="r">&nbsp;</span></span></div></div></div>');
		$('.friend_list_w').html('');	
		$.post(	"user_friends.php",
				{'json': 1,'task':'get_friends'},
				function(data) {
					if ( data.error == '0') {
						var group_id_curent = $('#edit_group_b').attr('rel');
									
						$('#title_edit_gr').append( $('#group_'+group_id_curent).html() );
						$.each(data.result, function(key, value) {		
							//var photo = value['user_photo'].replace(/(\w+)\.jpg/, "$1"+"_thumb.jpg");
							userid = key;
							subdir = Math.floor(Math.floor(userid / 1000) * 1000 + 1000);
							if (value['user_photo'] != '') {
								userdir = './uploads_user/'+subdir+ '/' + userid+ '/' + value['user_photo'];
							} else {
								if (value['user_sex'] == 'm')
									userdir ='./images/avatars_15.gif'
								else
									userdir ='./images/avatars_17.gif'
							}
							if ($('#frend_'+key).attr('class') != '') {
								var str = $('#frend_'+key).attr('class');
								regexp = "group_"+group_id_curent;
								idx = str.search(regexp)
								if (idx != -1) 
									var check = 'class="check"';
								else 
									var check = '';
							} else {
								var check = '';
							}
							$('.friend_list_w').append('<li '+check+' rel="'+key+'"><a href="#"><img width="51" height="52" src="'+userdir+'" /></a><a href="/'+value['user_username']+'">'+value['user_displayname']+'</a></li>');
						});
						$('#edit_group').fadeIn();
						
						$('#save_group').click(function() {
							var users = [];
							$(".friend_list_w li").each(function(){
								
								if ($(this).attr('class') == 'check') {
									users[users.length] = $(this).attr('rel');
								}
							 });
							 $.post(	"user_friends.php",
										{'json': 1,'task': 'save_group','group': group_id_curent, 'users':users},
										function(data_save) {
											if ( data_save.error == '0') {
												location.href='user_friends.php';
											}
											if ( data_save.error == '1') {
												alert('error');
											}
										},'json')
						});
					}
					if (data.error == '1') {
						alert( data.result);
					}
				},
				'json');
		

	})
	
	$("#selevt_for_invite").live("click", function () {
		$('#edit_group').remove();	
		$('#popup').height($('#content').height()).css('opacity','0.6').show();
		var scrOfY = src();
		$('body').append(	'<div class="window" id="edit_group"><div class="close"></div><div class="w_c">'+
							'<h1 id="title_edit_gr">Пригласить на мероприятие</h1><p><strong>Выберите друзей</strong></p>'+
							'<ul class="friend_list_w"></ul>'+
							'<div class="buttons_w"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input type="submit" value="Принласить" name="creat" id="send_invite" /></span><span class="r">&nbsp;</span></span><span id="prldre"></span>'+
							'<span class="button3"><span class="l">&nbsp;</span><span class="c"><input type="submit" value="Отменить" name="cancel_edit_group" class="cancel_edit_group" id="del_group" /></span><span class="r">&nbsp;</span></span></div></div></div>');
		$('.friend_list_w').html('');	
		$.post(	"user_friends.php",
				{'json': 1,'task':'get_friends'},
				function(data) {
					if ( data.error == '0') {
						var event_id_curent = $('#edit_event').attr('rel');
									
						//$('#title_edit_gr').append( $('#event_'+event_id_curent).html() );
						$.each(data.result, function(key, value) {
							//var photo = value['user_photo'].replace(/(\w+)\.jpg/, "$1"+"_thumb.jpg");
							userid = key;
							subdir = Math.floor(Math.floor(userid / 1000) * 1000 + 1000);
							if (value['user_photo'] != '') {
								userdir = './uploads_user/'+subdir+ '/' + userid+ '/' + value['user_photo'];
							} else {
								if (value['user_sex'] == 'm')
									userdir ='./images/avatars_15.gif'
								else
									userdir ='./images/avatars_17.gif'
							}
							var check = '';
							/*if ($('#frend_'+key).attr('class') != '' ) {	
								var str = $('#frend_'+key).attr('class');
								
								regexp = "group_"+group_id_curent;
								alert(str + '-' + regexp);
								idx = str.search(regexp);
								if (idx != -1) 
									var check = 'class="check"';
								else 
									var check = '';
							} else {
								var check = '';
							}*/
														
							$('.friend_list_w').append('<li '+check+' rel="'+key+'"><a href="#"><img width="51" height="52" src="'+userdir+'" /></a><a href="/'+value['user_username']+'">'+value['user_displayname']+'</a></li>');
							
						});
						$('#edit_group').fadeIn();
					
						$('#send_invite').click(function() {
							$('#prldre').html('<img src="/images/142.gif" border="0" />');
							var users = [];
							$(".friend_list_w li").each(function(){
								if ($(this).attr('class') == 'check') {
									users[users.length] = $(this).attr('rel');
								}
							 });
							 $.post(	"event_ajax.php",
										{'json': 1,'task': 'eventmemberinvite','event_id': event_id_curent, 'invites':users},
										function(data_save) {
											if ( data_save.result == true) {
												$('#prldre').html('Приглашение высланы.');
												location.href='user_event_edit_members.php?event_id='+event_id_curent;
											} else {
												$('#prldre').html('Ошибка.');
											}
										},'json')
						});
					}
					if (data.error == '1') {
						alert( data.result);
					}
				},
				'json');
		
	})
	
	
	
	$('#not_attend').click(function() {
		$('#prldr').html('<img src="/images/142.gif" border="0">');
		var event_id = $('#event_id').attr('rel');
		$.post(	"event_ajax.php",
				{'json': 1,'task': 'eventrsvp','event_id': event_id, 'event_rsvp':3},
				function(data_save) {
						if ( data_save.result ) {
							$(".att").removeClass('selected');
							$("#not_attend").addClass('selected');
						} else {
							alert('error');
						}
						$('#prldr').html('');
				},
				'json')
		return false;
	})
	
	$('#maybe_attend').click(function() {
		$('#prldr').html('<img src="/images/142.gif" border="0">');
		var event_id = $('#event_id').attr('rel');
		$.post(	"event_ajax.php",
				{'json': 1,'task': 'eventrsvp','event_id': event_id, 'event_rsvp':2},
				function(data_save) {
						if ( data_save.result ) {
							$(".att").removeClass('selected');
							$("#maybe_attend").addClass('selected');
						} else {
							alert('error');
						}
						$('#prldr').html('');
				},
				'json')
		return false;
	})
	
	$('#attend').click(function() {
		$('#prldr').html('<img src="/images/142.gif" border="0">');
		var event_id = $('#event_id').attr('rel');
		$.post(	"event_ajax.php",
				{'json': 1,'task': 'eventrsvp','event_id': event_id, 'event_rsvp':1},
				function(data_save) {
						if ( data_save.result ) {
							$(".att").removeClass('selected');
							$("#attend").addClass('selected');
						} else {
							alert('error');
						}
						$('#prldr').html('');
				},
				'json')
		return false;
	})
	
	$('#del_group').click(function() {
		var group_id_curent = $('#edit_group_b').attr('rel');
		$.post(	"user_friends.php",
					{'json': 1,'task': 'del_group','group': group_id_curent},
					function(data_save) {
						if ( data_save.error == '0') {
							location.href='user_friends.php';
						}
						if ( data_save.error == '1') {
							alert('error');
						}
					},'json')
		return false;
	});
	
	
	$(".gr_name").live("click", function () {
		var group_id = $(this).attr('rel');
		if (group_id > 0 ) {
			$('.friends_list li').hide();
			$('.group_' + group_id).show();
			$('.edit_group').show();
			$('#edit_group_b').attr('rel',group_id);
			
		} else {
			$('.friends_list li').show();
			$('.edit_group').hide();
		}
		return false;
	});
});

function createGroup() {
	$('#msg_gr').html('<img src="/images/96.gif" border="0" />');
	var go = 1;
	if (go == 1) {
		go = 0;
		$.post(	"user_add_group.php", 	
				{task: 'add' , gn: $('#group_name').attr('value')},
				function(data) {
					if ( data.success == '0') {
						$('#msg_gr').html(data.msg);
						go = 1;
					}
					if (data.success == '1') {
						$('#msg_gr').html(data.msg);
						setTimeout ( function() {
							$('#popup').fadeOut(300);
							$('.window').hide();
						}, 1000);
						location.href='user_friends.php';
						//update_group_list();
					}
				}
				, "json" 
		);
	}
}
function update_group_list() {

	$.post(	"user_add_group.php", 
			{task: 'update'},
			function(data) {
				if ( data.success == '0') {
					alert(data.msg);
					go = 1;
				}
				if (data.success == '1') {
					$('#user_groups').html(data.msg);
					$('#user_groups').append('<li class="last"><a href="#" class="gr_name" rel="0">Показать всех</a></li>');
				}
			}
			, "json" 
		);
}

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
		$.post(
			url,
			param,
			function(data) {			
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

        	
	function comment_get (user_username, owner_id, user_id, type_com, iden_com, tab_com, col_com,page_show) {
            var cp = 10;
			if (  type_com == 'blog') cp = 1000;
				$.post( 'misc_js.php',
				{task:'comment_get',
					user:''+user_username+'',
					object_owner:'',
					object_owner_id:'',
					type:''+type_com+'',
					iden:''+iden_com+'',
					value: ''+owner_id+'', 
					cpp:''+cp+'',
					p:''+page_show+''},
				function(data) {
					if (data != null) {
						if (data.total_comments > 0 ) {
							var str = '';
                            var paginator = '';
							$.each(data.comments, function(i, val) {
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
								str = str + '</div></div></div></li>';
								
							});
                            var  url_p  = '';
							if (  data.type == 'profile') url_p = 'profile.php';

							if (data.maxpage > 1) {
                                paginator = '<div class="pager">';
                                var s = data.p-1;
                                var p = data.p+1;
                               if(data.p != 1 )
                                   paginator = paginator+ '<a onclick = "change('+s+');" href="'+url_p+'?user='+user_username+'&pag_com='+s+'" class="prev"> Сюда</a>';
                                var cl ='';
                               for(var i=1;i<=data.maxpage; i++)
                               {
                                   if (data.p == i)   cl = 'class="active"'; else  cl = '';
                                 paginator = paginator+ '<a onclick = "change('+i+');" href="'+url_p+'?user='+user_username+'&pag_com='+i+'" '+cl+'>'+i+'</a>';
                              
                               }
                                if(data.p != data.maxpage ) paginator = paginator+ '<a onclick = "change('+p+');" href="'+url_p+'?user='+user_username+'&pag_com='+p+'" class="next">Туда</a>';
                                 paginator = paginator+ '</div></form>';
                            }
							$('#comments_list').html('');
                            $('#comments_list').append(str+paginator);
						} else {
							$('#comments_list').html('<p class="error">Здесь еще никто, ничего не писал.</p>');
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
					{task:'comment_delete',
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

	function delete_vizitka(task_vizitka,vizitkaentry_id_b) {
		var r=confirm("Вы уверены, что хотите удалить эту визитку? \r\n");
		if (r==true) {
			$.post( 'vizitki_ajax.php',
					{task:''+task_vizitka+'', vizitkientry_id:''+vizitkaentry_id_b+''},
					function(data) {
						if (data != null) {
							if (data.result == 'success') {
								$('#vizitka_' + vizitkaentry_id_b).fadeOut();
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


    function check_history(historyentry_id_b){
		$.post( 'history_ajax.php',
				{task:'update', historyentry_id:''+historyentry_id_b+''},
				function(data) {
					if (data != null) {
						if (data.result == 'success') {
                           window.location.href="user_history_entry.php?historyentry_id="+historyentry_id_b;}else
						   alert('Истроия рода редактируется '+ data.name_user+', попробуйте позже');
					}
				} ,
				'json')
	}

	function dateupdatenull(historyentry_id_b) {
		$.post( 'history_ajax.php',
			{task:'save_nulid', historyentry_id:''+historyentry_id_b+''},
			function(data) {
				if (data != null) {
					if (data.result == 'success') {
						if (data.status_user == '1') {
							url = '';
							str = '';
							url = "user_history_entry.php?historyentry_id="+data.historyentry_id_b;
							str = 'История была изменена <a href="' + url + '" target="_blank">посмотреть изменения</a>'
							$('#save_9').append(str);
						}
					}
				}
			} ,
			'json')
	}


	function candle_post(user_id,user_name, owner_id, user_photo) {
		$.post( 'misc_js.php',
				   {task:'candle_post',
									user_id: '' + user_id + '',
									user_name:''+user_name+'',
									owner_id:''+owner_id+'',
				user_photo:''+user_photo+''},
				function(data) {

					if (data != null) {
						if (data.is_error == 1) {
                                                $('#count_candle').html('');
                                                $('#count_candle').append(data.count);
						} else {
							alert(data.is_error);
						}
					} else {
						alert('Неизвестная ошибка =()');
					}
				} ,
				'json');
	}

function my_invite() {
  $.post(
    "invite.php",
    {invite_emails: $('#invite_emails').attr('value') , invite_message: $('#invite_message').attr('value'),task:'doinvite'},
    function(data) {
    $('#invite_show_b').html('<h1>' + data + '</h1>');
      setTimeout ( function() {
        $('#popup').fadeOut(300);
        $('.window').hide();
        //e.preventDefault();
      }, 1500);
    }
  );
}
function my_sender_gif() {
 var mes = $('#message').attr('value');
    if (mes == 'Пожалуйста, напишите сообщение')
        mes = '';
	$.post(
		"mf_gifts_send_message.php",
		{gift_id: $('#id_g').attr('value'), to: $('#to_display').attr('value'), subject: $('#subject').attr('value') , message: mes,task:'send', privateе:'0'},
		function(data) {
                     if ( data.is_error == '0') {
                        $('.w_t').html('<h3>' + data.result + '</h3>');
			$('#add_msg_b_g').html('');
			setTimeout ( function() {
				$('#popup').fadeOut(300);
				$('.window').hide();
                                 $('.w_t').html('<h1>Отправить подарок</h1>');
				//e.preventDefault();
			}, 1500);

		}
                   else {
                      if (data.result == 'Выберите пользователя из списка')
                      $('#to_display').val("");
                      alert( data.result);
                  }
	 },
        'json');
                          //      return false;
  }
  
function my_sender() {
    var mes = $('#message').attr('value');
    if (mes == 'Пожалуйста, напишите сообщение')
        mes = '';
	$.post(
		"user_messages_new.php",
		{task: 'send' , to: $('#to_display').attr('value'), subject: $('#subject').attr('value') ,message: mes},
		function(data) {
                      if ( data.is_error == '0') {
			//$('.w_t').hide();
                        $('#w_t').html('<h3>' + data.result + '</h3>');
			$('#add_msg_b').html('');
			setTimeout ( function() {
				$('#popup').fadeOut(300);
				$('.window').hide();
                                 $('#w_t').html('<h1>Написать сообщение</h1>');
                                  location.href='user_messages_view.php?pmconvo_id='+data.id+'#bottom';
				//e.preventDefault();
			}, 1500);
                       
		}
                   else {
                       if (data.result == 'Выберите пользователя из списка')
                      $('#to_display').val("");
                      alert( data.result);
                  }
	 },
        'json');
                          //      return false;
  }

   function print_tree(id){
   $.post(
		"my_tree.php",
		{task: 'print' ,id: id, tipe: $(":radio[name=type]").filter(":checked").val(), stil:$('#stil').val(), name: $('#name').val(),
                 title: $('#title').val(), inf: $('#inf').val(), level:$(":radio[name=po]").filter(":checked").val(),level_print:$(":radio[name=print]").filter(":checked").val()},
		function(data) {
                      if ( data.is_error == '0') {
                      $('#w_m').html('<h3>Заказ отправлен</h3>');
                      $('#w_c').hide();
			setTimeout ( function() {
				$('#popup').fadeOut(300);
				$('.window').hide();
                                 $('#w_c').show();
                               $('#w_m').html('');
                             }, 1500);

		}
                   else {
                      $('#to_display').val("");
                      alert( data.result);
                  }
	 },
        'json');
                          //      return false;
  }
  
function Show_piple(owner_id){
     //    $('.set_golos').click(function() {
             $('#svecha_list').remove();
    $('#popup').height($('#content').height()).css('opacity','0.6').show();
    //var scrOfY = src();
                $('body').append(
                                 '<div class="window" id="svecha_list">'+
                                 '<div class="close"></div>'+
                                 '<h1>Свечу памяти зажгло <span class="count_g"></span> человек</h1>'+
                                 '<div class="w_c">'+
                                 '<input type="hidden" name="user" id="user" value="{$owner->user_info.user_username}">'+
                                 '<ul class="friend_list h200">'+
                                 '</ul>'+
                                 '</div>'+
                                 '</div>');
                    $('.friend_list h200').html('');
                    $.post("misc_js.php",
        {'task':'candle_golosa', owner_id: '' + owner_id + ''},
        function(data) {
          if ( data.error == '0') {
                                            $('#svecha_list').show();
                                             $('.count_g').append(data.result.length);
                                             var userid;
                                             var subdir;
                                             var userdir;
                                          //    alert($('#user').value);
                                               $.each(data.result, function(key, value) {
                                                userid = value['user_candle_id'];
                                                subdir = Math.floor(Math.floor(userid / 1000) * 1000 + 1000);
                                                if (value['user_candle_photo'] != '_thumb')
                                                userdir = './uploads_user/'+subdir+ '/' + userid+ '/' + value['user_candle_photo']+'.jpg';
                                                else userdir ='./images/no_photo_thumb.gif'

                                            //    $('.friend_list').append('<li><a href="#"><img src="/uploads_user/1000/'+value['user_candle_id']+'/'+value['user_candle_photo']+'.jpg" alt="" /></a><a href="#">'+ value['user_candle_name']+'</a></li>');
                                                $('.friend_list').append('<li><a href="#"><img src='+userdir+' alt="" /></a><a href="#">'+ value['user_candle_name']+'</a></li>');
                                             });
                                    $('#svecha_list').fadeIn();
          }
          if (data.error == '1') {
            alert( data.result);
          }
        },
        'json');
                                return false;
  }

 function Show_city(country_id){
    // alert(country_id);
     $('#city_show').remove();
      $.post("user_vizitki_entry.php",
        {'task':'get_city', countryid: '' + country_id + ''},
        function(data) {
          if ( data.error == '0') {
          var  sel;
          var  city;
         sel = '<select name="city" id = "city_show">';
         $.each(data.result, function(key, value) {
           city = city+'<option>'+value+'</option>';
         });
          city = city+ '</select>';
            document.getElementById('countydiv').innerHTML= sel+city;
                       
          }
          if (data.error == '1') {
            alert( 'нет городов');
          }
        },
        'json');
                                return false;
  }

  function getCityList(country_id){
    // alert(country_id);
     $('#dhtmlgoodies_city').remove();
      $.post("user_editprofile.php",
        {'task':'get_city', countryid: '' + country_id + ''},
        function(data) {
          if ( data.error == '0') {
          var  city;
         city = '<select name="dhtmlgoodies_city" id="dhtmlgoodies_city"><option id="op" value="-1"></option>'+data.result+'</select>';
            document.getElementById('countydiv').innerHTML= city;
          }
          if (data.error == '1') {
            alert( 'нет городов');
          }
        },
        'json');
                                return false;
  }

  
   
