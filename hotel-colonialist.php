<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./css/aos.css" rel="stylesheet">
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="icon" type="image/png" href="./images/transparent-logo.png">
  <title>Hotel Colonialist — The Legend of Balinese</title>
  <style>
    .hotel-colonialist-page {
      background-image: url('./images/character-bg.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;

      min-height: 100vh;
      font-family: "Rubik", sans-serif;
      /* background: linear-gradient(180deg, #faf9f7 0%, #f0ede8 50%, #e8e4de 100%);
      min-height: 100vh; */
      padding-top: 50px;
      padding-bottom: 4rem;
    }
    .hotel-colonialist-page .page-hero {
      text-align: center;
      margin-bottom: 1.5rem;
      padding: 0 1rem;
    }
    .hotel-colonialist-page .page-hero h1 {
      font-size: 2.8rem;
      font-weight: 700;
      color: #fff;
      letter-spacing: -0.02em;
      margin-bottom: 0.5rem;
    }
    .hotel-colonialist-page .page-hero .subtitle {
      font-size: 1.1rem;
      color: #fff;
      font-weight: 400;
    }
    .hotel-colonialist-page .gallery {
      max-width: 900px;
      margin: 0 auto;
      padding: 0 1.25rem;
    }
    .hotel-colonialist-page .gallery-row {
      margin-bottom: 2.5rem;
    }
    .hotel-colonialist-page .gallery-row:last-child {
      margin-bottom: 0;
    }
    .hotel-colonialist-page .gallery-row .row-inner {
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06), 0 1px 3px rgba(0, 0, 0, 0.04);
      transition: box-shadow 0.3s ease, transform 0.3s ease;
    }
    .hotel-colonialist-page .gallery-row .row-inner:hover {
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08), 0 4px 12px rgba(0, 0, 0, 0.04);
      transform: translateY(-2px);
    }
    .hotel-colonialist-page .gallery-row img {
      width: 100%;
      height: auto;
      display: block;
      vertical-align: middle;
    }
    .hotel-colonialist-page .gallery-row .row-label {
      display: block;
      text-align: center;
      font-size: 1rem;
      font-weight: 600;
      color: #fff;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      margin-bottom: 0.75rem;
    }
    @media (max-width: 767px) {
      .hotel-colonialist-page {
        padding-top: 50px;
        padding-bottom: 3rem;
      }

      .hotel-colonialist-page .page-hero h1 {
        font-size: 2rem;
      }
      .hotel-colonialist-page .gallery-row {
        margin-bottom: 1.75rem;
      }
      .hotel-colonialist-page .gallery-row .row-inner {
        border-radius: 10px;
      }
    }
  </style>
</head>

<body>
  <?php include 'header.php'; ?>

  <main class="hotel-colonialist-page">
    <div class="page-hero" data-aos="fade-up">
      <h1>Hotel Colonialist</h1>
    </div>

    <div class="gallery">
      <?php
      $imageBase = './images/hotel-colonialist-images/';
      $totalImages = 8;
      $imageLabels = [
        1 => 'Front',
        2 => 'Back',
        3 => 'Back View of Sacred Mt Batur',
        4 => 'Side View',
        5 => 'Southern Antebellum Grand Ballroom',
        6 => 'Southern Antebellum  Bar Area',
        7 => 'Secret Control Room',
      ];
      for ($i = 1; $i <= $totalImages; $i++) {
        $filename = "hotel-colonialist-{$i}.png";
        $src = $imageBase . $filename;
        $alt = "Hotel Colonialist — Image {$i}";
        ?>
        <div class="gallery-row" data-aos="fade-up" data-aos-delay="<?php echo min($i * 50, 300); ?>">
          <?php if (isset($imageLabels[$i])) { ?>
            <span class="row-label"><?php echo htmlspecialchars($imageLabels[$i]); ?></span>
          <?php } ?>
          <div class="row-inner">
            <img src="<?php echo htmlspecialchars($src); ?>" alt="<?php echo htmlspecialchars($alt); ?>" loading="<?php echo $i <= 2 ? 'eager' : 'lazy'; ?>">
          </div>
        </div>
      <?php } ?>
    </div>
  </main>

  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      if (typeof AOS !== 'undefined') {
        AOS.init({ duration: 600, once: true, offset: 40 });
      }
    });
  </script>
</body>

</html>
