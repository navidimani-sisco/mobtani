//var list = document.querySelectorAll('.replyButton');
var toggleButton = document.querySelector('#toggleButton');

if( toggleButton )
	toggleButton.addEventListener('click', toggleVisibility);

function toggleVisibility(){	
	//var password = this.parentNode.querySelector('[name = "password"]');
	var password = document.querySelector('[name = "password"]');
	if( password.type === 'password' ){
		password.type = 'text';
		
		this.classList.remove('fa-eye');
		this.classList.add('fa-eye-slash');
	}
	else if( password.type === 'text' ){
		password.type = 'password';
		
		this.classList.remove('fa-eye-slash');
		this.classList.add('fa-eye');
	}
	
}

var likeButtonList = document.querySelectorAll('.fa-heart');
//for(i = 0; i < likeButtonList.length; i++)
for(item of likeButtonList)
	item.addEventListener('click', like);

function like( e ){	
	// رویداد پیش فرض آن را غیر فعال کنید
	e.preventDefault();
	
	// آدرس را بردار و برای مقصد اجکس استفاده کن
	var url = this.href; // "likeProduct.php?id=1"
	
	ajaxHandler( url, likeARH );
	
	if( this.classList.contains('far') ) {	
		// لایک شده
		this.classList.remove('far');
		this.classList.add('fas');	
	}
	else if( this.classList.contains('fas') ){	
		this.classList.remove('fas');
		this.classList.add('far');
	}
	
	function likeARH( ajax ){
		//if( ajax.responseText === 'true' ){
		
	}
}

//var numberList = document.querySelectorAll(':invalid');
var numberList = document.querySelectorAll('[type = "number"]');
for(item of numberList)
	item.addEventListener( 'blur', numberValidation );

function numberValidation(){
	//if( this.checkValidity() ) {
		if( this.validity.rangeUnderflow ){
			var error = 'عدد باید بزرگتر یا مساوی ' + this.min + ' باشد!';
			this.setCustomValidity( error );
			//this.reportValidity();		
		}
		else if( this.validity.rangeOverflow ){
			var error = 'عدد باید کوچکتر یا مساوی ' + this.max + ' باشد!';
			this.setCustomValidity( error );
			//this.reportValidity();		
		}
		else if( this.validity.stepMismatch ){
			var numFloor = Math.floor(this.value / this.step) * this.step;
			var numCeil = numFloor + Math.floor(this.step);
			var error = 'عدد نامعتبر! نزدیکترین اعداد ' + numFloor + ' و ' + numCeil + ' است!';
			this.setCustomValidity( error );
			//this.reportValidity();		
		//}
	} else{
		this.setCustomValidity(''); // valid
		this.checkValidity();
	}
}

var requiredList = document.querySelectorAll(':required');

for(item of requiredList)
	item.addEventListener( 'blur', Validation.required );










	