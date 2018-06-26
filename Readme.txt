Store Locator
# Google maps are displayed with { <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script> } in index.html.
# Data for markers is stored in array of JS objects {var stores}. We create relevant amount of markers with {function markStore(storeInfo)} and add them to array {markers} to be able to hide/show.
# Pop-up for a marker clicked is done by {marker.addListener('click', function()}
# For Matrix API (distance) we use Proxy https://cors-anywhere.herokuapp.com + Matrix Api URL, as direct addressing Matrix API causes {No 'Access-Control-Allow-Origin'} ERROR