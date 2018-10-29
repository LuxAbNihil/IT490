

window.addEventListener("load", () => {

	const dashDropdown = document.getElementById("search-bar");
	const searchForm= document.getElementById("search");

	// const inputVal = dashDropdown.addEventListener("input", (event) => {
	// 	return event.target.value;
	// })
		const renderSearchResults = (arr) => {
			console.log(arr);

		const searchResult = document.getElementById("search-results");

		searchResult.innerHTML = 
		arr.map(item => {
			console.log(item.image_url)
			return (
				`
				<div class="card" style="width: 18rem; margin: 5rem">
					<div class="results-item-img">
						<img src='${item.image_url}' class="card-img-top" style="width: 50; height: 80;" />
					</div>
					<div class="card-body">
						<h5 class="card-title">${item.name}</h5>
						<div class="card-text">Rating: ${item.rating}</div>
						<div class="card-texte">Price: ${item.price}</div>
					</div>
				</div>
				`
				)
			})
		}

	const handleSearchResponse = (response) => {
		console.log(response)

		let text = JSON.parse(response);
		console.log(text)
		let parsedText = JSON.parse(text);


		console.log(parsedText[0]);
		renderSearchResults(parsedText[0]);
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