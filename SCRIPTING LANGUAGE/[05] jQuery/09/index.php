<!DOCTYPE html>
<html>

<head>
  <title>jQuery Fade Slideshow</title>

  <!-- jQuery CDN (you can replace with local file if needed) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }

    #slideshow {
      width: 400px;
      height: 250px;
      position: relative;
      margin: 20px auto;
      border: 2px solid #333;
    }

    #slideshow img {
      width: 400px;
      height: 250px;
      position: absolute;
      display: none;
    }

    button {
      padding: 8px 15px;
      margin: 10px;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <h2>jQuery Fade Slideshow</h2>

  <div id="slideshow">
    <img src="https://images.unsplash.com/photo-1528459801416-a9e53bbf4e17" class="slide">
    <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee" class="slide">
    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085" class="slide">
  </div>

  <button id="start">Start Slideshow</button>
  <button id="toggle">Fade Toggle</button>

  <script>
    $(document).ready(function() {

      let index = 0;
      let slides = $(".slide");

      // Show first image
      slides.eq(index).fadeIn(1000);

      // Start slideshow
      $("#start").click(function() {
        setInterval(function() {
          slides.eq(index).fadeOut(1000);
          index = (index + 1) % slides.length;
          slides.eq(index).fadeIn(1000);
        }, 3000);
      });

      // Fade toggle current image
      $("#toggle").click(function() {
        slides.eq(index).fadeToggle(1000);
      });

    });
  </script>

</body>

</html>