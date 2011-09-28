﻿/*!
 * jQuery bValidator plugin
 *
 * http://code.google.com/p/bvalidator/
 *
 * Copyright (c) 2011 Bojan Mauser
 *
 * $Id: jquery.bvalidator.js 81 2011-08-30 11:03:55Z bmauser $
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */

(function($){

	// constructor
	$.fn.bValidator = function(overrideOptions){
		return new bValidator(this, overrideOptions);
	};

	// bValidator class
	bValidator = function(mainElement, overrideOptions){

		// default options
		var options = {

			singleError:         false,		// validate all inputs at once
			offset:              {x:-23, y:-4},	// offset position for error message tooltip
			position:            {x:'right', y:'top'}, // error message placement x:left|center|right  y:top|center|bottom
			template:            '<div class="{errMsgClass}"><em/>{message}</div>', // template for error message
			templateCloseIcon:   '<div style="display:table"><div style="display:table-cell">{message}</div><div style="display:table-cell"><div class="{closeIconClass}" onclick="{closeErrMsg}">x</div></div></div>', // template for error message container when showCloseIcon option is true
			showCloseIcon:       true,	// put close icon on error message
			showErrMsgSpeed:    'normal',	// message's fade-in speed 'fast', 'normal', 'slow' or number of milliseconds
			scrollToError:       true,	// scroll to first error
			// css class names
			classNamePrefix:     'bvalidator_',	// prefix for css class names
			closeIconClass:      'close_icon',	// close error message icon class
			errMsgClass:         'errmsg',		// error message class
			errorClass:          'invalid',		// input field class name in case of validation error
			validClass:          '',		// input field class name in case of valid value

			lang: 'en', 				// default language for error messages 
			errorMessageAttr:    'data-bvalidator-msg',// name of the attribute for overridden error message
			validateActionsAttr: 'data-bvalidator', // name of the attribute which stores info what validation actions to do
			paramsDelimiter:     ':',		// delimiter for validator action options inside []
			validatorsDelimiter: ',',		// delimiter for validator actions

			// when to validate
			validateOn:          null,		// null, 'change', 'blur', 'keyup'
			errorValidateOn:     'keyup',		// null, 'change', 'blur', 'keyup'

			// callback functions
			onBeforeValidate:    null,
			onAfterValidate:     null,
			onValidateFail:      null,
			onValidateSuccess:   null,
			onBeforeElementValidation: null,
			onAfterElementValidation:  null,
			onBeforeAllValidations:    null,
			onAfterAllValidations:     null,

			// default error messages
			errorMessages: {
				en: {
					'default':    'Please correct this value.',
					'equalto':    'Please enter the same value again.',
					'differs':    'Please enter a different value.',
					'minlength':  'The length must be at least {0} characters',
					'maxlength':  'The length must be at max {0} characters',
					'rangelength':'The length must be between {0} and {1}',
					'min':        'Please enter a number greater than or equal to {0}.',
					'max':        'Please enter a number less than or equal to {0}.',
					'between':    'Please enter a number between {0} and {1}.',
					'required':   'This field is required.',
					'alpha':      'Please enter alphabetic characters only.',
					'alphanum':   'Please enter alphanumeric characters only.',
					'digit':      'Please enter only digits.',
					'number':     'Please enter a valid number.',
					'email':      'Please enter a valid email address.',
					'image':      'This field should only contain image types',
					'url':        'Please enter a valid URL.',
					'ip4':        'Please enter a valid IPv4 address.',
					'ip6':        'Please enter a valid IPv6 address.',
					'date':       'Please enter a valid date in format {0}.'
				}
			}
		},

		// returns all inputs
		_getElementsForValidation = function(element){
			// skip hidden and input fields witch we do not want to validate
			return element.is(':input') ? element : element.find(':input[' + options.validateActionsAttr + ']').not(":button, :image, :reset, :submit, :hidden, :disabled");
		},

		// binds validateOn event
		_bindValidateOn = function(elements){
			elements.bind(options.validateOn + '.bV', {'bVInstance': instance}, function(event){
				event.data.bVInstance.validate(false, $(this));
			});
		},

		// displays error message
		_showErrMsg = function(element, messages){

			// if error message already exists remove it from DOM
			_removeErrMsg(element);

			msg_container = $('<div class="bVErrMsgContainer"></div>').css('position','absolute');
			element.data("errMsg.bV", msg_container);
			msg_container.insertAfter(element);

			var messagesHtml = '';

			for(var i=0; i<messages.length; i++)
				messagesHtml += '<div>' + messages[i] + '</div>\n';

			if(options.showCloseIcon)
				messagesHtml = options.templateCloseIcon.replace('{message}', messagesHtml).replace('{closeIconClass}', options.classNamePrefix+options.closeIconClass).replace('{closeErrMsg}', '$(this).closest(\'.'+ options.classNamePrefix+options.errMsgClass +'\').css(\'visibility\', \'hidden\');');

			// make tooltip from template
			var tooltip = $(options.template.replace('{errMsgClass}', options.classNamePrefix+options.errMsgClass).replace('{message}', messagesHtml));
			tooltip.appendTo(msg_container);

			var pos = _getErrMsgPosition(element, tooltip); 

			tooltip.css({visibility: 'visible', position: 'absolute', top: pos.top, left: pos.left}).fadeIn(options.showErrMsgSpeed);

			if(options.scrollToError){
				// get most top tolltip
				var tot = tooltip.offset().top;
				if(scroll_to === null || tot < scroll_to)
					scroll_to = tot;
			}
		},

		// removes error message from DOM
		_removeErrMsg = function(element){
			var existingMsg = element.data("errMsg.bV")
			if(existingMsg){
				existingMsg.remove();
			}
		},

		// calculates error message position
		_getErrMsgPosition = function(input, tooltip){

		        var tooltipContainer = input.data("errMsg.bV"),
		         top  = - ((tooltipContainer.offset().top - input.offset().top) + tooltip.outerHeight() - options.offset.y),
		         left = (input.offset().left + input.outerWidth()) - tooltipContainer.offset().left + options.offset.x,
			 x = options.position.x,
			 y = options.position.y;

			// adjust Y
			if(y == 'center' || y == 'bottom'){
				var height = tooltip.outerHeight() + input.outerHeight();
				if (y == 'center') 	{top += height / 2;}
				if (y == 'bottom') 	{top += height;}
			}

			// adjust X
			if(x == 'center' || x == 'left'){
				var width = input.outerWidth();
				if (x == 'center') 	{left -= width / 2;}
				if (x == 'left')  	{left -= width;}
			}

			return {top: top, left: left};
		},

		// calls callback function
		_callBack = function(type, param1, param2, param3){
		        if($.isFunction(options[type])){
		        	return options[type](param1, param2, param3);
			}
		},
		
		// gets element value	
		_getValue = function(element){

			var ret = {};

			// checkbox
			if(element.is('input:checkbox')){
				ret['value'] = element.attr('name') ? ret['selectedInGroup'] = $('input:checkbox[name="' + element.attr('name') + '"]:checked').length : element.attr('checked');
			}
			else if(element.is('input:radio')){
				ret['value'] = element.attr('name') ? ret['value'] = $('input:radio[name="' + element.attr('name') + '"]:checked').length : element.val();
			}
			else if(element.is('select')){
				ret['selectedInGroup'] =  $("option:selected", element).length;
				ret['value'] = element.val();
			}
			else if(element.is(':input')){
				ret['value'] = element.val();
			}

			return ret;
		},

		// object with validator actions
		validator = {

			equalto: function(v, elementId){
				return v.value == $('#' + elementId).val();
			},

			differs: function(v, elementId){
				return v.value != $('#' + elementId).val();
			},

			minlength: function(v, minlength){
				return (v.value.length >= parseInt(minlength))
			},

			maxlength: function(v, maxlength){
				return (v.value.length <= parseInt(maxlength))
			},

			rangelength: function(v, minlength, maxlength){		
				return (v.value.length >= parseInt(minlength) && v.value.length <= parseInt(maxlength))
			},

			min: function(v, min){		
				if(v.selectedInGroup)
					return v.selectedInGroup >= parseFloat(min)
				else{
					if(!this.number(v))
			 			return false;
			 		return (parseFloat(v.value) >= parseFloat(min))
				}
			},

			max: function(v, max){		
				if(v.selectedInGroup)
					return v.selectedInGroup <= parseFloat(max)
				else{
					if(!this.number(v))
			 			return false;
			 		return (parseFloat(v.value) <= parseFloat(max))
				}
			},

			between: function(v, min, max){
				if(v.selectedInGroup)
					return (v.selectedInGroup >= parseFloat(min) && v.selectedInGroup <= parseFloat(max))
			   	if(!this.number(v))
			 		return false;
				var va = parseFloat(v.value);
				return (va >= parseFloat(min) && va <= parseFloat(max))
			},

			required: function(v){
				if(!v.value || !$.trim(v.value))
					return false
				return true
			},

			alpha: function(v){
				return this.regex(v, /^[a-z ._\-]+$/i);
			},
			
			alphanum: function(v){
				return this.regex(v, /^[a-z\d ._\-]+$/i);
			},

			digit: function(v){
				return this.regex(v, /^\d+$/);
			},

			number: function(v){
				return this.regex(v, /^[-+]?\d+(\.\d+)?$/);
			},

			email: function(v){
				return this.regex(v, /^([a-zA-Z\d_\.\-\+%])+\@(([a-zA-Z\d\-])+\.)+([a-zA-Z\d]{2,4})+$/);
			},

			image: function(v){
				return this.regex(v, /\.(jpg|jpeg|png|gif|bmp)$/i);
			},

			url: function(v){
				return this.regex(v, /^(http|https|ftp)\:\/\/[a-z\d\-\.]+\.[a-z]{2,3}(:[a-z\d]*)?\/?([a-z\d\-\._\?\,\'\/\\\+&amp;%\$#\=~])*$/i);
			},

			regex: function(v, regex, mod){
				if(typeof regex === "string")
					regex = new RegExp(regex, mod);
				return regex.test(v.value);
			},

			ip4: function(v){
				return this.regex(v, /^(?:(?:25[0-5]|2[0-4]\d|[01]?\d\d?)\.){3}(?:25[0-5]|2[0-4]\d|[01]?\d\d?)$/);
			},
			
			ip6: function(v){
				return this.regex(v, /^(?:(?:(?:[A-F\d]{1,4}:){5}[A-F\d]{1,4}|(?:[A-F\d]{1,4}:){4}:[A-F\d]{1,4}|(?:[A-F\d]{1,4}:){3}(?::[A-F\d]{1,4}){1,2}|(?:[A-F\d]{1,4}:){2}(?::[A-F\d]{1,4}){1,3}|[A-F\d]{1,4}:(?::[A-F\d]{1,4}){1,4}|(?:[A-F\d]{1,4}:){1,5}|:(?::[A-F\d]{1,4}){1,5}|:):(?:(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)\.){3}(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)|(?:[A-F\d]{1,4}:){7}[A-F\d]{1,4}|(?:[A-F\d]{1,4}:){6}:[A-F\d]{1,4}|(?:[A-F\d]{1,4}:){5}(?::[A-F\d]{1,4}){1,2}|(?:[A-F\d]{1,4}:){4}(?::[A-F\d]{1,4}){1,3}|(?:[A-F\d]{1,4}:){3}(?::[A-F\d]{1,4}){1,4}|(?:[A-F\d]{1,4}:){2}(?::[A-F\d]{1,4}){1,5}|[A-F\d]{1,4}:(?::[A-F\d]{1,4}){1,6}|(?:[A-F\d]{1,4}:){1,7}:|:(?::[A-F\d]{1,4}){1,7})$/i);
			},

			date: function(v, format){ // format can be any combination of mm,dd,yyyy with separator between. Example: 'mm.dd.yyyy' or 'yyyy-mm-dd'
				if(v.value.length == 10 && format.length == 10){
					var s = format.match(/[^mdy]+/g);
					if(s.length == 2 && s[0].length == 1 && s[0] == s[1]){

						var d = v.value.split(s[0]),
						 f = format.split(s[0]);

						for(var i=0; i<3; i++){
							if(f[i] == 'dd') var day = d[i];
							else if(f[i] == 'mm') var month = d[i];
							else if(f[i] == 'yyyy') var year = d[i];
						}

						var dobj = new Date(year, month-1, day)
						if ((dobj.getMonth()+1!=month) || (dobj.getDate()!=day) || (dobj.getFullYear()!=year))
							return false

						return true
					}
				}
				return false;
			},

			extension: function(){
				var v = arguments[0],
				 r = '';
				if(!arguments[1])
					return false
				for(var i=1; i<arguments.length; i++){
					r += arguments[i];
					if(i != arguments.length-1)
						r += '|';
				}
				return this.regex(v, '\\.(' +  r  + ')$', 'i');
			}
		},

		// validator instance, scroll position flag
		instance = this, scroll_to;

		// global options
		if(window['bValidatorOptions']){
			$.extend(true, options, window['bValidatorOptions']);
		}

		// passed options
		if(overrideOptions)
			$.extend(true, options, overrideOptions);

		// return existing instance
		if(mainElement.data("bValidator"))
			return mainElement.data("bValidator");
		
		mainElement.data("bValidator", this);

		// if selector is a form
		if(mainElement.is('form')){
			// bind validation on form submit
			mainElement.bind('submit.bV', function(event){
				if(instance.validate())
					return true;
				else{
					event.stopImmediatePropagation();
					return false;
				}
			});

			// bind reset on form reset
			mainElement.bind("reset.bV", function(){
				instance.reset();			
			});
		}

		// bind validateOn event
		if(options.validateOn)
			_bindValidateOn(_getElementsForValidation(mainElement));


		// API functions:

		// validation function
		this.validate = function(doNotshowMessages, elementsOverride){

			// return value, elements to validate
			var ret = true, 
			 elementsl = elementsOverride ? elementsOverride : _getElementsForValidation(mainElement);

			scroll_to = null;

			if(_callBack('onBeforeAllValidations', elementsl) !== false){

				// validate each element
				elementsl.each(function(){
	
					// value of validateActionsAttr input attribute
					var actionsStr = $.trim($(this).attr(options.validateActionsAttr).replace(new RegExp('\\s*\\' + options.validatorsDelimiter + '\\s*', 'g'), options.validatorsDelimiter)),
					 is_valid = 0;
	
					if(!actionsStr)
						return true;
	
					var actions = actionsStr.split(options.validatorsDelimiter), // all validation actions
					 inputValue = _getValue($(this)), // value of input field for validation
					 errorMessages = [];

					// if value is not required and is empty
					if($.inArray('valempty', actions) == -1 && $.inArray('required', actions) == -1 && !validator.required(inputValue)){
						is_valid = 1;
					}

					if(!is_valid){

						// get error message from attribute
						var errMsg = $(this).attr(options.errorMessageAttr),
						 skip_messages = 0;

						// mark field as validated
						$(this).data('checked.bV', 1);

						if(_callBack('onBeforeElementValidation', $(this)) !== false){
		
							// for each validation action
							for(var i=0; i<actions.length; i++){
		
								actions[i] = $.trim(actions[i]);
		
								if(!actions[i])
									continue;
		
								if(_callBack('onBeforeValidate', $(this), actions[i]) === false)
									continue;
		
								// check if we have some parameters for validator
								var validatorParams = actions[i].match(/^(.*?)\[(.*?)\]/);
		
								if(validatorParams && validatorParams.length == 3){
									var validatorName = validatorParams[1];
									validatorParams = validatorParams[2].split(options.paramsDelimiter);
								}
								else{
									validatorParams = [];
									var validatorName = actions[i];
								}
		
								// if validator exists
								if(typeof validator[validatorName] == 'function'){
									validatorParams.unshift(inputValue); // add input value to beginning of validatorParams
									var validationResult = validator[validatorName].apply(validator, validatorParams); // call validator function
								}
								// call custom user defined function
								else if(typeof window[validatorName] == 'function'){
									validatorParams.unshift(inputValue.value);
									var validationResult = window[validatorName].apply(validator, validatorParams);
								}
		
								if(_callBack('onAfterValidate', $(this), actions[i], validationResult) === false)
									continue;
		
								// if validation failed
								if(!validationResult){
									if(!doNotshowMessages){
		
										if(!skip_messages && validatorName != 'valempty'){
											if(!errMsg){
		
												if(options.errorMessages[options.lang] && options.errorMessages[options.lang][validatorName])
													errMsg = options.errorMessages[options.lang][validatorName];
												else if(options.errorMessages.en[validatorName])
													errMsg = options.errorMessages.en[validatorName];
												else if(options.errorMessages[options.lang] && options.errorMessages[options.lang]['default'])
													errMsg = options.errorMessages[options.lang]['default'];
												else
													errMsg = options.errorMessages.en['default'];
											}
											else{
												skip_messages = 1;
											}
		
											// replace values in braces
											if(errMsg.indexOf('{')){
												for(var j=0; j<validatorParams.length-1; j++)
													errMsg = errMsg.replace(new RegExp("\\{" + j + "\\}", "g"), validatorParams[j+1]);
											}
		
											if(!(errorMessages.length && validatorName == 'required'))
												errorMessages[errorMessages.length] = errMsg;
		
											errMsg = null;
										}
									}
									else
										errorMessages[errorMessages.length] = '';
		
									ret = false;
		
									_callBack('onValidateFail', $(this), actions[i], errorMessages);
								}
								else{
									_callBack('onValidateSuccess', $(this), actions[i]);
								}
							}
						}
						
						var onAfterElementValidation = _callBack('onAfterElementValidation', $(this), errorMessages);	
					}
						
					
					// show error messages and bind events
					if(!doNotshowMessages && onAfterElementValidation !== false && $(this).data('checked.bV')){

						var chk_rad = $(this).is('input:checkbox,input:radio') ? 1 : 0;
	
						// if validation failed
						if(errorMessages.length){
							
							if(onAfterElementValidation !== 0)
								_showErrMsg($(this), errorMessages)
	
							if(!chk_rad){
								$(this).removeClass(options.classNamePrefix+options.validClass);
								if(options.errorClass)
									$(this).addClass(options.classNamePrefix+options.errorClass);
							}
			
							// input validation event
							if (options.errorValidateOn){
								if(options.validateOn)
									$(this).unbind(options.validateOn + '.bV');
	
								var evt = chk_rad || $(this).is('select,input:file') ? 'change' : options.errorValidateOn;
	
								if(chk_rad){
									var group = $(this).is('input:checkbox') ? $('input:checkbox[name="' + $(this).attr('name') + '"]') : $('input:radio[name="' + $(this).attr('name') + '"]');
									$(group).unbind('.bVerror');
									$(group).bind('change.bVerror', {'bVInstance': instance, 'groupLeader': $(this)}, function(event){
										event.data.bVInstance.validate(false, event.data.groupLeader);
									});
								}
								else{
									$(this).unbind('.bVerror');
									$(this).bind(evt + '.bVerror', {'bVInstance': instance}, function(event){
										event.data.bVInstance.validate(false, $(this));
									});
								}
							}
	
							if (options.singleError)
								return false;
						}
						else{
							if(onAfterElementValidation !== 0)
								_removeErrMsg($(this));
	
							if(!chk_rad){
								$(this).removeClass(options.classNamePrefix+options.errorClass);
								if(options.validClass)
									$(this).addClass(options.classNamePrefix+options.validClass);
							}
	
							//if (options.errorValidateOn)
							//	$(this).unbind('.bVerror');
							if (options.validateOn){
								$(this).unbind(options.validateOn + '.bV');
								_bindValidateOn($(this));
							}
							
							$(this).data('checked.bV', 0);
						}
					}
				});
			}

			_callBack('onAfterAllValidations', elementsl, ret);

			// scroll to error
			if(scroll_to && !elementsOverride && ($(window).scrollTop() > scroll_to || $(window).scrollTop()+$(window).height() < scroll_to)){
				var ua = navigator.userAgent.toLowerCase();			
				$(ua.indexOf('chrome')>-1 || ua.indexOf('safari')>-1 ? 'body' : 'html').animate({scrollTop: scroll_to - 10}, {duration: 'slow'});
			}

			return ret;
		}

		// returns options object
		this.getOptions = function(){
			return options;
		}
		
		// returns actions object
		this.getActions = function(){
			return validator;
		} 

		// checks validity
		this.isValid = function(elements){
			return this.validate(true, elements);
		}

		// deletes error message
		this.removeErrMsg = function(element){
			_removeErrMsg(element);
		}

		// returns all inputs
		this.getInputs = function(){
			return _getElementsForValidation(mainElement);
		}

		// binds validateOn event
		this.bindValidateOn = function(element){
			_bindValidateOn(element);
		}

		// resets validation
		this.reset = function(){
			elements = _getElementsForValidation(mainElement);
			if (options.validateOn)
				_bindValidateOn(elements);
			elements.each(function(){
				_removeErrMsg($(this));
				$(this).unbind('.bVerror');
				$(this).removeClass(options.classNamePrefix+options.errorClass);
				$(this).removeClass(options.classNamePrefix+options.validClass);
			});
		}

		this.destroy = function(){
			if (mainElement.is('form'))
				mainElement.unbind('.bV');
			
			this.reset();
			
			mainElement.removeData("bValidator");
		}
	}

})(jQuery);
