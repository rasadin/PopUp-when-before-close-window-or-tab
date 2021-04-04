
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!-- start div for popup -->
		<div class="lightbox" id="text">
			<div class="box">
				<div class="close">X</div>
				<!-- your title -->
				<div class="content">
					Leaving so soon, but your order is not complete. Please confirm your order below.
				</div>
			</div>
		</div>
		<!-- end div for popup -->	

		<script>

			// Exit intent
			function addEvent(obj, evt, fn) {
				if (obj.addEventListener) {
					obj.addEventListener(evt, fn, false);
				} else if (obj.attachEvent) {
					obj.attachEvent("on" + evt, fn);
				}
			}

			// Exit intent trigger
			addEvent(document, 'mouseout', function(evt) {
				if (evt.toElement == null && evt.relatedTarget == null) {
					if (getCookie("username") == 'rasadin') {
						$('.lightbox').slideDown();
					}
				};
			});

			// Closing the Popup Box
			$('div.close').click(function() {
				$('.lightbox').slideUp();
				setCookie("username", "", 30); //make empty cookies value for username 
			});


			//this function set cookies value
			function setCookie(cname, cvalue, exdays) {
				var d = new Date();
				d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
				var expires = "expires=" + d.toGMTString();
				document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
				// alert(document.cookie);
			}
			setCookie("username", "rasadin", 30); //on page load set cookies value, cookies name = username, cookies value=rasadin

			//this get the cookies value
			function getCookie(cname) {
			var name = cname + "=";
			var decodedCookie = decodeURIComponent(document.cookie);
			var ca = decodedCookie.split(';');
			// alert(name);
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
			}
			// alert(getCookie("username"));


		</script>

		<style>
			.lightbox {
			/** Hide the lightbox */
			display: none;
			/** Apply basic lightbox styling */
			position: fixed;
			z-index: 9999;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			color: #333333;
			}

			.lightbox:after {
			content: '';
			display: table;
			clear: both;
			}

			.lightbox .box {
			width: -webkit-min-content;
			width: -moz-min-content;
			width: min-content;
			min-width: 500px;
			margin: 2% auto;
			padding: 20px;
			background-color: #FFF;
			box-shadow: 0px 1px 26px -3px #777777;
			}

			.lightbox .title {
			margin: 0;
			padding: 0 0 10px 0px;
			border-bottom: 1px #ccc solid;
			font-size: 22px;
			}

			.lightbox .content {
			display: block;
			padding: 10px 0 0 0px;
			font-size: 18px;
			line-height: 22px;
			}

			.lightbox .close {
			float: right;
			display: block;
			text-decoration: none;
			font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
			font-size: 22px;
			color: #858585;
			}

			.lightbox .open {
			/** Show lightbox when mouse leaves the browser window */
			display: block;
			outline: none;
			}
		</style>
