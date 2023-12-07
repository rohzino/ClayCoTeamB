<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #13265C;
            font-family: Arial, sans-serif;
        }

        header {
            background: linear-gradient(to right, #008080, #00a5a5);
            padding: 10px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-between;
            background-color: #008080;
            padding: 10px;
        }

        nav a {
            text-decoration: none;
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #005353;
        }

        .logo {
            background-color: #ffd700;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .content {
            padding: 20px;
        }

      #map-container {
          width: 300px; /* width */
          float: left;
          margin-right: 20px; /* margin */
      }

      #map-container img {
          max-width: 100%;
          height: auto;
          display: block; 
      }

      #info-area {
          overflow: hidden; /* Clears float */
      }

      #info-content {
          margin-left: 340px; /* margin */
      }

      footer {
          background: linear-gradient(to right, #008080, #00a5a5);
          padding: 20px;
          text-align: center;
          color: #ffffff;
      }

      #footer-logo {
          width: 50px; /* logo size */
          height: auto;
          display: block;
          margin: 0 auto; /* Center the logo */
          margin-top: 10px; /* top margin */
      }

      .text-box-container {
          display: grid;
          grid-template-columns: repeat(4, 1fr);
          gap: 20px;
          margin: 20px;
      }

      .text-box {
          background-color: #f2f2f2;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .text-box h3 {
          color: #333;
      }
      
    </style>
</head>
<body>

    <header>
        <div class="logo"></div>
        <h1>Clay County Interactable Map</h1>
    </header>

    <nav>
        <a href="#">Home</a>
        <a href="#">Events</a>
        <a href="#">County History</a>
        <a href="#">What Do We Offer</a>
        <a href="#">Gift Shop</a>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
        <a href="#">Volunteer</a>
        <a href="#">Township Map</a>
    </nav>

  
    <div class="content">
       <h2>Interactive Map</h2>
      <p>This is description text what will tell how to use the site and what it does</p>
    </div>

  <div id="map-container">
    <p>this is where the image will go</p>
      <!-- Image here -->
  </div>

  <div id="info-area">
      <div id="info-content">
          <!-- content later -->
          <h2>Information Area</h2>
          <p>Placeholder text. This area will be updated with information.</p>
      </div>
  </div>

  <div class="text-box-container">
      <div class="text-box">
          <h3>Keyword 1</h3>
          <p>Data from the database for Keyword 1</p>
      </div>

      <div class="text-box">
          <h3>Keyword 2</h3>
          <p>Data from the database for Keyword 2</p>
      </div>

      <div class="text-box">
          <h3>Keyword 3</h3>
          <p>Data from the database for Keyword 3</p>
      </div>

      <div class="text-box">
          <h3>Keyword 4</h3>
          <p>Data from the database for Keyword 4</p>
      </div>

      <div class="text-box">
          <h3>Keyword 5</h3>
          <p>Data from the database for Keyword 5</p>
      </div>

      <div class="text-box">
          <h3>Keyword 6</h3>
          <p>Data from the database for Keyword 6</p>
      </div>

      <div class="text-box">
          <h3>Keyword 7</h3>
          <p>Data from the database for Keyword 7</p>
      </div>

      <div class="text-box">
          <h3>Keyword 8</h3>
          <p>Data from the database for Keyword 8</p>
      </div>
  </div>

  <footer>
      <p>Centered Text at the Top of the Footer</p>
      <img src="your-logo.png" id="footer-logo" alt="Footer Logo">
  </footer>
  
</body>
</html>
