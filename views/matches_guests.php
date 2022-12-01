<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-9 text-center py-4">
            <h1 class="red-text mb-3">Nézők a meccseken</h1>
            <p class="blue-text mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate sem ut nunc
                dictum, non commodo sem bibendum. </p>
            <div class="row">
                <div class="col-12 mt-5">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
            <script>
                const guestsData = <?= $viewData['data']?>;
                const matchesData = <?= $viewData['dates']?>;
            </script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="<?php echo SITE_ROOT ?>js/guests.js"></script>
        </div>
    </div>
</div>

<script src="<?php echo SITE_ROOT ?>js/guestsWidget.js"></script>

