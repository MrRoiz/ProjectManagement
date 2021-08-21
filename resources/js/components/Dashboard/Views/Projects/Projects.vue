<template>
    <div>
        <h2>Projects</h2>
        <v-divider class='mb-4'/>

        <v-data-table
            :headers='headers'
            :items='rows'
            :loading='loading'
            loading-text='Loading data'
        >
            <template v-slot:item.details="{ item }">
                <v-btn text><v-icon>fa fa-eye</v-icon></v-btn>
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
                    text    : 'Project',
                    sortable: true,
                    value   : 'project'
                },
                {
                    text    : 'Description',
                    sortable: true,
                    value   : 'description'
                },
                {
                    text    : 'Company',
                    sortable: true,
                    value   : 'company'
                },
                {
                    text    : 'Details',
                    sortable: true,
                    value   : 'details'
                }
            ],
            rows : []
        }),
        mounted(){
            let self = this
            this.loading = true

            axios.get('/api/project').then(res=>{
                self.rows = res.data.data.map(project=>{
                    return {
                        project    : project.name,
                        company    : project.company.name,
                        description: project.description,
                        details    : null
                    }
                });
            }).finally(()=>{
                self.loading = false
            })
        }
    }
</script>