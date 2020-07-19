<template>
  <div class="card">
    <div class="card-header">
      Wilayah Telekomunikasi
    </div>
    <div class="card-body">
      <div class="c-chart-wrapper">
        <canvas id="witel-chart"></canvas>
      </div>
    </div>
  </div>
</template>

<script>
  import Chart from 'chart.js';

  export default {
    mounted() {
      const random = () => Math.round(Math.random() * 100)

      new Chart(document.getElementById('witel-chart'), {
        type: 'bar',
        data: {
          labels : ['TREG 1', 'TREG 2', 'TREG 3', 'TREG 4', 'TREG 5', 'TREG 6', 'TREG 7'],
          datasets : [
            {
              label: 'Buildings',
              backgroundColor : window.coreuiUtils.getStyle('--info'),
              data : [random(), random(), random(), random(), random(), random(), random()]
            },
          ]
        },
        options: {
          responsive: true
        }
      })
    }
  }
</script>

<style scoped>

</style>
