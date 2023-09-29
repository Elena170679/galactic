<?php include_once 'header.php';?>

<?php include_once 'src/classes/News.php';?>

<section class="bread"> 
    <div class="container"> 
      <div class="row">
        <div class="col-12">
        <ul class="bread__list">
          <li class="bread__item">Главная</li> 
          <li class="bread__item">&frasl;</li> 
          <li class="bread__item__1">Возвращение этнографа</li>
        </ul>
        </div>
     </div> 
    </div>
</section>

<?php
$newsId = isset($_GET['news_id']) ? (int)$_GET['news_id'] : 1;

$news = (new News());

$newsResult = $news->getNewsById($newsId);
?>

<article class="article">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="news__name"><?= $newsResult['title'] ?></h2>
            </div>    
            <div class="col-12">
               <date class ="news__date"><?= $newsResult['date'] ?></date>   
            </div>
            
         
            <div class="row justify__content__between article__block">
                <div class="col-5-7 news__block-article">
                  
                   <h2 class="article__title"><?= $newsResult['announce']?></h2>
                
                  <div class="artical__text">
                    <?= $newsResult['content'] ?>
                  </div>

                  <div class="button">
                      <div class="button__container">
                          <a href="index.php">
                            <img class="arrow button-arrow button-arrow-left" src="img/arrow.svg">
                            Назад к новостям
                          </a>
                      </div>
                    </div>
                  </div>
                <div class="col-5-7 news__block">
                    <img class="artical__img" src="img/<?= $newsResult['image'] ?>">
                </div>
            </div>
        </div>
    </div>
</article>	
           
<?php include_once 'footer.php';?>