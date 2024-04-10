<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table, tr, td, th{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>

        <?php $samsung = array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5");
        ?>

        <tr>
            <td><?php echo $samsung[0]?></td>
        </tr>
        <tr>
            <td><?php echo $samsung[1]?></td>
        </tr>
        <tr>
            <td><?php echo $samsung[2]?></td>
        </tr>
        <tr>
            <td><?php echo $samsung[3]?></td>
        </tr>
    </table>
</body>
</html>