<template>
    <div class="card mx-5 my-5">
		<div class="card-header d-flex justify-content-between">
			<h2 class="title-products">Categorias</h2>
			<button @click="openModal" class="btn btn-primary btn-sm">Crear categoria</button>
		</div>

		<div class="card-body">
            <table-component ref="table"/>
  
		</div>

        <section v-if="load_modal">
            <modal :categorie_data="categorie"/>
        </section>

	</div>
</template>

<script>
import axios from 'axios'
import TableComponent from './Table.vue'
import Modal from './Modal.vue'

    export default {
        components:{
            TableComponent,
            Modal
        },
        data(){
            return{
                load_modal:false,
                modal: null,
                categorie: null
                
            }
        },
       
        methods:{
            
            openModal(){
                this.load_modal = true

                setTimeout(() => {
                this.modal = new bootstrap.Modal(document.getElementById('categorie_modal'),{
                    Keyboard:false
                })
                this.modal.show()

                const modal = document.getElementById('categorie_modal')
                modal.addEventListener('hidden.bs.modal', ()=>{
                    this.load_modal = false
					this.categorie = null
                })

           }, 200);  
            },
            closeModal(){
                this.modal.hide()
                this.$refs.table.datatable.destroy()
                this.$refs.table.index()
               
			},
            editCategorie(categorie){
                this.categorie = categorie
                this.openModal()
			
		    }

      

    }
}
</script>