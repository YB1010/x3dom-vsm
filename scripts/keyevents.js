var oDegree = -3.141592653589793;
var walkStep = 0.25;

function keyPress(press)
{
	/* Get present viewpoint position values */
	var viewpointPosition = document.getElementById("ViewpointMarker").getAttribute("position");
	var viewpointPositionSplited = viewpointPosition.split(","); /* Split array value from viewpoint position attribute */
	console.log("viewpointPosition = " + viewpointPosition + ", viewpointPositionSplited = " + viewpointPositionSplited);

	var oViewpointPosition = document.getElementById("ViewpointMarker").getAttribute("orientation");
	var oPositionSplited = oViewpointPosition.split(",");
	console.log("oViewpointPosition = " + oViewpointPosition + " , avatarPositionSplited = " + oPositionSplited);

	var y = viewpointPositionSplited[1];

	/* Get present avatar translation values */
	//var avatarPosition = document.getElementById("Avatar").getAttribute("translation");
	//var avatarPositionSplited = avatarPosition.split(",");
	/* Split array value from avatar translation attribute */
	//console.log("avatarPosition = " + avatarPosition + " , avatarPositionSplited = " + avatarPositionSplited);

	/* Set setDegree value */
	var setDegree = Math.PI/90; /* PI/180 = 1 degree, PI/90 = 2 degree */

	/* Left */
	if (press == 37) {
		oDegree += setDegree;

		var setViewpointOrientation = [0, 1, 0, oDegree];
	    var viewpointOrientation = new Array();
	    viewpointOrientation = setViewpointOrientation;

	    document.getElementById("ViewpointMarker").setAttribute("orientation", viewpointOrientation);
	    //document.getElementById("Avatar").setAttribute("rotation", viewpointOrientation);


		console.log("Left : Angle Orientation = " + viewpointOrientation);
	}

	/* Right */
	if (press == 39) {
		oDegree -= setDegree;

	    //var revert_oDegree = (oDegree * 180) / Math.PI;
	    //console.log("oDegree = " + oDegree + " ( " + revert_oDegree + " Degree)");

	    /* Assign new orientation degree to translation attibute */
		var setViewpointOrientation = [0, 1, 0, oDegree];
	    var viewpointOrientation = new Array();
	    viewpointOrientation = setViewpointOrientation;

	    //var x = ((ValueSplit[2] - 7.5) * Math.sin(degree)) + (ValueSplit[0] * Math.cos(degree));
	    //var z = ((ValueSplit[2] - 7.5) * Math.cos(degree)) - (ValueSplit[0] * Math.sin(degree));

	    /* New x', z' */
	    //var x = ((5 * Math.cos(oDegree)) + avatarPositionSplited[0] * 1);
	    //var z = ((5 * Math.sin(oDegree)) + avatarPositionSplited[2] * 1);

	    //var x = ((5 * Math.cos(oDegree)) + oPositionSplited[0] * 1);
	    //var z = ((5 * Math.sin(oDegree)) + oPositionSplited[2] * 1);

	    //console.log("x = " + x);
	    //console.log("z = " + z);

	    //var setViewpointPosition = [x, y, z];
		//var viewpointPosition = new Array();
		//viewpointPosition = setViewpointPosition;

	    document.getElementById("ViewpointMarker").setAttribute("orientation", viewpointOrientation); /* Assign new viewpoint's orientation */
	    //document.getElementById("ViewpointMarker").setAttribute("position", viewpointPosition); /* Assign new viewpoint's position */

	    //document.getElementById('ViewpointPC').setAttribute('set_destination', viewpointPosition);
		//document.getElementById("Avatar").setAttribute("rotation", viewpointOrientation);

		/*
		console.log("viewpointPositionSplited[0] = " + viewpointPositionSplited[0]);
	    console.log("viewpointPositionSplited[2] = " + viewpointPositionSplited[2]);

	    console.log("getAvatarPositionSplit[0] = " + avatarPositionSplited[0]);
	    console.log("getAvatarPositionSplit[2] = " + avatarPositionSplited[2]);

	    console.log("viewpointPosition = " + viewpointPosition);
		console.log("Right : Angle Orientation = " + viewpointOrientation);
		*/
	}

	/* Up */
	if (press == 38) {
		var set_zPosition = Number(viewpointPositionSplited[2]);
		var set_xPosition = Number(viewpointPositionSplited[0]);

		set_zPosition -= walkStep * Math.cos(oDegree); // Calaulate is to find zPosition.
		set_xPosition -= walkStep * Math.sin(oDegree); // Calculate is to find xPosition.

		if (( set_zPosition < 1 || set_zPosition > 18 ) || ( set_xPosition < 2 || set_xPosition > 48 )) return;

	    var setViewpointPosition = [set_xPosition, y, set_zPosition];
		var viewpointPosition = new Array();
		viewpointPosition = setViewpointPosition;

	    document.getElementById("ViewpointMarker").setAttribute("position", viewpointPosition);
	    //document.getElementById('ViewpointPC').setAttribute('set_destination', viewpointPosition);
	}

	/* Down */
	if (press == 40) {
		var set_zPosition = Number(viewpointPositionSplited[2]);
		var set_xPosition = Number(viewpointPositionSplited[0]);

		set_zPosition += walkStep * Math.cos(oDegree); // Calaulate is to find zPosition.
		set_xPosition += walkStep * Math.sin(oDegree); // Calculate is to find xPosition.

		if (( set_zPosition < 1 || set_zPosition > 18 ) || ( set_xPosition < 2 || set_xPosition > 48 )) return;

	    var setViewpointPosition = [set_xPosition, y, set_zPosition];
		var viewpointPosition = new Array();
		viewpointPosition = setViewpointPosition;

	    document.getElementById("ViewpointMarker").setAttribute("position", viewpointPosition);
	    //document.getElementById('ViewpointPC').setAttribute('set_destination', viewpointPosition);
	}

	/* Enter */
	if (press == 13) {

	}
}