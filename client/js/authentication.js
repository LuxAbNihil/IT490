window.addEventListener("load", function () {
function HandleLoginResponse(response)
{
	console.log(response)
	var text = JSON.parse(response);
//	document.getElementById("textResponse").innerHTML = response+"<p>";	
	document.getElementById("textResponse").innerHTML = "response: "+text+"<p>";
}
function SendLoginRequest(username,password)
{
	console.log("here")
	var request = new XMLHttpRequest();
	request.open("POST","login.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange= function ()
	{
		console.log("1")
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
			console.log("2")
			HandleLoginResponse(this.responseText);
		}		
	}
	request.send("type=login&uname="+username+"&pword="+password);
}

function SendSignUpRequest(fname, lname, username, password)
{
	console.log("here")
	var request = new XMLHttpRequest();
	request.open("POST","login.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange= function ()
	{
		console.log("1")
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
			console.log("2")
			HandleLoginResponse(this.responseText);
		}		
	}
	request.send("type=signup&fname="+fname+"&lname="+lname+"&uname="+username+"&pword="+password);
}


var formLogin = document.getElementById("login");
var formSignUp = document.getElementById("signup");


			  formLogin.addEventListener("submit", function (event) {
    			event.preventDefault();

    			console.log(event)

    			var email = document.getElementById("email").value;
			    var pass = document.getElementById("pass").value;

			    console.log(email, pass)
			    if((email && pass) !== null)
			    	SendLoginRequest(email, pass);
			  });

				formSignUp.addEventListener("submit", function (event) {
    			event.preventDefault();

    			console.log(event)
    			var fname = document.getElementById("FName").value;
			    var lname = document.getElementById("LName").value;
    			var email = document.getElementById("emailSignUp").value;
			    var pass = document.getElementById("passSignUp").value;

			    console.log(fname, lname, email, pass)
			    if((fname && lname && email && pass) !== null)
			    	SendSignUpRequest(fname, lname, email, pass);
			  });	



	})

