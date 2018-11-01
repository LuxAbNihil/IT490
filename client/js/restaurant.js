

window.addEventListener("load", () => {



	const favoritesBtn = document.getElementById("favorite");

	const logout = document.getElementById("logout");

	const commentForm = document.getElementById("forum");


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

checkSession();
	const renderComment = (arr) => {
			console.log(arr[0]);

		const commentList = document.getElementById("comment-list");

		commentList.innerHTML += 
				`
				<li class="comment card clearfix" style="list-style: none; margin-top: 2rem; padding: 2rem;">
                    <div class="clearfix">
                        <h4 class="pull-left">${arr[0]['restaurant_id']}</h4>
                        <p class="pull-right">${arr[0]['time_posted']}</p>
                    </div>
                    <p>
                        <em>${arr[0]['comment']}</em>
                    </p>
                 </li>
                  `
			
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


const handleCommentResponse = (response) => {
		console.log(response)
		let text = JSON.parse(response);
	    console.log(text)
	    renderComment(text);
}

const sendInitialCommentRequest = (id) => {
	const request = new XMLHttpRequest();
	request.open("POST","../login.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange= function ()
	{
		console.log("1")
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
			console.log("2")
			handleCommentResponse(this.responseText);
		}		
	}

	console.log(id)
	request.send(`type=initial_comment&resid=${id}`);
}

sendInitialCommentRequest(resId);

const sendCommentRequest = (id, resid, comment) => {
	const request = new XMLHttpRequest();
	request.open("POST","../login.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange= function ()
	{
		console.log("1")
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
			console.log("2")
			handleCommentResponse(this.responseText);
		}		
	}

	console.log(id, resid)
	request.send(`type=add_comment&id=${id}&resid=${resid}&comment=${comment}`);
}




sendFavoriteRequestCheck(userId, resId);

favoritesBtn.addEventListener("click", () => {

		sendFavoriteRequest(userId, resId)
	})

logout.addEventListener("click", () => {
	sessionStorage.removeItem("session");
	location.reload();
})


commentForm.addEventListener("submit", function (event) {
    			event.preventDefault();

    			console.log(event)

    			const email = document.getElementById("name").value;
			    const message = document.getElementById("message").value;

		
			    if((email && message) !== null)
			    	sendCommentRequest(userId ,resId, message);
			    location.reload()
			  });

})