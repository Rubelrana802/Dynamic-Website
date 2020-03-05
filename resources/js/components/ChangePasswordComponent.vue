<template>
    <form @submit.prevent="update_password" method="post" autocomplete="off">
        <div class="form-group">
            <label for="current_password">Current Password <span class="text-danger">*</span></label>
            <input :class="{ 'is-invalid': form.errors.has('current_password') }" class="form-control" type="password" v-model="form.current_password" id="current_password">
            <has-error :form="form" field="current_password"></has-error>
        </div>
        <div class="form-group">
            <label for="new_password">New Password <span class="text-danger">*</span></label>
            <input :class="{ 'is-invalid': form.errors.has('new_password') }" class="form-control" type="password" v-model="form.new_password" id="new_password">
            <has-error :form="form" field="new_password"></has-error>
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Confirm Password <span class="text-danger">*</span></label>
            <input :class="{ 'is-invalid': form.errors.has('new_password_confirmation') }" class="form-control" type="password" v-model="form.new_password_confirmation" id="new_password_confirmation">
            <has-error :form="form" field="new_password_confirmation"></has-error>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update Password</button>
        </div>
    </form>
</template>

<script>
    export default {
        data(){
            return {
                form: new Form({
                    current_password: '',
                    new_password: '',
                    new_password_confirmation: '',
                })
            }
        },
        methods: {
            update_password(){
                this.form.post(baseURL + '/admin/profile/update-password')
                    .then(response => {
                        // reset form elements
                        this.form.reset()
                        // success message show in toaster
                        toastr.success(response.data.message)
                    })
                    .catch(errors => {
                        // error message show in toaster
                        toastr.error(errors.response.data.message)
                    })
            }
        },
        mounted() {}
    }
</script>
