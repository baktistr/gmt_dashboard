<template>
  <div class="card card-accent-danger">
    <div class="card-body pb-0">
      <div class="text-value-lg">9.823</div>
      <div>{{ title }}</div>
    </div>
    <div class="c-chart-wrapper mt-3 mx-3" style="height:133px;">
      <canvas class="chart" id="total-space-booked-chart" height="70"></canvas>
    </div>
  </div>
</template>

<script>
  import Chart from 'chart.js';

  export default {
    props: {
      title: {
        type: String,
        default: 'Total Space Booked'
      }
    },

    mounted() {
      new Chart(document.getElementById('total-space-booked-chart'), {
        type: 'bar',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October'],
          datasets: [
            {
              label: 'Total users',
              backgroundColor: 'rgb(255,97,97)',
              data: [1, 18, 9, 17, 34, 22, 11, 10, 87, 23]
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
