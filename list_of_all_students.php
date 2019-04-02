<?php

$students = [
    [ 'name' => 'Мария Георгиева', 'fn' => 62543, 'mark' => 5.25 ],
    [ 'name' => 'Иван Иванов',     'fn' => 62555, 'mark' => 6.00 ],
    [ 'name' => 'Петър Петров',    'fn' => 62549, 'mark' => 5.00],
    ['name' => 'Петя Димитрова',   'fn' => 62559, 'mark' => 6.00]
];

foreach($students as $student) {
    foreach($student as $key => $value){
        echo $value;
        // echo <br>;
    }
}
?>


