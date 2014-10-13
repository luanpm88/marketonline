  var geocoder;
  var map,small_map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(16.0458134537522,107.5341796875);
    var mapOptions = {
      zoom: 9,
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
        
        if (container!="small_map") {
          map = new google.maps.Map(document.getElementById(container), mapOptions);
          if(marker) addMarkerByLatLng(results[0].geometry.location.k,results[0].geometry.location.B,map);
        } else {
          small_map = new google.maps.Map(document.getElementById(container), mapOptions);
          if(marker) addMarkerByLatLng(results[0].geometry.location.k,results[0].geometry.location.B,small_map);
        }       

                
      }
    });    
  }
  
  function initMapWithLatLng(lat,lng,container,marker,zoom) {
    if (typeof(lat)=='undefined' || lat==null) {
      lat = 16.0458134537522;
    }
    if (typeof(lng)=='undefined' || lng==null) {
      lng = 107.5341796875;
    }
    if (typeof(container)=='undefined' || container==null) {
      container = "map";
    }
    if (typeof(marker)=='undefined' || marker==null) {
      marker = true;
    }
    if (typeof(zoom)=='undefined' || zoom==null) {
      zoom = 13;
    }
    var latlng = new google.maps.LatLng(lat, lng);
    var mapOptions = {
          zoom: zoom,
          center: latlng
    }
    
    if (container!="small_map") {
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
  
  function addMarkerByLatLng(lat,lng,m,html,url) {
    var latlng = new google.maps.LatLng(lat, lng);
    var marker = new google.maps.Marker({
        map: m,
        position: latlng
    });
    
    if (typeof(html)!='undefined' && html!=null) {
      var infowindow = new google.maps.InfoWindow({
        content: html
      });
  
      google.maps.event.addListener(marker, 'mouseover', function() {
        infowindow.open(map,marker);
      });
      
      google.maps.event.addListener(marker, 'mouseout', function() {
        infowindow.close(map,marker);
      });
      
      if (typeof(url)!='undefined' && url!=null) {
        google.maps.event.addListener(marker, 'click', function() {
          window.location = url;
        });
      }
    }

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
