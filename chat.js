function checkUsername() 
{ 
	// ensures our user has a default random name when the form loads 
	var user = document.getElementById("username"); 
	if(user.value == "") {
		user.value = "Guest" + Math.floor(Math.random() * 1000);	
	}
}

function showChatMessages(str) {
	if (str == "") {
	    document.getElementById("chat_message_placeholder").innerHTML = "";
	    return;
	} else { 
	    if (window.XMLHttpRequest) {
	        // code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp = new XMLHttpRequest();
	    } else {
	        // code for IE6, IE5
	        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }

	    xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            document.getElementById("chat_message_placeholder").innerHTML = xmlhttp.responseText;
	        }
	    }
	    xmlhttp.open("GET","chatbox.php?",true);
	    xmlhttp.send();
	}

	// Scroll down to display the latest message
	$("#chat_message_placeholder").scrollTop($("#chat_message_placeholder")[0].scrollHeight);

	setTimeout(function() {
      showChatMessages();
	}, 2000);
}

function clearFields(){
	 // get a reference to the text box where the user writes new messages 
	 var MessageBox = document.getElementById("messagebox"); 
	
	setTimeout(function() {
     // Clear the textbox
	 MessageBox.value = "";
	}, 400);
}

function disableAutoComplete(){
	 // get a reference to the text box where the user writes new messages 
	 var MessageBox = document.getElementById("messagebox"); 
	 // prevents the autofill function from starting 
	 MessageBox.setAttribute("autocomplete", "off"); 
}