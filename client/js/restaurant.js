

window.addEventListener("load", () => {



	const favoritesBtn = document.getElementById("favorite");

	const logout = document.getElementById("logout");


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

	const sessionObj = sessionStorage.getItem("session");
		const parsedObj = JSON.parse(sessionObj);
		const userId = parsedObj.id;
		console.log(userId);


		const params = (new URL(document.location)).searchParams;
		const resId = params.get("resid");
		console.log(resId);

	const handleRestaurantResponse = (response) => {
		

		let text = JSON.parse(response);
		console.log(text)

		if(text.scalar == "Already Favorited") {
			console.log("here")
			favoritesBtn.innerHTML = "Favorited";
			favoritesBtn.style.backgroundColor = "green";
		} 
		else if(text.scalar == "Fav Removed Successfully"){
			favoritesBtn.innerHTML = "Favorite";
				favoritesBtn.style.backgroundColor = "rgb(0, 123, 255)";
		}
		else {	
			let parsedText = JSON.parse(text);
			if(parsedText) {
				favoritesBtn.innerHTML = "Favorited";
				favoritesBtn.style.backgroundColor = "green";
			}
		}
		// renderComment(parsedText);
	}

	const sendFavoriteRequestCheck = (id, resid) => {
	const request = new XMLHttpRequest();
	request.open("POST","../login.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange= function ()
	{
		console.log("1")
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
			console.log("2")
			handleRestaurantResponse(this.responseText);
		}		
	}

	console.log(id, resid)
	request.send(`type=favorites_check&id=${id}&resid=${resid}`);
}

	const sendFavoriteRequest = (id, resid) => {
	const request = new XMLHttpRequest();
	request.open("POST","../login.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange= function ()
	{
		console.log("1")
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
			console.log("2")
			handleRestaurantResponse(this.responseText);
		}		
	}

	console.log(id, resid)
	request.send(`type=favorites&id=${id}&resid=${resid}`);
}



sendFavoriteRequestCheck(userId, resId);

favoritesBtn.addEventListener("click", () => {

		sendFavoriteRequest(userId, resId)
	})

// logout.addEventListener("click", () => {
// 	sessionStorage.removeItem("session");
// 	checkSession();
// })

})