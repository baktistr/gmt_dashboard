<template>
  <grid
    :cols="columns"
    :rows="data"
    search
    pagination
  />
</template>

<script>
  import Grid from 'gridjs-vue';
  import { h } from 'gridjs';

  export default {
    components: {
      Grid
    },

    props: {
      data: {
        type: Array,
        required: true
      }
    },

    data() {
      return {
        columns: [
          '#',
          'Name',
          'Peruntukan',
          'Alamat',
          {
            name: 'Aksi',
            formatter: (cell, row) => {
              return h('button', {
                className: 'btn btn-primary btn-sm',
                onClick: () => window.location.href = row.cells[4].data
              }, 'Tampilkan')
            }
          }
        ]
      }
    }
  }
</script>
