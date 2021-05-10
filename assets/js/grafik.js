//grafik line
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'line',

  // The data for our dataset
  data: {
    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'June', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
    datasets: [{
      label: 'Grafik Penjualan',
      backgroundColor: 'rgb(89, 105, 255)',
      borderColor: 'rgb(89, 105, 255)',
      data: [0, 10, 5, 2, 20, 30, 45, 30, 52, 64, 42, 90]
    }]
  },

  // Configuration options go here
  options: {}
});

//grafik pie
var ctx2 = document.getElementById('myChart2').getContext('2d');
var chart2 = new Chart(ctx2, {
  // The type of chart we want to create
  type: 'pie',
  options: {},

  // The data for our dataset
  data: {
    datasets: [{
      data: [10, 20],
      backgroundColor: [
        'rgb(255,99,132)',
        'rgb(255,205,86)'
      ]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
      'Red',
      'Yellow'
    ],
  },

  // Configuration options go here
  options: {}
});

//bar
var ctx3 = document.getElementById("myChart3").getContext('2d');
var myChart3 = new Chart(ctx3, {
  type: 'bar',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 23, 2, 3, 8],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 99, 132, 0.2)',
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(255,99,132,1)',
        'rgba(255,99,132,1)',
        'rgba(255,99,132,1)',
        'rgba(255,99,132,1)',
        'rgba(255,99,132,1)',
      ],
      borderWidth: 1
    }]
  },
  options: {}
});