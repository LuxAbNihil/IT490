



export const HandleSessionResponse = (response) => {
	console.log(response)
	let text = response;
	console.log("TEXT", text)
	checkSession();
	document.getElementById("textResponse").innerHTML = "response: "+text.toString()+"<p>";
}


export const HandleLoginResponse = (response) => {
	console.log(response)
	let text = response;
	console.log("TEXT", text.id)
	text.id ? sessionStorage.setItem("session", text.toString()) : null;
	checkSession();
	document.getElementById("textResponse").innerHTML = "response: "+text.toString()+"<p>";
}