function addObjective(){
	var element = document.createElement("input");
	
	element.setAttribute("type", "text");
	element.setAttribute("value", "");
	element.setAttribute("name", "Test Name");
	
	var foo = document.getElementById("objectivesDiv");
	foo.appendChild(element);
}