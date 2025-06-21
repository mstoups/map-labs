<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Labs Map</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    #map {
      height: 600px;
      width: 100%;
    }
    .header-buttons {
      margin: 20px 0;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between header-buttons align-items-center">
      <h2>Labs Map</h2>
      <div>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
          @csrf
          <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
        </form>
      </div>
    </div>

    <div id="map"></div>
  </div>

  <script>
    const labsData = @json($labs);
  </script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=API-KEY&callback=initMap"></script>

  <script>
    function initMap() {
      let centerLat = labsData.length ? parseFloat(labsData[0].Latitude) : 0;
      let centerLng = labsData.length ? parseFloat(labsData[0].Longitude) : 0;
      
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: labsData.length ? 10 : 2,
        center: { lat: centerLat, lng: centerLng },
      });
      
      labsData.forEach(lab => {
        const lat = parseFloat(lab.Latitude);
        const lng = parseFloat(lab.Longitude);
        
        const marker = new google.maps.Marker({
          position: { lat: lat, lng: lng },
          map: map,
          title: lab.Title,
        });
        
        const infoWindow = new google.maps.InfoWindow({
          content: `<div>
                      <h5>${lab.Title}</h5>
                      <p><strong>Address:</strong> ${lab.Address}, ${lab.City}, ${lab.Country}</p>
                    </div>`
        });
        
        marker.addListener("click", function() {
          infoWindow.open(map, marker);
        });
      });
    }
  </script>
</body>
</html>