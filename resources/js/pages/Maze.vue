<template>
    <div class="login-box vld-parent">
        <div class="card card-outline card-dark">
            <div class="card-body">
                <h2 class="login-box-msg text-dark pb-0"><b>Maze</b> Generator</h2>
                <h5 class="login-box-msg text_color">Pola Pertama</h5>
                <form autocomplete="off" @submit.prevent="generate">
                   <div class="form-group mb-3">
                        <div class="input-group">
                            <input
                                type="text" autofocus
                                placeholder="Masukan suku disini"
                                v-model.trim="$v.suku.$model" :maxlength="15"
                                :class="$v.suku.$error ? 'form-control is-invalid' : 'form-control'"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                            />
                        </div>
                        <div v-if="$v.suku.$error">
                            <small class="font_sm" v-if="!$v.suku.required">Suku wajib diisi</small>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-4 offset-8">
                            <button type="submit" ref="submit" class="btn btn-primary btn-block">Generate</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center pt-3" v-if="isMaze">
            <p>Berikut hasil pola yang terbentuk dengan input <b>{{ suku }}</b>:</p>
            <div v-html="maze"></div>
        </div>
        <loading
            :active.sync="isLoading"
            :is-full-page="true"
            color="#6777ef"
            loader="dots"
        ></loading>
    </div>
</template>

<script>
    import { required } from 'vuelidate/lib/validators';
    import Loading from 'vue-loading-overlay'
    import 'vue-loading-overlay/dist/vue-loading.css'

    export default {
        data() {
            return {
                suku: null,
                maze: null,
                isMaze: false,
                isLoading: false
            }
        },
        components: {
            Loading
        },
        validations: {
            suku: {
                required
            }
        },
        watch: {
            suku() {
                if(this.suku == null || this.suku == '')
                    this.isMaze = false
            }
        },
        methods: {
            generate: async function () {
                this.$v.$touch();

                if(!this.$v.$error) {
                    this.isLoading = true
                    this.isMaze = false

                    try {
                        const res = await axios.post(`generate`, { suku: this.suku })
                        const { status, data } = res.data
                        this.isLoading = false
                        console.log(status, data)

                        if(status) {
                            this.isMaze = true
                            this.maze = data
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                text: `${data} bukan bagian dari 4n-1, silahkan masukan angka lain.`
                            })
                        }
                    } catch(err) {
                        this.isLoading = false
                        Swal.fire({
                            icon: 'error',
                            text: 'Oops..ada suatu kesalahan!!!'
                        })
                    }
                }
            },
        },
    };
</script>

<style scoped>
    .content-desktop {display: block;}

    @media screen and (max-width: 768px) {
        .content-desktop {display: none;}
    }
    .font_sm {
        font-size: 12px !important;
        color: #fc544b !important;
        font-style: italic !important;
        margin-left: 5px !important;
    }
    .text_color {
        color: #495057 !important;
    }
</style>
