<template>
    <div>
        <img :src="foto"></img>
        <input type="file" @change="subirFoto">
    </div>
</template>
<script>
    import axios from "axios"
    export default{
        name:"subirFotoPerfil",
        data(){
            return {
                foto: "fotosPerfil/FotoPorDefecto.jpg"
            }
        },
        methods:{
            async subirFoto(event){
                const archivo=event.target.files[0]
                if (archivo==null) return;
                const formData=new FormData();
                formData.append('foto',archivo);
                try{
                    await axios.post('/api/perfil/foto',formData,{
                        headers:{'Content-Type':'multipart/form-data'}
                    })
                    this.cargarFoto()
                    console.log("Foto subida satisfactoriamente")
                }catch(error){
                    console.error(error);
                    console.log("Error al subir la foto de perfil");
                }
            },
            async cargarFoto(){
                try {
                    const respuesta=await axios.get('/api/perfil/foto',{responseType:'blob'});
                    const url = URL.createObjectURL(respuesta.data);
                    this.foto=url;
                } catch (error) {
                    console.error('No hay foto de perfil', error);
                    this.foto = 'fotosPerfil/FotoPorDefecto.jpg';
                }
            }
        }
        ,mounted() {
            //nada mas cargar la página
            this.cargarFoto();
        }
    }
</script>
<style scoped>
img{
    max-width: 200px;
    max-height: 200px;
}
</style>