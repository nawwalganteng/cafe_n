@extends('layout.app')
  
@section('title', 'Informasi - Cafe ')
  
@section('contents')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Total Pendapatan Cafe</title>
    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div>
        <!-- <div style="border:1px solid cyan; padding:1.5rem;width: 220px; height: 240;">
            <h3>Total Stok</h3>
        </div> -->
    </div>
    <hr>
    <div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Menu</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jumlahMenu }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pelanggan</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jumlahMember }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah Stok</h6>
                                    <h6 class="font-extrabold mb-0">100</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>
    <div style="width: 600px; height: 400px;">
        <!-- !! FILTER -->
        <div>
            <h2>Chart</h2>
            <div>
                <label for="minDate">Tanggal Awal: </label>
                <input chart-filter-date type="date" id="minDate" name="minDate" onchange="handleDateChange(this,'minDate')">
            </div>
            <div>
                <label for="maxDate">Tanggal Akhir: </label>
                <input chart-filter-date type="date" id="maxDate" name="maxDate" onchange="handleDateChange(this,'maxDate')">
            </div>
        </div>
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script>
        let minDate = false;
        let maxDate = false;
        renderChart(minDate, maxDate)

        function handleDateChange(event, date){
            console.log('handleDateChange:',date,event.value)
            switch(date){
                case "minDate":
                    minDate = event.value
                    break;
                case "maxDate":
                    maxDate = event.value
                    break;
            }
            renderChart()
        }
        // let chartFilterInput = document.querySelectorAll("[chart-filter-date]")
        // chartFilterInput.onChange =
        // Fungsi untuk memformat nilai ke dalam format Rupiah
        let ctx = document.getElementById('myChart').getContext('2d');
        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join('');
            var ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return 'Rp ' + ribuan;
        }

        // Membuat chart
        async function renderChart(){
            let url = `data_chart?`
            if(minDate){
                url += `minDate=${minDate}&`
            }
            if(maxDate){
                url += `maxDate=${maxDate}`
            }
            console.log(url)
            let fetchData = await fetch(url).then(r=>{console.log(r);return r.json()})
            .then(d=>{console.log(d);return d})
            .catch(er=>console.log(er))

            let myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: fetchData.map(item => item.tanggal),
                    datasets: [{
                        label: 'Total Pendapatan Cafe',
                        data: fetchData.map(item => item.total_harga), // Misalnya pendapatan dalam Rupiah
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options:  {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                // Panggil fungsi formatRupiah untuk setiap nilai di sumbu Y
                                return formatRupiah(value);
                            }
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                            // Panggil fungsi formatRupiah untuk tooltip
                            return 'Total Pendapatan: ' + formatRupiah(value);
                        }
                    }
                }
            }
            });
        }
    </script>
</body>
</html>

@endsection