<template>
    <div>
        <el-col>
            <el-form :disabled="loading" :inline="true" :model="formInline" class="demo-form-inline">
                <el-form-item label="Name">
                    <el-input size="mini" v-model="formInline.name"></el-input>
                </el-form-item>
                <el-form-item label="Min price">
                    <el-input size="mini" v-model="formInline.offset"></el-input>
                </el-form-item>
                <el-form-item label="Max price">
                    <el-input size="mini" v-model="formInline.limit"></el-input>
                </el-form-item>
                <el-form-item label="Bedrooms">
                    <el-input size="mini" v-model="formInline.bedrooms"></el-input>
                </el-form-item>
                <el-form-item label="Bathrooms">
                    <el-input size="mini" v-model="formInline.bathrooms"></el-input>
                </el-form-item>
                <el-form-item label="Storeys">
                    <el-input size="mini" v-model="formInline.storeys"></el-input>
                </el-form-item>
                <el-form-item label="Garages">
                    <el-input size="mini" v-model="formInline.garages"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="getData">Search</el-button>
                </el-form-item>
            </el-form>
            <h2 v-if="responseData.length === 0 && !    loading">No results :(</h2>
            <el-table
                v-loading="loading"
                v-else
                :data="responseData"
                border
                style="width: 100%">
                <el-table-column
                    prop="name"
                    label="Name">
                </el-table-column>
                <el-table-column
                    prop="price"
                    label="Price">
                </el-table-column>
                <el-table-column
                    prop="bedrooms"
                    label="Bedrooms">
                </el-table-column>
                <el-table-column
                    prop="bathrooms"
                    label="Bathrooms">
                </el-table-column>
                <el-table-column
                    prop="storeys"
                    label="Storeys">
                </el-table-column>
                <el-table-column
                    prop="garages"
                    label="Garages">
                </el-table-column>
            </el-table>
        </el-col>
    </div>
</template>

<script>
export default {
    name: "SearchComponent",
    data() {
        return {
            loading: true,
            responseData: [],
            formInline: {
                name: '',
                offset: '',
                limit: '',
                bedrooms: '',
                bathrooms: '',
                storeys: '',
                garages: ''
            }
        }
    },
    methods: {
        getData() {
            this.loading = true
            return axios.get(`api/data`, {params: this.formInline})
                .then(resp => {
                    this.responseData = resp.data
                })
                .catch(err => {
                    console.log(err)
                })
                .then(() => {
                    this.loading = false;
                })
        }
    },
    mounted() {
        this.getData()
    }
}
</script>

<style scoped>

</style>
