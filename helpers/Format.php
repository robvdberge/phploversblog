<?php

function formatDate($date)
{
    return date('F j, Y, g:i a', strtotime($date));
}

function shortenText($text, $length = 450)
{
    $text = $text . " ";
    $text = substr($text, 0, $length);
    $text = substr($text, strpos($text, ' '));
    $text = $text . "...";
    return $text;
}