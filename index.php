<?php
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
        <form method="POST">
            <label> Name <input id="student_name" name="name" type="text" value="<?php if (isset($name)) echo $name ?>"></label>
            <span class="error"><?php if (isset($nameError)) echo $nameError ?></span> <br>
            <label> Faculty Number <input id="fn"           name="fn"   type="number" value="<?php if (isset($fn)) echo $fn ?>"></label>
            <span class="error"><?php if (isset($fnError)) echo $fnError ?></span> <br>
            <label> Grade          <input id="mark"         name="mark" type="number" value="<?php if (isset($mark)) echo $mark ?>"></label>
            <span class="error"><?php if (isset($markError)) echo $markError ?></span> <br>
            <input class="submit" name="submit" type="submit" value="Add Student">
        </form>
    </body>
    
</html>