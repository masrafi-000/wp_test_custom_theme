const locations = [
    { id: "550e8400-e29b-41d4-a716-446655440000", title: "Location 1", lat: 51.5074, lng: -0.1278 },
    { id: "550e8400-e29b-41d4-a716-446655440001", title: "Location 2", lat: 51.4995, lng: -0.1248 },
    { id: "550e8400-e29b-41d4-a716-446655440002", title: "Location 3", lat: 51.508, lng: -0.1281 },
    { id: "550e8400-e29b-41d4-a716-446655440003", title: "Location 4", lat: 51.512, lng: -0.1246 },
    { id: "550e8400-e29b-41d4-a716-446655440004", title: "Location 5", lat: 51.5101, lng: -0.1221 },
    { id: "550e8400-e29b-41d4-a716-446655440005", title: "Location 6", lat: 51.5154, lng: -0.1321 },
    { id: "550e8400-e29b-41d4-a716-446655440006", title: "Location 7", lat: 51.5067, lng: -0.1227 },
    { id: "550e8400-e29b-41d4-a716-446655440007", title: "Location 8", lat: 51.5074, lng: -0.1278 },
    { id: "550e8400-e29b-41d4-a716-446655440008", title: "Location 9", lat: 51.5098, lng: -0.128 },
    { id: "550e8400-e29b-41d4-a716-446655440009", title: "Location 10", lat: 51.5101, lng: -0.1337 },
    { id: "550e8400-e29b-41d4-a716-446655440010", title: "Location 11", lat: 51.502, lng: -0.1346 },
    { id: "550e8400-e29b-41d4-a716-446655440011", title: "Location 12", lat: 51.5025, lng: -0.1527 },
    { id: "550e8400-e29b-41d4-a716-446655440012", title: "Location 13", lat: 51.504, lng: -0.1425 },
    { id: "550e8400-e29b-41d4-a716-446655440013", title: "Location 14", lat: 51.507, lng: -0.133 },
    { id: "550e8400-e29b-41d4-a716-446655440014", title: "Location 15", lat: 51.5136, lng: -0.14 },
    { id: "550e8400-e29b-41d4-a716-446655440015", title: "Location 16", lat: 51.5145, lng: -0.1444 },
    { id: "550e8400-e29b-41d4-a716-446655440016", title: "Location 17", lat: 51.5143, lng: -0.148 },
    { id: "550e8400-e29b-41d4-a716-446655440017", title: "Location 18", lat: 51.5092, lng: -0.1475 },
    { id: "550e8400-e29b-41d4-a716-446655440018", title: "Location 19", lat: 51.5138, lng: -0.0984 },
    { id: "550e8400-e29b-41d4-a716-446655440019", title: "Location 20", lat: 51.5069, lng: -0.1157 },
    { id: "550e8400-e29b-41d4-a716-446655440020", title: "Location 21", lat: 51.5033, lng: -0.1141 },
    { id: "550e8400-e29b-41d4-a716-446655440021", title: "Location 22", lat: 51.5033, lng: -0.1196 },
    { id: "550e8400-e29b-41d4-a716-446655440022", title: "Location 23", lat: 51.5007, lng: -0.1246 },
    { id: "550e8400-e29b-41d4-a716-446655440023", title: "Location 24", lat: 51.4995, lng: -0.1248 },
    { id: "550e8400-e29b-41d4-a716-446655440024", title: "Location 25", lat: 51.5014, lng: -0.1419 },
    { id: "550e8400-e29b-41d4-a716-446655440025", title: "Location 26", lat: 51.4964, lng: -0.1439 },
    { id: "550e8400-e29b-41d4-a716-446655440026", title: "Location 27", lat: 51.4905, lng: -0.1245 },
    { id: "550e8400-e29b-41d4-a716-446655440027", title: "Location 28", lat: 51.4908, lng: -0.1271 },
    { id: "550e8400-e29b-41d4-a716-446655440028", title: "Location 29", lat: 51.511, lng: -0.1162 },
    { id: "550e8400-e29b-41d4-a716-446655440029", title: "Location 30", lat: 51.507, lng: -0.122 },
    { id: "550e8400-e29b-41d4-a716-446655440030", title: "Location 31", lat: 51.5127, lng: -0.1362 },
    { id: "550e8400-e29b-41d4-a716-446655440031", title: "Location 32", lat: 51.5143, lng: -0.1114 },
    { id: "550e8400-e29b-41d4-a716-446655440032", title: "Location 33", lat: 51.5171, lng: -0.1187 },
    { id: "550e8400-e29b-41d4-a716-446655440033", title: "Location 34", lat: 51.5222, lng: -0.1251 },
    { id: "550e8400-e29b-41d4-a716-446655440034", title: "Location 35", lat: 51.5194, lng: -0.127 },
    { id: "550e8400-e29b-41d4-a716-446655440035", title: "Location 36", lat: 51.5235, lng: -0.1276 },
    { id: "550e8400-e29b-41d4-a716-446655440036", title: "Location 37", lat: 51.516, lng: -0.1184 },
    { id: "550e8400-e29b-41d4-a716-446655440037", title: "Location 38", lat: 51.5152, lng: -0.1169 },
    { id: "550e8400-e29b-41d4-a716-446655440038", title: "Location 39", lat: 51.5115, lng: -0.1131 },
    { id: "550e8400-e29b-41d4-a716-446655440039", title: "Location 40", lat: 51.5101, lng: -0.1221 },
    { id: "550e8400-e29b-41d4-a716-446655440040", title: "Location 41", lat: 51.5132, lng: -0.1183 },
    { id: "550e8400-e29b-41d4-a716-446655440041", title: "Location 42", lat: 51.509, lng: -0.1231 },
    { id: "550e8400-e29b-41d4-a716-446655440042", title: "Location 43", lat: 51.5114, lng: -0.1037 },
    { id: "550e8400-e29b-41d4-a716-446655440043", title: "Location 44", lat: 51.52, lng: -0.1058 },
    { id: "550e8400-e29b-41d4-a716-446655440044", title: "Location 45", lat: 51.5047, lng: -0.1381 },
    { id: "550e8400-e29b-41d4-a716-446655440045", title: "Location 46", lat: 51.5135, lng: -0.1586 },
    { id: "550e8400-e29b-41d4-a716-446655440046", title: "Location 47", lat: 51.5206, lng: -0.1354 },
    { id: "550e8400-e29b-41d4-a716-446655440047", title: "Location 48", lat: 51.5183, lng: -0.1329 },
    { id: "550e8400-e29b-41d4-a716-446655440048", title: "Location 49", lat: 51.5135, lng: -0.1407 },
    { id: "550e8400-e29b-41d4-a716-446655440049", title: "Location 50", lat: 51.5098, lng: -0.1467 },
];

document.addEventListener('DOMContentLoaded', function () {
    var map = L.map('leaflet_map').setView([51.505, -0.09], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);


    var markers = locations.map(loc => 
        L.marker([loc.lat, loc.lng])
         .bindPopup(`<b>${loc.title}</b><br>Lat: ${loc.lat}, Lng: ${loc.lng}`)
    );
    
    var group = L.featureGroup(markers).addTo(map)
    map.fitBounds(group.getBounds())


});
