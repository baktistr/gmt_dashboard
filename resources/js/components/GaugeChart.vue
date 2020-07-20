<template>
  <div class="card card-accent-primary">
    <div class="card-header">{{ title }}</div>
    <div class="card-body">
      <canvas :id="chartId"></canvas>
    </div>
  </div>
</template>

<script>
  import Chart from 'chart.js';

  require('chartjs-gauge');

  export default {
    props: {
      chartId: {
        type: String,
        required: true
      },
      title: {
        type: String,
        default: 'Gauge Chart'
      },
      unit: {
        type: String,
        required: true
      },
      data: {
        type: Array,
        default: () => [60000, 85000, 100000]
      },
      value: {
        type: Number,
        default: 0
      },
      bgColor: {
        type: Array,
        default: () => ['#27ae60', '#f1c40f', '#e74c3c']
      }
    },

    data () {
      return {
        config: {
          type: 'gauge',
          data: {
            datasets: [{
              data: this.data,
              value: this.value,
              backgroundColor: this.bgColor,
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            valueLabel: {
              formatter: (value) => {
                return `${this.numberFormat(value)} ${this.unit}`
              }
            }
          }
        }
      }
    },

    mounted() {
      let ctx = document.getElementById(this.chartId).getContext('2d');
      window.myGauge = new Chart(ctx, this.config);
    },

    methods: {
      numberFormat(value) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }
    }
  }
</script>

<style scoped>
  canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
</style>
