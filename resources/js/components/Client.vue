<template>
    <div>
        <div class="col-md-9" align="center">
            <div class="panel-heading">
                <div>
                    <label>Please login through SPA Client</label>
                </div>
                <div>
                    <button type="button" @click="login" class="btn btn-primary">Login with SPA client</button>
                </div>
            </div>
        </div>
        <div id="app">
            {{ message }}
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: '',
        }
    },

    methods: {
        login() {
            const url = 'http://localhost:8000/oauth/token';

            const formData = {
                grant_type: 'password',
                client_id: 6,
                client_secret: 'nVdwOznpuICLOxNv2e7dCDWc0lGeaqPeyjHyTDVT',
                username: 'sa.bt@chmail.ir',
                password: '123456789',
                scope: '',
            };

            const headers = {
                'Access-Control-Allow-Origin': '*',
                Accept: '*/*',
                'Content-Type': 'application/json'
            };

            axios({
                json: true,
                method: 'POST',
                url: url,
                data: formData,
                headers: headers,
            })
                .then(response => (this.message = response.data))
                .catch(function (response) {
                    //handle error
                    console.log(response);
                });
        }
    }
}
</script>

<style scoped>

</style>
