<template>


    <div class="card"> 
       <div class="card-header">Registro producto</div>
        <div class="card-body">

            <form method="POST" action="">

                <div class="form-group">
                <label for="">{{'Descripción'}}</label>
                <input name="descripcion" type="text" class="form-control">
                </div>

                <div class="form-group">
                <label for="">{{'Stock'}}</label>
                <input name="stock" type="text" class="form-control">
                </div>

                <div class="form-group">
                <label for="">{{'Costo unidad'}}</label>
                <input name="costo" type="text" class="form-control">
                </div>

            </form>

        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                Lucho: 'value',
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
