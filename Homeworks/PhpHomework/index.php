<?php
    require_once "validation.php"
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
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label> Име на студент <input id="student_name" name="name" type="text" value="<?php if (isset($name)) echo $name ?>"></label>
                <span class="error"><?php if (isset($nameError)) echo $nameError ?></span> <br><br>
                <label> Факултетен номер <input id="fn"           name="fn"   type="number" value="<?php if (isset($fn)) echo $fn ?>"></label>
                <span class="error"><?php if (isset($fnError)) echo $fnError ?></span> <br><br>
                <label> Оценка          <input id="mark"         name="mark" type="number" value="<?php if (isset($mark)) echo $mark ?>"></label>
                <span class="error"><?php if (isset($markError)) echo $markError ?></span> <br><br>
                <input class="submit" id="submit" name="submit" type="submit" value="Добави"/>
            </form>
            <br><br>
        </div>
    </body>
</html>