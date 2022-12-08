<?php
$resultGet = [];
$resultPost = [];
$resultPut = [];
$resultDelete = [];
if ('post' === strtolower($_SERVER['REQUEST_METHOD'])) {

    switch ($_POST['type']) {
        case 'get':
            $resultGet = file_get_contents('https://dummy.restapiexample.com/api/v1/employees');

            // Ez csak akkor kell ha 1 darab employee-t akarunk lekérdezni
            //if ($_POST['employeeId'] === '0') {
            //    $result = file_get_contents('https://dummy.restapiexample.com/api/v1/employees');
            //} else {
            //    $result = file_get_contents('https://dummy.restapiexample.com/api/v1/employee/' . $_POST['employeeId']);
            //}
            break;
        case 'post':
            $data = (object)['name' => $_POST['name'], 'salary' => $_POST['salary'], 'age' => $_POST['age']];
            $options = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context = stream_context_create($options);
            $resultPost = file_get_contents('https://dummy.restapiexample.com/api/v1/create', false, $context);
            break;
        case 'delete':
            $data = $_POST['deletedEmployeeId'];
            $options = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'DELETE'
                )
            );
            $context = stream_context_create($options);
            $resultDelete = file_get_contents('https://dummy.restapiexample.com/api/v1/delete/' . $_POST['deletedEmployeeId'], false, $context);
            break;
        case 'put':
            $data = (object)['id' => $_POST['updateId'], 'name' => $_POST['updateName'], 'salary' => $_POST['updateSalary'], 'age' => $_POST['updateAge']];
            $options = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'PUT',
                    'content' => http_build_query($data)
                )
            );
            $context = stream_context_create($options);
            $resultPut = file_get_contents('https://dummy.restapiexample.com/api/v1/update/'. $_POST['updateId'], false, $context);
            break;
        default:
            $result = file_get_contents('https://dummy.restapiexample.com/api/v1/employees');
    }
} else {
    return $result;
}
?>