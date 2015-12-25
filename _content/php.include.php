<?php
$main_array = array(
    array(
        'Name'    => 'Trixie',
        'Color'   => 'Green',
        'Element' => 'Earth',
        'Likes'   => 'Flowers'
    ),
    array(
        'Name'    => 'Tinkerbell',
        'Element' => 'Air',
        'Likes'   => 'Singing',
        'Color'   => 'Blue'
    ),
    array(
        'Element' => 'Water',
        'Likes'   => 'Dancing',
        'Name'    => 'Blum',
        'Color'   => 'Pink'
    )
);
?>
<style>

</style>

<h1>Задание 4: PHP</h1>
<div class="php container">
<?php draw_table($main_array);?>
</div>