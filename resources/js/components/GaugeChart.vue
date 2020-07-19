<template>
  <div class="card card-accent-primary">
    <div class="card-header">{{ title }}</div>
    <div class="card-body">
      <canvas id="chart"></canvas>
    </div>
  </div>
</template>

<script>
  import Chart from 'chart.js';
  import GaugeChart from 'chartjs-gauge';

  export default {
    props: {
      title: {
        type: String,
        default: 'Gauge Chart'
      }
    },

    data () {
      return {
        config: {
          type: 'gauge',
          data: {
            datasets: [{
              data: this.randomData(),
              value: this.randomValue(),
              backgroundColor: ['orange'],
              borderWidth: 2
            }]
          },
          options: {
            responsive: true,
            layout: {
              padding: {
                bottom: 30
              }
            },
            needle: {
              // Needle circle radius as the percentage of the chart area width
              radiusPercentage: 2,
              // Needle width as the percentage of the chart area width
              widthPercentage: 3.2,
              // Needle length as the percentage of the interval between inner radius (0%) and outer radius (100%) of the arc
              lengthPercentage: 80,
              // The color of the needle
              color: 'rgba(0, 0, 0, 1)'
            },
            valueLabel: {
              formatter: Math.round
            }
          }
        }
      }
    },

    mounted() {
      let ctx = document.getElementById('chart').getContext('2d');
      window.myGauge = new Chart(ctx, this.config);
    },

    methods: {
      randomScalingFactor() {
        return Math.round(Math.random() * 100);
      },

      randomData() {
        return [
          this.randomScalingFactor(),
          this.randomScalingFactor()
        ];
      },

      randomValue() {
        return Math.max.apply(null, this.randomData()) * Math.random();
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
