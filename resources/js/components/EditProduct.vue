<template>
    <div class="container">
         <form method="post" @submit.prevent="submitProduct">
            <div class="form-group">
                <label for="name">Name address:</label>
                <input v-model="fields.name" type="text" class="form-control" id="name">
                <input type="hidden" id="" name="id" v-model="fields.id">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" v-model="fields.category" class="form-control" id="category">
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="text" class="form-control" v-model="fields.amount" id="amount">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" v-model="fields.description">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form> 
    </div>
</template>
<script>
export default {
    data(){
        return {
            errors:{},
            fields:{}
        }
    },
    created(){
        this.getData();
    },
    methods: {
    getData(){
        axios.get('/edit-product/'+this.$route.params.id)
        .then((response)=>{
            this.fields=response.data;
        })
    },
    submitProduct() {
      this.errors = {};
      axios.post('/update-product', this.fields).then(response => {
        alert('Message sent!');
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    },
  },
}
</script>
