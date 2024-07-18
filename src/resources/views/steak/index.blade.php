<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ikkeh Suteki</title>
    <link rel="icon" href="frontend/img/logo1png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="frontend/style.css">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-ia738fBHUtu-7mAO"></script>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">Ikkeh Suteki</a>
            <ul class="nav-links">
                <li><a href="#about">About Us</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#reservation">Reservation</a></li>
            </ul>
        </div>
    </nav>

    <header class="header">
        <div class="container">
            <h1>Welcome To Ikkeh Suteki</h1>
            <p>We will provide you with a delicious steak experience with every bite and immerse you in the ambiance of
                dining as if you were in Japan</p> <a href="#reservation" class="btn">Reserve a Table</a>
        </div>
    </header>
    <section id="about" class="about">
        <div class="container">
            <div class="about-content">
                <h2>About Us</h2>
                <div class="about-text">
                    <p>pada restoran steak Ikkeh Sutteki adalah bagian yang memperkenalkan restoran kepada pelanggan.
                        Bagian ini menjelaskan sejarah berdirinya restoran, visi dan misi yang diusung,
                        nilai-nilai utama yang dipegang, serta keunikan dan kualitas menu steak yang ditawarkan. Melalui
                        bagian ini,
                        pelanggan dapat memahami identitas dan keunggulan restoran, sehingga mereka merasa lebih yakin
                        dan terhubung dengan pilihan mereka untuk menikmati hidangan di Ikkeh</p>
                </div>
            </div>
            <img src="frontend/img/logo.jpg" alt="About Us" class="about-image">
        </div>
    </section>

    <section id="menu" class="menu">
        <div class="container">
            <h2>Our Menu</h2>
            <!-- Category Filters -->
            <div class="menu-categories">
                <button class="category-btn" data-category="all">All</button>
                <button class="category-btn" data-category="main">Main Dishes</button>
                <button class="category-btn" data-category="side">Side Dishes</button>
                <button class="category-btn" data-category="drinks">Drinks</button>
            </div>
            <div class="menu-items">
                <div class="menu-item" data-category="drinks">
                    <img src="frontend/img/jus.webp" alt="Cant Berry">
                    <h3>Cant Berry</h3>
                    <p>Experience the refreshing blend of berries that dance on your taste buds.</p>
                    <span class="price">50.000</span>
                </div>
                <div class="menu-item" data-category="side">
                    <img src="frontend/img/menu satdish.jpeg.jpg" alt="Mashed Potato">
                    <h3>Mashed Potato</h3>
                    <p>Creamy and smooth mashed potatoes, perfect for any meal.</p>
                    <span class="price">80.000</span>
                </div>
                <div class="menu-item" data-category="side">
                    <img src="frontend/img/menu setdish 1.webp" alt="Potato Wedges">
                    <h3>Potato Wedges</h3>
                    <p>Golden, crispy potato wedges with a savory twist.</p>
                    <span class="price">85.000</span>
                </div>
                <div class="menu-item" data-category="side">
                    <img src="frontend/img/menu setdish 2.webp" alt="French Fries">
                    <h3>French Fries</h3>
                    <p>Classic French fries, crispy on the outside, fluffy on the inside.</p>
                    <span class="price">75.000</span>
                </div>
                <div class="menu-item" data-category="side">
                    <img src="frontend/img/menu setdish 3.webp" alt="Mix Vegetables">
                    <h3>Mix Vegetables</h3>
                    <p>A colorful medley of fresh, seasonal vegetables.</p>
                    <span class="price">65.000</span>
                </div>
                <div class="menu-item" data-category="main">
                    <img src="frontend/img/menu steak 1.webp" alt="Sirloin Wagyu">
                    <h3>Sirloin Wagyu</h3>
                    <p>Premium Wagyu sirloin steak, tender and full of flavor.</p>
                    <span class="price">Start Form 1.200.000</span>
                </div>
                <div class="menu-item" data-category="main">
                    <img src="frontend/img/menu steak 2.webp" alt="Rib Eye">
                    <h3>Rib Eye</h3>
                    <p>Juicy rib eye steak, grilled to perfection.</p>
                    <span class="price">Start Form 1.500.000</span>
                </div>
                <div class="menu-item" data-category="main">
                    <img src="frontend/img/menu steak 3.jpeg.jpg" alt="Tenderloin">
                    <h3>Tenderloin</h3>
                    <p>Delicate and tenderloin steak, a true delight.</p>
                    <span class="price">Start Form 1.000.000</span>
                </div>
                <div class="menu-item" data-category="drinks">
                    <img src="frontend/img/menu teh 1.jpeg.jpg" alt="Green Tea">
                    <h3>Green Tea</h3>
                    <p>Refreshing green tea, a perfect companion to your meal.</p>
                    <span class="price">55.000</span>
                </div>
                <div class="menu-item" data-category="drinks">
                    <img src="frontend/img/menu teh.jpeg.jpg" alt="Hojicha Tea">
                    <h3>Hojicha Tea</h3>
                    <p>Roasted green tea with a rich, earthy flavor.</p>
                    <span class="price">50.000</span>
                </div>
                <div class="menu-item" data-category="drinks">
                    <img src="frontend/img/milkshake.webp" alt="Milkshake">
                    <h3>Milkshake</h3>
                    <p>Thick and creamy milkshake, a delightful treat.</p>
                    <span class="price">50.000</span>
                </div>
                <div class="menu-item" data-category="drinks">
                    <img src="frontend/img/teh leci.webp" alt="Lychee Tea">
                    <h3>Lychee Tea</h3>
                    <p>Sweet and fragrant lychee tea, a tropical delight.</p>
                    <span class="price">50.000</span>
                </div>
            </div>

        </div>
    </section>

    <section id="reservation" class="reservation">
        <div class="container">
            <h2>Reserve a Table</h2>
            <form id="reservation-form" action="/store" method="post">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
                <label for="guests">Number of Guests:</label>
                <input type="number" id="guests" name="guests" required>
                <label for="table">Table Selection:</label>
                <select id="table" name="table" required>
                    @foreach($availableTables as $table)
                    <option value="{{ $table->ids }}" {{ !$table->available ? 'disabled' : '' }}>
                        {{ $table->name }} (Table {{ $table->ids }})
                    </option>
                    @endforeach
                </select>
                <label for="date">Reservation Date:</label>
                <input type="date" id="date" name="date" required>
                <label for="time">Reservation Time:</label>
                <select id="time" name="time" required>
                    @for($i = 10; $i < 22; $i++) @foreach(['00', '30' ] as $minutes) @php $timeValue=str_pad($i, 2, '0'
                        , STR_PAD_LEFT) . ':' . $minutes; @endphp <option value="{{ $timeValue }}">
                        {{ $timeValue }}
                        </option>
                        @endforeach
                        @endfor
                </select>
                <button type="submit" class="btn" id="pay">Submit Reservation</button>
            </form>
            <div class="terms-and-conditions">
                <h3>Terms & Conditions</h3>
                <p>Please note that if you cancel your reservation, the payment is non-refundable. Any changes to your reservation must be made at least one day in advance. For changes, please contact our admin via WhatsApp.</p>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <a href="#" class="logo">Ikkeh Suteki</a>
                </div>
                <div class="footer-links">
                    <a href="#">Home</a>
                    <a href="#about">About Us</a>
                    <a href="#menu">Menu</a>
                    <a href="#reservation">Reservation</a>
                    
                </div>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-extra">
                <div class="footer-section footer-hours">
                    <h3>Opening Hours</h3>
                    <p>Monday - Sunday: 10:00 AM - 8:30 PM</p>
                </div>
                <div class="footer-section footer-location">
                    <h3>Location</h3>
                    <p>Ikkeh Suteki<br>Cipete, Jakarta selatan</p>
                </div>
                <div class="footer-section footer-contact">
                    <h3>Contact Us</h3>
                    <p>Email: Ikkehsuteki@gmail.com<br>Phone: 089525559560</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Our Restaurant. All rights reserved.</p>
                <p>Created by Angga Muhammad Galih and Dava Wisda</p>
                <p>
                    <i class="fas fa-heart"></i>
                    <i class="fas fa-heart"></i>
                    <i class="fas fa-heart"></i>
                </p>
            </div>
        </div>
    </footer>

    <script src="frontend/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tableSelect = document.getElementById('table');
            const dateInput = document.getElementById('date');
            const timeSelect = document.getElementById('time');

            function checkTableAvailability() {
                const tableId = tableSelect.value;
                const date = dateInput.value;
                const time = timeSelect.value;

                // Only proceed if all fields have values
                if (tableId && date && time) {
                    fetch('/check-table-availability', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                table: tableId,
                                date: date,
                                time: time
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (!data.available) {
                                alert('The selected table is already reserved for the chosen time.');
                            }
                        });
                }
            }

            tableSelect.addEventListener('change', checkTableAvailability);
            dateInput.addEventListener('change', checkTableAvailability);
            timeSelect.addEventListener('change', checkTableAvailability);
        });

    </script>


</body>

</html>
