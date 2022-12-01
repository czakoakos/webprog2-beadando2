<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6 text-center py-4">
            <h1 class="red-text mb-3">Nézők a meccseken</h1>
            <p class="blue-text mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate sem ut nunc
                dictum, non commodo sem bibendum. </p>
            <script>
                const guestsData = <?= $viewData['data']?>;
                const matchesData = <?= $viewData['dates']?>;
            </script>
            <script src="<?php echo SITE_ROOT ?>js/guests.js"></script>
        </div>
    </div>
</div>

