<?php
/*-----------------------------------------------------------------
# Author - Philipp Bruhin (info@philippbruhin.ch)
# Copyright (C) 2017 by Philipp Bruhin. All Rights Reserved.
# License - Single license
# http://www.philippbruhin.ch
------------------------------------------------------------------*/
// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Google Map
 * https://developers.google.com/maps/tutorials/fundamentals/adding-a-google-map
 */

 /*
function hook_googlemaps() {

$output="<script>

	function initMap() {

	    // Custom Map
		var customMapType = new google.maps.StyledMapType(
		[
			{
				stylers: [
				{hue: '#cc9900'},
				{visibility: 'simplified'},
				{gamma: 0},
				{weight: 0},
				{saturation: 0},
				{lightness: 0}
				]
			}
		]
		,{ name: 'Karte Gelb' });

		var customMapTypeId = 'custom_style';

 
		// Custom positions
        var pinLocation = {
            info: '<strong>avo ag</strong><br />Talstrasse 26a<br />8852 Altendorf',
            lat: 47.19351,
            long: 8.8119201
        };

        var locations = [
          [pinLocation.info, pinLocation.lat, pinLocation.long, 0],
        ];
            
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: {lat: 47.19351, lng: 8.8119201},
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId,google.maps.MapTypeId.TERRAIN, google.maps.MapTypeId.SATELLITE]
            },
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: true,
            streetViewControl: true,
            rotateControl: true,
            scrollwheel: true,
            fullscreenControl: true
        });

        var infowindow = new google.maps.InfoWindow({});
    
        var iconBase = '". get_stylesheet_directory_uri() ."/assets/img/';
        var marker, i;
        
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                animation: google.maps.Animation.DROP,
                icon: 
                    {
                        url: iconBase + 'pin.svg',
                        size: new google.maps.Size(34, 38),
                    }
            });
    
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
        
        // Set default map type
		//map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
		//map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
		map.mapTypes.set(customMapTypeId, customMapType);
		map.setMapTypeId(customMapTypeId);
    }
</script>
<script async defer src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyCsTiFHuxPqTKu6fB02iXvsGhqclDE5lQ0&callback=initMap\"></script>";

	echo $output;
}*/

