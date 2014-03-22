            var geocoder = new google.maps.Geocoder();
			var markersArray = [];
			var map;
			var marker;
            function geocodePosition(pos) {
                geocoder.geocode({
                    latLng: pos
                }, function(responses) {
                    if (responses && responses.length > 0) {
                        updateMarkerAddress(responses[0].formatted_address);
                    } else {
                        updateMarkerAddress('Cannot determine address at this location.');
                    }
                });
            }

            function updateMarkerStatus(str) {
                document.getElementById('markerStatus').innerHTML = str;
            }

            function updateMarkerPosition(latLng) {
                document.getElementById('latitude').value = latLng.lat();
				document.getElementById('longitude').value = latLng.lng();
            }

            function updateMarkerAddress(str) {
                document.getElementById('address').innerHTML = str;
            }
			//add the marker on map
			function placeMarker(location) {
			 marker = new google.maps.Marker({
				  position: location, 
				  map: map,
				  draggable: false
			  });
			 // add marker to array
			 markersArray.push(marker);
			}
			//delete all overlay marker in google mape
			function deleteOverlays() {
			  if (markersArray) {
				for (i in markersArray) {
				  markersArray[i].setMap(null);
				}
				markersArray.length = 0;
			  }
			}
			
            function initialize() {
				var latitude=document.getElementById('latitude').value;
				var longtitude=document.getElementById('longitude').value;
				
				//alert(latitude);
                var latLng = new google.maps.LatLng(11.57337522528485,104.92080688476562);
                map = new google.maps.Map(document.getElementById('mapCanvas'), {
                    zoom: 15,
                    center: latLng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
               // var marker = new google.maps.Marker({
//                    position: latLng,
//                    title: 'Point A',
//                    map: map,
//                    draggable: true
//                });
				placeMarker(latLng);
                // Update current position info.
               // updateMarkerPosition(latLng);
                geocodePosition(latLng);
				
				//place the marker
				google.maps.event.addListener(map,'click', function(event) {
					deleteOverlays();
					placeMarker(event.latLng);
					updateMarkerPosition(event.latLng);
					geocodePosition(event.latLng);
				});
				
                // Add dragging event listeners.
                google.maps.event.addListener(marker, 'dragstart', function() {
                    updateMarkerAddress('Dragging...');
                });
				
                google.maps.event.addListener(marker, 'drag', function() {
                    updateMarkerStatus('Dragging...');
                    updateMarkerPosition(marker.getPosition());
                });

                google.maps.event.addListener(marker, 'dragend', function() {
                    updateMarkerStatus('Drag ended');
                    geocodePosition(marker.getPosition());
                });
				
				// if zoom changed, then update document object with new info
				//google.maps.event.addListener(map, 'zoom_changed', function() {
//				zoomLevel = map.getZoom();
//				document.getElementById("zoom").value = zoomLevel;
//				});
//				// double click on the marker changes zoom level
//				google.maps.event.addListener(marker, 'dblclick', function() {
//				zoomLevel = map.getZoom()+1;
//				//if (zoomLevel == 20) {
////				zoomLevel = 10;
////				}
//				document.getElementById("zoom").value= zoomLevel;
//				map.setZoom(zoomLevel);
//				});

            }

            // Onload handler to fire off the app.
            google.maps.event.addDomListener(window, 'load', initialize);