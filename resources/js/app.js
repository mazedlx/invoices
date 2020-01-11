require('./bootstrap');

import Vue from 'vue';
import { Ziggy } from '@/ziggy';
import CompaniesDropDown from '@/components/CompaniesDropDown';
import CustomersDropDown from '@/components/CustomersDropDown';
import InvoicesDropDown from '@/components/InvoicesDropDown';

Vue.mixin({
    methods: {
        route: (name, params, absolute) => route(name, params, absolute, Ziggy),
    }
});

new Vue({
    el: '#app',    
    components: {
        CompaniesDropDown,
        CustomersDropDown,
        InvoicesDropDown,
    }
});