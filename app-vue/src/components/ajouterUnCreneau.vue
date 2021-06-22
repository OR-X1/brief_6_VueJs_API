<template>
    <div class="container">
        <div class="row align-items-center h-100">
            <div class="col-md-6 border mx-auto my-2 align-middle px-5 py-5 shadow rounded">
                <h2 class="mb-5">Ajouter un Rendez-Vous</h2>
                <form action="" >
                    Date :
                    <input type="date" name="date" v-model="date" class="form-control"><br>
                    <div class="alert alert-danger" role="alert" v-if="erreur">
                        {{ erreur }}
                    </div>
                    Horaire :
                    <select name="horaire" class="form-select" v-model="horaire" >
                        <option selected disabled>-- Horaire --</option>
                        <option v-for="(duree,index) in DureesS" :key="index" :disabled="duree.etat">{{ duree.val }}</option>
                    </select><br>
                      
                    text :
                    <textarea class="form-control" name="typeConsultation" v-model="typeConsultation" id="" cols="10" rows="5"></textarea><br>
                    
                <button name="submit" v-on:click.prevent="Add()" class="btn btn-primary col-md-4">Ajouter</button>
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
			horaire:'-- Horaire --',
			typeConsultation:'',
            reference:'',
            DureesS: [
                { val: "08:00-09-00", etat: false },
                { val: "09:00-10-00", etat: false },
                { val: "10:00-11-00", etat: false },
                { val: "11:00-12-00", etat: false },
                
                { val: "14:00-15-00", etat: false },
                { val: "15:00-16-00", etat: false },
                { val: "16:00-17-00", etat: false },
                { val: "17:00-18-00", etat: false },
            ],
            Durees: [],
            erreur: "",
			
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
				

        },
        async getTimes(dateP){
           console.log("rrrrr");
            const response= await fetch("http://localhost/www/brief_6_VueJs_API/rendez_vous/horaire/"+dateP);
           const data = await response.json();
           this.Durees=data;
           console.log(data);

        }
},
watch:{
        date: async function(val){
            await this.getTimes(val);
            if(this.DureesS.length == this.Durees.length){
                this.erreur="il reste plus de rdv pour cette date";
            }
            else{
                 this.erreur="";
            }
            this.horaire="-- Horaire --";
            for (var i = 0; i < this.DureesS.length; i++) {
                this.DureesS[i].etat = false;
                for (var j = 0; j < this.Durees.length; j++) {
                    if (this.DureesS[i].val == this.Durees[j].horaire) {

                        this.DureesS[i].etat = true;
                    }
                }
            }
        }
    }

}
</script>

<style>

</style>