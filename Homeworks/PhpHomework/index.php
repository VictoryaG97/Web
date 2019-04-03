<?php
$students = [
    [ 'name' => 'Мария Георгиева', 'fn' => 62543, 'mark' => 5.25 ],
    [ 'name' => 'Иван Иванов',     'fn' => 62555, 'mark' => 6.00 ],
    [ 'name' => 'Петър Петров',    'fn' => 62549, 'mark' => 5.00],
    ['name' => 'Петя Димитрова',   'fn' => 62559, 'mark' => 6.00]
];

array_multisort(array_column($students, 'mark'), SORT_DESC, $students);

include ('validation.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Add Student</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="content">
            <form method="POST" "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label> Name <input id="student_name" name="name" type="text" value="<?php if (isset($name)) echo $name ?>"></label>
                <span class="error"><?php if (isset($nameError)) echo $nameError ?></span> <br><br>
                <label> Faculty Number <input id="fn"           name="fn"   type="number" value="<?php if (isset($fn)) echo $fn ?>"></label>
                <span class="error"><?php if (isset($fnError)) echo $fnError ?></span> <br><br>
                <label> Grade          <input id="mark"         name="mark" type="number" value="<?php if (isset($mark)) echo $mark ?>"></label>
                <span class="error"><?php if (isset($markError)) echo $markError ?></span> <br><br>
                <input class="submit" name="submit" type="submit" value="Add Student" onclick="addRow()" />
                <span class "success"><?php if (isset($success)) echo '<br/><br/>'.$success ?></span>
            </form>
            <br><br>
        </div>

        <script>
            var js_students = <?php echo json_encode($students) ?>;

            window.onload=function() {
                document.getElementById("content").appendChild(buildTable(js_students));
            }

            function buildTable(data) {
                data = data.sort();
                var table = document.createElement("table");
                table.className="gridtable";
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

            function addRow() {
                var data = <?php echo json_encode($new_student) ?>;

                var table = document.getElementById("students-table");

                var tr = document.createElement("tr");
                var name_cell = document.createElement("td");
                name_cell.appendChild(document.createTextNode(data.name));
                tr.appendChild(name_cell);

                var fn_cell = document.createElement("td");
                fn_cell.appendChild(document.createTextNode(data.fn));
                tr.appendChild(fn_cell);

                var mark_cell = document.createElement("td");
                mark_cell.appendChild(document.createTextNode(data.mark));
                tr.appendChild(mark_cell);

                table.appendChild(tr);
                // return table;
            }
        </script>
    </body>
    
</html>