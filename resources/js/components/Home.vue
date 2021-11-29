<template>
    
    <div class="container">
        <div class="float-right">
            <router-link to="/add-product"  class="btn btn-success mb-2"> Add Product </router-link>
        </div>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <tr v-for="product in products" :key="product.id">
                <td>{{ product.name }}</td>
                <td>{{ product.category }}</td>
                <td>{{ product.description }}</td>
                <td>{{ product.amount }}</td>
                <td v-if="product.status == 1" @click="status(product.id)">Active</td>
                <td v-if="product.status == 0" @click="status(product.id)">Deactive</td>
                <td>
                    <router-link :to="{name:'edit-product',params:{id:product.id}}"><i class="fa fa-pencil"></i></router-link>
                    <a href="javascript:void(0)" @click="DeleteProduct(product.id)"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            
        </table>
    </div>
</template>
<script>
export default {
    data(){
        return {
            products:[],
        }
    },
    created(){
        axios.get('/products')
        .then((response)=>{
            this.products=response.data;
        })
    },
    methods:{
        DeleteProduct(id){
            axios.get('/delete-product/'+id)
            .then((response)=>{
                this.products=response.data;
            })
        },
        status(id){
            console.log(id);
        }
    }
}
</script>