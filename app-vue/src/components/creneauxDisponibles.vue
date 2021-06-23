<template>
  <div class="container">
    <div class="row align-items-center  h-100">
      <div class="col-md-10  border mx-auto my-2 align-middle px-5 py-5 shadow rounded">
        <h2 class="mx-auto mb-5">les Rendez-Vous.</h2>
        <div class="d-flex">
          <p class="w-100">Reference : {{ $route.params.reference }}</p>
          <router-link class="btn btn-outline-danger mx-3" to="/" >deConnect</router-link>
          <router-link class="btn btn-success" :to="{ path: '/ajouterUnCreneau/'+ $route.params.reference}">Ajouter</router-link>
        </div>

        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Date</th>
              <th scope="col">Horaire</th>
              <th scope="col">Type-Consultation</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <hr>
          <tbody>

            <tr v-for="result in results" :key="result.id">
              
              <template v-if="editClient.id == result.id">
                <td>{{result.id}}</td>
                <td><input class="form-control" v-model="editClient.date" type="date"></td>
                <td>
                    <select name="horaire" class="form-select" v-model="editClient.horaire" >
                          <option selected> -- Horaire --</option>
                          <option value="08:00 - 09-00">08:00 - 09-00</option>
                          <option value="09:00 - 10-00">09:00 - 10-00</option>
                          <option value="10:00 - 11-00">10:00 - 11-00</option>
                          <option value="11:00 - 12-00">11:00 - 12-00</option>
                          
                          <option value="14:00 - 15-00">14:00 - 15-00</option>
                          <option value="15:00 - 16-00">15:00 - 16-00</option>
                          <option value="16:00 - 17-00">16:00 - 17-00</option>
                          <option value="17:00 - 18-00">17:00 - 18-00</option>
                    </select>
                </td>
                <td><input class="form-control" v-model="editClient.typeConsultation" type="text"></td>
                <td class="d-flex">
                  <button class="btn btn-premary" v-on:click="update();">Save</button> &nbsp;
                  <button class="btn btn-warning mx-1"
                    v-on:click="cancel();">Cancel</button>
                </td>
              </template>
              <template v-else> 
                <td>{{ result.id }}</td>
                <td>{{ result.date }}</td>
                <td>{{ result.horaire }}</td>
                <td>{{ result.typeConsultation }}</td>
                <td class="d-flex">
                  <button type="submit" v-on:click="edit(result.id)" class="btn btn-warning">Update</button>
                  <button type="submit" v-on:click="del(result.id)" class="btn btn-danger mx-1">Delete</button>

                </td>
              </template>
            </tr>


          </tbody>
        </table>

      </div>
    </div>
  </div>

</template>

<script>
  export default {
    name: 'affichage',
    data() {
      return {
        results: [],
        // idRendezVous: '',

        ref:this.$route.params.reference ,
        
        // editReser: '',
        editClient: {
          id: '',
          date: '',
          horaire: '',
          typeConsultation: ''

        }
      }
    },
    mounted: function () {
      this.getAll();
    },
    methods: {
      getAll() {

        fetch("http://localhost/www/brief_6_VueJs_API/rendez_vous/index/"+this.$route.params.reference)
          .then(res => res.json())
          .then(data => this.results = data)
          .catch(err => console.log(err.message))
      },
      // getid(x) {
      //   this.idRendezVous = x;
      //   // console.log(this.idRendezVous);

      // },
      del(idRendezV) {
        fetch("http://localhost/www/brief_6_VueJs_API/rendez_vous/delete/" + idRendezV, {
            method: "DELETE",

          })
          .then(this.getAll())

      },
           edit(x){
        fetch('http://localhost/www/brief_6_VueJs_API/rendez_vous/edit/'+x)
        .then(response => response.json())
        .then(data =>{
            // this.editReser=data[0].id;
            this.editClient.id=data[0].id;
            this.editClient.date=data[0].date;
            this.editClient.horaire=data[0].horaire;
            this.editClient.typeConsultation=data[0].typeConsultation;
        })
    },

    cancel(){
          // this.editReser='';
          this.editClient.id=''
            this.editClient.date='';
            this.editClient.horaire='';
            this.editClient.typeConsultation='';
    },

     async update(){
        // console.log(JSON.stringify(this.editClient));
       await fetch('http://localhost/www/brief_6_VueJs_API/rendez_vous/update',{
            method: 'PUT',
            headers:{
                'Content-Type': 'application/json',
            },
           body: JSON.stringify({

                    date: this.editClient.date,
                    horaire: this.editClient.horaire,
                    typeConsultation: this.editClient.typeConsultation,
                    id : this.editClient.id
            })
        });
       
     await this.getAll();
            // this.editReser='';
            this.editClient.id='';
            this.editClient.date='';
            this.editClient.horaire='';
            this.editClient.typeConsultation='';
       },
    }
  }
</script>


<style>

</style>