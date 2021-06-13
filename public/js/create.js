const containerDirections = document.getElementById('containerDirections');
const containerAddDirection = document.getElementById('containerAddDirection');

containerDirections.style.display = 'block'
containerAddDirection.style.display = 'none'

function initMap() {
    var myLatlng = {};
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (pos) {
            myLatlng = {lat: pos.coords.latitude, lng: pos.coords.longitude};
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 4, center: myLatlng});
            const geocoder = new google.maps.Geocoder();
            const infoWindow = new google.maps.InfoWindow();

            geocodeLatLng(geocoder, map, infoWindow, myLatlng, 'start')
            // Configure the click listener.
            map.addListener('click', function (mapsMouseEvent) {
                // Close the current InfoWindow.
                infoWindow.close();

                // Create a new InfoWindow.
                geocodeLatLng(geocoder, map, infoWindow, mapsMouseEvent.latLng, 'click')

            });

        }, function (error) {
            // ...
        });
    }
}

function geocodeLatLng(geocoder, map, infowindow, latlng, ev) {

    geocoder.geocode({location: latlng}, (results, status) => {
        if (status === "OK") {
            if (results[0]) {
                map.setZoom(16);
                infowindow.setContent(results[0].formatted_address);
                infowindow.setPosition(latlng)
                infowindow.open(map);

                const stateField = document.getElementById('state');
                const cityField = document.getElementById('city');
                const colonyField = document.getElementById('colony');
                const streetField = document.getElementById('street');
                const cpField = document.getElementById('cp');
                const direction_completeField = document.getElementById('direction_complete');
                const lanField = document.getElementById('lat');
                const longField = document.getElementById('long');
                if (ev === 'start'){
                    lanField.value = latlng.lat;
                    longField.value = latlng.lng;
                }else{
                    lanField.value = latlng.lat();
                    longField.value = latlng.lng();
                }

                direction_completeField.value = results[0].formatted_address;
                let total = results[0].address_components.length;
                for (let i = 0; i < total; i++) {

                    if (results[0].address_components[i].types[0] === 'administrative_area_level_1'){
                        stateField.value = results[0].address_components[i].long_name;
                    }

                    if (results[0].address_components[i].types[0] === 'locality'){
                        cityField.value = results[0].address_components[i].long_name;
                    }

                    if (results[0].address_components[i].types[0] === 'political'){
                        colonyField.value = results[0].address_components[i].long_name;
                    }

                    if (results[0].address_components[i].types[0] === 'route'){
                        streetField.value = results[0].address_components[i].long_name;
                    }

                    if (results[0].address_components[i].types[0] === 'postal_code'){
                        cpField.value = results[0].address_components[i].long_name;
                    }

                }

            } else {
                window.alert("No results found");
            }
        } else {
            window.alert("Geocoder failed due to: " + status);
        }
    });


}


document.getElementById('direction_type').addEventListener('change', function () {
    let value = document.getElementById('direction_type').value;
    if (value === 'new'){
        containerDirections.style.display = 'none'
        containerAddDirection.style.display = 'block'
    }else{
        containerDirections.style.display = 'block'
        containerAddDirection.style.display = 'none'
    }
});
