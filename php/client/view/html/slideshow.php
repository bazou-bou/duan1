<?php
include_once("model/ProductQuery.php");

$productQuery = new ProductQuery();

$bannerList = $productQuery->allBanner();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <style>
    img {
      width: 100%;
      height: 500px;
      object-fit: cover;
    }
  </style>
  <title>Carousel</title>
</head>

<body style="height: 400px; width: 100%;">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <?php foreach ($bannerList as $index => $banner) { ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index ?>"
          class="<?= $index === 0 ? 'active' : '' ?>" aria-current="<?= $index === 0 ? 'true' : 'false' ?>"
          aria-label="Slide <?= $index + 1 ?>"></button>
      <?php } ?>
    </div>
    <div class="carousel-inner">
      <?php foreach ($bannerList as $index => $banner) { ?>
        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
          <img src="<?= htmlspecialchars(BASE_URL . $banner->image_path) ?>" class="d-block w-100" alt="Banner <?= $index + 1 ?>">
        </div>
      <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>
</body>

</html>
