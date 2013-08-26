
<!DOCTYPE html>

<html lang="en">

    <head>
    
    	<meta charset="utf-8" />
        <meta name="viewport" id="view" content="width=device-width minimum-scale=1, maximum-scale=1" />
        
        <meta property="fb:app_id" content="374121415990908" />		
        <style type="text/css">
			
			body {
			
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #FFF;
				
			}
			
			.container {
				
				float: left;	
				cursor: pointer;
				position: relative;
				margin-left: 3px;
				
			}
			
			#twitter, #twitter-mask {

				width: 59px;
				height: 20px;
				overflow: hidden;
				background: url(../img/graphics/social/twitter.png) no-repeat;
				
			}
			
			.twitter-webkit {
			
				background: url(../img/graphics/social/twitter_webkit.png) no-repeat !important;
				
			}
			
			.twitter-mac {
			
				background: url(../img/graphics/social/twitter_mac.png) no-repeat !important;
				
			}
			
			#google, #google-mask {
				
				width: 32px;
				height: 20px;
				overflow: hidden;
				background: url(../img/graphics/social/google.png) no-repeat;
				
			}
			
			#pinterest, #pinterest-mask {
			
				width: 43px;
				height: 20px;
				background: url(../../../../assets.pinterest.com/images/PinExt.png) no-repeat;
				
			}
			
			#facebook-mask, #facebook {
				
				width: 46px;
				height: 21px;
				margin-left: 0;
				overflow: hidden;
				background: url(../img/graphics/social/facebook.png) no-repeat;
				
			}
			
			.facebook-mac {
			
				background: url(../img/graphics/social/facebook_mac.png) no-repeat !important;
				
			}

			#facebook-container {
			
				height: 62px;
				position: fixed;
				top: -41px;
				left: 0;
				
			}
			
			#twitter, #google, #pinterest, #facebook {
			
				background: none;
				z-index: -1;
				
			}
			
			#twitter-mask,
			#google-mask,
			#pinterest-mask,
			#facebook-mask {
				
				float: none;
				display: block;
				margin: 0;
				
				position: absolute;	
				top: 0;
				left: 0;
				
				cursor: pointer;
				z-index: 9999;
				
			}
			
			a {
			
				outline: none;
				
			}
			
			#preload {

				height: 0;
				line-height: 0;
				overflow: hidden;
				
			}
		
		</style>
        
	</head>

    <body onLoad="startIt()">
    	
        <div id="facebook" class="container"><span id="facebook-mask"></span><div id="facebook-container"><div id="fb-root"></div><div class="fb-like" data-href="{urlToShare}" data-send="false" data-layout="box_count" data-show-faces="false" data-font="segoe ui"></div></div></div><div id="google" class="container"><span id="google-mask"></span><div class="g-plusone" data-size="medium" data-annotation="none" data-href="{googleToShare}"></div></div><div id="pinterest" class="container"><span id="pinterest-mask"></span><div class="absolute"><a href="../../../../pinterest.com/pin/create/button/@url={urlToShare}&media={imgPoster}&description={contentTitle}" class="pin-it-button" count-layout="none" target="_blank"><img border="0" src="../../../../assets.pinterest.com/images/PinExt.png" title="Pin It" /></a></div></div><div id="twitter" class="container"><span id="twitter-mask"></span><a href="../../../../https@twitter.com/share" class="twitter-share-button" data-url="{twitterToShare}" data-count="none" data-text="{contentTitle}"></a></div></div><script type="text/javascript">var useTwitter =1, useGoogle=1, usePinterest=1, useFacebook=1, fbApp=374121415990908;</script>        
        <div id="preload">
        
        	<img src="../img/graphics/social/twitter_webkit.png" width="59" height="20" alt="" />
        
        </div>
        
        <script type="text/javascript">
			
			var counter, leg, tMask, fMask, doc, bodies;
			
			function startIt() {
				
				doc = document;
				tMask = doc.getElementById("twitter-mask");
				fMask = doc.getElementById("facebook-mask");
				
				if(navigator.appVersion.indexOf("Mac") === -1) {
				
					if(tMask && navigator.userAgent.toLowerCase().indexOf("webkit") !== -1) {
						
						tMask.className = "twitter-webkit";
							
					}
				
				}
				else {
					
					if(fMask) fMask.className = "facebook-mac";
					if(tMask) tMask.className = "twitter-mac";
					
				}
				
				setTimeout(function() {
				
					var scripts = [], i, script;
					bodies = doc.body;
					
					// --------------
					// TWITTER SCRIPT
					// -------------- 
					if(useTwitter) scripts[0] = "../../../../platform.twitter.com/widgets.js";
					
					// ----------------
					// PINTEREST SCRIPT
					// ----------------
					if(usePinterest) scripts[scripts.length] = "../../../../assets.pinterest.com/js/pinit.js";
					
					// ---------------
					// FACEBOOK SCRIPT
					// ---------------
					if(useFacebook) scripts[scripts.length] = "../../../../connect.facebook.net/en_US/all.js#xfbml=1&appId=" + fbApp;
					
					// -------------
					// GOOGLE SCRIPT
					// -------------
					if(useGoogle) scripts[scripts.length] = "../../../../https@apis.google.com/js/plusone.js";
					
					i = scripts.length;
					leg = i - 1;
					counter = 0;
					
					while(i--) {
					
						script = doc.createElement("script");
						script.type = "text/javascript";
						script.src = scripts[i];
						script.async = "async";
						script.onload = loaded;
						script.onreadystatechange = onLoaded;
						
						bodies.appendChild(script);
						
					}
					
				}, 500);
				
			}
			
			function loaded(event) {
					
				(counter < leg) ? counter++ : setTimeout(fullyLoaded, 500);
				
			}
			
			function onLoaded(event) {

				
				if(this.readyState === "loaded" || this.readyState === "complete") loaded();
				
			}
			
			function fullyLoaded() {
			
				var twitter = doc.getElementById("twitter"),
				pinterest = doc.getElementById("pinterest"),
				google = doc.getElementById("google"),
				facebook = doc.getElementById("facebook"),
				gMask = doc.getElementById("google-mask"),
				pMask = doc.getElementById("pinterest-mask");
				
				if(twitter) {
					twitter.style.width = "auto";
					twitter.style.zIndex = 1;
				}
				
				if(pinterest) {
					pinterest.style.width = "auto";
					pinterest.style.zIndex = 1;
				}
				
				if(google) {
					google.style.width = "auto";
					google.style.zIndex = 1;
				}
				
				if(facebook) facebook.style.zIndex = 1;
				if(tMask) tMask.style.display = "none";
				if(gMask) gMask.style.display = "none";
				if(pMask) pMask.style.display = "none";
				if(fMask) fMask.style.display = "none";
				
			}
		
		</script>
        
    </body>
    
</html>









