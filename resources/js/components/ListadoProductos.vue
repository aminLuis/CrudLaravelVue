<template>
    
<div class="container">  

    <button @click="addProducto()" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Nuevo</button>

   <hr>

    <div class="modal" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-white">{{tituloModal}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
           
                <form @submit.prevent="guardarProducto" v-if="add">
                  
                    <div class="form-group">
                        <label for="">{{'Descripción'}}</label>
                        <input v-model="arrayProductos.descripcion" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">{{'Stock'}}</label>
                        <input v-model="arrayProductos.stock" type="number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">{{'Costo unidad'}}</label>
                        <input v-model="arrayProductos.costo" type="number" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>

                </form>

                <form @submit.prevent="actualizarProducto" v-if="!add">

                         <h5>Datos actuales</h5>

                     <div class="form-group">
                        <label for="">{{'Descripción'}}</label>
                        <input v-model="arrayProductos.descripcion" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">{{'Stock'}}</label>
                        <input v-model="arrayProductos.stock" type="number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">{{'Costo unidad'}}</label>
                        <input v-model="arrayProductos.costo" type="number" class="form-control">
                    </div>

                    <button class="btn btn-primary">Guardar cambios</button>

                </form>

        </div>
       <!-- <div class="modal-footer bg-primary">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
             <button type="button" class="btn btn-primary">Save changes</button> 
        </div> -->
        </div>
    </div>
    </div>


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
                <a @click="editProducto();cargarDatos(pro)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</a>
                <a @click="eliminar(pro)" class="btn btn-danger">Eliminar</a>
             </td>
         </tr>
     </tbody>

   </table>

   
</div>

</template>

<script>
    export default {
        data() {
            return {
                productos:[],
                tituloModal:'',
                add:true,
                arrayProductos:{
                descripcion:'',    
                stock:'',
                costo:''
                },
                idUpdate:'',
            };

        },


        methods: {
            async listar(){
           
              axios.get('producto').then(res=>{
                this.productos = res.data;
              })

            },
            async eliminar(pro){
                const confirmacion = confirm(`Eliminar producto ${pro.descripcion}`);
              
                if(confirmacion){
                    const res = await axios.delete('producto/'+pro.id);
                    this.listar();
                }
            },

          
            async addProducto(){
                this.add = true;
                this.tituloModal = 'Nuevo';
                this.limpiarCampos();
            },

            async editProducto(){
                this.add = false;
                this.tituloModal = 'Modificar';
            },

            async cargarDatos(pro){
               this.arrayProductos = {
                   descripcion:pro.descripcion,
                   stock:pro.stock,
                   costo:pro.costo
               }
               this.idUpdate = pro.id;
            },
            
            async actualizarProducto(){
        
            axios.put('producto/'+this.idUpdate,this.arrayProductos).then((result)=>{
                console.log(result);
                this.listar();
            }).catch(function(err){
                console.log(err);
            });

            },

            async guardarProducto(){
                axios.post("producto", this.arrayProductos).then((result) => {
                   console.log(result);
                    alert('Producto agregado');
                    this.limpiarCampos();
                    this.listar();
                });
            },

            async limpiarCampos(){
               this.arrayProductos={
                   descripcion:'',
                   stock:'',
                   costo:''
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
