<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;


// $this->title = 'News-&-Events';
$base_URL = Yii::$app->urlManagerBackend->baseUrl.'/';

$news= $newsevents::find()->where(['ne_hide'=>0 ])->andWhere(['ne_type' =>'news'])->orderBy(['id' => SORT_DESC])->limit(5)->all();

$events = $newsevents::find()->where(['ne_hide'=>0 ])->andWhere(['ne_type' =>'events'])->orderBy(['id' => SORT_DESC])->limit(5)->all();


function date_f($date){
  if($date != '0000-00-00')
    return date_create_from_format("Y-m-d", $date)->format("M d, Y");
  else 
    return null;
}

function time_f($time){
  if($time != '00:00:00')
    return DateTime::createFromFormat('H:i:s', $time)->format('g:i a');
  else
    return null;
}

function hyphen_f($dt){
  if(!is_null($dt))
    return '  -  ';
  else
    return '';
}


?>







<section style="background-image : url('../web/uploads/ne_bg.png');">
  <div class="leftBox">
    <div class="content">
      <h1>Events And News</h1>
      <p>She wanted rainbow hair. That's what she told the hairdresser. It should be deep rainbow colors, too. She wasn't interested in pastel rainbow hair. She wanted it deep and vibrant so there was no doubt that she had done this on purpose.</p>
    </div>
    <a href="javascript:;" onmousedown="toggleDiv('div');">Switch between news and events</a>
  </div>
  <div class="events">
    <div id="divnews" style="display:block">
      <ul>
        <?php foreach($news AS $ne){ ?>
          <li>
            <div class="time">
              <?= Html::img('../../backend/web/'.$ne->ne_image.'?'.time(),['alt'=>'some', 'width'=>'100%', 'height'=>'100%']);?>
              <!-- <img src= "https://homepages.cae.wisc.edu/~ece533/images/fruits.png"> -->
            </div>
            <div class="details">
              <h3><a href="<?= Html::encode($ne->ne_link)?>"><?= HtmlPurifier::process($ne->ne_title)?></a></h3>
              <h2><?= Html::encode(date_f($ne->ne_start_date))?> <?= Html::encode(hyphen_f(date_f($ne->ne_end_date)))?> <?= Html::encode(date_f($ne->ne_end_date))?></h2>
              <h2><?= Html::encode(time_f($ne->ne_start_time))?> <?= Html::encode(hyphen_f(time_f($ne->ne_end_time)))?> <?= Html::encode(time_f($ne->ne_end_time))?></h2>

            </div>
            <div style="clear: both;"></div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="divevents" style="display:none">
      <ul>
        <?php foreach($events AS $ne){ ?>
          <li>
            <div class="time">
              <?= Html::img('../../backend/web/'.$ne->ne_image.'?'.time(),['alt'=>'some', 'width'=>'100%', 'height'=>'100%']);?>
            </div>
            <div class="details">
              <h3><a href="<?= Html::encode($ne->ne_link)?>"><?= Html::encode($ne->ne_title)?></a></h3>
              <h2><?= Html::encode(date_f($ne->ne_start_date))?> <?= Html::encode(hyphen_f(date_f($ne->ne_end_date)))?> <?= Html::encode(date_f($ne->ne_end_date))?></h2>
              <h2><?= Html::encode(time_f($ne->ne_start_time))?> <?= Html::encode(hyphen_f(time_f($ne->ne_end_time)))?> <?= Html::encode(time_f($ne->ne_end_time))?></h2>

            </div>
            <div style="clear: both;"></div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div class = "more">
      <a href="<?php echo Yii::$app->urlManager->createUrl("site/news-events-page");?>">View All News and Events</a>
    </div>
  </section>




  <script type="text/javascript">

    function toggleDiv(divid)
    {

      varnews = divid + 'news';
      varevents = divid + 'events';

      if(document.getElementById(varnews).style.display == 'block')
      {
        document.getElementById(varnews).style.display = 'none';
        document.getElementById(varevents).style.display = 'block';
      }

      else
      {  
        document.getElementById(varevents).style.display = 'none';
        document.getElementById(varnews).style.display = 'block'
      }
    } 

  </script>