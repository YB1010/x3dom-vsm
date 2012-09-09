<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<meta name="description" content="Particlewall3d" />
		<meta name="keywords" content="Particlewall3d"/>
		<meta itemprop="description" content="Particlewall3d" />
		<title>X3DOM VIRTUAL REALITY BOOK STORE</title>
		
		<link rel="shortcut icon" href="styles/favicon/favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="styles/x3dom.css" />
		<link rel="stylesheet" type="text/css" href="styles/reset.css" />
		<link rel="stylesheet" type="text/css" href="styles/text.css" />
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />
		
		<style type="text/css">
			#myBox_contentBoxBg {
				filter: alpha(opacity=50);
				-moz-opacity:.50;
				opacity:.50;
			}
			#myBox_2_content {
				padding: 20px;
			}
			#myBox_2_content {
				background: #333;
				width: 100%;
				height: 100%;
			}
			#myBox_2 h3 {
				color: #FFF;
				font-size: 17px;
				margin: 0px; 
				text-align: center
			}
			
			#Shelf_1_content {
				width: 100%;
				height: 100%;
			}
		</style>
		
        <script type="text/javascript" src="scripts/x3dom.js"></script>			
		<script type="text/javascript" src="scripts/runtime.js"></script>
		<script type="text/javascript" src="scripts/objRenderer.js"></script>
		<script type="text/javascript" src="scripts/keyevents.js"></script>
		
		<script src="javascripts/prototype.js" type="text/javascript"></script>
		<script src="javascripts/scriptaculous/effects.js" type="text/javascript"></script>
		<script src="javascripts/glassbox/glassbox.js" type="text/javascript"></script>
		
		<script type="text/javascript">
			
			document.onload = function() {

				/*
				renderFloor(0, 0, 0, 8, 0.1, 4, 40);
				renderFloor(-8, 0, 0, 8, 0.1, 4, 40);
				renderFloor(8, 0, 0, 8, 0.1, 4, 40);
				renderFloor(-16.5, 0, 0, 9, 0.1, 4, 40);
				renderFloor(16.5, 0, 0, 9, 0.1, 4, 40);

				renderFloor(0, 0, 4, 8, 0.1, 4, 40);
				renderFloor(-8, 0, 4, 8, 0.1, 4, 40);
				renderFloor(8, 0, 4, 8, 0.1, 4, 40);
				renderFloor(-16.5, 0, 4, 9, 0.1, 4, 40);
				renderFloor(16.5, 0, 4, 9, 0.1, 4, 40);
				*/
				var xPos = new Array();
				xPos = [0, -8, 8, -16.5, 16.5];
				var yPos = 0;
				var zPos = 2.5;
				var zPos2 = 11;
				var xSize = new Array();
				xSize = [8, 8, 8, 9, 9];
				var ySize = 0.1;
				var zSize = 9;
				var zSize2 = 8;
				var Range = 100;
				for (var loop = 0; loop < 5; loop++) {
					renderFloor(xPos[loop], yPos, zPos, xSize[loop], ySize, zSize, Range);
					renderFloor(xPos[loop], yPos, zPos2, xSize[loop], ySize, zSize2, Range);
				}
				
				/* Start: Windows */
				var windowId = "Windows_Rear";
				var windowURL = "scenes/window.x3d";
				var window_xPos = -21;
				for (var windowLoop = 0; windowLoop < 42; windowLoop++) {
					renderInlineLOD(windowId, window_xPos, 0, 0, 0, 1, 0, 0, windowURL, 25);
					window_xPos += 1;
				}

				var windowId_right = "Windows_Right";
				var windowId_left = "Windows_Left";
				var window_xPos = -2;
				for (var windowLoop = 0; windowLoop < 4; windowLoop++) {
					renderInlineLOD(windowId_right, window_xPos, 0, 0, 0, 1, 0, 0, windowURL, 25);
					renderInlineLOD(windowId_left, window_xPos, 0, 0, 0, 1, 0, 0, windowURL, 25);
					window_xPos += 1;
				}
				/* End: Windows */

				/* Start: Pillars */
				var pamount = 8;
				var psx = -12.5;
				var psy = psz = pid = 0;

				for (var loop = 0; loop < pamount; loop++) {
					if (loop == (pamount / 2)) {
						psx = -12.5;
						psz += 4;
					}
					renderInlineLOD('Pillars', psx, psy, psz, 0, 1, 0, 0.78539816339745, 'scenes/pillar.x3d', 20);
					psx += pamount;
				}
				/* End: Pillars */

				SpotLightsGroup();

				/* Start: up-lights */
				var ul_amount = 80;
				var ulx = -18;
				var uly = 2.9;
				var ulz = 0;

				for (var loop = 0; loop < ul_amount; loop++) {
					if (ulx > 18) {
						ulx = -18;
						ulz += 1.04;
					}
					renderInlineLOD('up-lights', ulx, uly, ulz, 0, 1, 0, 1.5707963267949, 'scenes/up-light.x3d', 15);
					ulx += 4;
				}
				/* End: up-lights */
			}
			
			function flashnotice_1()
			{
				var Shelf_1 = new GlassBox();
				Shelf_1.init( 'Shelf_1', '820px', '440px', 'hidden', '', true, true );
				Shelf_1.lbo( true, 0.0 ); 
				Shelf_1.appear();
			}
			
			function SpotLightsGroup()
			{
				var ambientIntensity = 0;
				var attenuation = "1 0 0";
				var beamWidth = 0.39;
				var color = "0.698 0.698 0.698";
				var cutOffAngle = 1.57;
				var direction = "0 -1 0";
				var intensity = 1;
				var location = new Array();
				location = ["-16 4 -23", "-8 4 -23", "0 4 -23", "8 4 -23", "16 4 -23"];
				var radius = 20;

				for (var SpotLightLoop = 0; SpotLightLoop < location.length; SpotLightLoop++) {
					renderSpotLight("SpotLightsGroup", ambientIntensity, attenuation, beamWidth, color, cutOffAngle, direction, intensity, location[SpotLightLoop], radius);
				}
			}

			function modHitPoint(hitPnt)
	        {
	            // Show hitPnt value.
	            console.log("HitPoint = " + hitPnt);

	            var setHitPoint = [hitPnt[0], 0, hitPnt[2]];
	            var newHitPoint = new Array();
	            newHitPoint = setHitPoint;

	            var setAvatarPoint = [hitPnt[0], 2, hitPnt[2] + 7];
	            var newAvatarPoint = new Array();
	            newAvatarPoint = setAvatarPoint;

	            var setAvatarLightPoint = [hitPnt[0], 4, hitPnt[2]];
	            var newAvatarLightPoint = new Array();
	            newAvatarLightPoint = setAvatarLightPoint;

	            document.getElementById('AvatarPC').setAttribute('set_destination', newHitPoint);

	            document.getElementById('ViewpointPC').setAttribute('set_destination', newAvatarPoint);
	            document.getElementById('Avatar').setAttribute("translation", newAvatarPoint);

	            document.getElementById("ViewpointMarker").setAttribute("position", newAvatarPoint);

	            // Show newHitPoint value.
	            console.log("newHitPoint = " + newHitPoint);
	            // Show newAvatarPoint value.
	            console.log("newAvatarPoint = " + newAvatarPoint);
	            // Show newAvatarLightPoint value.
	        }

	        document.onkeydown = function(e)
	        {

	        	/* Start: Viewpoint */
				var keynum = 0;
	        	//var increseAngle = 0;
				/* End: Viewpoint */

				if(window.event) { keynum = e.keyCode; }  // IE (sucks)
				else if(e.which) { keynum = e.which; }    // Netscape/Firefox/Opera

				if(keynum == 37) { // left
				    //Move selection left
				    keyPress(37);
				}

				if(keynum == 38) { // up
				    //Move selection up
				    keyPress(38);
				}

				if(keynum == 39) { // right
				    //Move selection right
				  	keyPress(39);
				}

				if(keynum == 40) { // down
				    //Move selection down
				    keyPress(40);
				}

				if(keynum == 13) { // enter
				    //Act on current selection
				}
			}
			
		</script>
		
	</head>
	
	<body>
		<article id="container">
		
			<header>
				<div class="text_header">
					<h1>X3DOM VIRTUAL REALITY BOOK STORE</h1>
				</div>
			</header>

			<nav>
				<ul>
					<a href="../index.php"><li>HOME</li></a>
					<a href="../index.php"><li>ABOUT</li></a>
					<a href="../index.php"><li>CONTACT</li></a>
				</ul>
			</nav>

			<section>
					
				<X3D id="x3dom-scene" showStat="true">
					<Scene>
						<!-- Start: Viewpoint -->
						<Viewpoint id="ViewpointMarker" jump="false" position="0 1.75 -10" orientation="0 1 0 0"></Viewpoint>

						<positionChaser id="ViewpointPC" duration="2" initialDestination="0 0.875 -12" initialValue="0 0.875 -12"></positionChaser>
            			<Route fromNode="ViewpointPC" fromField='value_changed' toNode='ViewpointMarker' toField='position'></Route>          			
            			<!-- End: Viewpoint -->

            			<!--
						<Transform id="Avatar" DEF="Avatar" translation="0 0.875 0" scale="1 1 1" center="0 0 0" rotation="0 1 0 0">
						-->
						<Transform id="Avatar" DEF="Avatar" translation="0 0 0" scale="1 1 1" center="0 0 0" rotation="0 1 0 0">
							<!--
							<Shape>
								<Appearance>
									<Material diffuseColor="0.0 0.8 0.4" specularColor="0 0 0"></Material>
								</Appearance>
								<Box size="0.5 1.75 0.5" />
							</Shape>
							-->
							<Inline url="scenes/avatar/sara.x3d"></Inline>
						
            			</Transform>

            			<!-- START: FLOOR 0 -->
						<Transform id="FloorProto" onclick="modHitPoint(event.hitPnt);" translation="0 -0.05 -28" ></Transform>

						<positionChaser id="AvatarPC" duration="1.5" initialDestination="0 0 -15" initialValue="0 0 -15" ></positionChaser>
            			<route fromNode='AvatarPC' fromField='value_changed' toNode="Avatar" toField="translation"></route>
						<!-- END: FLOOR 0 -->

						<!--
						<Viewpoint id="cam2" position='-1 0 5' description="Camera 2"></Viewpoint>
						<Background skyColor="1 1 1"></Background>
						-->

						<Background groundAngle='1.57079'
						groundColor='1 0.8 0.6 0.6 0.4 0.2'
						skyAngle='0.2 1.57079'
						skyColor='1 1 1'
						backUrl='"texture/sky/BK.png"'
						bottomUrl='"texture/sky/DN.png"'
						frontUrl='"texture/sky/FR.png"'
						leftUrl='"texture/sky/LF.png"'
						rightUrl='"texture/sky/RT.png"'
						topUrl='"texture/sky/UP.png"'></Background>

						<!-- FLOOR -->
						<Transform translation="0 -0.15 -20">
							<Shape>
								<Appearance>
									<Material diffuseColor="1 1 1" spcularColor="1 1 1" />
								</Appearance>
								<Box size ="42.5 0.1 20.5" />
							</Shape>
						</Transform>

						<!-- Roof -->
						<Transform translation="0 3.9 -20">
							<Shape>
								<Appearance>
									<Material diffuseColor="0.4 0.4 0.4" specularColor="0 0 0" />
								</Appearance>
								<Box size="42.5 0.1 20.5" />
							</Shape>
						</Transform>

						<!-- Left wall -->
						<Transform translation="-21.23 1.9 -19.63">
							<Shape>
								<Appearance>
									<Material diffuseColor="0.7 0.7 0.7" />
								</Appearance>
								<Box size="0.06 4 13" />
							</Shape>
						</Transform>

						<!-- Right wall -->
						<Transform translation="20.96 1.9 -19.73">
							<Shape>
								<Appearance>
									<Material diffuseColor="0.7 0.7 0.7" />
								</Appearance>
								<Box size="0.06 4 13" />
							</Shape>
						</Transform>

						<!-- SpotLightsGroup (SpotLight 5 nodes). -->
						<Group id="SpotLightsGroup"></Group>

						<!-- pillars -->
						<Transform id="Pillars" translation="0 0 -25"></Transform>

						<!-- up-lights -->
						<Transform id="up-lights" translation="0 0 -28"></Transform>
						
						<!-- START: WINDOW GROUPS -->
						<Transform translation="0.28 1.90 -30.19" id="Windows_Rear"></Transform> <!-- X, Y, Z is OK -->
						<Transform translation="20.94 1.90 -27.7" id="Windows_Right" rotation="0 1 0 -1.5707963267949"></Transform>
						<Transform translation="-21.19 1.90 -28.66" id="Windows_Left" rotation="0 1 0 1.5707963267949"></Transform>
						<!-- END: WINDOW GROUPS -->

					<!-- Start: Escalator -->
					<!--
					<Transform translation="18 -3.2 -3.8" scale="0.025 0.025 0.025" rotation="0 1 0 1.5707963267949">
						<Inline url='"scenes/escalator.x3d"'></Inline>
					</Transform>

					<Transform translation="-18.5 -3.2 -3.8" scale="0.025 0.025 0.025" rotation="0 1 0 1.5707963267949">
						<Inline url='"scenes/escalator.x3d"'></Inline>
					</Transform>
				-->
					<!-- End: Escalator -->

					<!-- START: SHELF GROUP -->
					
					<Transform translation="0 0 0">
						<Group DEF="SHELF_GROUP">
							<Transform translation="-12 0 -20.5" rotation="0 1 0 0.78539816339745">
								<LOD center="0 0 0" range="20">
									<Group>
										<Inline url='"scenes/shelf.x3d"' onclick="flashnotice_1()"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
						</Group>
					</Transform>
					
					<Transform translation="-15.75 0 -24.25" rotation="0 1 0 0.78539816339745">
						<Group DEF="SHELF_G0">
							<Transform translation="0 0 0">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d" onclick="flashnotice_1()"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 1.3">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d" onclick="flashnotice_1()"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 2.6">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
						</Group>
					</Transform>
					
					<Transform translation="-12 0 -24.5" rotation="0 1 0 0.78539816339745">
						<Group DEF="SHELF_G1">
							<Transform translation="0 0 0">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 1.3">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 2.6">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 3.9">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
						</Group>
					</Transform>
					
					
					<Transform translation="-9.55 0 -26.05" rotation="0 1 0 0.78539816339745">
						<Group DEF="SHELF_G2">
							<Transform translation="0 0 0">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 1.3">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 2.6">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 3.9">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>

							<Transform translation="0 0 5.1">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
						</Group>
					</Transform>

					<Transform translation="0 0 0">
						<Group DEF="SHELF_GROUP">
							<Transform translation="12 0 -20.5" rotation="0 1 0 0.78539816339745">
								<LOD center="0 0 0" range="5">
									<Group>
										<Inline url='"scenes/shelf.x3d"'></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
						</Group>
					</Transform>
					

					<Transform translation="9.55 0 -26.05" rotation="0 1 0 0.78539816339745">
						<Group DEF="SHELF_G2">
							<Transform translation="0 0 0">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 1.3">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 2.6">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 3.9">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>

							<Transform translation="0 0 5.1">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
						</Group>
					</Transform>
					
					<Transform translation="15.75 0 -24.25" rotation="0 1 0 0.78539816339745">
						<Group DEF="SHELF_G0">
							<Transform translation="0 0 0">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 1.3">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 2.6">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
						</Group>
					</Transform>
					
					<Transform translation="12 0 -24.5" rotation="0 1 0 0.78539816339745">
						<Group DEF="SHELF_G1">
							<Transform translation="0 0 0">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 1.3">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 2.6">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 3.9">
								<LOD center="0 0 0" range="10">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
						</Group>
					</Transform>
					
					<!-- END: SHELF GROUP -->

					</Scene>
				</X3D>
				
				<div id="Shelf_1" style="display:none">
					<iframe width="960px" height="440px" frameborder="0" scrolling="yes" src="s/index.php"></iframe>
				</div>
				
			</section>
			
			<!--
			<aside>
				<ul>
					<li id="showNavigationType"></li>
					<li id="showSpeed"></li>
				</ul>
				
				<ul>
					<li onclick="setRuntime('examine', 'x3dom-scene')">Examine</li>
					<li onclick="setRuntime('walk', 'x3dom-scene')">Walk</li>
					<li onclick="setRuntime('fly', 'x3dom-scene')">Fly</li>
					<li onclick="setRuntime('lookAt', 'x3dom-scene')">Look At</li>
					<li onclick="setRuntime('game', 'x3dom-scene')">Game</li>
				</ul>
				
				<ul>
					<li onclick="setRuntime('upSpeed', 'x3dom-scene')">Speed Up</li>
					<li onclick="setRuntime('downSpeed', 'x3dom-scene')">Speed Down</li>
				</ul>
			</aside>
			-->

			<footer>
				<ul>
					<li><a href="http://hassadee.com">&copy; 2012 Hassadee Pimsuwan</a></li>
				</ul>
			</footer>
		</article>
	</body>
</html>
