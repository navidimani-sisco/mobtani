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
	item.addEventListener('click', toggleLike);

function toggleLike(){
	if( this.classList.contains('far') ) {		
		this.classList.remove('far');
		this.classList.add('fas');
	}
	else if( this.classList.contains('fas') ){		
		this.classList.remove('fas');
		this.classList.add('far');
		
	}
}





	