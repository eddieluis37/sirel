
var emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

var vm = new Vue({
    http: {
        root: '/root',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },

    el: '#TicketController',

    data: {
        newTicket: {
            id: '',
            name: '',
            text: '',
            description: '',
            placeholder: 'input your message'
        },

        success: false,

        edit: false
    },



    computed: {
        validation: function () {
            return {
                name: !!this.newTicket.name.trim(),
                text: !!this.newTicket.text.trim(),
                description: !!this.newTicket.description.trim()
            }
        },

        isValid: function () {
            var validation = this.validation
            return Object.keys(validation).every(function (key) {
                return validation[key]
            })
        }
    },



});