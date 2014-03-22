function Box(){
	
	this.create = function(){
		var body_tag = document.getElementsByTagName('body');
		var box_chat = document.createElement('div');
		box_chat.className = "chat-box";
		body_tag.appendChild(box_chat);
	}
	this.create_form = function(){
			
	}
	this.create_DOM = function(){
		
	}
}
var box = new Box();
box.create();