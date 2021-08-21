<template>
    <div>
        <h2>{{title}}</h2>
        <v-divider class='mb-4'/>

        <v-data-table
            :headers='headers'
            :items='rows'
            :loading='loading'
            loading-text='Loading data'
        >
            <template v-slot:item.details="{ item }">
                <router-link class='routerLink' :to="'/dashboard/projects/'+$route.params.idProject+'/user-stories/'+item.storyId+'/tickets'">
                    <v-btn text><v-icon>fa fa-eye</v-icon></v-btn>
                </router-link>
            </template>
        </v-data-table>
    </div>
</template>

<script>
    export default {
        data : ()=>({
            title : 'Loading...',
            loading : false,
            headers : [
                {
                    text    : 'Name',
                    sortable: true,
                    value   : 'name'
                },
                {
                    text    : 'Description',
                    sortable: true,
                    value   : 'description'
                },
                {
                    text    : 'Tickets',
                    sortable: true,
                    value   : 'tickets'
                },
                {
                    text    : 'State',
                    sortable: true,
                    value   : 'state'
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

            axios.get('/api/project/'+this.$route.params.idProject+'/userStory').then(res=>{
                self.title = 'User Stories of project '+res.data.data.name
                self.rows = res.data.data.user_stories.map(story=>{
                    return {
                        storyId : story.id,
                        name : story.name,
                        description : story.description,
                        tickets : story.tickets.length,
                        state : 'active',
                        details : null,
                    }
                })
            }).finally(()=>{
                self.loading = false
            })
        }
    }
</script>