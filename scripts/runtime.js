/*
 * Creator: Hassadee Pimsuwan
 * Date.Created: 27 January 2012
 *
 * runtime.js
 *
 */

/* =========================================================================================================
 This method is called once the system initialized and is ready to render the first time.
 It is therefore possible to execute custom action by overriding this method in your code.
 ========================================================================================================= */

x3dom.runtime.ready = function()
{
	var id = "x3dom-scene";
	var configure = document.getElementById(id);
	
	/* Default view */
	/*configure.runtime.showAll();*/
	getNavigationType(id);
	
	/* =========================================================================================================
	 Arguments:	show (boolean) – true/false to show or hide the debug window
	 Returns: The current visibility status of the debug window (true/false)
	 Displays or hides the debug window. If the paramiter is omitted, the current visibility satatus is returned.
	 ========================================================================================================= */
	configure.runtime.debug(true);
	
	/* =========================================================================================================
	 Arguments:	mode (boolean) – true/false to enable or disable the stats info
	 Returns:The current visibility of the stats info (true/false)
	 Get or set the visibility of the statistics information.
	 If parameter is omitted, this method returns the visibility status as boolean.
	 ========================================================================================================= */
	configure.runtime.statistics(true);
};

function setRuntime(typename, id)
{
	/* ====================================================
	 Arguments:	typename (string) -
	 (walk/examine/lookAround/lookAt/resetView/uprightView/showAll/nextView/prevView).
	 To change mode or viewpoint.
	 walk() : Switches to walk mode.
	 examine() : Switches to examine mode.
	 lookAround() : Switches to lookAround mode.
	 lookAt() : Switches to lookAt mode.
	 resetView() : Navigates to the initial viewpoint.
	 uprightView() : Navigates to upright view.
	 showAll() : Zooms so that all objects are visible.
	 nextView() : Navigates to the next viewpoint.
	 prevView() : Navigates to the previous viewpoint.
	 Returns: The current mode or viewpoint.
	 (walk/examine/lookAround/lookAt/resetView/uprightView/showAll/nextView/prevView).
	 Set mode or viewpoint of X3DOM element.
	 ==================================================== */
	
	var configure = document.getElementById(id);
	
	switch (typename)
	{
		case "walk": configure.runtime.walk(); break;
		case "fly": configure.runtime.fly(); break;
		case "examine": configure.runtime.examine(); break;
		case "lookAround": configure.runtime.lookAround(); break;
		case "lookAt": configure.runtime.lookAt(); break;
		case "game": configure.runtime.game(); break;
		case "resetView": configure.runtime.resetView(); break;
		case "uprightView": configure.runtime.uprightView(); break;
		case "showAll": configure.runtime.showAll(); break;
		case "nextView": configure.runtime.nextView(); break;
		case "prevView": configure.runtime.prevView(); break;
		case "upSpeed": setSpeed("up", id); break;
		case "downSpeed": setSpeed("down", id); break
		default: configure.runtime.examine();
	}
	getNavigationType(id);
}

function togglePoint()
{
	var configure = document.getElementById("x3dom-scene");
	configure.runtime.togglePoints();
}

function setSpeed(value, id)
{
	var configure = document.getElementById(id);
	var currentSpeed = configure.runtime.speed();
	
	if (value == "up") {
		currentSpeed += 1;
		configure.runtime.speed(currentSpeed);
	} else if ((value == "down") && (currentSpeed > 1)) {
		currentSpeed -= 1;
		configure.runtime.speed(currentSpeed);
	} else {
		currentSpeed = currentSpeed;
	}
	
	console.log(currentSpeed);
	document.getElementById('showSpeed').innerHTML = currentSpeed;
}

function getNavigationType(id)
{
	var configure = document.getElementById(id);
	
	var navigationTypeName = configure.runtime.navigationType();
	var currentViewpoint = configure.runtime.viewpoint();
	
	console.log(navigationTypeName);
	console.log(currentViewpoint);
	
	document.getElementById('showNavigationType').innerHTML = navigationTypeName;
	setSpeed(0, id);
}

function toggleFullscreen(id)
{
	var toggleFS_ID = document.getElementById(id);
	
	if ((document.webkitIsFullScreen == false) || (document.mozFullScreen == false)) {
		if (document.webkitIsFullScreen == false) {
			toggleFS_ID.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
		} else if (document.mozFullScreen == false) {
			toggleFS_ID.mozRequestFullScreen();
		} else {
			console.assert(false);
		}
	} else {
		if (document.webkitIsFullScreen == true) {
			document.webkitCancelFullScreen();
		}  else if (document.mozFullScreen == true) {
			document.mozCancelFullScreen();
		} else {
			console.assert(false);
		}
	}
}