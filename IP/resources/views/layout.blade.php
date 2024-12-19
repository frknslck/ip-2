<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/icon.png">
    <title>Nightingale</title>
</head>
<body>
    <nav class="py-2 bg-body-tertiary border-bottom">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <!-- <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2 active">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">FAQs</a></li> -->
                <li class="nav-item"><a href="{{route('wishlist.index')}}" class="nav-link link-body-emphasis px-2"><i class="fas fa-heart"></i> Wishlist</a></li>
                <li class="nav-item"><a href="{{route('cart.index')}}" class="nav-link link-body-emphasis px-2"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                <li class="nav-item"><a href="{{route('orders.index')}}" class="nav-link link-body-emphasis px-2"><i class="fas fa-shopping-cart"></i> Orders</a></li>
                <li class="nav-item"><a href="{{route('reviews.index')}}" class="nav-link link-body-emphasis px-2"><i class="fa-solid fa-star-half-stroke"></i> Reviews</a></li>
                <li class="nav-item"><a href="{{route('coupons.index')}}" class="nav-link link-body-emphasis px-2"><i class="fas fa-gift"></i> Coupons</a></li>
                <li class="nav-item"><a href="{{route('campaigns.index')}}" class="nav-link link-body-emphasis px-2"><i class="fas fa-bullhorn"></i> Campaigns</a></li>
            </ul>
            <ul class="nav">
                @if(Auth::check())
                    <li class="nav-item"><a href="{{route('user.index')}}" class="nav-link link-body-emphasis px-2"><i class="fa-solid fa-user"></i> Profile</a></li>
                    @if(auth()->user()->roles->contains(function ($role) {
                        return in_array($role->name, ['Admin', 'Corp', 'Blogger']);
                    }))
                        <li class="nav-item">
                            <a href="{{ route('action-panel.index') }}" class="nav-link link-body-emphasis px-2">
                                <i class="fa-solid fa-cogs"></i> Action Panel
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('notifications.index') }}" class="nav-link link-body-emphasis px-2">
                            @if($unreadCount > 0)
                                <i class="fa-solid fa-bell"></i> Notifications ({{ $unreadCount }})
                            @else
                                <i class="fa-regular fa-bell"></i> Notifications
                            @endif
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link link-body-emphasis px-2"><i class="fas fa-sign-out-alt"></i> Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a href="{{route('login')}}" class="nav-link link-body-emphasis px-2"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                    <li class="nav-item"><a href="{{route('register')}}" class="nav-link link-body-emphasis px-2"><i class="fas fa-user-plus"></i> Register</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <header class="py-3 mb-4 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                <img src="/icon.png" alt="nightingale" class="me-2" width="45">
                <span class="fs-4">Nightingale Shop</span>
            </a>
            <div class="d-flex align-items-center">
                <form class="me-3" role="search" action="{{ route('products.search', ['id' => '']) }}" method="GET">
                    <div class="input-group">
                        <input type="search" class="form-control" name="id" placeholder="Enter product id..." aria-label="Search" id="search_id">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <a href="{{ route('shop.index') }}" class="btn btn-primary">
                    <i class="fas fa-shopping-bag me-2"></i>Shop
                </a>
            </div>
        </div>
    </header>

    <div class="mb-5">
        @yield('content')
    </div>
    
    <footer class="bg-light border-top py-4 mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>Customer Service</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="{{route('requests-complaints.index')}}" class="nav-link p-0 text-muted">Support</a></li>
                        <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">Returns</a></li>
                        <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">Shipping Info</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Company</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">About Us</a></li>
                        <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">Careers</a></li>
                        <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">Privacy Policy</a></li>
                        <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Connect with Us</h5>
                    <ul class="nav">
                        <li class="nav-item"><a href="#" class="nav-link text-muted"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-muted"><i class="fab fa-twitter"></i></a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-muted"><i class="fab fa-instagram"></i></a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-muted"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex justify-content-between pt-3 mt-3 border-top">
                <p class="text-muted mb-0">&copy; 2024 Nightingale Shop. All rights reserved.</p>
                <a href="#" class="text-muted">Support</a>
            </div>
        </div>
    </footer>


</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('search_id').addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                this.form.submit();
            }
        });
    </script>
</html>