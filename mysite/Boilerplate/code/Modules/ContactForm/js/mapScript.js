var map,
    center,
    featureOpts;

var MY_MAPTYPE_ID = 'custom_style';

function getMap(lat, long, mapColor, waterColor, marker) {

    center = new google.maps.LatLng(lat, long)

    featureOpts = [
        {
            stylers: [
                { hue: mapColor },
                { visibility: 'simplified' },
                { gamma: 0.5 },
                { weight: 0.5 }
            ]
        },
        {
            featureType: 'water',
            stylers: [
                { color: waterColor }
            ]
        }
    ];

    var mapOptions = {
        zoom: 12,
        center: center,
        scrollwheel: false,
        mapTypeControlOptions: {
        mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
        },
        mapTypeId: MY_MAPTYPE_ID
    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var styledMapOptions = {
        name: 'Stylised'
    };

    var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

    if(marker){
        var marker = new google.maps.Marker({
            position: center,
            map: map
        });
    }

    map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
}