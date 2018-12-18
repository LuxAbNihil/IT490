

window.addEventListener("load", () => {

	const dashDropdown = document.getElementById("search-bar");
	const searchForm= document.getElementById("search");

	const logout = document.getElementById("logout");

	const initialSearchResult = document.getElementById("initial-results");
	const searchResult = document.getElementById("search-results");

	const sessionObj = sessionStorage.getItem("session");
	const parsedObj = JSON.parse(sessionObj);
	const userId = parsedObj.id;

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



	const listTemplateSugg = (el, arr) => {

		if(!arr)
			return false;
		console.log("ARR", arr);
		el.innerHTML += 
		arr.map(item => {
			console.log("LIST", item)
			return (
				`
				<div class="card" style="width: 21rem; margin: 5rem; height: 25rem;" onlick="showMore()">
					<div class="results-item-img" style="height: 50%;">
						<img src='${item.image_url}' class="card-img-top" style="width: 50; height: 80; height: 100%; object-fit: cover;" />
					</div>
					<div class="card-body" style="display: flex; flex-direction: column; justify-content: center;align-items: center;">
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

	const listTemplateSearch = (el, arr) => {
		el.innerHTML = 
		arr.map(item => {
			return (
				`
				<div class="card" style="width: 21rem; margin: 5rem; height: 25rem;" onlick="showMore()">
					<div class="results-item-img" style="height: 50%;">
						<img src='${item.image_url}' class="card-img-top" style="width: 50; height: 80; height: 100%; object-fit: cover;" />
					</div>
					<div class="card-body" style="color:#000;display: flex; flex-direction: column; justify-content: center;align-items: center;">
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
				
	const renderSearchResults = (arr, type) => {

		console.log(type)
		
		if(type=='initial'){
			const initialSearchList = document.getElementById("initial-search-list");
			console.log("ARRAY INITIAL", arr);
			return listTemplateSugg(initialSearchList, arr);
		}
		else if(type=='search'){
			console.log("here")
			const searchList = document.getElementById("search-list");
			console.log(searchList);
			return listTemplateSearch(searchList, arr);
		}
		}

	
	const handleInitialSearchResponse = (response) => {
		console.log(response)
		let text = JSON.parse(response);
		// let parsedText = JSON.parse(text);

		console.log("TEXT", text)
		// console.log(parsedText);
		searchResult.style.opacity = 0;
		initialSearchResult.style.opacity = 1;

		text.map(arr => renderSearchResults(arr, "initial"))
	 	
		// document.getElementById("search-results").innerHTML = "response: "+text.toString()+"<p>";
	}

	const handleSearchResponse = (response) => {
		let text = JSON.parse(response);
		let parsedText = JSON.parse(text);

		searchResult.style.opacity = 1;
		initialSearchResult.style.opacity = 0;
		initialSearchResult.innerHTML = ``;
		renderSearchResults(parsedText, "search");
		// document.getElementById("search-results").innerHTML = "response: "+text.toString()+"<p>";
}

	const sendSearchRequest = (location) => {
		console.log("here")
		const request = new XMLHttpRequest();
		request.open("POST","../login.php",true);
		request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		request.onreadystatechange= function ()
		{
			console.log("1")
			
			if ((this.readyState == 4)&&(this.status == 200))
			{
				handleSearchResponse(this.responseText);
			}		
		}

		console.log(userId)
		request.send(`type=search&term=restaurants&location=${location}&id=${userId}`);
}

	const sendInitialSearchRequest = (id) => {
		console.log("here")
		const request = new XMLHttpRequest();
		request.open("POST","../login.php",true);
		request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		request.onreadystatechange= function ()
		{		
			if ((this.readyState == 4)&&(this.status == 200))
			{
				handleInitialSearchResponse(this.responseText);
			}		
		}
		console.log("he");

		request.send(`type=initial_search&id=${id}`);
}

sendInitialSearchRequest(userId)

searchForm.addEventListener("submit", (event) => {

		event.preventDefault();

		const inputVal = document.getElementById("search-bar").value;

		console.log(inputVal)
		// alert(inputVal)
		sendSearchRequest(inputVal)
	})

logout.addEventListener("click", () => {
	sessionStorage.removeItem("session");
	checkSession(); 
})
	// const inputVal = dashDropdown.onchange = (e) => {console.log(e.target.value)}
})