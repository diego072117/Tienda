<template>
    <table class="table table-striped table-hover table-responsive" id="categorieTable" @click="getEvent">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>   
             
                </tbody>
    </table>
</template>

<script>



    export default {

        data(){
            return{
           
                categories:[],
                datatable: {}

            }
        },
        mounted(){
            this.index()
        },
        methods:{
            async index(){
            
                    this.mountDataTable()
               
            },
            mountDataTable(){
                
                this.datatable = $('#categorieTable').DataTable({
                   processing: true,
                   serverSide: true,
                   ajax:{
                       url:'/Categories/GetAllCategoriesForDataTable'
                   },
                   columns: [
                       {data: 'name'},
                       {data: 'action'}
                   ]
                       
                })
           },
            async getCategories(){
                try {
                
                    const { data } = await axios.get('Categories/GetAllCategories')
                    this.categories = data.categories
           
                } catch (error) {
                    console.error(error);
                }
                this.mountDataTable()
                
            },
            getEvent(event){
                const button = event.target
                if (button.getAttribute('role') == 'edit') {
                   this.getCategorie(button.getAttribute('data-id'))
                }
                
                if (button.getAttribute('role') == 'delete') {
                   this.deleteCategorie(button.getAttribute('data-id'))
                }
            },
            async getCategorie(categorie_id){
                try {
                    
                    const { data } = await axios.get(`Categories/GetAnCategorie/${categorie_id}`)    
                    this.$parent.editCategorie(data.categorie)
                } catch (error) {
                    console.error(error);
                }
                
            },
            async deleteCategorie(categorie_id){
                try {
                    const result =  await swal.fire({
                        icon: 'info',
                        title: 'Quieres eliminar el libro?', 
                        showCancelButton: true,
                        confirmButtonText: 'Eliminar',
                        })
                
                    if (!result.isConfirmed) return
                    this.datatable.destroy()

                        await axios.delete(`Categories/DeleteCategories/${categorie_id}`)    
                        this.index()
                        
                            swal.fire({
                                    icon: 'success',
                                    title: 'Felicidades',
                                    text: 'Categoria Eliminado'
                                })
                } catch (error) {
                    console.error(error);
                }
                
            }
    }
}
</script>