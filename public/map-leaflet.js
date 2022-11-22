const map = L.map('map').setView([51.505, -0.09], 8);
const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

    const marker = L.marker([-6.233737, 106.324895]).addTo(map)
        .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

    const circle = L.circle([-6.233737, 106.324895], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(map).bindPopup('I am a circle.');

    const polygon = L.polygon([
        [-6.232373, 106.311301],
        [-6.233737, 106.324895],
        [-6.246022, 106.320534],
        [-6.241288, 106.30963],
    ]).addTo(map).bindPopup('I am a polygon.');
    const popup = L.popup()
        .setLatLng([-6.1464, 106.689606])
        .setContent('I am a standalone popup.')
        .openOn(map);
    map.on('click', function(e){
        popup.setLatLng(e.latlng)
             .setContent(`You clicked the map at ${e.latlng.toString()}`)
             .openOn(map);
    });

$(document).ready(function(){
    $.getJSON('gis/data',function(data) {
        $.each(data, function(i, value){
            const logoIcon = L.icon({
                //  iconUrl: "{{asset('storage/images/fukc.png')}}",
                 iconUrl: "http://localhost:8000/storage/images/fukc.png",
                 iconSize:     [38, 95], // size of the icon
                 shadowSize:   [50, 64], // size of the shadow
                 iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                 shadowAnchor: [4, 62],  // the same for the shadow
                 popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
            const templatePreview = `
                <div class="card">
                    <h5>Nama :${value.id}</h5>
                </div>
            `;
            L.marker([parseFloat(value.latitude),parseFloat(value.longitude)],{icon:logoIcon}).addTo(map).bindPopup(templatePreview);// L.marker([parseFloat(data[i].latitude),parseFloat(data[i].longitude)],{icon:logoIcon}).addTo(map).bindPopup('oke');
        })
    })
    let geoLayer;
    $.getJSON("/leaflet/map.geojson",(json)=>{
        geoLayer = L.geoJson(json, {
            style : (feature) =>{
                return {
                    weight : 5,
                    opacity : 1,
                    color: 'blue',
                    dashArray : "30 10",
                    lineCap : 'square',
                }
            },
            onEachFeature: (feature, layer) => {
                layer.setText(feature.properties.nama,{ //option

                })
                layer.on('click',(e)=>{
                })
                layer.addTo(map)
            }
        })
    })
})
//  $.getJSON(`gis/lokasi/${feature.properties.id}`,function(detaildata){
//                          $.each(data, function(i, value){
//                             const logoIcon = L.icon({
//                                 //  iconUrl: "{{asset('storage/images/fukc.png')}}",
//                                 iconUrl: "http://localhost:8000/storage/images/fukc.png",
//                                 iconSize:     [38, 95], // size of the icon
//                                 shadowSize:   [50, 64], // size of the shadow
//                                 iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
//                                 shadowAnchor: [4, 62],  // the same for the shadow
//                                 popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
//                             });
//                             const templatePreview = `
//                                 <div class="card">
//                                     <h5>Nama :${value.id}</h5>
//                                 </div>
//                             `;
//                             L.marker([parseFloat(value.latitude),parseFloat(value.longitude)],{icon:logoIcon}).addTo(map).bindPopup(templatePreview);// L.marker([parseFloat(data[i].latitude),parseFloat(data[i].longitude)],{icon:logoIcon}).addTo(map).bindPopup('oke');
//         })
// })

// plugins search and popups 
function findLocation(id){
    geoLayer.eachLayer((layer)=>{

        if (layer.properties.id ==id) {
            map.flyTo(layer.getBounds().getCenter(),19);
            layer.bindPopup(layer, feature.properties.nama)
        }
    })
}
