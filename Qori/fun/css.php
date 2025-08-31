<style>

body, html {
  margin: 0;
  padding: 0;
}


.hero-section {
  height: 50vh;
  background-image: url('images/back_ground.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  margin-top: 56px;
}

.hero-content {
  background: rgba(62, 63, 68, 0.69);
  padding: 30px;
  border-radius: 12px;
  color: white;
  text-align: center;
}

/* Navbar */
.navbar {
  background-color: #004080 !important;
}

.navbar-brand, .nav-link {
  color: rgb(0, 0, 0) !important;
}

/* Buttons */
.btn-primary {
  background-color: #0066cc !important;
  border-color: #005bb5 !important;
}

.btn-primary:hover {
  background-color: #005bb5 !important;
  border-color: #004c99 !important;
}

.btn-outline-primary {
  color: #0066cc !important;
  border-color: #0066cc !important;
}

.btn-outline-primary:hover {
  background-color:rgb(20, 121, 223) !important;
  color: #fff !important;
}

/* Flight Cards */
.flight-card {
  padding: 8px;
}

.flight-card .card {
  border: none;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  transition: transform 0.2s ease;
  display: flex;
  flex-direction: column;
  height: 100%;
}

.flight-card .card-img-top {
  height: 180px;
  object-fit: cover;
  width: 100%;
}

.flight-card .card:hover {
  transform: translateY(-5px);
}

.flight-card .card-body {
  background-color: white;
  color: black;
   flex-grow: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.flight-card .card-title,
.flight-card .card-text {
  color: black;
}

.flight-card .btn {
  border-color: black;
  color: black;
}

.flight-card .btn:hover {
  background-color: black;
  color: white;
}

/* Card and layout background */
.tetri {
  padding: 40px;
  background: rgba(188, 208, 230, 0.84) !important;
  border-radius: 10px;
  margin: 10px;
  height: auto;
}

.yutebi {
  border: 1px solid black;
  border-radius: 5px;
  padding-left: 4px;
  padding-right: 4px;
  margin: 1px;
}

/* Optional typography */
.card-title, .card-text, .form-label {
  color: rgb(0, 0, 0) !important;
}
</style>