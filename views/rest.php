<?php
include(SERVER_ROOT . 'models/rest_model.php');
?>

    <h1 class="red-text">Weather query</h1>

    <form method="post">
        <input type="hidden" name="type" value="get">
        <!-- Ez csak akkor kell ha 1 darab employee-t akarunk lekérdezni -->
        <!--<label for="employeeId">Select Employee id</label>-->
        <!--<select name="employeeId" id="employeeId">-->
        <!--    <option value="0">Mind</option>-->
        <!--    <option value="1">1</option>-->
        <!--    <option value="2">2</option>-->
        <!--    <option value="3">3</option>-->
        <!--    <option value="4">4</option>-->
        <!--</select>-->
        <input type="submit" value="Get Employee">
    </form>

    <form method="post">
        <input type="hidden" name="type" value="post">
        <input type="text" name="name" id="name"/>
        <input type="number" name="salary" id="salary"/>
        <input type="number" name="age" id="age"/>
        <input type="submit" value="Create Employee">
    </form>

    <form method="post">
        <input type="hidden" name="type" value="put">
        <input type="text" name="updateId" id="updateId" />
        <input type="text" name="updateName" id="updateName"/>
        <input type="number" name="updateSalary" id="updateSalary"/>
        <input type="number" name="updateAge" id="updateAge"/>
        <input type="submit" value="Update Employee">
    </form>

    <form method="post">
        <input type="hidden" name="type" value="delete">
        <input type="text" name="deletedEmployeeId" id="deletedEmployeeId"/>
        <input type="submit" value="Delete Employee">
    </form>

<?php echo $result ?>