<template>
    
   <div class="modal fade" id="categorie_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    {{`${is_create?'Crear':'Actualizar'} categoria`}}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="storeCategorie" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="title" v-model="categorie.name">
                        </div>
                        <hr>
                        <section class="d-flex justify-content-end mt-3">
                            <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary me-1" > {{`${is_create?'Crear':'Actualizar'} categoria`}}</button>
                        </section>
                        
                    </form> 
            </div>
            
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        props:['categorie_data'],
        data(){
            return{
                is_create: true,
                categorie:{}
            }
        },
        created(){
            this.index()
        },
        methods:{
            index(){
                this.setCategorie()
            },
            setCategorie(){
                if(!this.categorie_data) return
                this.categorie = {...this.categorie_data}
                this.is_create = false
            },
            loadFormData(){
                const form_data = new FormData()
       
                form_data.append('name', this.categorie.name)
            
                return form_data
            },
            async storeCategorie(){

                try {
                    const categorie = this.loadFormData()
                    if (this.is_create) {
                        await axios.post('Categories/CreateCategorie', categorie)
                    }else{
                         await axios.post(`Categories/UpdateCategorie/${this.categorie.id}`, categorie)
                    }   

                      if (this.is_create) {
                        swal.fire({
						icon: 'success',
						title: 'Felicidades',
						text: 'Categoria creado'
					})
                    }else{
                          swal.fire({
						icon: 'success',
						title: 'Felicidades',
						text: 'Categoria actualizado'
					})
                    }

                    this.$parent.closeModal()
                } catch (error) {
                    console.error(error);
                    swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Algo salio mal'
					})
                }
               
                
            }


    }
}
</script>