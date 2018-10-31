
window.on("load", () => {
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
