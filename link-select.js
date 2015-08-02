(function ( $ ) {
    $.fn.linkSelect = function( options ) {
    	return this.each(function(){
    		var
		    	_linkSelect = $(this),
		    	_valueHolder = _linkSelect.find('input[type=hidden]'),
		    	_holderName = _valueHolder.attr('name'),
		    	_inputValue = _valueHolder.val(),
		    	_settings = $.extend({
		    		processResponse : function(serverResponse){},
		    		click : function(evt){
		    			var
		    				_linkElement = $(this),
		    				_selectValue = _linkElement.data('value'),
		    				_displayText = _linkElement.html()
		    			;
		    			if(typeof _linkSelect.data('auto-send') != 'undefined'){
		    				$.post(
		    					_linkSelect.data('send-to'),
		    					_valueHolder.serialize(),
		    					_settings.processResponse
	    					);
		    			}
		    			_linkSelect.find('.selected-text').html(_displayText);
		    		}
		    	},options)
	    	;
    		_linkSelect.find('.link-value').click(_settings.click);
    	});
    };
}( jQuery ));