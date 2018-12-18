

window.addEventListener("load", () => {



	const favorites = document.getElementById("favorites");

	const logout = document.getElementById("logout");

		window.showMore = (id) => {
		console.log(id);
		window.location.assign(`http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/restaurant.php?resid=${id}`);
	}
// 	const checkSession = () => {

// 	if(sessionStorage.getItem("session") != null){

// 		if(window.location.href != "http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/dashboard.php")
			
// 			window.location.assign("http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/dashboard.php");
// 		else{
// 			return null;
// 		}
// 	}
// 	else {
// 		if(window.location.href != "http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/login.php")
			
// 			window.location.assign("http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/login.php");
// 		else{
// 			return null;
// 		}
// 	}
// }

//checkSession();

	const sessionObj = sessionStorage.getItem("session");
		const parsedObj = JSON.parse(sessionObj);
		const userId = parsedObj.id;
		console.log(userId);


		// const params = (new URL(document.location)).searchParams;
		// const resId = params.get("resid");
		// console.log(resId);

	const listTemplateFavorites = (arr) => {
		console.log("template");
		favorites.innerHTML += 
		arr.map(item => {
			return (
				`
					<div class="card" style="width: 21rem; margin: 5rem; height: 25rem;" onlick="showMore()">
					<div class="results-item-img" style="height: 50%;">
						<img src='${item.image_url}' class="card-img-top" style="width: 50; height: 80; height: 100%; object-fit: cover;" />
					</div>
					<div class="card-body" style="color: #000;display: flex; flex-direction: column; justify-content: center;align-items: center;">
						<h5 style="display: flex; justify-content: center;">
        	 				${item.location.city}
        	 			</h5>  	 		
							<h5 class="card-title" style="font-weight: bold;">${item.name}</h5>
							<div class="card-item">Rating: ${item.rating}</div>
							<div class="card-item">Price: ${item.price}</div>
							<div class="button-wrap">					
						<button class="btn btn-primary favorite" onclick="showMore('${item.id}')">Details</button>
                		</div>
					</div>
				</div>
				`
				)
			}).join(" ");

	}

	const handleFavoriteListResponse = (response) => {
		console.log("RES", response);
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

// logout.addEventListener("click", () => {
// 	sessionStorage.removeItem("session");
// 	checkSession();
// })


})