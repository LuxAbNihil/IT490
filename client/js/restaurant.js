

window.addEventListener("load", () => {



	const favoritesBtn = document.getElementById("favorite");


	// const renderComment = (arr) => {
	// 		console.log(arr);

		// const commentList = document.getElementById("comment-list");

		// commentList.innerHTML = 
		// 		`
		// 		<li class="comment card clearfix" style="list-style: none; margin-top: 2rem; padding: 2rem;">
  //                   <div class="clearfix">
  //                       <h4 class="pull-left">${arr[0]}</h4>
  //                       <p class="pull-right">${arr[1]}</p>
  //                   </div>
  //                   <p>
  //                       <em>${arr[2]}</em>
  //                   </p>
  //                </li>
  //                 `
			
		// }

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

})