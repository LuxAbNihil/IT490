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
	request.open("POST","192.168.1.132/yelpClone/IT490/login.php",true);
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

SendLoginRequest("hello", "there");
var form = document.getElementById("login");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;

    console.log(email, pass)
    if((email && pass) !== null)
    	SendLoginRequest(email, pass);
  });
});