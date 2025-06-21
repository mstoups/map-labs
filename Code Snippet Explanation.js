/*
<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>

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

*/ // Initializes a Google Map embed and places markers for each lab location from the `labsData` array.

/*
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
});

// Authentication
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Lab Search
Route::middleware(['auth'])->group(function () {
    Route::get('/labs', [LabController::class, 'index'])->name('labs.index');
});

*/ //Defines the routes for the application, including authentication and lab management routes.

/*
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

  */ //Basic buttons and queries for the lab search page, including a search form and a list of labs with details and map links.

  /*
   public function index(Request $request)
    {
        $query = Lab::query();
        
        if ($request->has('search') && $request->input('search') !== '') {
            $search = $request->input('search');
            // Assume searching by title
            $query->where('Title', 'like', "%{$search}%");
        }

        $labs = $query->get();
        
        return view('labs.index', compact('labs'));
    }

    public function store(Request $request)
    {
        Lab::create($request->validate([
            'Title' => 'required|string',
            'Description' => 'required|string',
            'Latitude' => 'required|numeric',
            'Longitude' => 'required|numeric',
        ]));
        return redirect()->route('labs.index');
    }
*/ // Defines the methods for handling lab data in a controller, including searching for labs and storing new lab entries.

/*
    // Display the registration form.
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Process the registration form.
    public function register(Request $request)
    {
        // Validate incoming data.
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user.
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin'),
        ]);

        // Log the user in.
        Auth::login($user);

        // Redirect to labs
        return redirect()->route('login')->with('success', 'Registration successful! You are now logged in.');
    }
*/ // Handles user registration, including validation and user creation, and redirects to the login page upon success.