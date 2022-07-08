<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <example></example>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { example } from './example.vue';
    export default {
        
        mounted() {
            console.log("Estou Carregado!");
        }
    }
</script>
