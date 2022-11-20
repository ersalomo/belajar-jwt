const map = L.map('map').setView([51.505, -0.09], 8);
const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

    // const marker = L.marker([51.5, -0.09]).addTo(map)
    //     .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

    // const circle = L.circle([51.508, -0.11], {
    //     color: 'red',
    //     fillColor: '#f03',
    //     fillOpacity: 0.5,
    //     radius: 500
    // }).addTo(map).bindPopup('I am a circle.');

    // const polygon = L.polygon([
    //     [51.509, -0.08],
    //     [51.503, -0.06],
    //     [51.51, -0.047]
    // ]).addTo(map).bindPopup('I am a polygon.');


    const popup = L.popup()
        .setLatLng([-6.1464, 106.689606])
        .setContent('I am a standalone popup.')
        .openOn(map);

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent(`You clicked the map at ${e.latlng.toString()}`)
            .openOn(map);
    }

    map.on('click', onMapClick);

$(document).ready(function(){
    $.getJSON('gis/data',function(data) {
        $.each(data, function(i){
            const logoIcon = L.icon({
                //  iconUrl: "{{asset('storage/images/fukc.png')}}",
                 iconUrl: "http://localhost:8000/storage/images/fukc.png",
                 iconSize:     [38, 95], // size of the icon
                 shadowSize:   [50, 64], // size of the shadow
                 iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                 shadowAnchor: [4, 62],  // the same for the shadow
                 popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
            L.marker([parseFloat(data[i].latitude),parseFloat(data[i].longitude)],{icon:logoIcon}).addTo(map).bindPopup('oke');
        })

    })
})
