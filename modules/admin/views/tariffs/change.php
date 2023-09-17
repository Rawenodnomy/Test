<?php

Yii::$app->db->createCommand('UPDATE tariffs SET speed=' . $_POST['speedValue'] .  ' WHERE id= ' . $_POST['idValue'] . '')->execute();
