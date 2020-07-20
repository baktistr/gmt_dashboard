<template>
  <div class="card">
    <div class="card-header">
      <strong>Commercial Spaces</strong>
    </div>
    <div class="card-body">
      <div class="c-chart-wrapper">
        <canvas id="commercial-spaces-chart"></canvas>
      </div>
    </div>
  </div>
</template>

<script>
  import Chart from 'chart.js'

  export default {
    mounted() {
      new Chart(document.getElementById('commercial-spaces-chart'), {
        type: 'doughnut',
        data: {
          labels: ['26 Available', '200 Booked'],
          datasets: [{
            data: [26, 200],
            backgroundColor: ['#2ecc71', '#FF6384',],
            hoverBackgroundColor: ['#2ecc71', '#FF6384',]
          }]
        },
        options: {
          responsive: true,
          tooltip: {
            display: false
          }
        }
      })
    }
  }
</script>

<style scoped>

</style>
