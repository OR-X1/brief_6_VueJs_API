<template>
    <div class="container">
        <div class="row align-items-center h-100">
            <div class="col-md-6 border mx-auto my-2 align-middle px-5 py-5 shadow rounded">
                <h2 class="mb-5">New user</h2>
                <form action="" >
                    Date :
                    <input type="date" name="date" v-model="date" class="form-control"><br>
                    Horaire :
                    <select name="horaire" class="form-select" v-model="horaire" >
                        <option selected> -- Horaire --</option>
                        <option value="8 - 9">8 - 9</option>
                        <option value="9 - 10">9 - 10</option>
                        <option value="10 - 11">10 - 11</option>
                        <option value="11 - 12">11 - 12</option>

                        <option value="2 - 3">2 - 3</option>
                        <option value="3 - 4">3 - 4</option>
                        <option value="4 - 5">4 - 5</option>
                        <option value="5 - 6">5 - 6</option>
                      </select><br>
                      
                    text :
                    <textarea class="form-control" name="typeConsultation" v-model="typeConsultation" id="" cols="10" rows="5"></textarea><br>
                <button name="submit" v-on:click.prevent="Add()" class="btn btn-primary col-md-4">Login</button>
                </form>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
data(){
		return{
			date:'',
			horaire:'',
			typeConsultation:'',
            reference:''
			
		}
},
methods :{
    async Add(){
            await fetch("http://localhost/www/brief_6_VueJs_API/rendez_vous/save", {
				method: "POST",
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					date: this.date,
                    horaire: this.horaire,
                    typeConsultation: this.typeConsultation,
                    reference :this.$route.params.reference,
				})
			});
			await(this.$router.push( "/creneauxDisponibles/"+ this.$route.params.reference));
				

        }
}
}
</script>

<style>

</style>