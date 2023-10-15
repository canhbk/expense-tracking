<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        @media (max-width: 600px) {
            table {
                width: 100%;
            }

            th, td {
                display: block;
                width: 100%;
            }

            th {
                font-weight: bold;
                background-color: #f2f2f2;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Date</th>
            <th>Check</th>
            <th>Description</th>
            <th>Amount</th>
        </tr>
        <?php foreach($transactions as $transaction):?>
        <tr>
            <td><?=  formatDate($transaction['date'])?></td>
            <td><?= $transaction['checkNumber']?></td>
            <td><?= $transaction['description']?></td>
            <td>
            <?php if($transaction['amount'] > 0):?>
                  <span style="color: green">
                        <?= formatDollarAmount($transaction['amount'])?></td>
                  </span>
            <?php elseif ($transaction['amount'] < 0):?>
                  <span style="color: red">
                        <?= formatDollarAmount($transaction['amount'])?></td>
                  </span>
            <?php else: ?>
                  <?= formatDollarAmount($transaction['amount'])?></td>
            <?php endif?>
        </tr>
        <?php endforeach ?>

        <tfoot class="footer">
            <tr>
                <td colspan="3">Total Income:</td>
                <td>
                <?= formatDollarAmount($totals['totalIncome'])?>
                </td>
            </tr>
            <tr>
                <td colspan="3">Total Expense:</td>
                <td>
                <?= formatDollarAmount($totals['totalExpense'])?>
                </td>
            </tr>
            <tr>
                <td colspan="3">Total Net:</td>
                <td>
                    <?= formatDollarAmount($totals['netTotal'])?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
