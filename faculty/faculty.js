function addObjective(){
	var element = document.createElement("INPUT");
	
	element.setAttribute("type", "text");
	element.setAttribute("value", "");
	element.setAttribute("name", "Test Name");
	
	//var foo = document.getElementById("objectivesDiv");
	document.getElementById("objectivesDiv").appendChild(element);
}