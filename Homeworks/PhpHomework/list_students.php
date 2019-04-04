<?php
session_start();

$students = [
    [ 'name' => 'Мария Георгиева', 'fn' => 62543, 'mark' => 5.25 ],
    [ 'name' => 'Иван Иванов',     'fn' => 62555, 'mark' => 6.00 ],
    [ 'name' => 'Петър Петров',    'fn' => 62549, 'mark' => 5.00],
    ['name' => 'Петя Димитрова',   'fn' => 62559, 'mark' => 6.00]
];
$students[] = ['name' => $_SESSION['name'], 'fn' => $_SESSION['fn'], 'mark' => $_SESSION['mark']];

array_multisort(array_column($students, 'fn'), SORT_ASC, $students);
array_multisort(array_column($students, 'mark'), SORT_DESC, $students);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Add Student</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="content" id='content'></div>
        <script>
            var js_students = <?php echo json_encode($students) ?>;

            window.onload=function() {
                document.getElementById("content").appendChild(buildTable(js_students));
            }

            function buildTable(data) {
                data = data.sort();
                var table = document.createElement("table");
                table.className="students-table";
                table.id="students-table";
                var thead = document.createElement("thead");
                var tbody = document.createElement("tbody");
                var headRow = document.createElement("tr");
                ["Име на студент","Факултетен номер","Оценка"].forEach(function(el) {
                    var th=document.createElement("th");
                    th.appendChild(document.createTextNode(el));
                    headRow.appendChild(th);
                });
                thead.appendChild(headRow);
                table.appendChild(thead); 
                data.forEach(function(el) {
                    var tr = document.createElement("tr");
                    for (var o in el) {  
                        var td = document.createElement("td");
                        td.appendChild(document.createTextNode(el[o]))
                        tr.appendChild(td);
                    }
                    tbody.appendChild(tr);  
                });
                table.appendChild(tbody);             
                return table;
            }
        </script>
    </body>
</html>