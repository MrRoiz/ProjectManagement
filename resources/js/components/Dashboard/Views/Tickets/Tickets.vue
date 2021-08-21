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
            <template v-slot:item.actions="{ item }">
                <v-btn text color='red' @click='deleteTicket(item.ticketId)'><v-icon>fa fa-times</v-icon></v-btn>
                <v-btn text color='blue' @click='editTicket(item.ticketId)'><v-icon>fa fa-edit</v-icon></v-btn>
            </template>
        </v-data-table>
    </div>
</template>

<script>
    import { mapMutations } from 'vuex'

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
                    text    : 'State',
                    sortable: true,
                    value   : 'state'
                },
                {
                    text    : 'Actions',
                    sortable: true,
                    value   : 'actions'
                }
            ],
            rows : []
        }),
        mounted(){
            let self = this
            this.loading = true

            axios.get('/api/project/'+this.$route.params.idProject+'/userStory/'+this.$route.params.idUserStory+'/ticket').then(res=>{
                self.title = 'Tickets of user story '+res.data.data.name
                self.rows = res.data.data.tickets.map(ticket=>{
                    return {
                        ticketId : ticket.id,
                        name : ticket.name,
                        description : ticket.description,
                        state : 'active',
                        actions : null,
                    }
                })
            }).finally(()=>{
                self.loading = false
            })
        },
        methods : {
            ...mapMutations(['showAlert']),
            deleteTicket(idTicket){
                this.loading = true
                let self = this

                axios.delete('/api/project/'+this.$route.params.idProject+'/userStory/'+this.$route.params.idUserStory+'/ticket/'+idTicket).then(res=>{
                    self.rows = self.rows.filter(ticket=> ticket.ticketId != idTicket)
                }).finally(()=>{
                    self.loading = false
                })
            },
            editTicket(idTicket){
                this.showAlert('Edit Pending')
                // this.loading = true
                // let self = this

                // axios.delete('/api/project/'+this.$route.params.idProject+'/userStory/'+this.$route.params.idUserStory+'/ticket/'+idTicket).then(res=>{
                //     self.rows = self.rows.filter(ticket=> ticket.ticketId != idTicket)
                // }).finally(()=>{
                //     self.loading = false
                // })
            }
        }
    }
</script>