<template>
  <div :class="`card card-accent-${color}`">
    <div class="card-body pb-0">
      <div class="text-value-lg">{{ data[11] }}</div>
      <div>{{ title }}</div>
    </div>
    <div class="c-chart-wrapper mt-3 mx-3">
      <canvas class="chart" :id="chartId" :height="height"></canvas>
    </div>
  </div>
</template>

<script>
  import Chart from 'chart.js';

  export default {
    props: {
      chartId: {
        type: String,
        default: true
      },
      title: {
        type: String,
        default: 'Bar Chart Widget'
      },
      labels: {
        type: Array,
        required: true
      },
      data: {
        type: Array,
        required: true
      },
      height: {
        type: Number,
        default: 100
      },
      color: {
        type: String,
        default: 'info'
      },
      barColor: {
        type: String,
        default: 'red'
      }
    },

    mounted() {
      new Chart(document.getElementById(this.chartId), {
        type: 'bar',
        data: {
          labels: this.labels,
          datasets: [
            {
              label: this.title,
              backgroundColor: this.barColor,
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
