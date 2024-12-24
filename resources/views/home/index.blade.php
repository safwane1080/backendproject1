<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Watches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #d4d4d4;
            color: #212529;
        }
        .nav-tabs {
            border-bottom: 2px solid #343a40;
        }
        .nav-tabs .nav-link {
            border: none;
            color: #343a40;
            font-weight: bold;
            margin-right: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .nav-tabs .nav-link.active {
            background-color: #343a40;
            color: #fff;
            border-radius: 5px;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?watch,luxury') no-repeat center center/cover;
            height: 85vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.5);
        }
        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 5px black;
        }
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        .hero .btn {
            font-size: 1.2rem;
            padding: 0.75rem 2rem;
        }
        .products {
            padding: 4rem 0;
        }
        .product-card img {
            height: 300px;
            object-fit: cover;
            border: 1px solid #ced4da;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            background-color: white;
        }
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .about {
            padding: 4rem 0;
            background-color: #f8f9fa;
        }
        .about h2 {
            margin-bottom: 2rem;
            color: #343a40;
        }
        .cta {
            background: #343a40;
            color: white;
            padding: 4rem 1rem;
            text-align: center;
        }
        .cta h2 {
            margin-bottom: 1rem;
        }
        footer {
            background-color: #212529;
            color: #adb5bd;
            padding: 2rem 0;
            text-align: center;
        }

        #contact {
            background-color: #f8f9fa;
            padding: 4rem 0;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .card .form-control {
            border-radius: 5px;
            box-shadow: none;
        }

        .card .form-label {
            font-weight: bold;
        }

        .card button {
            font-size: 1.2rem;
            padding: 1rem;
            background-color: #343a40;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .card button:hover {
            background-color: #495057;
            cursor: pointer;
        }
    </style>
</head>
<body>

<nav>
    <ul class="nav nav-tabs justify-content-center py-3">
        <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#about">About Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#products">Collection</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">Register
    </ul>
</nav>

<div class="hero">
    <h1>Luxury Watches</h1>
    <p>The perfect balance of style and precision.</p>
    <a href="#products" class="btn btn-outline-light btn-lg">Explore Our Collection</a>
</div>

<div class="container about" id="about">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2> About Us</h2>
            <p>Luxury Watches offers an exclusive selection of high-end timepieces, crafted for those who take time seriously. Our collection blends craftsmanship with innovative technology.</p>
            <p>We strive to provide the ultimate experience for watch enthusiasts. From classic to modern, we have a timepiece for every style.</p>
        </div>
        <div class="col-md-6">
            <img src="https://www.designlimitededition.com/wp-content/uploads/2020/04/Haute-Horlogerie-The-Details-Of-Luxury-Watchmaking-1-1.jpg" alt="Craftsmanship" class="img-fluid rounded shadow">
        </div>
    </div>
</div>

<div class="container products" id="products">
    <div class="text-center mb-5">
        <h2>Our Collection</h2>
        <p>Explore our exclusive selection of watches.</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card product-card">
                <img src="https://timepiecesbelgium.com/wp-content/uploads/2024/11/Rolex-Lady-Datejust-69173-3-Photoroom-14-768x576.jpg" class="card-img-top" alt="Watch">
                <div class="card-body text-center">
                    <h5 class="card-title">Luxury Model 1</h5>
                    <p class="card-text">Elegant and timeless design.</p>
                    <a href="#" class="btn btn-dark">More Info</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card product-card">
                <img src="https://www.bobswatches.com/rolex-blog/wp-content/uploads/2017/01/Green-Gold-Rolex-GMT-Master.jpg" class="card-img-top" alt="Watch">
                <div class="card-body text-center">
                    <h5 class="card-title">Modern Model 2</h5>
                    <p class="card-text">For the modern gentleman.</p>
                    <a href="#" class="btn btn-dark">More Info</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card product-card">
                <img src="https://timepiecesbelgium.com/wp-content/uploads/2024/09/Rolex-GMT-Master-II-Pepsi-2-Photoroom-768x576.jpg" class="card-img-top" alt="Watch">
                <div class="card-body text-center">
                    <h5 class="card-title">Classic Model 3</h5>
                    <p class="card-text">A classic touch for every occasion.</p>
                    <a href="#" class="btn btn-dark">More Info</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="contact">
    <div class="text-center mb-5">
        <h2>Contact Us</h2>
        <p>If you have any questions or would like to get in touch, feel free to reach out to us.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card p-4 shadow-sm">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="cta">
    <h2>Become an Insider!</h2>
    <p>Receive exclusive offers and news straight to your inbox.</p>
    <a href="#" class="btn btn-light btn-lg">Sign Up</a>
</div>

<footer>
    <p>&copy; 2024 Luxury Watches. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
