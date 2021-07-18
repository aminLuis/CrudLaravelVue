<template>
    
    <table class="table table-hover">

     <thead class="thead-light">
         <tr>
             <th>Descripción</th>
             <th>Stock</th>
             <th>Costo unidad</th>
             <th>Acción</th>
         </tr>
     </thead>

     <tbody>
         <tr v-for="pro in productos" :key="pro.ide">
             <td> {{pro.descripcion}} </td>
             <td> {{pro.stock}} </td>
             <td> {{pro.costo}} </td>
             <td>
                <a href="#" class="btn btn-primary">Editar</a>
                <a href="#" class="btn btn-danger">Eliminar</a>
             </td>
         </tr>
     </tbody>

   </table>

</template>

<script>
    export default {
        data() {
            return {
                productos:[],
            };
        },

        methods: {
            async listar(){
               //const res = await axios.get('producto');
               //this.productos = res.data;

              axios.get('producto').then(function (response) {
                    this.productos = response.data;
              })

            }

        },

        created() {
           this.listar();
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

