import 'leaflet'
import 'leaflet-realtime'
import 'leaflet-minimap'
import 'leaflet-routing-machine'
import 'leaflet-hash'
import 'leaflet-ruler'

const map = L.map('map').setView([51.505, -0.09],8,{

})
const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{
    maxZoom: 19,

}).addTo(map)

const onSatelit = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains: ['mt0','mt1','mt2','mt3']
}).addTo(map)

const osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png',{
        maxZoom: 19,
        attribution: '&copy; <a href="http://osm.org/copyright">Constributors</a>'
}).addTo(map)

const marker = L.marker([-6.233737, 106.324895])
    .addTo(map)
    .bindPopup('<<strong>Hy Saya Ersalomo from test gorilla</strong>')
    .openPopup()

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
]).addTo(map).bindPopup('I poly')

const popup = L.popup()
        .setLatLng([-6.1464, 106.689606])
        .setContent('I am a standalone popup.')
        .openOn(map);

map.on('click', function(e){
        popup.setLatLng(e.latlng)
             .setContent(`You clicked the map at ${e.latlng.toString()}`)
             .openOn(map);
});

const miniMap = new L.Control.MiniMap(osm,{
    toggleDisplay: true,
    minimized: true,
}).addTo(map);


L.control.ruler({
    position: 'topleft',
    lengthUnit: {
    factor: 0.539956803,    //  from km to nm
    display: 'Nautical Miles',
    decimal: 2
    }
}).addTo(map)

const hash = new L.Hash(map)

L.control.mousePosition().addTo(map)

const waypoints = [
    L.latLng(-6.253136, 106.316543),
    L.latLng(-6.254021, 106.316972),
]

const routeControler = L.Routing.control({
waypoints: waypoints,
  routeWhileDragging:true,
  lineOptions: {
    styles: [{
        color:'green',
        opacity: 1,
        weight: 5
    }]
  }
}).addTo(map).on('routesfound',(e)=>{
    console.info(e.routes[0])
    const distance = e.routes[0].summary.totalDistance;
    const time = e.routes[0].summary.totalTime;
    const titikA = document.getElementById('titiA');
    const titikB = document.getElementById('titiB');
    const jalan = document.getElementById('jalan');
    titikA.value = e.routes[0].waypoints[0].latLng.lat + ',' + e.routes[0].waypoints[0].latLng.lng
    titikB.value = e.routes[0].waypoints[1].latLng.lat + ',' + e.routes[0].waypoints[1].latlng.lng
    jalan.value = e.routes[0].name
})

const realtime = L.realtime({
     url: 'https://wanderdrone.appspot.com/',
        crossOrigin: true,
        type: 'json'
},{
    interval: 3 * 1000
}).addTo(map).on('update',function(data) {
    map.fitBounds(realtime.getBounds(),{
        maxZoom: 3,
    })
})
// plugins search and popups
function findLocation(id){
    geoLayer.eachLayer((layer)=>{

        if (layer.properties.id ==id) {
            map.flyTo(layer.getBounds().getCenter(),19);
            layer.bindPopup(layer, feature.properties.nama)
        }
    })
}








