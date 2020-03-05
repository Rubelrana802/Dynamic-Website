<template>
    <form @submit.prevent="update_profile" method="post" autocomplete="off">
        <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" v-model="form.name" id="name">
            <has-error :form="form" field="name"></has-error>
        </div>
        <div class="form-group">
            <label for="email">Email <span class="text-danger">*</span></label>
            <input :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" v-model="form.email" id="email">
            <has-error :form="form" field="email"></has-error>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
    </form>
</template>

<script>
    export default {
        props: ['user_id', 'name', 'email'],
        data(){
            return {
                form: new Form({
                    name: '',
                    email: '',
                })
            }
        },
        methods: {
            update_profile(){
                this.form.put(baseURL + '/admin/profile/update-profile/' + this.user_id)
                    .then(response => {
                        // success message show in toaster
                        toastr.success(response.data.message)
                    })
                    .catch(errors => {
                        // error message show in toaster
                        toastr.error(errors.response.data.message)
                    })
            }
        },
        mounted() {
            this.form.name = this.name
            this.form.email = this.email
        }
    }
</script>
