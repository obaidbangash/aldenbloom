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
      background: linear-gradient(180deg, #f8f7f3 0%, #eee8df 55%, #e5dccf 100%);
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
      font-size: clamp(2rem, 4.4vw, 4.7rem);
      letter-spacing: 1.3;
      color: #1e1b16;
      margin-bottom: 0.45rem;
      font-weight: 700;
    }

    .ending-note{
      font-family: 'Papyrus';
      font-size: clamp(2rem, 4.4vw, 3rem);
      letter-spacing: 0.04em;
      color: #1e1b16;
      margin-bottom: 0rem;
      font-weight: 700;
      text-align: center;
    }
    .characters-hero p {
      font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
      font-size: clamp(1rem, 2.2vw, 1.25rem);
      color: #4d4337;
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
      background: #fff;
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
      background: #ffffff;
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
      font-size: 1.02rem;
      font-weight: 600;
      color: #2e2518;
      background: #fffaf2;
      border-top: 1px solid rgba(79, 62, 34, 0.1);
      padding: 0.85rem 0.5rem;
      min-height: 58px;
      display: flex;
      align-items: center;
      justify-content: center;
      line-height: 1.25;
      min-height: 68px
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
    }
    @media (max-width: 767px) {
      .character-card {
        width: calc((100% - 1rem) / 2);
      }
      .character-image-wrap {
        height: 200px;
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
        buildCharacter('', ['Blue Beam of Light V 3.png'], false),
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
        buildCharacter('Bule Jeff', ['Bule Jeff.png', 'Bule-Jeff.png'], true, '90px'),
        buildCharacter('Wing-Wang', ['Wing-Wang-single.png', 'Wing-Wang-single.png'], true, '70px', '', '40px'),
        buildCharacter('Olof', ['Olof.png'], true, '90px'),
        buildCharacter('Lakeisha', ['Lakeisha.png'], true, '70px'),
        buildCharacter("Mama'san", ["Mama'san.png", 'character_1_new.png'], true, '90px'),
      ],
    ],
    [
      'items' => [
        buildCharacter("Lil' Shmoogy", ["Lil' Shmoogy (Full Body).png", 'character_3.png']),
        buildCharacter("Trip-K's", ['Trip-Ks.png', 'character_2.png'], true, '120px', '155px', '25px'),
        buildCharacter('Karen McCarron', ['Karen.png']),
        buildCharacter('Beehive/Bobahn', ['Beehive 2.png'], true, '', '', '17px'),
        buildCharacter('Dirk Deebag', ['Dirk Deebag 2.png'], true, '120px', '180px'),
      ],
    ],
    [
      'items' => [
        buildCharacter('Hippie Jon', ['Hippie Jon I.png']),
        buildCharacter('Old Hippie Lady', ['Old Hippie Lady I.png'], true, '100%', '100%', '12px'),
        buildCharacter('Young Hippie Guy', ['character_5.jpeg'], true, '100%', '231px', ''),
        buildCharacter('Young Hippie Guy', ['Hippie Guy III.png']),
        buildCharacter('Young Hippie Girl', ['Hippie Girl II (Hot).png']),
      ],
    ],
    [
      'items' => [
        buildCharacter('German Gunther <br> (Before)', ['German Gunther III.png'], true, '120px', '', '20px', 'german-gunther-image'),
        buildCharacter('Agus <i>(Ah-goose)</i>', ['Agus.png'], true, '120px', '160px', '30px'),
        buildCharacter('DD Smooove', ['character_4.png', 'DD Smooove.png']),
        buildCharacter('Intern A & B', ['Intern-a-b.png'], true, '140px', '100%', '42px'),
        buildCharacter('Todd', ['Todd-single.png'], true, '83px', '', '', ''),
      ],
    ],
    [
      'items' => [
        buildCharacter('Skybird', ['Skybird__Blonde__II.png'], true, '', '', '', 'skybird-image'),
        buildCharacter('Skybird', ['Skybird.png', 'Skybird__Blonde__II.png'], true, '', '', '', 'skybird-image'),
        buildCharacter('Sky', ['Sky IV.png']),
        buildCharacter('Skybird', ['Skybird.png', 'Skybird__Blonde__II.png'], true, '', '', '', 'skybird-image'),
        buildCharacter('Skybird', ['Skybird.png', 'Skybird__Blonde__II.png'], true, '', '', '', 'skybird-image'),
      ],
    ],
    [
      'items' => [
        buildCharacter('Mekong', ['Mekong.png'], true, '120px', '160px', '41px'),
        buildCharacter('Svetlana', ['Svetlana I.png'], true, '150%', '0', '0'),
        buildCharacter('Borscht', ['Borscht I.png'], true, '96px', '160px', '50px'),
        buildCharacter('Miscellaneous <br> K-Pop Asians', ['Miscellaneous-girl-guy.png'], true, '136px', '', '20px'),
        
        buildCharacter('Mr. X', ['Mr. X II.png'], true, '90px', '', '0'),
      ],
    ],
    [
      'center' => true,
      'items' => [
        buildCharacter('German Gunther <br> (After)', ['German_Gunther__Evil__IV.png'], true, '120px', '', '20px', ),
        buildCharacter("Shlomo", ["Shlomo-single.png"], true, '71px', '0', '9px'),
        buildCharacter("Lil'Miggz", ["Lil' Miggz (Full Body).png"], true, '103px', '0', '31px'),
        buildCharacter('Blaze', ['Blaze_IX.png'], true, '120px', '', '20px'),
        
        buildCharacter('Lord Keynesian Bottompincher <br> (aka Da Guvna)', ['Lord Keynesian Bottompincher I.png'], true, '', '', '15px', ''),
      ],
    ],
    [
      'center' => true,
      'items' => [
        buildCharacter('Kohsoom', ['Kohsoom.png'], true, '356px', ''),
      ],
    ],
    [
      'center' => true,
      'items' => [
        buildCharacter('Baal/Baphomet', ['Baphomet I.png'], false, '', '190px', '-5px'),
      ],
    ],
    
  ];
  ?>

  <main class="characters-page">
    <div class="container">
      <div class="characters-hero">
        <h1>Who will win ...</h1>
        <h1>... the game of Enlightenment?!?</h1>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <h2 class="ending-note">Good – Light</h2>

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
      <div class="ending-note">Evil - Dark</div>
    </div>
  </main>

  <script src="./js/bootstrap.min.js"></script>
</body>

</html>
