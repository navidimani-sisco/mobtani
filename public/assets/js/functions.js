// افزودن تابع 'شامل بودن' به کلاس آرایه
Array.prototype.contains = function ( item ) {
   for (i in this) {
       if (this[i] == item) return true;
   }
   return false;
}

function ajaxHandler(url, ajaxResponseHandler){
	var ajax = new XMLHttpRequest();
	
	ajax.onreadystatechange = function(){		
		if( this.readyState == 4 && this.status == 200 )
			ajaxResponseHandler( this );
	}	
	
	ajax.open('GET', url, true);
	ajax.send();	
}

//class Validation extends x
class Validation {
	#privateProperty
	constructor(parameter){
		this.publicProperty = parameter;
		this.#privateProperty = parameter;
	}
	//static property = 'value';
	static required(){
		//alert('yes');
		var errorTag = this.parentNode.querySelector('.text-danger');
		if( errorTag ){
			//console.log('yes');
			if( this.validity.valueMissing ){
				var error = 'این فیلد ضروری است!';
				this.setCustomValidity( error );
				this.reportValidity();	
				errorTag.innerHTML = error;
			} else{
				this.setCustomValidity('');
				this.reportValidity();	
				errorTag.innerHTML = '';
			}
		}
	}
}

//Validation.staticFunction();

// var x = new Validation('value');
// x.nonStaticFunction();