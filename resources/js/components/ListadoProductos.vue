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
                <a class="btn btn-primary">Editar</a>
                <a @click="eliminar(pro)" class="btn btn-danger">Eliminar</a>
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
                err:false,
                vm:null,
                info:null
            };
        },

          errorCaptured(err,vm,info){
             this.err = err;
             this.vm = vm;
             this.info = info;

             return !this.stopPropagation;
          },

        methods: {
            async listar(){
           
              axios.get('producto').then(res=>{
                this.productos = res.data;
              })

            },
            async eliminar(pro){
                const confirmacion = confirm('Eliminar producto');

                 if(confirmacion){
                   const res = await axios.delete('/producto/'+pro.ide);
                 }
               
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

