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