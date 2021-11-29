<template>
    <div class="container center">
        <router-link to="/products">Go to Foo</router-link>

        <form @submit="formSubmit($event)">
            <p v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </p>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" v-model="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" v-model="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>

    export default{
        data(){
            return {
                errors:[],
                email:'',
                password:'',

            }
        },
        mounted(){
               axios.get('/products')
               .then((response)=>{
                   console.log(response.data);
               })
           },
       methods:{
           
            formSubmit(e) {
                e.preventDefault();
                this.errors=[];
                if (!this.email) {
                    this.errors.push('email required.');
                }
                axios.get('/register')
                    .then((response)=>{
                    this.users = response.data.users
                })
            }
       }
    }
</script>
