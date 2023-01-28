import L from "leaflet";
import "leaflet-realtime";
import "leaflet-ruler";
import { MiniMap } from "leaflet-control-mini-map";
import "leaflet-hash";
import "leaflet-textpath";
import "leaflet-mouse-position";
import "leaflet-routing-machine";

const map = L.map("map").setView([51.505, -0.09], 8);
const tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

const onSatelit = L.tileLayer(
    "http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}",
    {
        maxZoom: 20,
        subdomains: ["mt0", "mt1", "mt2", "mt3"],
    }
).addTo(map);
L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: '&copy; <a href="http://osm.org/copyright">Constributors</a>',
}).addTo(map);

const marker = L.marker([-6.233737, 106.324895])
    .addTo(map)
    .bindPopup("<b>Hello world!</b><br />I am a popup.")
    .openPopup();

const circle = L.circle([-6.233737, 106.324895], {
    color: "red",
    fillColor: "#f03",
    fillOpacity: 0.5,
    radius: 500,
})
    .addTo(map)
    .bindPopup("I am a circle.");

const polygon = L.polygon([
    [-6.232373, 106.311301],
    [-6.233737, 106.324895],
    [-6.246022, 106.320534],
    [-6.241288, 106.30963],
])
    .addTo(map)
    .bindPopup("I am a polygon.");
const popup = L.popup()
    .setLatLng([-6.1464, 106.689606])
    .setContent("I am a standalone popup.")
    .openOn(map);
map.on("click", function (e) {
    popup
        .setLatLng(e.latlng)
        .setContent(`You clicked the map at ${e.latlng.toString()}`)
        .openOn(map);
});

const legend = L.control({ position: "topright" });
legend.onAdd = function (map) {
    const div = L.DomUtil.create("div", "legend");
    const labels = ["<strong>Keterangan :</strong>"];
    const categories = [
        "Rumah Sakit",
        "Sekolah",
        "Gedung Pemerintah",
        "DJ Discotic",
    ];
    categories.forEach((element, i) => {
        if (i == 0) {
            div.innerHTML += labels.push(
                '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3HR8f2I9YFDbQbN6nhbK31YNT44_iuf73oQ&usqp=CAU" alt="">'
            );
        }
    });
    div.innerHTML = labels.join("<br>");
    return div;
};
legend.addTo(map);

$(document).ready(function () {
    $.getJSON("gis/data", function (data) {
        $.each(data, function (i, value) {
            const logoIcon = L.icon({
                //  iconUrl: "{{asset('storage/images/fukc.png')}}",
                iconUrl: "http://localhost:8000/storage/images/fukc.png",
                iconSize: [38, 95], // size of the icon
                shadowSize: [50, 64], // size of the shadow
                iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62], // the same for the shadow
                popupAnchor: [-3, -76], // point from which the popup should open relative to the iconAnchor
            });
            const templatePreview = `
                <div class="card">
                    <h5>Nama :${value.id}</h5>
                </div>
            `;
            L.marker(
                [parseFloat(value.latitude), parseFloat(value.longitude)],
                { icon: logoIcon }
            )
                .addTo(map)
                .bindPopup(templatePreview); // L.marker([parseFloat(data[i].latitude),parseFloat(data[i].longitude)],{icon:logoIcon}).addTo(map).bindPopup('oke');
        });
    });
    let geoLayer;
    $.getJSON("/leaflet/map.geojson", (json) => {
        geoLayer = L.geoJson(json, {
            style: (feature) => {
                return {
                    weight: 5,
                    opacity: 1,
                    color: "blue",
                    dashArray: "30 10",
                    lineCap: "square",
                };
            },
            onEachFeature: (feature, layer) => {
                layer.setText(feature.properties.nama, {
                    /*option**/
                });
                layer.on("click", (e) => {});
                layer.addTo(map);
            },
        });
    });
});
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
// mini map
// var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13, attribution: osmAttrib});
var miniMap = new MiniMap(onSatelit, {
    toggleDisplay: true,
    minimized: true,
}).addTo(map);
// const minimap = new L.control.MiniMap(,{
//     minimized: true,
//     toggleDisplay: true,
// }).addTo(map)
// L.Control.MiniMap(osm2).addTo(map);

// rules / distance
var options = {
    position: "topleft",
    lengthUnit: {
        factor: 0.539956803, //  from km to nm
        display: "Nautical Miles",
        decimal: 2,
    },
};
L.control.ruler().addTo(map);
L.control.ruler(options).addTo(map);

//hash / cursor
const hash = new L.Hash(map);

L.control.mousePosition().addTo(map);
// routing machine
const waypoints = [
    L.latLng(-6.253136, 106.316543),
    L.latLng(-6.254021, 106.316972),
];

const routeControler = L.Routing.control({
    waypoints: waypoints,
    routeWhileDragging: true,
    lineOptions: {
        styles: [
            {
                color: "green",
                opacity: 1,
                weight: 5,
            },
        ],
    },
}).addTo(map);
routeControler.on("routesfound", (e) => {
    console.info(e.routes[0]);
    const distance = e.routes[0].summary.totalDistance;
    const time = e.routes[0].summary.totalTime;

    const titikA = document.getElementById("titiA");
    const titikB = document.getElementById("titiB");
    const jalan = document.getElementById("jalan");

    titikA.value =
        e.routes[0].waypoints[0].latLng.lat +
        "," +
        e.routes[0].waypoints[0].latLng.lng;
    titikB.value =
        e.routes[0].waypoints[1].latLng.lat +
        "," +
        e.routes[0].waypoints[1].latlng.lng;
    jalan.value = e.routes[0].name;
});

L.realtime(
    {
        url: "https://wanderdrone.appspot.com/",
        crossOrigin: true,
        type: "json",
    },
    {
        interval: 3 * 1000,
    }
).addTo(map);

realtime.on("update", function () {
    map.fitBounds(realtime.getBounds(), { maxZoom: 3 });
});

// plugins search and popups
function findLocation(id) {
    geoLayer.eachLayer((layer) => {
        if (layer.properties.id == id) {
            map.flyTo(layer.getBounds().getCenter(), 19);
            layer.bindPopup(layer, feature.properties.nama);
        }
    });
}
