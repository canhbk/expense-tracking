<?php

declare(strict_types=1);

function getTransactionFiles(string $dirPath):array {
      $files = [];

      foreach (scandir($dirPath) as $file) {
            if (is_dir($file)) {
                  continue;
            }
            array_push($files, $dirPath.$file);
      }

      return $files;
}

function getTransactions(string $filename): array {
      $result = [];
      if(!file_exists($filename)) {
            trigger_error("File '$filename' does not exist!");
      }

      $file = fopen($filename, 'r');

      // Read the first line to ignore it
      // Used to ignore the header
      // In case the csv file doesn't container header line, this will cause missing the first record
      fgetcsv($file);

      while(($transaction = fgetcsv($file))!==false){
            array_push($result, $transaction);
      }

      return $result;
}

function parseTransaction(array $transactionRow):array {
       [$date, $checkNumber, $description, $amount] = $transactionRow;

       $amount = (float)str_replace(['$', ','], '', $amount);
      return [
            'date'=> $date,
            'checkNumber'=>$checkNumber,
            'description'=>$description,
            'amount'=>$amount,
      ];

}


function calculateTotals(array $transactions) : array {
      $totals = ['netTotal'=> 0, 'totalIncome' => 0, 'totalExpense'=>0];

      foreach($transactions as $transaction){
            $totals['netTotal']+= $transaction['amount'];

            if($transaction['amount']>=0){
                  $totals['totalIncome']+= $transaction['amount'];
            }else{
                  $totals['totalExpense'] +=$transaction['amount'];
            }
      }
      return $totals;
}
