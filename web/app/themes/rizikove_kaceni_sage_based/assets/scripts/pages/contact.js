/**
 * Created by wizard on 27/10/15.
 */

module.exports = (function () {

    var
        mapId           = 'g-map',
        $map            = $('#'+ mapId);

    if ($map.length === 0){
        return{init: function(){}};
    }

    var $data           = $map.data(),
        coordinates     = {lat: Number($data.lat), lng: Number($data.lng)},
        map     = null,

    initMap = function(){
        var map = new google.maps.Map(document.getElementById(mapId), {
            center: coordinates,
            zoom: $data.zoom,
            disableDefaultUI: true,
            zoomControl: true
        });

        var marker = new google.maps.Marker({
            position: coordinates
        });

        marker.setMap(map);
    };

    return {
        init: function () {
            console.log('works');
            initMap();
        }
    };

})();