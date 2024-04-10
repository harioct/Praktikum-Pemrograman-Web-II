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
        <tr style="background-color: red; height: 70px; font-size: 25px">
            <th>Daftar Smartphone Samsung</th>
        </tr>

        <?php $samsung= array("samsung1"=>"Samsung Galaxy S22", "samsung2"=>"Samsung Galaxy S22+", "samsung3"=>"Samsung Galaxy A03", "samsung4"=>"Samsung Galaxy Xcover 5");
        ?>
        <?php foreach($samsung as $item):?>
            <tr>
                <td><?php echo ($item)?></td>
            </tr>
        <?php endforeach?>

    </table>
</body>
</html>