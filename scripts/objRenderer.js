/*
 * Creator: Hassadee Pimsuwan
 * Date.Created: 31 March 2012
 * Date.Modifired: 24 June 2012
 *
 * objRenderer.js
 *
 */

function objBox(xSize, ySize, zSize, boolSolid)
{
	console.log("Start function: objBox");
	console.log("xSize = " + xSize + ", ySize = " + ySize + ", zSize = " + zSize + ", Solid = " + boolSolid)
	var Box = document.createElement("Box");
	Box.setAttribute("solid", boolSolid);
	Box.setAttribute("size", xSize + " " + ySize + " " + zSize);
	return Box;
}

function objTransform(xPos, yPos, zPos, xScale, yScale, zScale, xRo, yRo, zRo, Degree)
{
	var Transform = document.createElement("Transform");
	Transform.setAttribute("translation", xPos + " " + yPos + " " + zPos);
	Transform.setAttribute("scale", xScale + " " + yScale + " " + zScale);
	Transform.setAttribute("rotation", xRo + " " + yRo + " " + zRo + " " + Degree);
	return Transform;
}

function objLOD(xCenter, yCenter, zCenter, Range)
{
	var LOD = document.createElement("LOD");
	LOD.setAttribute("center", xCenter + " " + yCenter + " " + zCenter);
	LOD.setAttribute("range", Range);
	return LOD;
}

function renderSpotLight(ID, ambientIntensity, attenuation, beamWidth, color, cutOffAngle, direction, intensity, location, radius)
{
	console.log("Start function: renderSpotLight");

	var SpotLight = document.createElement("SpotLight");
	SpotLight.setAttribute("ambientIntensity", ambientIntensity);
	SpotLight.setAttribute("attenuation", attenuation);
	SpotLight.setAttribute("beamWidth", beamWidth);
	SpotLight.setAttribute("color", color);
	SpotLight.setAttribute("cutOffAngle", cutOffAngle);
	SpotLight.setAttribute("direction", direction);
	SpotLight.setAttribute("intensity", intensity);
	SpotLight.setAttribute("location", location);
	SpotLight.setAttribute("radius", radius);

	var renderSpotLight = document.getElementById(ID);
	renderSpotLight.appendChild(SpotLight);

	console.log("End function: renderSpotLight");
}

function renderFloor(x, y, z, xSize, ySize, zSize, Range)
{
	console.log("Start function: renderFloor");
	
	var transform = objTransform(x, y, z, 1, 1, 1, 0, 1, 0, 0);
		
	var lod = objLOD(0, 0, 0, Range);
	
	transform.appendChild(lod);
	
	var obj_group = document.createElement("Group");
	lod.appendChild(obj_group);
	
	var shape = document.createElement("Shape");
	obj_group.appendChild(shape);
	
	var appearance = document.createElement("Appearance");
	shape.appendChild(appearance);
	
	var img_texture = document.createElement("ImageTexture");
	img_texture.setAttribute("repeatS", "true");
	img_texture.setAttribute("repeatT", "true");
	img_texture.setAttribute("url", "texture/Wood-floor.jpg");
	appearance.appendChild(img_texture);
	
	var texture_transform = document.createElement("TextureTransform");
	texture_transform.setAttribute("scale", "8 10");
	appearance.appendChild(texture_transform);
	
	var plate = objBox(xSize, ySize, zSize, "true");
	shape.appendChild(plate);
	
	var null_node = document.createElement("WorldInfo");
	null_node.setAttribute("info", "null node");
	lod.appendChild(null_node);
	
	var renderFloor = document.getElementById("FloorProto");
	renderFloor.appendChild(transform);
	
	console.log("End function: renderFloor");
}

function renderInlineLOD(ID, xPos, yPos, zPos, xRo, yRo, zRo, Degree, URL, Range)
{
	var LOD = objLOD(0, 0, 0, Range);
	var Transform = objTransform(xPos, yPos, zPos, 1, 1, 1, xRo, yRo, zRo, Degree);
	var Group = document.createElement("Group");
	var Inline = document.createElement("Inline");
	Inline.setAttribute("url", URL);
	
	var NULL = document.createElement("WorldInfo");
	NULL.setAttribute("info", "null node");
	
	LOD.appendChild(Group);
	Group.appendChild(Transform);
	Transform.appendChild(Inline);
	LOD.appendChild(NULL);
	
	var renderInlineLOD = document.getElementById(ID);
	renderInlineLOD.appendChild(LOD);
}