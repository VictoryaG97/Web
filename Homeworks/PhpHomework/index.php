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
        <div class="content">
            <div class="title">
                <h2> Добавяне на оценкa </h2>
            </div>
            <div class="add-form">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="add-form-content">
                        <div class="block">
                            <label> Име на студент <input id="student_name" name="name" type="text" value="<?php if (isset($name)) echo $name ?>"></label>
                            <span class="error"><?php if (isset($nameError)) echo '<br>'.$nameError ?><br><br></span>
                        </div>
                        <div class="block">
                            <label> Факултетен номер <input id="fn" name="fn" type="number" value="<?php if (isset($fn)) echo $fn ?>"></label>
                            <span class="error"><?php if (isset($fnError)) echo '<br>'.$fnError ?><br><br></span>
                        </div>
                        <div class="block">
                            <label> Оценка <input id="mark" name="mark" type="number" step=0.01 value="<?php if (isset($mark)) echo $mark ?>"></label>
                            <span class="error"><?php if (isset($markError)) echo '<br>'.$markError ?><br><br></span>
                        </div>
                        <div class="block">
                            <input id="submit" name="submit" type="submit" value="Добави"/>
                        </div>
                    </div>
                </form>
            </div>
            <br><br>
        </div>
    </body>
</html>