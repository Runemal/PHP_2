(function($) {

	$.fn.scrollPagination = function(options) {
		
		var settings = { 
			nop     : 25,
			offset  : 0, 
			error   : 'Больше товаров нет!',
			delay   : 500,
			scroll  : true 
		}
		
		if(options) {
			$.extend(settings, options);
		}
		
		return this.each(function() {		
			$this = $(this);
			$settings = settings;
			var offset = $settings.offset;
			var busy = false;
			if($settings.scroll == true) $initmessage = 'Ещё';
			else $initmessage = '...';
            
			$this.append('<div class="content"></div><div class="loading-bar">'+$initmessage+'</div>');
            
			function getData() {
				$.post('engine/autoupdate.php', {
					action        : 'scrollpagination',
				    number        : $settings.nop,
				    offset        : offset,
					    
				}, function(data) {
					$this.find('.loading-bar').html($initmessage);	
					if(data == "") { 
						$this.find('.loading-bar').html($settings.error);	
					}
					else {
					    offset = offset+$settings.nop; 
					   	$this.find('.content').append(data);
						busy = false;
					}
				});
			}	
			
			getData(); 
			if($settings.scroll == true) {
				$(window).scroll(function() {
					if($(window).scrollTop() + $(window).height() > $this.height() && !busy) {
						busy = true;
						$this.find('.loading-bar').html('�������� ������');
						setTimeout(function() {
							getData();
							
						}, $settings.delay);
					}	
				});
			}
			$this.find('.loading-bar').click(function() {
				if(busy == false) {
					busy = true;
					getData();
				}
			
			});
			
		});
	}

})(jQuery);
