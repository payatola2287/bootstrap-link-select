(function ( $ ) {
    $.fn.linkSelect = function( options ) {

    	return this.each(function(){
    		var
		    	_linkSelect = $(this),
		    	_valueHolder = _linkSelect.find('input[type=hidden]'),
		    	_holderName = _valueHolder.attr('name'),
		    	_inputValue = _valueHolder.val(),
		    	_settings = $.extend({
		    		processResponse : function(serverResponse){
		    			console.log(serverResponse);
		    		},
		    		click : function(evt){
		    			if(typeof _linkSelect.data('auto-send') != 'undefined'){
		    				$.post(
		    					_linkSelect.data('send-to'),
		    					{_holderName:_inputValue},
		    					_settings.processResponse
	    					);
		    			}
		    		}
		    	},options)
	    	;
	    	console.log(typeof _holderName);
    		_linkSelect.find('.link-value').click(_settings.click);
    	});
    };
}( jQuery ));