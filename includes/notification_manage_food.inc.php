<?php

// обработка сообщений
// в базе нет блюд
if (isset($_SESSION['data'])) {
    if ($_SESSION['data'] === 'failed') {
        echo '<p class="error text__center">No dish added!</p>';
        unset($_SESSION['data']);
    }
}
// добавление блюда
if (isset($_SESSION['addFoods'])) {
    if ($_SESSION['addFoods'] === 'success') {
        echo '<p class="error__none text__center">The dish was successfully added!</p>';
        unset($_SESSION['addFoods']);
    }
}
// ошибка загрузки картинки
if (isset($_SESSION['upload'])) {
    if ($_SESSION['upload'] === 'failed') {
        echo '<p class="error text__center">I can not upload an image!</p>';
        unset($_SESSION['upload']);
    }
}
// ошибка удаления картинки
if (isset($_SESSION['deleteImage'])) {
    if ($_SESSION['deleteImage'] === 'error_delete') {
        echo '<p class="error text__center">An error occurred deleting the image!</p>';
        unset($_SESSION['deleteImage']);
    }
}
// удаление блюда
if (isset($_SESSION['delete'])) {
    if ($_SESSION['delete'] === 'success') {
        echo '<p class="error__none text__center">The dish was successfully removed!</p>';
        unset($_SESSION['delete']);
    } elseif ($_SESSION['delete'] === 'error_delete') {
        echo '<p class="error text__center">Dish deletion error!</p>';
        unset($_SESSION['delete']);
    }
    
}

//обновление блюда
if (isset($_SESSION['update'])) {
    if ($_SESSION['update'] === 'success') {
        echo '<p class="error__none text__center">The dish was successfully update!</p>';
        unset($_SESSION['update']);
    } elseif ($_SESSION['update'] === 'stmtfailed') {
        echo '<p class="error text__center">Dish update error!</p>';
        unset($_SESSION['update']);
    }  
}