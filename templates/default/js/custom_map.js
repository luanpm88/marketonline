  var geocoder;
  var map,small_map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
      zoom: 8,
      center: latlng
    }
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
  }

  function codeAddress() {
    var address = document.getElementById("address").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
  
  function initMapWithAddress(address,container,marker) {
    if (typeof(container)=='undefined' || container==null) {
      container = "map";
    }
    if (typeof(marker)=='undefined' || marker==null) {
      marker = true;
    }
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        latlng = results[0].geometry.location;
        var mapOptions = {
          zoom: 13,
          center: latlng
        }
        
        if (container=="map") {
          map = new google.maps.Map(document.getElementById(container), mapOptions);
          if(marker) addMarkerByLatLng(results[0].geometry.location.k,results[0].geometry.location.B,map);
        } else {
          small_map = new google.maps.Map(document.getElementById(container), mapOptions);
          if(marker) addMarkerByLatLng(results[0].geometry.location.k,results[0].geometry.location.B,small_map);
        }       

                
      }
    });    
  }
  
  function initMapWithLatLng(lat,lng,container,marker) {
    if (typeof(container)=='undefined' || container==null) {
      container = "map";
    }
    if (typeof(marker)=='undefined' || marker==null) {
      marker = true;
    }
    var latlng = new google.maps.LatLng(lat, lng);
    var mapOptions = {
          zoom: 13,
          center: latlng
    }
    
    if (container=="map") {
      map = new google.maps.Map(document.getElementById(container), mapOptions);
      if(marker) addMarkerByLatLng(lat,lng,map);
    } else {
      small_map = new google.maps.Map(document.getElementById(container), mapOptions);
      if(marker) addMarkerByLatLng(lat,lng,small_map);
    }
    
    
  }
  
  function addMarkerByAddress(address,m) {
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        var marker = new google.maps.Marker({
            map: m,
            position: results[0].geometry.location
        });
      } else {
        //alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
  
  function addMarkerByLatLng(lat,lng,m) {
    var latlng = new google.maps.LatLng(lat, lng);
    var marker = new google.maps.Marker({
        map: m,
        position: latlng
    });
  }
  
  function getLocationByAddress(address) {
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        return results[0].geometry.location;
      } else {
        return false;
      }
    });
  }
