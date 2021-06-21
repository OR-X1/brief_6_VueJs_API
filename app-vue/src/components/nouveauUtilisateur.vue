<template>
    <div class="container">
        <div class="row align-items-center h-100">
            <div class="col-md-6 border mx-auto my-2 align-middle px-5 py-4 shadow rounded   ">
                <h2 class="mb-4">Nouveau Utilisateur</h2>
                <form action="">
                    Nom :
                    <input type="text" name="Nom" v-model="Nom" class="form-control" placeholder="Nom"><br>
                    Prenom :
                    <input type="text" name="Prenom" v-model="Prenom" class="form-control" placeholder="Prenom"><br>
                    Email :
                    <input type="email" name="Email" v-model="Email" class="form-control" placeholder="Email"><br>
                    Tele :
                    <input type="number" name="Tele" v-model="Tele" class="form-control" placeholder="Tele"><br>
                    Age :
                    <input type="number" name="Age" v-model="Age" class="form-control" placeholder="Age"><br>
                    <input type="text" name="reference" v-model="reference" class="form-control">
                <button name="submit" v-on:click.prevent="Add()" class="btn btn-primary col-md-4">Login</button>
                </form>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    data(){
        return {
            reference:'',
            Nom:'',
            Prenom:'',
            Email:'',
            Tele:'',
            Age:'',
        }
    },
    methods: {
       async Add(){
           await fetch("http://localhost/www/brief_6_VueJs_API/user/register", {
				method: "POST",
				headers: {
					'Content-Type': 'application/json'
				},
                body: JSON.stringify({
                    reference: this.reference,
					nom: this.Nom,
                    prenom: this.Prenom,
                    email: this.Email,
                    tel :this.Tele,
                    age :this.Age,
				})
			});
            
    await ( this.$router.push("/authenticationParReference"));	
                
        }
    }
}

</script>

<style>

</style>