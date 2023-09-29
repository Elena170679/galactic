<?php include_once 'header.php';?>

<?php include_once 'src/classes/News.php'?>

<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$news = (new News());

$newsResult = $news->getByOffset($page);
$lastNews = $news->getLastNews();

// echo '<pre>';
// var_dump($lastNews);
// echo '</pre>';
?>

<header class="header" style="background-image: url('./img/<?= $lastNews['image'] ?>');">
    <div class="container">
        <div class="row justify__content__center">
          <div class="col-12">
              <h1 class="ban__name"><?= $lastNews['title'] ?></h1>
              <span class="ban__title"><?= $lastNews['announce'] ?></span>
          </div>
          </div>
    </div>
</header>

<section class="news">
    <div class="container">
      <div class="row">
          <div class="col-12">
              <h2 class="news__name">Новости</h2>
          </div>
        <div class="row justify__content__between ">
            <?php foreach ($newsResult as $newsItem): ?>
                <div class="col-5-7 news__block">
                    <div>
                       <div class ="news__date"><?= $newsItem['date'] ?></div>
                       <h2 class="news__title"><?= $newsItem['title'] ?></h2>
                       <p class="news__text"><?= $newsItem['announce'] ?></p>
                    </div>
                    <div class="news-content-bottom">
                        <div class="button">
                            <div class="button__container">
                                <a href="article.php?news_id=<?= $newsItem['id'] ?>">
                                    Подробнее
                                    <img class="arrow button-arrow" src="img/arrow.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
      </div>
    </div>
</section>

<div class="container">
 <div class="col-12 page__block">
    <div class=" page__block">
             <ul class="page__list">
                <?php
                $pageCount = $news->getPageCount();

                for ($i = 1; $i <= $pageCount; $i++){?>
                   <div class="button <?= $page === $i ? "button--active" : "" ?>">
                        <div class="button__container">
                             <a href="?page=<?=$i?>"><?= $i ?></a>
                        </div>
                    </div>
                <?php }?>
                <?php if ($page !== $pageCount):?>
                 <div class="button page__list-arrow">
                     <div class="button__container">
                         <a href="?page=<?= $page + 1 ?>"><img class="arrow" src="img/arrow.svg"></a>
                     </div>
                 </div>
                <?php endif; ?>
             </ul>
         </div>
 </div>
 </div>

<?php include_once 'footer.php';?>
