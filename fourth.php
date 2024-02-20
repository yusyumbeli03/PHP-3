
<style>
    body {
        background-color: #cd853f;
    }

    table {
        background-color: #5f9ea0;
    }
</style>
<?php
class Transaction
{
    public $transaction_id;
    public $transaction_date;
    public $transaction_amount;
    public $transaction_description;
    public $merchant_name;

    public function __construct($id, $date, $amount, $description, $merchant)
    {
        $this->transaction_id = $id;
        $this->transaction_date = $date;
        $this->transaction_amount = $amount;
        $this->transaction_description = $description;
        $this->merchant_name = $merchant;
    }
}

// Определение массива объектов класса Transaction
$transactions = [
    new Transaction(1, "2019-01-01", 100.00, "Payment for groceries", "SuperMart"),
    new Transaction(2, "2020-02-15", 75.50, "Dinner with friends", "Local Restaurant"),
    new Transaction(3, "2022-06-18", 450.00, "Shopping", "Karol"),
    new Transaction(4, "2023-10-27", 890.00, "Buying ukulele", "MusicShop"),
    new Transaction(5, "2023-11-22", 105.00, "Going to the cinema", "CineplexMD"),
];

// Функция для подсчёта общей суммы транзакций
function calculateTotalAmount($transactions)
{
    return array_reduce($transactions, function ($carry, $transaction) {
        return $carry + $transaction->transaction_amount;
    }, 0);
}

function calculateAverage($transactions)
{
    $totalAmount = calculateTotalAmount($transactions);
    $transactionCount = count($transactions);
    return $totalAmount / $transactionCount;
}

function mapTransactionDescriptions($transactions)
{
    return array_map(function ($transaction) {
        return $transaction->transaction_description;
    }, $transactions);
}
?>

<table border="1">
    <tr style="background-color: #a6a6a6; color: #252525">
        <th colspan="5">Данные о транзакциях</th>
    </tr>
    <tr style="background-color: #a6a6a6; color: #252525">
        <th>ID</th>
        <th>Дата</th>
        <th>Сумма транзакции</th>
        <th>Описание транзакции</th>
        <th>Название организации</th>
    </tr>
    <?php
    foreach ($transactions as $transaction) { ?>
        <tr>
            <td><?php echo $transaction->transaction_id; ?></td>
            <td><?php echo $transaction->transaction_date; ?></td>
            <td><?php echo $transaction->transaction_amount; ?></td>
            <td><?php echo $transaction->transaction_description; ?></td>
            <td><?php echo $transaction->merchant_name; ?></td>
        </tr>
    <?php } ?>
</table>
<?php
echo "Общая сумма всех транзакций: " . calculateTotalAmount($transactions) . "<br>";
echo "Среднее арифметическое всех транзакций: " . calculateAverage($transactions) . "<br>";
echo "Описания всех транзакций: ";
echo '<pre>';
print_r(mapTransactionDescriptions($transactions));
echo '</pre>';
?>
