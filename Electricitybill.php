
<?php
// Initialize variables
$show_bill = false;
$consumer_name = "";
$units = 0;
$energy_charges = 0;
$fixed_charges = 50;
$total_amount = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $consumer_name = htmlspecialchars(trim($_POST["consumer_name"]));
    $units = (int) $_POST["units"];

    // Electricity bill calculation
    if ($units <= 100) {
        $energy_charges = $units * 2.50;
    } else {
        $energy_charges = (100 * 2.50)
                        + (($units - 100) * 3.50);
    }

    $total_amount = $energy_charges + $fixed_charges;
    $show_bill = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Electricity Bill Generator</title>

<style>
    body {
        background-color: #ffffff;
        font-family: Arial, sans-serif;
        color: #00334e;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 40px;
        margin: 0;
    }

    h1 {
        color: #003b5c;
        margin-bottom: 30px;
        font-size: 32px;
    }

    .form-table {
        border-spacing: 0 15px;
    }

    .form-table td {
        padding: 0 10px;
    }

    .form-table label {
        font-weight: bold;
        color: #003b5c;
    }

    .form-table input {
        padding: 8px;
        border: 1px solid #a8c6d9;
        border-radius: 3px;
        width: 170px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .btn-container {
        text-align: center;
        margin-top: 10px;
    }

    .submit-btn {
        padding: 6px 15px;
        background-color: #f7fbfc;
        border: 1px solid #7094a8;
        color: #003b5c;
        border-radius: 3px;
        cursor: pointer;
        font-size: 14px;
    }

    .submit-btn:hover {
        background-color: #dbeaf1;
    }

    .bill-container {
        margin-top: 40px;
        background-color: #ffffff;
        padding: 25px;
        width: 480px;
        max-width: calc(100% - 40px);
        box-sizing: border-box;
        border: 2px solid #7094a8;
    }

    .bill-container h2 {
        color: #003b5c;
        text-align: center;
        font-size: 22px;
        margin-bottom: 30px;
    }

    .bill-table {
        width: 100%;
        border-spacing: 0 15px;
    }

    .bill-table td {
        padding: 3px;
        font-size: 15px;
    }

    .bill-table td:first-child {
        font-weight: bold;
        font-style: italic;
    }

    .bill-table td:last-child {
        text-align: left;
    }

    .total td {
        padding-top: 20px;
        border-top: 1px solid #dddddd;
        font-weight: bold;
        font-size: 16px;
    }

    .thanks {
        text-align: center;
        margin-top: 25px;
        font-style: italic;
        font-size: 14px;
    }
</style>
</head>

<body>

<h1>Electricity Bill Generator</h1>

<form method="POST" action="">
    <table class="form-table">
        <tr>
            <td>
                <label for="consumer_name">Consumer Name</label>
            </td>
            <td>
                <input type="text" id="consumer_name"
                       name="consumer_name" required>
            </td>
        </tr>

        <tr>
            <td>
                <label for="units">Units Consumed</label>
            </td>
            <td>
                <input type="number" id="units"
                       name="units" min="0" required>
            </td>
        </tr>
    </table>

    <div class="btn-container">
        <button type="submit" class="submit-btn">
            Generate Bill
        </button>
    </div>
</form>

<?php if ($show_bill): ?>

<div class="bill-container">

    <h2>TNEB ELECTRICITY BILL</h2>

    <table class="bill-table">
        <tr>
            <td>Consumer Name</td>
            <td><?php echo $consumer_name; ?></td>
        </tr>

        <tr>
            <td>Units Consumed</td>
            <td><?php echo $units; ?> Units</td>
        </tr>

        <tr>
            <td>Energy Charges</td>
            <td>
                ₹ <?php echo number_format($energy_charges, 2); ?>
            </td>
        </tr>

        <tr>
            <td>Fixed Charges</td>
            <td>
                ₹ <?php echo number_format($fixed_charges, 2); ?>
            </td>
        </tr>

        <tr class="total">
            <td>Total Bill Amount</td>
            <td>
                ₹ <?php echo number_format($total_amount, 2); ?>
            </td>
        </tr>
    </table>

    <p class="thanks">
        Thank You! Pay Before Due Date.
    </p>

</div>

<?php endif; ?>

</body>
</html>
