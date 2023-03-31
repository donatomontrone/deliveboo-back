


@extends('layouts.app')
    @section('scripts')

    @endsection
    @section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2>Totale Ordini</h2>
            <div class="col-10 mb-5">
                <canvas id="ordersChart"></canvas>
            </div>
            <h2>Totale Entrate</h2>
            <div class="col-10">
                    <!-- Grafico ammonare degli ordini mese per mese -->
            <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>

    @section('chartScripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Script per generare i grafici -->
<script>
    var revenueData = {
        labels: {!! json_encode($labels) !!},
        datasets: [
            {
                label: 'Entrate',
                data: {!! json_encode($dataRevenue) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }
        ]
    };
    
    // Imposta le opzioni per il grafico delle entrate
    var revenueOptions = {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value, index, values) {
                        return '€' + value;
                    }
                }
            }
        }
    };
    
    // Crea il grafico delle entrate
    var revenueChart = new Chart(document.getElementById('revenueChart'), {
        type: 'bar',
        data: revenueData,
        options: revenueOptions
    });
    
    // Imposta i dati per il grafico degli ordini
    var ordersData = {
        labels: {!! json_encode($labels) !!},
        datasets: [
            {
                label: 'Ordini',
                data: {!! json_encode($dataOrders) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ]
    };
    
    // Imposta le opzioni per il grafico degli ordini
    var ordersOptions = {
        scales: {
            y: {
                beginAtZero: true,
                stepSize: 1
            }
        }
    };
    
    // Crea il grafico degli ordini
    var ordersChart = new Chart(document.getElementById('ordersChart'), {
        type: 'line',
        data: ordersData,
        options: ordersOptions
    });
</script>
    @endsection
    @endsection