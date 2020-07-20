<template>
  <div class="card card-accent-info">
    <div class="card-header">
      <strong>{{ label }}</strong>
    </div>
    <div class="card-body p-1">
      <bar-chart-example :label="label" :style="`height: ${height}px`"/>
    </div>
  </div>
</template>

<script>
  import BarChartExample from "./BarChartExample";

  export default {
    props: {
      height: {
        type: Number,
        default: 300
      },
      label: {
        type: String,
        required: true
      }
    },
    components: { BarChartExample }
  }
</script>
