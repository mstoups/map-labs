<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lab Search</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .lab-container { max-width: 800px; margin: auto; }
    .lab-item { border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; cursor: pointer; }
    .lab-details { display: none; padding: 10px; border-top: 1px solid #ddd; margin-top: 10px; }
    .header-buttons { margin-bottom: 20px; }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between header-buttons align-items-center">
      <h1>Find Your Lab</h1>
      <div>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
          @csrf
          <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
        </form>
        @if(auth()->check() && auth()->user()->is_admin)
          <a href="{{ route('admin') }}" class="btn btn-warning btn-sm">Admin Panel</a>
        @endif
      </div>
    </div>
    
    <form method="GET" action="{{ route('labs.index') }}" class="mb-3">
      <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search labs..." value="{{ request()->input('search') }}">
        <div class="input-group-append">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>
    
    <div class="lab-container">
      @forelse($labs as $lab)
        <div class="lab-item">
          <h3>{{ $lab->Title }}</h3>
          <button class="btn btn-link" onclick="toggleDetails('details-{{ $lab->id }}')">Details</button>
          <div id="details-{{ $lab->id }}" class="lab-details">
            <p><strong>Category:</strong> {{ $lab->Category }}</p>
            <p><strong>Privacy:</strong> {{ $lab->Privacy }}</p>
            <p><strong>Address:</strong> {{ $lab->Address }}</p>
            <p><strong>City:</strong> {{ $lab->City }}</p>
            <p><strong>Country:</strong> {{ $lab->Country }}</p>
            <p><strong>Coordinates:</strong> {{ $lab->Latitude }}, {{ $lab->Longitude }}</p>
            <a href="https://www.google.com/maps?q={{ $lab->Latitude }},{{ $lab->Longitude }}" 
               target="_blank" 
               class="btn btn-primary btn-sm">View on Map</a>
          </div>
        </div>
      @empty
        <p class="text-center">No labs found.</p>
      @endforelse
    </div>
  </div>

  <script>
    function toggleDetails(id) {
      const detailsEl = document.getElementById(id);
      if (detailsEl.style.display === 'none' || detailsEl.style.display === '') {
          detailsEl.style.display = 'block';
      } else {
          detailsEl.style.display = 'none';
      }
    }
  </script>
</body>
</html>