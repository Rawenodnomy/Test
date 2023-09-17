<?php

use app\models\Tariffs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TariffsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tariffs';
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="tariffs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tariffs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'price',
            [
                'label' =>"Speed",
                'format'=>'raw',
                
                'value'=>function($data){
                    return "" .HTML::input('number', $data->id, $data->speed) . "<button" . " id=" . $data->id . " class = " . $data->id . ">ok</button>" . "" ;

                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tariffs $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>



<script>
    
        $("button").on('click', function(){
            
            var idValue = this.id
            var speedValue = document.querySelectorAll(`input[name="${idValue}"]`)[0].value
            
            $.ajax({
                method: "POST",
                url: "/admin/tariffs/change",
                dataType: 'json',
                data: { idValue: idValue, speedValue: speedValue  }
                
                })
                
                .done(function( msg ) {
                    alert( "ура " + msg);
                });
        })
   
</script>