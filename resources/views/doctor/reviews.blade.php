@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex flex-column flex-lg-row justify-content-center gap-4">
            <div class="col-12 col-lg-5 shadow-lg rounded-5 mt-3 bg-white ">
                <h2 class="fs-4 text-secondary my-2 p-5 text-center fw-semibold fs-5 inline-block  text-uppercase">
                    Your Messages
                </h2>

                <div class=" bg_secondary rounded text-white mt-2 mt-lg-0">

                    <div class="wrapper">
                        <canvas id="messagesChart"></canvas>
                    </div>

                </div>
            </div>
            {{-- /your messages --}}

            <div class="col-12 col-lg-5 shadow-lg rounded-5 mt-3 bg-white ">
                <h2 class="fs-4 text-secondary my-2 p-5 text-center fw-semibold fs-5 inline-block  text-uppercase">
                    Your Votes
                </h2>

                <div class=" bg_secondary rounded text-white mt-2 mt-lg-0">

                    <div class="wrapper">
                        <ul class="list-unstyled">
                            <li class="average text-center">
                                Your average vote is: <strong>{{ $profile->average_vote }}</strong>
                            </li>

                        </ul>
                        <canvas id="votesChart"></canvas>
                    </div>

                </div>
            </div>
            {{-- /your messages --}}

            <div class="col-12 shadow-lg rounded-5 mt-3 bg-white">
                <h2 class="fs-4 text-secondary my-4 p-5 text-center fw-semibold fs-5 inline-block  text-uppercase">
                    Your reviews
                </h2>
                <div class="back_card mb-5">
                    @foreach ($reviews as $review)
                        <div class="col px-5 py-2">
                            <div class="card">
                                <div class="card-header">
                                    <p>{{ $review->name }} {{ $review->surname }}</p>
                                    <small>{{ $review->date }}</small>
                                </div>
                                <div class="card-body">
                                    <p>{{ $review->text }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- /your reviews --}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // votesChart
        const votesData = @json($votes);


        const labels = ['⭐', '⭐⭐', '⭐⭐⭐', '⭐⭐⭐⭐', '⭐⭐⭐⭐⭐'];
        let data = [];

        for (let i = 1; i <= 5; i++) {
            data.push(votesData[i] || 0);
        }


        const ctx = document.getElementById('votesChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>

    <script>
        const ctxMessages = document.getElementById('messagesChart');

        const messagesData = @json($messages);

        const dataMessage = Object.values(messagesData)

        const labelsMessage = Object.keys(messagesData);

        new Chart(ctxMessages, {
            type: 'line',
            data: {
                labels: labelsMessage,
                datasets: [{
                    label: 'Your Messages stats',
                    data: dataMessage,
                    fill: false,
                    borderWidth: 1,
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        });
    </script>
@endsection
