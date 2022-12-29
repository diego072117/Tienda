<template>
    <!-- product -->
   <div class="modal fade" id="product_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    {{`${is_create?'Crear':'Actualizar'} Producto`}}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="storeProduct" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="image" accept="image/*" @change="loadImage">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="title" v-model="product.name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Categoria</label>
                             <v-select :options="categories" v-model="product.category_id" :reduce="category => category.id" 
                                label="name"></v-select> 
                        
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" v-model="product.stock">
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" v-model="product.precio">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripcion</label>
                            <textarea rows="3" class="form-control" id="description" v-model="product.description"></textarea>
                        </div>
                        <hr>
                        <section class="d-flex justify-content-end mt-3">
                            <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary me-1" > {{`${is_create?'Crear':'Actualizar'} producto`}}</button>
                        </section>
                        
                    </form> 
            </div>
            
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        props:['product_data'],
        data(){
            return{
                is_create: true,
                categories:[],
                product:{},
                file: null
            }
        },
        created(){
            this.index()
        },
        methods:{
            index(){
                this.getCategories()
                this.setProduct()
            },
            setProduct(){
                if(!this.product_data) return
                this.product = {...this.product_data}
                this.is_create = false
            },
            loadImage(event){
                this.file = event.target.files[0]
            },
            loadFormData(){
                const form_data = new FormData()
                if(this.file)  form_data.append('image', this.file, this.file.name)
                form_data.append('name', this.product.name)
                form_data.append('category_id', this.product.category_id)
                form_data.append('stock', this.product.stock)
                form_data.append('precio', this.product.precio)
                form_data.append('description', this.product.description)
                return form_data
            },
            async getCategories(){
                const {data} = await axios.get('Categories/GetAllCategories')
                // const {data} = await axios.get('Categories/GetAllCategories')
                this.categories = data.categories
                // console.log(this.categories);
            },
            async storeProduct(){

                try {
                    const product = this.loadFormData()
                    if (this.is_create) {
                        await axios.post('Products/CreateProduct', product)
                    }else{
                         await axios.post(`Products/UpdateProduct/${this.product.id}`, product)
                    }   

                      if (this.is_create) {
                        swal.fire({
						icon: 'success',
						title: 'Felicidades',
						text: 'Producto creado'
					})
                    }else{
                          swal.fire({
						icon: 'success',
						title: 'Felicidades',
						text: 'Producto actualizado'
					})
                    }
                    // swal.fire({
					// 	icon: 'success',
					// 	title: 'Felicidades',
					// 	text: 'Libro almacenado'
					// })

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