document
    .getElementById("reservation-form")
    .addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        // Collect form data
        var formData = {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            phone: document.getElementById("phone").value,
            guests: document.getElementById("guests").value,
            time: document.getElementById("time").value,
            date: document.getElementById("date").value,
            table: document.getElementById("table").value,
        };

        fetch("/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(formData),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.error) {
                    // If there's an error (e.g., table not available), show an alert and do not proceed with payment
                    alert(data.error);
                } else {
                    // If reservation is successful, proceed with payment
                    alert("Reservation successful!");

                    // Assuming you have a separate endpoint or logic to initiate payment
                    initiatePayment(formData);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });

function initiatePayment(formData) {
    // Send data to placeOrder.php for payment processing
    fetch("frontend/php/placeOrder.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(formData),
    })
        .then((response) => response.text())
        .then((snapToken) => {
            // Use Snap.js to display the payment popup
            window.snap.pay(snapToken, {
                onSuccess: function (result) {
                    console.log("payment success:", result);
                    // Handle successful payment here (e.g., show a success message, redirect to a confirmation page)
                },
                onError: function (error) {
                    console.error("Payment Error:", error);
                    // Handle payment errors here (e.g., show an error message)
                },
            });
        })
        .catch((error) => {
            console.error("Payment initiation error:", error);
        });
}
// ini bagian menu filter
document.querySelectorAll(".category-btn").forEach((button) => {
    button.addEventListener("click", function () {
        const category = this.getAttribute("data-category");
        const menuItems = document.querySelectorAll(".menu-item");

        menuItems.forEach((item) => {
            if (
                category === "all" ||
                item.getAttribute("data-category") === category
            ) {
                item.style.display = "";
            } else {
                item.style.display = "none";
            }
        });
    });
});

// ini bagian navbar
window.addEventListener("scroll", function () {
    var navbar = document.querySelector(".navbar");
    if (window.scrollY > 50) {
        // Adjust the value to your preference
        navbar.style.backgroundImage = 'url("frontend/img/bg-nav.jpg")'; // Set background image
        navbar.style.backgroundSize = "cover"; // Ensure the image covers the entire navbar
    } else {
        navbar.style.backgroundImage = "none"; // Remove background image
    }
});
window.addEventListener("scroll", function () {
    var navbar = document.querySelector(".navbar");
    var menuSection = document.getElementById("menu");
    var aboutSection = document.getElementById("about");
    var reservationSection = document.getElementById("reservation");

    if (window.scrollY > 50) {
        // Adjust the value to your preference
        navbar.style.backgroundColor = "#ffc2d1"; // Change background color on scroll
    } else {
        navbar.style.backgroundColor = "rgba(51, 51, 51, 0)"; // Remove background color
    }

    var sections = [aboutSection, menuSection, reservationSection];
    var links = document.querySelectorAll(".nav-links a");

    sections.forEach((section, index) => {
        if (
            window.scrollY >= section.offsetTop - navbar.offsetHeight &&
            window.scrollY <
                section.offsetTop + section.offsetHeight - navbar.offsetHeight
        ) {
            links.forEach((link) => link.classList.remove("active"));
            links[index].classList.add("active");
        }
    });
});

// ini bagian menu filter
document.addEventListener("DOMContentLoaded", function () {
    const categoryButtons = document.querySelectorAll(".category-btn");

    categoryButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Remove the active class from all buttons
            categoryButtons.forEach((btn) => btn.classList.remove("active"));

            // Add the active class to the clicked button
            this.classList.add("active");

            // Filter menu items based on the clicked category
            const category = this.getAttribute("data-category");
            const menuItems = document.querySelectorAll(".menu-item");

            menuItems.forEach((item) => {
                if (
                    category === "all" ||
                    item.getAttribute("data-category") === category
                ) {
                    item.style.display = "flex"; // Show matching items
                } else {
                    item.style.display = "none"; // Hide non-matching items
                }
            });
        });
    });
});
