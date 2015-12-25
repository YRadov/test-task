<?php
/* ===Распечатка массива=== */
function print_arr($arr)
{
    echo '<pre>';
     print_r($arr);
    echo'</pre>';
}
/* ===Распечатка массива=== */

//*******************************************************************************
//*******************************************************************************
//*******************************************************************************
//названия столбцов таблицы
function columns_headers($main_array)
{
    return array_keys(reset($main_array));
}
//------------------------------------------------------------------------------
//максимальные длины ячеек таблицы
function columns_lengths($main_array, $columns_headers)
{
    $lengths = [];
    foreach ($columns_headers as $header)
    {
        $header_length = strlen($header);
        $max = $header_length;

        foreach ($main_array as $row)
        {
            $length = strlen($row[$header]);
            if ($length > $max)
            {
                $max = $length;
            }
        }

        if (($max % 2) != ($header_length % 2)) {
            $max += 1;
        }
        //max значение каждой ячейки
        $lengths[$header] = $max;
    }

    return $lengths;
}
//*******************************************************************************
//горизонтальная линия таблицы
function row_separator($columns_lengths)
{
    $row = '';
    foreach ($columns_lengths as $column_length)
    {
        $row .= JOINT . str_repeat(LINE_X, (SPACE_X * 2) + $column_length);
    }
    $row .= JOINT;

    return $row;
}
//*******************************************************************************
//вертикальные разделители столбцов
function row_spacer($columns_lengths)
{
    $row = '';
    foreach ($columns_lengths as $column_length) {
        $row .= LINE_Y . str_repeat(' ', (SPACE_X * 2) + $column_length);
    }
    $row .= LINE_Y;

    return $row;
}
//*******************************************************************************
//заголовок таблицы
function row_headers($columns_headers, $columns_lengths)
{
    $row = '';
    foreach ($columns_headers as $header) {
        //заполняем недостающее место " " и выводим надпись посередине
        $row .= LINE_Y . str_pad($header, (SPACE_X * 2) + $columns_lengths[$header], ' ', STR_PAD_BOTH);
    }
    $row .= LINE_Y;

    return $row;
}
//*******************************************************************************
//формирование строки
function row_cells($row_cells, $columns_headers, $columns_lengths)
{
    $row = '';
    $color=$row_cells['Color'];

    foreach ($columns_headers as $header) {
        //print_arr($header);
        if($header=='Color')
        {
            $row .= LINE_Y . str_repeat(' ', SPACE_X)
                .'<span style="background-color:'.$color.';">'
                . str_pad
                (
                    $row_cells[$header],
                    SPACE_X + $columns_lengths[$header],
                    ' ',
                    STR_PAD_BOTH
                )
                .'</span>';
        }
        else
        {
            $row .= LINE_Y . str_repeat(' ', SPACE_X)
                . str_pad
                (
                    $row_cells[$header],
                    SPACE_X + $columns_lengths[$header],
                    ' ',
                    STR_PAD_BOTH
                );
        }

    }
    $row .= LINE_Y;

    return $row;
}
//*******************************************************************************
//*******************************************************************************
const SPACE_X = 1;
const JOINT  = '+';
const LINE_X = '-';
const LINE_Y = '|';

function draw_table($main_array)
{

    $nl              = "\n";
    $columns_headers = columns_headers($main_array);
        //echo '<br>$columns_headers:';
        //print_arr($columns_headers);
    $columns_lengths = columns_lengths($main_array, $columns_headers);
        //echo '<br>columns_lengths:';
        //print_arr($columns_lengths);
    $row_separator = row_separator($columns_lengths);
        //echo '<br>$row_separator:';
        //print_arr($row_separator);
    $row_spacer = row_spacer($columns_lengths);
        //echo '<br>$row_spacer:';
        //print_arr($row_spacer);

    $row_headers = row_headers($columns_headers, $columns_lengths);
        //echo '<br>$row_headers:';
        //print_arr($row_headers);
    echo '<pre>';
              //шапка таблицы
              echo $row_separator . $nl;
              echo $row_headers . $nl;
              //тело таблицы
                 foreach ($main_array as $row_cells) {
                     echo $row_separator . $nl;
                     $row_cells = row_cells(
                             $row_cells,
                             $columns_headers,
                             $columns_lengths
                     );
                     echo $row_cells . $nl;
                 }
                 echo $row_separator . $nl;

    echo '</pre>';

}
//------------------------------------------------------------------------------
