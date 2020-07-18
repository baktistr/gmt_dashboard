<template>
  <div class="card text-white bg-info">
    <div class="card-body pb-0">
      <div class="text-value-lg">9.823</div>
      <div>Total Users</div>
    </div>
    <div class="c-chart-wrapper mt-3 mx-3" style="height:100px;">
      <canvas class="chart" id="card-chart2" height="70"></canvas>
    </div>
  </div>
</template>

<script>
  import Chart from 'chart.js';

  export default {
    mounted() {
      new Chart(document.getElementById('card-chart2'), {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [
            {
              label: 'Total users',
              backgroundColor: 'transparent',
              borderColor: 'rgba(255,255,255,.55)',
              pointBackgroundColor: window.coreuiUtils.getStyle('--info'),
              data: [1, 18, 9, 17, 34, 22, 11]
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
                min: -4,
                max: 39
              }
            }]
          },
          elements: {
            line: {
              tension: 0.00001,
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      })
    }
  }
</script>
