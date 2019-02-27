
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform';

import Gate from './Gate';
Vue.prototype.$gate= new Gate(window.user);
window.Form=Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('pagination', require('laravel-vue-pagination'));

import Vue from 'vue'
import VueRouter from 'vue-router'
import moment from 'moment'
import Dashobard from './components/Dashboard';
import ProfileComponent from './components/ProfileComponent';
import Users from './components/Users';
import Developer from './components/Developer';
import Notfound from './components/Notfound';
import invoice from './components/invoice';
import Product from './components/Product';
import calander from './components/calander';

import ProductShow from './components/ProductShow';


Vue.use(VueRouter)
import VueProgressBar from 'vue-progressbar';
import swal from 'sweetalert';

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '3px'
})

let routes =[

    {
        path:'/dashboard',
        name: 'dashboard',
        component: Dashobard
    },
    {
        path:'/profile', 
        name: 'profile',
        component: ProfileComponent
    },
    {
        path:'/users', 
        name: 'Users',
        component: Users
    },
    {
        path:'/developer', 
        name: 'Developer',
        component: Developer
    },
    {
        path:'*', 
        name: 'Notfound',
        component: Notfound
    },
    {
        path:'/invoice', 
        name: 'invoice',
        component: invoice
    },
    {
        path:'/calander', 
        name: 'calander',
        component:calander
    },
    {
        path:'/product', 
        name: 'Product',
        component:Product
    },
    {
        path: '/product/:id',
        name: 'produtctShow',
        component: ProductShow
    }
  
]

const router = new VueRouter({
    mode:'history',
    routes // short for `routes: routes`
  })


  Vue.filter('upText' ,function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
  }); 


  Vue.filter('dateFormat', function(date){
     return moment(date).format('MMMM Do YYYY');
  });

  
  window.Fire =new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
Vue.component(
    'not-found',
    require('./components/Notfound.vue').default
);
Vue.component(
    'invoice',
    require('./components/invoice.vue').default
);
Vue.component(
    'calander',
    require('./components/calander.vue').default
);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    router,
    data:{
        today: moment(),
        dateContext: moment(),
        selectedDate: moment(),
        days: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
        search: ''
    },
    computed: {
        year: function() {
            return this.dateContext.format("Y");
        },

        month: function() {
            return this.dateContext.format("MMMM");
        },

        daysInMonth: function() {
            return this.dateContext.daysInMonth();
        },

        currentDate: function() {
            return this.dateContext.get("date");
        },

        firstDayOfMonth: function() {
            let firstDay = moment(this.dateContext).subtract(this.currentDate,"days");
            return firstDay.weekday();
        },

        previousMonth: function() {
            return moment(this.dateContext).subtract(1, "month");
        },
        previousMonthAsString: function() {
            return this.previousMonth.format("MMMM");
        },
        nextMonth: function() {
            return moment(this.dateContext).add(1, "month");
        },
        nextMonthAsString: function() {
            return this.nextMonth.format("MMMM");
        },

        daysInPreviousMonth: function() {
            return this.previousMonth.daysInMonth();
        },
        daysFromPreviousMonth: function() {
            let daysList = [];
            let count = this.daysInPreviousMonth - this.firstDayOfMonth;
            while (count < this.daysInPreviousMonth) {
                count++;
                daysList[count] = count;
            }

            return daysList.filter(function() {
                return true;
            });
        },

        dateList: function() {
            let $this = this;

            let dateList = [];

            let previousMonth = this.previousMonth;
            let nextMonth = this.nextMonth;

            //dates for display
            let formattedCurrentMonth = this.dateContext.format("MM");
            let formattedCurrentYear = this.year;
            let formattedPreviousMonth = previousMonth.format("MM");
            let formattedPreviousYear = previousMonth.format("Y");
            let formattedNextMonth = nextMonth.format("MM");
            let formattedNextYear = nextMonth.format("Y");

            //counters
            let countDayInCurrentMonth = 0;
            let countDayInPreviousMonth = 0;

            //filling in dates from the previous month
            this.daysFromPreviousMonth.forEach(function(dayFromPreviousMonth) {
                countDayInCurrentMonth++;
                countDayInPreviousMonth++;

                let formattedDay = $this.formattingDay(dayFromPreviousMonth);
                let previousMonth =
                    $this.daysFromPreviousMonth.length ===
                    countDayInPreviousMonth
                        ? $this.previousMonthAsString
                        : false;
                let previousYear =
                    formattedCurrentYear !== formattedPreviousYear &&
                    $this.daysFromPreviousMonth.length ===
                        countDayInPreviousMonth
                        ? formattedPreviousYear
                        : false;
                let additional = {
                    month: previousMonth,
                    year: previousYear
                };

                if (!previousMonth && !previousYear) {
                    additional = false;
                }

                dateList[countDayInCurrentMonth] = {
                    key: countDayInCurrentMonth,
                    dayNumber: formattedDay,
                    date:
                        formattedDay +
                        "." +
                        formattedPreviousMonth +
                        "." +
                        formattedPreviousYear,
                    blank: true,
                    today: false,
                    additional: additional,
                    weekDay: false,
                    moment: moment(
                        formattedPreviousYear +
                            formattedPreviousMonth +
                            formattedDay
                    )
                };
            });

            //filling in dates from the current month
            while (countDayInCurrentMonth < this.firstDayOfMonth + this.daysInMonth) {
                countDayInCurrentMonth++;

                let day = countDayInCurrentMonth - countDayInPreviousMonth;
                let weekDay = this.getWeekDay(countDayInCurrentMonth);
                let formattedDay = this.formattingDay(day);

                dateList[countDayInCurrentMonth] = {
                    key: countDayInCurrentMonth,
                    dayNumber: formattedDay,
                    date:
                        formattedDay +
                        "." +
                        formattedCurrentMonth +
                        "." +
                        formattedCurrentYear,
                    blank: false,
                    today:
                        formattedDay === this.initialDate &&
                        this.todayInCurrentMonthAndYear,
                    additional: false,
                    weekDay: weekDay,
                    moment: moment(
                        formattedCurrentYear +
                            formattedCurrentMonth +
                            formattedDay
                    )
                };
            }

            let daysInNextMonth = 7 - (countDayInCurrentMonth % 7);
            let countDayInCurrentMonthSaved = countDayInCurrentMonth;
            let day = 0;

            //filling in dates from the next month
            if (daysInNextMonth < 7) {
                while (
                    countDayInCurrentMonth <
                    countDayInCurrentMonthSaved + daysInNextMonth
                ) {
                    countDayInCurrentMonth++;
                    day++;

                    let formattedDay = this.formattingDay(day);
                    let nextMonth = day === 1 ? this.nextMonthAsString : false;
                    let nextYear =
                        formattedCurrentYear !== formattedNextYear && day === 1
                            ? formattedNextYear
                            : false;
                    let additional = {
                        month: nextMonth,
                        year: nextYear
                    };

                    if (!nextMonth && !nextYear) {
                        additional = false;
                    }

                    dateList[countDayInCurrentMonth] = {
                        key: countDayInCurrentMonth,
                        dayNumber: formattedDay,
                        date:
                            formattedDay +
                            "." +
                            formattedNextMonth +
                            "." +
                            formattedNextYear,
                        blank: true,
                        today: false,
                        additional: additional,
                        weekDay: false,
                        moment: moment(
                            formattedNextYear +
                                formattedNextMonth +
                                formattedDay
                        )
                    };
                }
            }

            return dateList.filter(function() {
                return true;
            });
        },

        initialDate: function() {
            return this.formattingDay(this.today.get("date"));
        },
        initialMonth: function() {
            return this.today.format("MMMM");
        },
        initialYear: function() {
            return this.today.format("Y");
        },
        todayInCurrentMonthAndYear: function() {
            return (
                this.month === this.initialMonth &&
                this.year === this.initialYear
            );
        },
        selectedDayAndMonth: function() {
            let dayAndMonth = this.selectedDate.format("D MMMM");
            dayAndMonth = dayAndMonth.split(" ");
            dayAndMonth = {
                day: dayAndMonth[0],
                month: dayAndMonth[1]
            };

            return dayAndMonth;
        },
        selectedWeekDay: function() {
            return this.selectedDate.format("dddd");
        },
        todayIsEqualSelectDate: function() {
            return (
                this.selectedDate.format("YYYYMMDD") ===
                this.today.format("YYYYMMDD")
            );
        }
    },
    methods:{
        
        searchit: _.debounce(() => {
            Fire.$emit('searching');
        },1000),
        ddMonth: function() {
            this.dateContext = this.nextMonth;
        },
        subtractMonth: function() {
            this.dateContext = this.previousMonth;
        },
        setSelectedDate: function(moment) {
            this.selectedDate = moment;
        },
        goToday: function() {
            this.selectedDate = this.today;
            this.dateContext = this.today;
        },
        formattingDay(day) {
            return ("0" + day).slice(-2);
        },
        getWeekDay(day) {
            let index = day;
            if (index > 7) {
                index %= 7;
            }
            index = index === 0 ? 6 : index - 1;
            return this.days[index];
        },
        filters: {
            capitalize: function(value) {
                if (!value) return "";
                value = value.toString();
                return value.charAt(0).toUpperCase() + value.slice(1);
            }
        },
        printme() {
            window.print();
        }
    }
});


