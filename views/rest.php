<?php
include(SERVER_ROOT . 'models/rest_model.php');
?>

    <div class="container restapi">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 text-start py-4">
                <h1 class="red-text">Publikus Rest API teszt</h1>
                <p><strong>Oldal elérhetősége: </strong><a href="https://dummy.restapiexample.com/">dummy.restapiexample.com</a></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-get-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-get" type="button" role="tab"
                                aria-controls="pills-get" aria-selected="true">GET</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-put-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-put" type="button" role="tab"
                                aria-controls="pills-put" aria-selected="false">PUT</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-post-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-post" type="button" role="tab"
                                aria-controls="pills-post" aria-selected="false">POST</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-delete-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-delete" type="button" role="tab"
                                aria-controls="pills-delete" aria-selected="false">DELETE</button>
                    </li>
                </ul>
                <div id="message"></div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-get" role="tabpanel" aria-labelledby="pills-get-tab">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <h3 class="red-text mt-5 mb-3">Munkatársak listázása</h3>
                            </div>
                            <div class="col-4 mb-5">
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
                                    <input type="submit" value="Munkatársak listázása">
                                </form>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="getResult"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-put" role="tabpanel" aria-labelledby="pills-put-tab">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="red-text mt-5 mb-3">Munkatárs módosítása</h3>
                            </div>
                            <div class="col-12">
                                <form method="post">
                                    <input type="hidden" name="type" value="put">
                                    <div class="row justify-content-center">
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-3 align-self-center">
                                                    <label for="updateId">ID:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" name="updateId" id="updateId" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-3 align-self-center">
                                                    <label for="updateName">Név:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" name="updateName" id="updateName"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-3 align-self-center">
                                                    <label for="updateSalary">Fizetés:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="number" name="updateSalary" id="updateSalary"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-3 align-self-center">
                                                    <label for="updateAge">Kor:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="number" name="updateAge" id="updateAge"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-5">
                                            <input type="submit" value="Munkatárs módosítása">
                                        </div>
                                    </div>
                                </form>
                                <div id="putResult"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-post" role="tabpanel" aria-labelledby="pills-post-tab">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="red-text mt-5 mb-3">Munkatárs módosítása</h3>
                            </div>
                            <div class="col-12">
                                <form method="post">
                                    <input type="hidden" name="type" value="post">
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-3 align-self-center">
                                                    <label for="name">Név:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" name="name" id="name"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-3 align-self-center">
                                                    <label for="salary">Fizetés:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="number" name="salary" id="salary"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-3 align-self-center">
                                                    <label for="age">Kor:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="number" name="age" id="age"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-sm-10 col-md-6 mb-5">
                                            <input type="submit" value="Munkatárs látrehozása">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-delete" role="tabpanel" aria-labelledby="pills-delete-tab">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="red-text mt-5 mb-3">Munkatárs törlése</h3>
                            </div>
                            <div class="col-12">
                                <form method="post">
                                    <input type="hidden" name="type" value="delete">
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-3 align-self-center">
                                                    <label for="deletedEmployeeId">ID:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" name="deletedEmployeeId" id="deletedEmployeeId"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-sm-10 col-md-6 mb-5">
                                            <input type="submit" value="Munkatárs törlése">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    let restGetResult = <?= $resultGet ?>;
    let restPostResult = <?= $resultPost ?>;
    let restPutResult = <?= $resultPut ?>;
    let restDeleteResult = <?= $resultDelete ?>;
</script>
<script src="js/rest.js"></script>
