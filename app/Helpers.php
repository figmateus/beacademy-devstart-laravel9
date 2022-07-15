<?php

function formatDateTime($datetime)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d:i:s', $datetime)->format('d/m/Y');
}

function formatMoney($money) 
{
    $clean_money = str_replace('.','', $money);

    return number_format($clean_money,2,',','.');
}