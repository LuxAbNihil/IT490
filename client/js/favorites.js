

window.addEventListener("load", () => {



	const favorites = document.getElementById("favorites");

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

	const listTemplateFavorites = (arr) => {
		favorites.innerHTML = 
		arr.map(item => {
			return (
				`
				<div class="card" style="width: 18rem; margin: 5rem" onlick="showMore()">
					<div class="results-item-img">
						<img src='${item.image_url}' class="card-img-top" style="width: 50; height: 80;" />
					</div>
					<div class="card-body">
						<h5 style="display: flex; justify-content: center;">
        	 				${item.location.city}
        	 			</h5> 
						<h5 class="card-title">${item.name}</h5>
						<div class="card-item">Rating: ${item.rating}</div>
						<div class="card-item">Price: ${item.price}</div>
						<button onclick="showMore('${item.id}')">Show More</button>
					</div>
				</div>
				`
				)
			}).join(" ");

	}

	const handleFavoriteListResponse = (response) => {
		console.log(response);
		const text = JSON.parse(response)
		listTemplateFavorites(text)
	}


	const sendFavoriteListRequest = (id) => {
	const request = new XMLHttpRequest();
	request.open("POST","../login.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange= function ()
	{
		console.log("1")
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
			console.log("2")
			handleFavoriteListResponse(this.responseText);
		}		
	}
	request.send(`type=favorite_list&id=${id}`);
}



sendFavoriteListRequest(userId);


})