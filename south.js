function initMap() {
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 8,
      center: { lat: 32.3182, lng: -86.9023 },
      disableDefaultUI: true,
    });
  
    directionsRenderer.setMap(map);
    directionsRenderer.setPanel(document.getElementById("tab"));
  
    const control = document.getElementById("fPanel");
    
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
  
    const onChangeHandler = function () {
      calculateAndDisplayRoute(directionsService, directionsRenderer);
    };
  
    document.getElementById("begin").addEventListener("change", onChangeHandler);
    document.getElementById("final").addEventListener("change", onChangeHandler);
  }
  
  function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    const start = document.getElementById("begin").value;
    const end = document.getElementById("final").value;
  
    directionsService
      .route({
        origin: {
          query: document.getElementById("begin").value,
        },
        destination: {
          query: document.getElementById("final").value,
        },
        travelMode: google.maps.TravelMode.DRIVING,
      })
      .then((response) => {
        directionsRenderer.setDirections(response);
      })
      .catch((e) => window.alert("Directions request failed due to " + status));
  }
  
  window.initMap = initMap;