<script>
  import { Bar } from 'vue-chartjs';

  export default {
    extends: Bar,
    props: {
      label: {
        type: String,
        required: true
      }
    },
    data () {
      return {
        chartdata: {
          labels: [
            'TREG 1',
            'TREG 2',
            'TREG 3',
            'TREG 4',
            'TREG 5',
            'TREG 6',
            'TREG 7',
          ],
          datasets: [
            {
              label: this.label,
              backgroundColor: [
                '#1abc9c',
                '#e74c3c',
                '#3498db',
                '#f1c40f',
                '#9b59b6',
                '#e67e22',
                '#34495e'
              ],
              data: [
                40,
                20,
                100,
                50,
                12,
                70,
                20,
              ]
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              display: true,
              ticks: {
                stepSize: 25
              }
            }]
          }
        }
      }
    },

    mounted () {
      this.renderChart(this.chartdata, this.options)
    }
  }
</script>
