<template>
    <div>
        <div class="col-md-9" align="center">
            <div class="panel-heading">
                <div>
                    <label>Please get user's tasks through SPA Client</label>
                </div>
                <div>
                    <button type="button" @click="login" class="btn btn-primary">Get data with SPA client</button>
                </div>
            </div>
        </div>
        <p></p>
        <div id="app">
            <table class="table table-borderless mb-1">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="task in tasks">
                    <td>{{task.id}}</td>
                    <td>{{task.description}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tasks: [],
        }
    },

    methods: {
        login() {

            axios.get('/api/todos')
                .then(response => {
                    this.tasks = response.data
                    console.log(response.data);
                });
        }
    }
}
</script>

<style scoped>

</style>
