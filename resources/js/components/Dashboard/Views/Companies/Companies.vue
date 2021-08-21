<template>
    <div>
        <h2>Companies</h2>
        <v-divider class='mb-4'/>

        <v-data-table
            :headers='headers'
            :items='rows'
            :loading='loading'
            loading-text='Loading data'
        >
            <template v-slot:item.associate="{ item }">
                <v-simple-checkbox
                    v-model="item.associate"
                    @input="associateCompanyToUser(item)"
                ></v-simple-checkbox>
            </template>
        </v-data-table>
    </div>
</template>

<script>
    export default {
        data : ()=>({
            loading : false,
            headers : [
                {
                    text    : 'Company',
                    sortable: true,
                    value   : 'company'
                },
                {
                    text    : 'Contry',
                    sortable: true,
                    value   : 'contry'
                },
                {
                    text    : 'Description',
                    sortable: true,
                    value   : 'description'
                },
                {
                    text    : 'Associate',
                    sortable: true,
                    value   : 'associate'
                }
            ],
            rows : []
        }),
        mounted(){
            let self = this
            this.loading = true

            axios.get('/api/company').then(res=>{
                self.rows = res.data.data.map(company=>{
                    return {
                        companyId  : company.id,
                        company    : company.name,
                        contry     : company.country,
                        description: company.description,
                        associate  : company.users.length > 0,
                    }
                });
            }).finally(()=>{
                self.loading = false
            })
        },
        methods : {
            associateCompanyToUser(item){
                if(item.associate){
                    axios.get('/api/company/associate/'+item.companyId).then(res=>{
                        
                    })
                }else{
                    axios.get('/api/company/disassociate/'+item.companyId).then(res=>{
                        
                    })
                }
            }
        }
    }
</script>