<template>
  <div class="card">
    <div class="card-header">
      Commercial Spaces
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
          labels: ['Available', 'Unavailable', 'Booked', 'Free'],
          datasets: [{
            data: [26, 200, 30, 50],
            backgroundColor: ['#2ecc71', '#FF6384', '#36A2EB', '#bdc3c7'],
            hoverBackgroundColor: ['#2ecc71', '#FF6384', '#36A2EB', '#bdc3c7']
          }]
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
