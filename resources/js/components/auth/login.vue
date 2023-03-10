<template>

</template>
<script>
import axios from "axios"
    export default {
        data: () => {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            async loginHandler(e) {
                await axios.post('/api/login', {
                    email: this.email,
                    password: this.password
                }).then((response) =>{
                    console.log(response)
                    if(response.data.errors){
                        console.log(response.data)
                        Object.entries(response.data.errors).forEach((val, i)=>{
                            this.$el.querySelector(`span.${val[0]}_error`).innerHTML = val[1][0]
                            console.log(val,val[1])
                        })
                    }else{
                    console.log(response)
                        if(response.status === 200) {
                            window.location.href  = 'o/home?token='+response.data.access_token
                        }
                    }
                })
                .catch(({response})=>{
                    toastr.warning(response.data.error, {
                    positionClass: "toast-top-center",
                    closeButton: !0,
                    tapToDismiss: !1,
                    rtl: true,
                });
                })
            }
        }
    }
</script>

