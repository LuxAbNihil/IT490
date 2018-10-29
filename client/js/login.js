window.addEventListener("load", function () {

const sessionObject = sessionStorage.getItem("session");

const sendSessionRequest = (object) => {

	if(object == undefined){
		console.log("no session")
		checkSession()
		return false;
	}
	else {
		console.log(object)

		console.log("session was found")
		const request = new XMLHttpRequest();
		request.open("POST","../login.php",true);
		request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		request.onreadystatechange= function() {	
			if ((this.readyState == 4)&&(this.status == 200))
			{
				console.log(this.responseText)
				HandleSessionResponse(this.responseText);
			}
			else{
				console.log("didint receive")
			}		
	}
		console.log(object)
		request.send("type=session_valid&session_object=" + object);

	// const url = "";
	// fetch(url, {
	// 	method: "POST",
	// 	data: {sessionId: object.id, sessionS: object.start, sessionLA: object.lastAccess},
	// 	headers: {
	// 		"Content-Type": "application/json"
	// 	}
	// }).then(
	// 	(response) => {console.log(response)}
	// )
}
}

const checkSession = () => {

	if(sessionStorage.getItem("session") != null){

		if(window.location.href != "http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/dashboard.php")
			
			window.location.assign("http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/dashboard.php");
		else{
			return null;
		}
	}
	else {
		if(window.location.href != "http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/login.php")
			
			window.location.assign("http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/login.php");
		else{
			return null;
		}
	}
}

sendSessionRequest(sessionObject);


function HandleSessionResponse (response) {
	console.log(response)
	let text = response;
	console.log("TEXT", text)
	checkSession();
	document.getElementById("textResponse").innerHTML = "response: "+text.toString()+"<p>";
}
function HandleLoginResponse (response) {
	console.log(response)
	let text = response;
	console.log("TEXT", text)
	
	sessionStorage.setItem("session", text.toString());

	

	checkSession();
	document.getElementById("textResponse").innerHTML = "response: "+text.toString()+"<p>";
}
const SendLoginRequest = (username,password) => {
	const request = new XMLHttpRequest();
	request.open("POST","../login.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange= function()
	{
		console.log("1")
		
		if ((this.readyState == 4)&&(this.status == 200))

		{
			console.log("here")
			console.log(this.responseText)
			HandleLoginResponse(this.responseText);
		}
		else{
			console.log("didint receive")
		}		
	}
	request.send("type=login&uname="+username+"&pword="+password);
}

const SendSignUpRequest = (fname, lname, username, password) => {
	console.log("here")
	const request = new XMLHttpRequest();
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

	const formLogin = document.getElementById("login");
	const formSignUp = document.getElementById("signup");

	if(formSignUp !== null){
		formSignUp.addEventListener("submit", function (event) {
    			event.preventDefault();

    			console.log(event)
    			const fname = document.getElementById("FName").value;
			    const lname = document.getElementById("LName").value;
    			const email = document.getElementById("emailSignUp").value;
			    const pass = document.getElementById("passSignUp").value;

			    console.log(fname, lname, email, pass)
			    if((fname && lname && email && pass) !== null)
			    	SendSignUpRequest(fname, lname, email, pass);
			  });		
	}
	else{
		formLogin.addEventListener("submit", function (event) {
    			event.preventDefault();

    			console.log(event)

    			const email = document.getElementById("email").value;
			    const pass = document.getElementById("pass").value;

			    console.log(email, pass)
			    if((email && pass) !== null)
			    	SendLoginRequest(email, pass);
			  });
		}






})

