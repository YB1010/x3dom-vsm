<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<meta name="description" content="Particlewall3d" />
		<meta name="keywords" content="Particlewall3d"/>
		<meta itemprop="description" content="Particlewall3d" />
		<title>VIRTUAL REALITY BOOK STORE</title>
		
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
		<!--	
		<script type="text/javascript" src="scripts/renderWindows.js"></script>
		-->
		
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
				var Range = 25;
				for (var loop = 0; loop < 5; loop++) {
					renderFloor(xPos[loop], yPos, zPos, xSize[loop], ySize, zSize, Range);
					renderFloor(xPos[loop], yPos, zPos2, xSize[loop], ySize, zSize2, Range);
				}
				
				/* Start: Windows */
				var windowId = "Windows_Rear";
				var windowURL = "scenes/window.x3d";
				var window_xPos = -21;
				for (var windowLoop = 0; windowLoop < 42; windowLoop++) {
					renderInlineLOD(windowId, window_xPos, 0, 0, 0, 1, 0, 0, windowURL, 50);
					window_xPos += 1;
				}

				var windowId_right = "Windows_Right";
				var windowId_left = "Windows_Left";
				var window_xPos = -2;
				for (var windowLoop = 0; windowLoop < 4; windowLoop++) {
					renderInlineLOD(windowId_right, window_xPos, 0, 0, 0, 1, 0, 0, windowURL, 50);
					renderInlineLOD(windowId_left, window_xPos, 0, 0, 0, 1, 0, 0, windowURL, 50);
					window_xPos += 1;
				}
				/* End: Windows */

				/* Start: Pillars */
				var pamount = 8;
				var psx = -12.5;
				var psy = psz = pid = 0;
				var purl = "scenes/pillar.x3d";
				var pid = "Pillars";

				for (var loop = 0; loop < 8; loop++) {
					if (loop == (pamount / 2)) {
						psx = -12.5;
						psz += 4;
					}
					renderInlineLOD(pid, psx, psy, psz, 0, 1, 0, 0.78539816339745, purl, 50);
					psx += 8;
				}
				/* End: Pillars */

				/* Start: SpotLightsGroup */
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
				/* End: SpotLightsGroup */
			}
			
			function flashnotice_1()
			{
				var Shelf_1 = new GlassBox();
				Shelf_1.init( 'Shelf_1', '820px', '440px', 'hidden', '', true, true );
				Shelf_1.lbo( true, 0.0 ); 
				Shelf_1.appear();
			}

			function flashnotice_2()
			{
				var Shelf_2 = new GlassBox();
				Shelf_2.init( 'Shelf_1', '820px', '440px', 'hidden', '', true, true );
				Shelf_2.lbo( true, 0.0 ); 
				Shelf_2.appear();
			}

			function modHitPoint(hitPnt)
	        {
	            // Show hitPnt value.
	            console.log("HitPoint = " + hitPnt);

	            var setHitPoint = [hitPnt[0], 0.875, hitPnt[2]];
	            var newHitPoint = new Array();
	            newHitPoint = setHitPoint;

	            var setAvatarPoint = [hitPnt[0], 2, hitPnt[2]+7.5];
	            var newAvatarPoint = new Array();
	            newAvatarPoint = setAvatarPoint;

	            var setAvatarLightPoint = [hitPnt[0], 1.8, hitPnt[2]];
	            var newAvatarLightPoint = new Array();
	            newAvatarLightPoint = setAvatarLightPoint;

	            // Show newHitPoint value.
	            console.log("newHitPoint = " + newHitPoint);
	            // Show newAvatarPoint value.
	            console.log("newAvatarPoint = " + newAvatarPoint);
	            // Show newAvatarLightPoint value.
	            console.log("newAvatarLightPoint = " + newAvatarLightPoint);

	            document.getElementById('AvatarPC').setAttribute('set_destination', newHitPoint);
	            document.getElementById('ViewpointPC').setAttribute('set_destination', newAvatarPoint);
	            document.getElementById('AvatarLightPC').setAttribute('set_destination', newAvatarLightPoint);

	            /*
	            document.getElementById('xHitPoint').innerHTML = newHitPoint[0];
	            document.getElementById('yHitPoint').innerHTML = newHitPoint[1];
	            document.getElementById('zHitPoint').innerHTML = newHitPoint[2];

	            document.getElementById('xYourHitPoint').innerHTML = hitPnt[0];
	            document.getElementById('yYourHitPoint').innerHTML = hitPnt[1];
	            document.getElementById('zYourHitPoint').innerHTML = hitPnt[2];
	            */
	        }
			
		</script>
		
	</head>
	
	<body>
		<article id="container">
		
			<header>
				<div class="text_header">
					<h1>VIRTUAL REALITY BOOK STORE</h1>
				</div>
			</header>
			<!--
			<nav>
				<ul>
					<li><a href="../index.php">BACK</a></li>
				</ul>
			</nav>
		-->
			<section>
					
				<X3D id="x3dom-scene">
					<Scene>
						
						<Viewpoint id="ViewpointMarker" jump="false" position="0 1.75 -10"></Viewpoint>						
						<positionChaser id="ViewpointPC" duration="2" initialDestination="0 0.875 -12" initialValue="0 0.875 -12" ></positionChaser>
            			<route fromNode="ViewpointPC" fromField='value_changed' toNode='ViewpointMarker' toField='position'></route>

						<Transform DEF="Avatar" translation="0 0.875 0" scale="1 1 1" center="0 0 0">
							<Shape>
								<Appearance>
									<Material diffuseColor="0.0 0.8 0.4" specularColor="1 1 1"></Material>
								</Appearance>
								<Box size="0.5 1.75 0.5" />
							</Shape>
								<!-- <Inline url="models/lugia.x3d"></Inline> -->
            			</Transform>

            			<PointLight DEF="AvatarLight"
            				on="TRUE" intensity="1"
            				ambientIntensity="0.0000"
            				color="0.698 0.698 0.698"
							location="0 1.8 -15"
							attenuation="1.0000 0.0000 0.0000"
							radius="50"></PointLight>

						<positionChaser id="AvatarLightPC" duration="1.5" initialDestination="0 1.8 -15" initialValue="0 1.8 -15" ></positionChaser>
            			<route fromNode="AvatarLightPC" fromField="value_changed" toNode="AvatarLight" toField="location"></route>

            			<!-- START: FLOOR 0 -->
						<Transform onclick="modHitPoint(event.hitPnt);
                        console.log('X = ' + event.hitPnt[0] + ' Y = ' + event.hitPnt[1] + ' Z = ' + event.hitPnt[2]);" translation="0 -0.05 -28" id="FloorProto"></Transform>

						<positionChaser id="AvatarPC" duration="1.5" initialDestination="0 0.875 -15" initialValue="0 0.875 -15" ></positionChaser>
            			<route fromNode='AvatarPC' fromField='value_changed' toNode="Avatar" toField="translation"></route>
						<!-- END: FLOOR 0 -->

						<!--
						<Viewpoint id="cam2" position='-1 0 5' description="Camera 2"></Viewpoint>
					-->
						
						<!--
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

						<!-- Roof -->
						<Transform translation="0 3.95 -21.5">
							<Shape>
								<Appearance>
									<Material diffuseColor="0.4 0.4 0.4" specularColor="0 0 0" />
								</Appearance>
								<Box size="42 0.1 17" />
							</Shape>
						</Transform>

						<!-- Left wall -->
						<Transform translation="-20.97 2 -19.5">
							<Shape>
								<Appearance>
									<Material diffuseColor="0.7 0.7 0.7" />
								</Appearance>
								<Box size="0.06 4 13" />
							</Shape>
						</Transform>

						<!-- Right wall -->
						<Transform translation="20.97 2 -19.5">
							<Shape>
								<Appearance>
									<Material diffuseColor="0.7 0.7 0.7" />
								</Appearance>
								<Box size="0.06 4 13" />
							</Shape>
						</Transform>

						<!-- Light must not over than 8 nodes -->
						<Group id="SpotLightsGroup"></Group>
						<!--
						<SpotLight ambientIntensity="0" attenuation="1 0 0" beamWidth="0.39" color="0.698 0.698 0.698" cutOffAngle="1.57"
							direction="0 -1 0" global="false" intensity="1" location="-16 4 -23" on="true" radius="20" ></SpotLight>

						<SpotLight ambientIntensity="0" attenuation="1 0 0" beamWidth="0.39" color="0.698 0.698 0.698" cutOffAngle="1.57"
							direction="0 -1 0" global="false" intensity="1" location="-8 4 -23" on="true" radius="20" ></SpotLight>

						<SpotLight ambientIntensity="0" attenuation="1 0 0" beamWidth="0.39" color="0.698 0.698 0.698" cutOffAngle="1.57"
							direction="0 -1 0" global="false" intensity="1" location="0 4 -23" on="true" radius="20" ></SpotLight>

						<SpotLight ambientIntensity="0" attenuation="1 0 0" beamWidth="0.39" color="0.698 0.698 0.698" cutOffAngle="1.57"
							direction="0 -1 0" global="false" intensity="1" location="8 4 -23" on="true" radius="20" ></SpotLight>

						<SpotLight ambientIntensity="0" attenuation="1 0 0" beamWidth="0.39" color="0.698 0.698 0.698" cutOffAngle="1.57"
							direction="0 -1 0" global="false" intensity="1" location="16 4 -23" on="true" radius="20" ></SpotLight>
						-->

						<Transform id="Pillars" translation="0 0 -25"></Transform>
						
						<!-- START: WINDOW GROUPS -->
						<Transform translation="0.53 2 -29.94" id="Windows_Rear"></Transform>
						<Transform translation="20.94 2 -27.53" id="Windows_Right" rotation="0 1 0 -1.5707963267949"></Transform>
						<Transform translation="-20.94 2 -28.41" id="Windows_Left" rotation="0 1 0 1.5707963267949"></Transform>
						<!-- END: WINDOW GROUPS -->

					<!-- START: SHELF GROUP -->
					<!--
					<Transform translation="0 0 0">
						<Group DEF="SHELF_GROUP">
							<Transform translation="-12 0 -20.5" rotation="0 1 0 0.78539816339745">
								<LOD center="0 0 0" range="5">
									<Group>
										<Inline url='"scenes/shelf.x3d"'></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
						</Group>
					</Transform>
					
					<Transform translation="-15.75 0 -24.25" rotation="0 1 0 0.78539816339745">
						<Group DEF="SHELF_G0">
							<Transform translation="0 0 0">
								<LOD center="0 0 0" range="5">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 1.3">
								<LOD center="0 0 0" range="5">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 2.6">
								<LOD center="0 0 0" range="5">
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
								<LOD center="0 0 0" range="5">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 1.3">
								<LOD center="0 0 0" range="5">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 2.6">
								<LOD center="0 0 0" range="5">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 3.9">
								<LOD center="0 0 0" range="5">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
						</Group>
					</Transform>
					-->
					<!--
					<Transform translation="-9.55 0 -26.05" rotation="0 1 0 0.78539816339745">
						<Group DEF="SHELF_G2">
							<Transform translation="0 0 0">
								<LOD center="0 0 0" range="50">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 1.3">
								<LOD center="0 0 0" range="50">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 2.6">
								<LOD center="0 0 0" range="50">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
								
							<Transform translation="0 0 3.9">
								<LOD center="0 0 0" range="50">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>

							<Transform translation="0 0 5.1">
								<LOD center="0 0 0" range="50">
									<Group>
										<Inline url="scenes/shelf.x3d"></Inline>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
						</Group>
					</Transform>
				-->
					<!-- END: SHELF GROUP -->

					</Scene>
				</X3D>
				
				<div id="myBox_2" style="display:none">
					<h3>Chula book's item show on grassbox demo</h3>
					<a href="#">Check Out</a>
				</div>
				
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
