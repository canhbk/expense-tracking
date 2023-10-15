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
            <td><?= $transaction['date']?></td>
            <td><?= $transaction['checkNumber']?></td>
            <td><?= $transaction['description']?></td>
            <td><?= $transaction['amount']?></td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>
