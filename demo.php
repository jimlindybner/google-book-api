<?php

// phpinfo();

$key = '';
$url = 'https://www.googleapis.com/books/v1/volumes?q=web+development&key=';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url . $key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

$data = json_decode($result, true);

foreach($data['items'] as $key => $value)
{
    // link, desc, author, img
    echo '<h2>'.$value['volumeInfo']['title'].'</h2>';
    echo '<p><strong>Author(s): '.implode(" | ", $value['volumeInfo']['authors']).'</strong></p>';
    echo '<p><img src="'.$value['volumeInfo']['imageLinks']['thumbnail'].'"></p>';
    echo '<p>'.$value['volumeInfo']['description'].'</p>';
    echo '<p><a href="'.$value['volumeInfo']['infoLink'].'">LINK</a></p>';
    echo '<hr>';
}