<?php
// сервер БД
define('HOST', 'localhost');
// пользователь
define('USER', 'root');
// пароль
define('PASS', '');
// БД
define('DB', 'test_task');

//СОЕДИНЕНИЕ с БД
$mysqli = new mysqli(HOST, USER, PASS, DB);

$query = "SELECT
       c.id,
	   c.name AS cat,
	   COUNT(n.id) AS qty,
	   MIN(p.price) AS min_price,
	   Max(p.price) AS max_price,
	   p.category_id,
	   p.id,
	   p.name,
	   p.description,
	   CHARACTER_LENGTH(p.description) AS leng
FROM products p
LEFT OUTER JOIN categories c
ON  c.id = p.category_id
LEFT OUTER JOIN products n
ON  c.id = n.category_id
WHERE p.description IN
(
	SELECT MAX(p.description)
	FROM products p
	LEFT OUTER JOIN categories c
	ON  c.id = p.category_id
	GROUP BY  p.category_id
)GROUP BY  p.category_id";
$result = $mysqli->query($query);
$res = [];
while($row = mysqli_fetch_assoc($result))
{
    $res[] = $row;
}
/* закрытие выборки */
$result->close();
/* закрытие соединения */
$mysqli->close();
//print_arr($res);
?>

<style>
    .mysql{
        background-color: white;
        margin: 0 auto;
        text-align: center;
    }
    table{
        margin-top: 20px;
    }
    th, td{
        text-align: center;
        vertical-align: middle!important;
    }
    tr{
        font-size: 14px;
    }
</style>

<h1>Задание 3: MySQL</h1>
<div class="mysql container">
<table class="table table-bordered">
    <tr>
      <th class="th">№</th>
      <th>Категория</th>
      <th>Товаров в категории</th>
      <th>MIN цена в категории</th>
      <th>MAX цена в категории</th>
      <th>Товар с самым длинным описанием</th>
      <th>Длина наибольшего описания</th>
      <th class="th">Наибольшее описание</th>
    </tr>
    <?php foreach($res as $k=>$v):?>
        <tr>
            <td><?=$k+1; ?></td>
            <td><?=$v['cat']; ?></td>
            <td><?=$v['qty']; ?></td>
            <td><?=$v['min_price']; ?></td>
            <td><?=$v['max_price']; ?></td>
            <td><?=$v['name']; ?></td>
            <td><?=$v['leng']; ?></td>
            <td><?=$v['description']; ?></td>
        </tr>
    <?php endforeach;?>
</table>
</div>


