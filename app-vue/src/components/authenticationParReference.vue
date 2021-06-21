<template>
    <div class="container">
        <div class="row align-items-center h-100">
            <div class="col-md-6 border mx-auto my-5 px-5 align-middle py-5 shadow rounded text-center  ">
                <h2 class="mb-5">Reference</h2>
                <form  action="" v-on:submit.prevent="onsub">
                    <input type="text" name="reference" v-model="reference" class="form-control"><br>
                    <button class="btn btn-primary col-md-4" name="submit" type="submit">Login</button> 
        <!-- <router-link class="btn btn-primary col-md-4" name="submit" to="/creneauxDisponibles">Login</router-link> -->

                </form>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    name:'reference',
	data(){
		return{
			reference:''
		}
	},
    methods: {
        
        async onsub(){
            await fetch("http://localhost/www/brief_6_VueJs_API/user/seConnect/"+this.reference,{
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                }
            })
            .then((res) => {
             return res.json();
        })
            .then((res) => {
                if(res==1){
                this.$router.push("/creneauxDisponibles/"+this.reference);
                }else{
                alert('Reference incorrecte');
            }
            console.log(res);
            })
        }
    },
    mounted:function(){
        
    }
	
}
</script>

<style>

</style>