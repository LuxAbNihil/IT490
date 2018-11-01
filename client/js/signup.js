
window.addEventListener("load", () => {

const sessionObject = sessionStorage.getItem("session");

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

	function HandleSignupResponse (response) {
		console.log(response)
		document.getElementById("text-response").innerHTML = response.toString()+"<p>";
}

	const SendSignUpRequest = (fname, lname, username, password) => {
		console.log("here")
		const request = new XMLHttpRequest();
		request.open("POST","../login.php",true);
		request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		request.onreadystatechange= function ()
		{
			console.log("1")
			
			if ((this.readyState == 4)&&(this.status == 200))
			{
				console.log("2")
				HandleSignupResponse(this.responseText);
			}		
		}
		request.send("type=signup&fname="+fname+"&lname="+lname+"&uname="+username+"&pword="+password);
}

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
})
