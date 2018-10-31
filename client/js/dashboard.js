

window.addEventListener("load", () => {

	const dashDropdown = document.getElementById("search-bar");
	const searchForm= document.getElementById("search");

	// const inputVal = dashDropdown.addEventListener("input", (event) => {
	// 	return event.target.value;
	// })

	window.showMore = (id) => {
		console.log(id)
		window.location.assign(`http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/restaurant.php?resid=${id}`);
	}

// const searchResult = document.getElementById("search-results");

// 		searchResult.innerHTML =
// 		 ` 
// 		   	 <button onclick="showMore(12345)">Show More</button>
		   
// 		   `
				
	const renderSearchResults = (arr) => {
			console.log(arr);

		const searchResult = document.getElementById("search-results");

		searchResult.innerHTML = 
		arr.map(item => {


			console.log(item.image_url)
			return (
				`
				<div class="card" style="width: 18rem; margin: 5rem" onlick="showMore()">
					<div class="results-item-img">
						<img src='${item.image_url}' class="card-img-top" style="width: 50; height: 80;" />
					</div>
					<div class="card-body">
						<h5 class="card-title">${item.name}</h5>
						<div class="card-item">Rating: ${item.rating}</div>
						<div class="card-item">Price: ${item.price}</div>
						<button onclick="showMore('${item.id}')">Show More</button>
					</div>
				</div>
				`
				)
			})

		}

	
		



	const handleSearchResponse = (response) => {
		console.log(response)
		let text = JSON.parse(response);
		let parsedText = JSON.parse(text);
		parsedText.splice(3);
		renderSearchResults(parsedText);
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
			console.log("2")
			handleSearchResponse(this.responseText);
		}		
	}
	console.log("he");
	console.log(location);
	request.send("type=search&term=restaurants&location="+location);
}


searchForm.addEventListener("submit", (event) => {

		event.preventDefault();

		const inputVal = document.getElementById("search-bar").value;

		console.log(inputVal)
		// alert(inputVal)
		sendSearchRequest(inputVal)
	})

	// const inputVal = dashDropdown.onchange = (e) => {console.log(e.target.value)}
})