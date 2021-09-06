<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
  <div id="app">
    <v-app>
      <v-main>
        <v-container>



            <v-btn  color="teal" @click="listar_usuarios()">
                Cargar usuarios
            </v-btn>


            <v-btn >
                Normal
            </v-btn>


            <v-btn  color="blue" @click="agregar_usuario()">
                Aregar usuario
            </v-btn>



            <v-card>
                <input type="text" v-model="usuario" />



                <v-text-field label="Usuario"   dense outlined  v-model="usuario"></v-text-field>
                <v-text-field label="edad"      dense outlined  v-model="edad"></v-text-field>

            </v-card>


            <v-autocomplete
                :items="usuarios"
                item-text="nombre"
                item-value="id"
            >
            </v-autocomplete>


            <v-row class="mt-8">

                <v-col cols="12" xs="12" sm="8" md="6" lg="3" xl="1">
                    <v-text-field label="Buscar"      dense outlined  v-model="cadena_a_buscar"></v-text-field>
                </v-col>

                <v-col cols="12" xs="12" sm="8" md="6" lg="3" xl="1">
                    <v-text-field label="Buscar"      dense outlined  v-model="cadena_a_buscar"></v-text-field>
                </v-col>
            </v-row>

            <v-row>
                <v-col>
                    <v-data-table
                    :search="cadena_a_buscar"
                    :headers="headers"
                    :items="usuarios"
                    :items-per-page="2"
                    ></v-data-table>
                </v-col>
            </v-row>
                    
                
            
            
            


            @{{ usuarios }}
           


        </v-container>
      </v-main>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


  <script>
    var url = '{{ Request::url() }}';
    var app = new Vue({
        vuetify: new Vuetify(),
        el: '#app',
        



        data: {
            usuarios: [],
            headers: [
                { text: 'ID',                   align: 'end',   sortable: true, value: 'id', divider: true},
                { text: 'Este es el nombre',    align: 'start', sortable: true, value: 'nombre',divider: true},
            ],
            usuario: '',
            edad: '',
            cadena_a_buscar: '',
        },




        methods:{
            listar_usuarios(){
                var data = new FormData();
                data.append('proc', 'listar_usuarios');
                axios.post(url, data)
                .then(response => {
                   
                    this.usuarios           = response.data; 

                   
                })
                .catch(error => {
                    console.log("Error");
                });
            },


            agregar_usuario(){
                var data = new FormData();
                data.append('proc', 'agregar_usuario');
                data.append('nombre', this.usuario);

                axios.post(url, data)
                .then(x => {
                   
                    this.usuarios           = x.data;

                   
                })
                .catch(error => {
                    console.log("Error");
                });
            },
        }





    })
</script>


</body>
</html>