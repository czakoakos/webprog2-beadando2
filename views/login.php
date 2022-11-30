<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5 py-4">
            <h1 class="red-text mb-3">Belépés</h1>
            <form action="<?= SITE_ROOT ?>logger" method="post">
                <div class="container px-0">
                    <div class="row mb-2">
                        <div class="col-4 align-self-center">
                            <label for="login"><strong>Felhasználó:</strong></label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="login" id="login" required
                                   pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-4 align-self-center">
                            <label for="password"><strong>Jelszó:</strong></label>
                        </div>
                        <div class="col-8">
                            <input type="password" name="password" id="password" required
                                   pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Bejelentkezés">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>