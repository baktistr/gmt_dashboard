<template>
  <div class="card card-accent-info">
    <div class="card-body pb-0">
      <div class="text-value-lg">{{ totalUsers }}</div>
      <div>{{ title }}</div>
    </div>
    <div class="c-chart-wrapper mt-3 mx-3" style="height:133px;">
      <canvas class="chart" id="total-user-chart" height="70"></canvas>
    </div>
  </div>
</template>

<script>
  import Chart from 'chart.js';

  export default {
    props: {
      totalUsers: {
        type: Number,
        required: true,
      },
      label: {
        type: Array,
        required: true
      },
      data: {
        type: Array,
        required: true
      },
      title: {
        type: String,
        default: 'Total Users'
      }
    },

    mounted() {
      new Chart(document.getElementById('total-user-chart'), {
        type: 'bar',
        data: {
          labels: this.label,
          datasets: [
            {
              label: 'Total users',
              backgroundColor: 'rgb(26,140,255)',
              data: this.data
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
