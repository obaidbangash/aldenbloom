<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="icon" type="image/png" href="./images/transparent-logo.png">
  <title>Characters — The Legend of Balinese</title>
  <style>
    .characters-page {
      background-image: url('./images/character-bg.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;

      min-height: 100vh;
      padding-top: 110px;
      padding-bottom: 3.5rem;
      font-family: "Rubik", sans-serif;
    }
    .characters-hero {
      text-align: center;
      margin-bottom: 0rem;
      padding: 0 1rem;
    }
    .characters-hero h1 {
      font-family: 'Papyrus';
      font-size: 5rem;
      color: #ddbd13;
      margin-bottom: 0.45rem;
      font-weight: 700;
    }

    @media only screen and (max-width: 991px) {
      .characters-hero h1 {
          font-size: 3rem;
          line-height: 1.3;
          margin-bottom: 3rem;

        }

        .characters-hero br{
          display: none;
        }
      }

    .ending-note{
      font-family: 'Papyrus';
      font-size: clamp(2rem, 4.4vw, 3.9rem);
      letter-spacing: 0.04em;
      color: #0068ff;
      margin-bottom: 0rem;
      font-weight: 700;
      text-align: center;

      
    }
    .ending-note.bottom{
        color: red;
      }
    .characters-hero p {
      font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
      font-size: clamp(1rem, 2.2vw, 1.25rem);
      color: #fff;
      margin: 0;
      font-style: italic;
    }
    .character-rows {
      display: flex;
      flex-direction: column;
      gap: 1.2rem;
    }
    .character-row {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      justify-content: flex-start;
    }
    .character-row.is-centered {
      justify-content: center;
    }
    .character-card {
      background: #c5c5c5;
      border-radius: 14px;
      overflow: hidden;
      border: 1px solid rgba(79, 62, 34, 0.12);
      box-shadow: 0 8px 20px rgba(30, 24, 14, 0.08);
      width: calc((100% - 4rem) / 5);
      min-width: 0;
      display: flex;
      flex-direction: column;
      transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease;
    }
    .character-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 14px 28px rgba(30, 24, 14, 0.15);
      border-color: rgba(79, 62, 34, 0.25);
    }
    .character-image-wrap {
      background: #fff;
      height: 200px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0;
      overflow: hidden;
    }
    .character-image-wrap img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      object-position: center;
      display: block;
      transition: transform 0.28s ease;
    }
    .character-image-wrap img.skybird-image {
      width: 73%;
      object-fit: cover;
    }
    .character-card:hover .character-image-wrap img {
      transform: scale(1.03);
    }
    .character-placeholder {
      width: 100%;
      height: 100%;
      border: 2px dashed #cdbca2;
      border-radius: 10px;
      color: #826f55;
      font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-size: 0.9rem;
      font-weight: 600;
      letter-spacing: 0.02em;
      padding: 0.5rem;
    }
    .character-name {
      margin-top: auto;
      text-align: center;
      font-family: "Garamond", "Times New Roman", serif;
      font-size: 1.42rem;
      font-weight: 600;
      color: #2e2518;
      background: #c5c5c5;
      /* border-top: 1px solid rgba(79, 62, 34, 0.1); */
      padding: 0.85rem 0.5rem;
      min-height: 58px;
      display: flex;
      align-items: center;
      justify-content: center;
      line-height: 1.25;
      min-height: 85px
    }
    .character-name.is-hidden {
      display: none;
    }
    .row-break-label {
      text-align: center;
      font-family: "Cinzel", "Times New Roman", serif;
      font-size: clamp(1.1rem, 2vw, 1.45rem);
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: #221d15;
      margin-top: 0.4rem;
      padding: 0.7rem 1rem;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.55);
      border: 1px solid rgba(79, 62, 34, 0.12);
    }
    /* .ending-note {
      margin-top: 1.8rem;
      text-align: center;
      font-family: "Didot", "Bodoni MT", "Times New Roman", serif;
      font-size: clamp(1.2rem, 2.2vw, 1.7rem);
      letter-spacing: 0.08em;
      color: #23180c;
      text-transform: uppercase;
    } */
    @media (max-width: 1199px) {
      .character-card {
        width: calc((100% - 3rem) / 4);
      }
    }
    @media (max-width: 991px) {
      .character-card {
        width: calc((100% - 2rem) / 3);
      }
      .characters-page {
        padding-top: 95px;
      }

      .ending-note{
        margin-bottom: 2rem;
        font-size: 2rem;
      }

      .character-name{
        font-size: 1.2rem;
      }
    }
    @media (max-width: 767px) {
      .characters-page{
        padding-top: 50px;
      }
      .character-card {
        width: calc((100% - 1rem) / 2);
      }
      .character-image-wrap {
        height: 200px;
      }

      .character-name{
        min-height: auto;
      }

      .character-image-wrap img{
        object-fit: contain !important;
      }

      .characters-hero h1{
        font-size: 2rem;
      }
    }
    @media (max-width: 480px) {
      .character-card {
        width: 100%;
      }
      .character-image-wrap {
        height: 240px;
      }
    }
  </style>
</head>

<body>
  <?php include 'header.php'; ?>

  <?php
  function resolveCharacterImage(array $candidates): ?string {
    foreach ($candidates as $candidate) {
      $absolutePath = __DIR__ . '/images/' . $candidate;
      if (file_exists($absolutePath)) {
        return './images/' . $candidate;
      }
    }
    return null;
  }

  function buildCharacter(string $name, array $images = [], bool $showName = true, ?string $width = null, ?string $height = null, ?string $marginTop = null, ?string $imageClass = null): array {
    $out = [
      'name' => $name,
      'image' => resolveCharacterImage($images),
      'showName' => $showName,
    ];
    if ($width !== null) {
      $out['width'] = $width;
    }
    if ($height !== null) {
      $out['height'] = $height;
    }
    if ($marginTop !== null) {
      $out['marginTop'] = $marginTop;
    }
    if ($imageClass !== null) {
      $out['imageClass'] = $imageClass;
    }
    return $out;
  }

  $rows = [
    [
      'center' => true,
      'items' => [
        buildCharacter('', ['Blue_Beam_of_Light_V_3-removebg-preview.png'], false),
      ],
    ],
    [
      'center' => true,
      'items' => [
        buildCharacter('Ketut & DonMu', ['ketut_domu.png']),
      ],
    ],
    [
      'items' => [
        buildCharacter('Bule Jeff', ['Bule_Jeff-removebg-preview.png', 'Bule-Jeff-removebg-preview.png'], true, '90px'),
        buildCharacter('Wing-Wang', ['Wing-Wang-single-removebg-preview.png', 'Wing-Wang-single-removebg-preview.png'], true, '70px', '', '40px'),
        buildCharacter('Olof', ['Olof-removebg-preview.png'], true, '90px'),
        buildCharacter('Lakeisha', ['Lakeisha-removebg-preview.png'], true, '70px'),
        buildCharacter("Mama'san", ["Mama'san-removebg-preview.png", 'character_1_new-removebg-preview.png'], true, '90px'),
      ],
    ],
    [
      'items' => [
        buildCharacter("Lil' Shmoogy", ["Lil' Shmoogy (Full Body).png", 'character_3.png']),
        buildCharacter("Trip-K's", ['Trip-Ks.png', 'character_2-removebg-preview.png'], true, '120px', '155px', '25px'),
        buildCharacter('Karen McCarron', ['Karen-removebg-preview.png']),
        buildCharacter('Beehive/Bobahn', ['Beehive_2-removebg-preview.png'], true, '', '', '17px'),
        buildCharacter('Dirk Deebag', ['Dirk_Deebag_2-removebg-preview.png'], true, '120px', '180px'),
      ],
    ],
    [
      'items' => [
        buildCharacter('Hippie Jon', ['Hippie_Jon_I-removebg-preview.png']),
        buildCharacter('Old Hippie Lady', ['Old_Hippie_Lady_I-removebg-preview.png'], true, '100%', '100%', '12px'),
        buildCharacter('Young Hippie Guy', ['character_5-removebg-preview.png'], true, '100%', '231px', ''),
        buildCharacter('Young Hippie Guy', ['Hippie_Guy_III-removebg-preview.png']),
        buildCharacter('Young Hippie Girl', ['Hippie_Girl_II__Hot_-removebg-preview.png']),
      ],
    ],
    [
      'items' => [
        buildCharacter('German Gunther <br> (Before)', ['German_Gunther_III-removebg-preview.png'], true, '120px', '', '20px', 'german-gunther-image'),
        buildCharacter('Miscellaneous <br> K-Pop Asians', ['Miscellaneous_K-Pop_Asians-removebg-preview.png'], true, '136px', '', '20px'),

        buildCharacter('DD Smooove', ['character_4.png']),
        buildCharacter('Intern A & B', ['Intern-a-b-removebg-preview.png'], true, '140px', '100%', '42px'),
        buildCharacter('Agus <i>(Ah-goose)</i>', ['Agus-removebg-preview.png'], true, '125px', '', '14px'),

      ],
    ],
    [
      'items' => [
        buildCharacter('Anonymous <br> Skybird', ['Skybird__Blonde__II-removebg-preview.png'], true, '', '', '', 'skybird-image'),
        buildCharacter('Anonymous <br> Skybird', ['Skybird.png', 'Skybird__Blonde__II-removebg-preview.png'], true, '', '', '', 'skybird-image'),
        buildCharacter('Sky <br> (The Cult Leader)', ['Sky_IV-removebg-preview.png']),
        buildCharacter('Anonymous <br> Skybird', ['Skybird.png', 'Skybird__Blonde__II-removebg-preview.png'], true, '', '', '', 'skybird-image'),
        buildCharacter('Anonymous <br> Skybird', ['Skybird.png', 'Skybird__Blonde__II-removebg-preview.png'], true, '', '', '', 'skybird-image'),
      ],
    ],
    [
      'items' => [
        buildCharacter('Mekong', ['Mekong-removebg-preview.png'], true, '132px', '', '18px'),
        buildCharacter('Svetlana', ['Svetlana_I-removebg-preview.png'], true, '150%', '0', '0'),
        buildCharacter('Borscht', ['Borscht-removebg-view.png'], true, '96px', '160px', '50px'),
        buildCharacter('Todd', ['Todd_II-removebg-preview.png'], true, '122px', '', '12px', ''),
        
        buildCharacter('Mr. X', ['Mr._X_II-removebg-preview.png'], true, '90px', '', '0'),
      ],
    ],
    [
      'center' => true,
      'items' => [
        buildCharacter('German Gunther <br> (After)', ['German_Gunther__Evil__IV.png'], true, '120px', '', '20px', ),
        buildCharacter("Shlomo", ["Shlomo-single-removebg-preview.png"], true, '71px', '0', '9px'),
        buildCharacter("Lil'Miggz", ["Lil__Miggz__Full_Body_-removebg-preview.png"], true, '91px', '0', '40px'),
        buildCharacter('Blaze', ['Blaze_IX.png'], true, '120px', '', '20px'),
        
        buildCharacter('Lord Keynesian Bottompincher <br> (aka Da Guvna)', ['Lord_Keynesian_Bottompincher_I-removebg-preview.png'], true, '', '', '15px', ''),
      ],
    ],
    [
      'center' => true,
      'items' => [
        buildCharacter('Kohsoom', ['Kohsoom-removebg-preview.png'], true, '356px', ''),
      ],
    ],
    [
      'center' => true,
      'items' => [
        buildCharacter('Baal/Baphomet', ['Baphomet_I-removebg-preview.png'], false, '', '190px', '-5px'),
      ],
    ],
    
  ];
  ?>

  <main class="characters-page">
    <div class="container">
      <div class="characters-hero">
        <h1 class="mb-0">Who will win ...</h1>
        <h1>... the game of Enlightenment?!?</h1>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <h2 class="ending-note">Good – Light</h2>
        <br>
        <br>
        <br>

      </div>

      <div class="character-rows">
        <?php foreach ($rows as $row) {
          if (isset($row['label'])) { ?>
            <div class="row-break-label"><?php echo htmlspecialchars($row['label']); ?></div>
            <?php
            continue;
          }
          $rowClass = 'character-row' . (!empty($row['center']) ? ' is-centered' : '');
          ?>
          <div class="<?php echo $rowClass; ?>">
            <?php foreach ($row['items'] as $character) {
              $name = $character['name'];
              $nameDisplay = htmlspecialchars($name);
              $nameDisplay = str_replace(['&lt;br&gt;', '&lt;i&gt;', '&lt;/i&gt;'], ['<br>', '<i>', '</i>'], $nameDisplay);
              $nameAlt = htmlspecialchars(trim(preg_replace('/<br\s*\/?>/i', ' ', $name)));
              $image = $character['image'];
              $showName = $character['showName'] ?? true;
              $imgStyle = '';
              if (!empty($character['width']) || !empty($character['height']) || !empty($character['marginTop'])) {
                $parts = [];
                if (!empty($character['width'])) {
                  $parts[] = 'width: ' . htmlspecialchars($character['width']);
                }
                if (!empty($character['height'])) {
                  $parts[] = 'height: ' . htmlspecialchars($character['height']);
                }
                if (!empty($character['marginTop'])) {
                  $parts[] = 'margin-top: ' . htmlspecialchars($character['marginTop']);
                }
                $imgStyle = ' style="' . implode('; ', $parts) . '"';
              }
              ?>
              <article class="character-card">
                <div class="character-image-wrap">
                  <?php if (!empty($image)) {
                    $imgClass = !empty($character['imageClass']) ? ' class="' . htmlspecialchars($character['imageClass']) . '"' : '';
                  ?>
                    <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo $nameAlt; ?>" loading="lazy"<?php echo $imgClass . $imgStyle; ?>>
                  <?php } else { ?>
                    <div class="character-placeholder">Image Coming Soon</div>
                  <?php } ?>
                </div>
                <div class="character-name<?php echo $showName ? '' : ' is-hidden'; ?>">
                  <?php echo $showName ? $nameDisplay : ''; ?>
                </div>
               
              </article>
            <?php } ?>
          </div>
         
        <?php } ?>
        
      </div>
      <br>
        <br>
        <br>
      <div class="ending-note bottom">Evil - Dark</div>
    </div>
  </main>

  <script src="./js/bootstrap.min.js"></script>
</body>

</html>
