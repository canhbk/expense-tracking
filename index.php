<?php
declare(strict_types =1);

$root = dirname(__FILE__).DIRECTORY_SEPARATOR;

define('APP_PATH', $root.'app'.DIRECTORY_SEPARATOR);
define('FILES_PATH', $root.'transaction_files'.DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root.'views'.DIRECTORY_SEPARATOR);


require APP_PATH.'App.php';
require APP_PATH.'helper.php';

$transactions = [];

$transactionFiles = getTransactionFiles(FILES_PATH);

foreach($transactionFiles as $file){
      $result = getTransactions($file);

      $result = array_map(function($transactionRow){
            return parseTransaction($transactionRow);
      }, $result);

      $transactions = array_merge($transactions, $result);
}

$totals = calculateTotals($transactions);



require VIEWS_PATH.'index.php';
