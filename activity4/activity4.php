<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Currency Calculator</title>
    <meta name="description" content="Ceng311 In Class Activity4">
</head>

<body>
    <?php
    $rates = array(
        'USD_to_CAD' => 1.35,
        'USD_to_EUR' => 0.92,
        'CAD_to_USD' => 0.74,
        'CAD_to_EUR' => 0.68,
        'EUR_to_USD' => 1.09,
        'EUR_to_CAD' => 1.47
    );

    $from_amount = isset($_GET['from_amount']) ? $_GET['from_amount'] : '';
    $from_currency = isset($_GET['from_currency']) ? $_GET['from_currency'] : '';
    $to_currency = isset($_GET['to_currency']) ? $_GET['to_currency'] : '';

    $to_amount = '';
    if (!empty($from_amount) && !empty($from_currency) && !empty($to_currency)) {
        $exchange_key = $from_currency . '_to_' . $to_currency;
        $exchange_rate = isset($rates[$exchange_key]) ? $rates[$exchange_key] : 1;
        $to_amount = $from_amount * $exchange_rate;
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
        <table>
            <tr>
                <td>From:</td>
                <td><input type="text" name="from_amount" value="<?php echo $from_amount; ?>"></td>
                <td>
                    <select name="from_currency">
                        <option value="USD" <?php if ($from_currency == 'USD') echo 'selected'; ?>>USD</option>
                        <option value="CAD" <?php if ($from_currency == 'CAD') echo 'selected'; ?>>CAD</option>
                        <option value="EUR" <?php if ($from_currency == 'EUR') echo 'selected'; ?>>EUR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>To:</td>
                <td><input type="text" name="to_amount" value="<?php echo $to_amount; ?>" readonly></td>
                <td>
                    <select name="to_currency">
                        <option value="USD" <?php if ($to_currency == 'USD') echo 'selected'; ?>>USD</option>
                        <option value="CAD" <?php if ($to_currency == 'CAD') echo 'selected'; ?>>CAD</option>
                        <option value="EUR" <?php if ($to_currency == 'EUR') echo 'selected'; ?>>EUR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" value="Convert">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
