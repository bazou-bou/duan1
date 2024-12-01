<?php
include_once("model/ProductQuery.php");

$productQuery = new ProductQuery();
$bannerList = $productQuery->allBanner();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap 3.3.7 Slideshow</title>
  <!-- Liên kết Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
  .carousel-inner .item img {
    height: 500px; /* Chiều cao cố định cho ảnh */
    object-fit: cover; /* Đảm bảo ảnh bao phủ toàn bộ khung mà không bị biến dạng */
    width: 100%; /* Đảm bảo ảnh chiếm toàn bộ chiều rộng của carousel */
  }
</style>

</head>
<body>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Các chỉ dẫn (Indicators) -->
    <ol class="carousel-indicators">
      <?php foreach ($bannerList as $index => $banner) { ?>
        <li data-target="#myCarousel" data-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></li>
      <?php } ?>
    </ol>

    <!-- Nội dung slideshow -->
    <div class="carousel-inner" role="listbox">
      <?php foreach ($bannerList as $index => $banner) { ?>
        <div class="item <?= $index === 0 ? 'active' : '' ?>">
          <img src="<?= htmlspecialchars(BASE_URL . $banner->image_path) ?>" class="img-responsive center-block img-rounded img-thumbnail " alt="Slide <?= $index + 1 ?>">
          
        </div>
      <?php } ?>
    </div>

    <!-- Các điều khiển trước/sau -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- Liên kết Bootstrap JS và jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
